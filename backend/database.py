import os
import sqlite3
from typing import List, Dict, Any, Optional

BASE_DIR = os.path.dirname(os.path.abspath(__file__))
DB_NAME = os.path.join(BASE_DIR, "bot_manager.db")

def init_db():
    conn = sqlite3.connect(DB_NAME)
    cursor = conn.cursor()
    
    # 1. Bots Profile Table
    cursor.execute('''
        CREATE TABLE IF NOT EXISTS bots (
            id TEXT PRIMARY KEY,
            name TEXT NOT NULL,
            description TEXT,
            instructions TEXT NOT NULL,
            engine TEXT DEFAULT 'llama-3.3-70b-versatile',
            temperature REAL DEFAULT 0.3,
            guardrails INTEGER DEFAULT 1
        )
    ''')
    
    # 2. Bot Counter Metrics Table
    cursor.execute('''
        CREATE TABLE IF NOT EXISTS bot_statistics (
            bot_id TEXT PRIMARY KEY,
            conversations INTEGER DEFAULT 0,
            FOREIGN KEY (bot_id) REFERENCES bots (id) ON DELETE CASCADE
        )
    ''')

    # 3. Chat Sessions Table (Sidebar Topics)
    cursor.execute('''
        CREATE TABLE IF NOT EXISTS chat_sessions (
            session_id TEXT PRIMARY KEY,
            bot_id TEXT NOT NULL,
            title TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (bot_id) REFERENCES bots (id) ON DELETE CASCADE
        )
    ''')

    # 4. Chat Messages Table (Historical Context logs)
    cursor.execute('''
        CREATE TABLE IF NOT EXISTS chat_messages (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            session_id TEXT NOT NULL,
            role TEXT NOT NULL,
            content TEXT NOT NULL,
            timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (session_id) REFERENCES chat_sessions (session_id) ON DELETE CASCADE
        )
    ''')
    
    # 5. Knowledge Base Document Table
    cursor.execute('''
        CREATE TABLE IF NOT EXISTS bot_knowledge (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            bot_id TEXT NOT NULL,
            file_name TEXT NOT NULL,
            content TEXT NOT NULL,
            FOREIGN KEY (bot_id) REFERENCES bots (id) ON DELETE CASCADE
        )
    ''')
    
    conn.commit()
    conn.close()


# --- BOT PROFILE MANAGEMENT ---

def save_bot(bot_id: str, name: str, description: str, instructions: str, engine: str, temperature: float, guardrails: int) -> bool:
    try:
        clean_bot_id = str(bot_id).strip()
        conn = sqlite3.connect(DB_NAME)
        cursor = conn.cursor()
        cursor.execute("""
            INSERT INTO bots (id, name, description, instructions, engine, temperature, guardrails)
            VALUES (?, ?, ?, ?, ?, ?, ?)
            ON CONFLICT(id) DO UPDATE SET
                name=excluded.name, description=excluded.description, instructions=excluded.instructions,
                engine=excluded.engine, temperature=excluded.temperature, guardrails=excluded.guardrails
        """, (clean_bot_id, name, description, instructions, engine, temperature, guardrails))
        cursor.execute("INSERT OR IGNORE INTO bot_statistics (bot_id, conversations) VALUES (?, 0)", (clean_bot_id,))
        conn.commit()
        conn.close()
        return True
    except Exception as e:
        print(f"Database write exception: {e}")
        return False

def get_bot_config(bot_id: str) -> Optional[Dict[str, Any]]:
    clean_id = str(bot_id).strip()
    conn = sqlite3.connect(DB_NAME)
    cursor = conn.cursor()
    cursor.execute("SELECT id, name, description, instructions, engine, temperature, guardrails FROM bots WHERE id = ?", (clean_id,))
    row = cursor.fetchone()
    conn.close()
    
    if row:
        return {
            "id": str(row[0]), 
            "name": row[1], 
            "description": row[2] if row[2] else "", 
            "instructions": row[3], 
            "engine": row[4], 
            "temperature": row[5], 
            "guardrails": row[6]
        }
    return None

def delete_bot_from_db(bot_id: str) -> bool:
    try:
        clean_id = str(bot_id).strip()
        conn = sqlite3.connect(DB_NAME)
        cursor = conn.cursor()
        cursor.execute("DELETE FROM bots WHERE id = ?", (clean_id,))
        conn.commit()
        conn.close()
        return True
    except Exception as e:
        print(f"Delete transaction dropped: {e}")
        return False

def get_all_bots_with_stats() -> List[Dict[str, Any]]:
    conn = sqlite3.connect(DB_NAME)
    cursor = conn.cursor()
    cursor.execute("""
        SELECT b.id, b.name, b.description, b.instructions, b.engine, b.temperature, b.guardrails, COALESCE(s.conversations, 0)
        FROM bots b LEFT JOIN bot_statistics s ON b.id = s.bot_id
    """)
    rows = cursor.fetchall()
    conn.close()
    return [{"id": str(r[0]), "name": r[1], "description": r[2] if r[2] else "", "instructions": r[3], "engine": r[4], "temperature": r[5], "guardrails": r[6], "statistics": {"conversations": r[7]}} for r in rows]

def increment_conversation_count(bot_id: str):
    try:
        clean_id = str(bot_id).strip()
        conn = sqlite3.connect(DB_NAME)
        cursor = conn.cursor()
        cursor.execute("UPDATE bot_statistics SET conversations = conversations + 1 WHERE bot_id = ?", (clean_id,))
        conn.commit()
        conn.close()
    except Exception as e:
        print(f"Stats error: {e}")


# --- KNOWLEDGE BASE HANDLING ENGINE ---

def add_knowledge_content(bot_id: str, file_name: str, content: str):
    conn = sqlite3.connect(DB_NAME)
    cursor = conn.cursor()
    cursor.execute(
        "INSERT INTO bot_knowledge (bot_id, file_name, content) VALUES (?, ?, ?)",
        (str(bot_id).strip(), file_name, content)
    )
    conn.commit()
    conn.close()

def query_bot_knowledge(bot_id: str, user_query: str) -> str:
    conn = sqlite3.connect(DB_NAME)
    cursor = conn.cursor()
    cursor.execute("SELECT content FROM bot_knowledge WHERE bot_id = ?", (str(bot_id).strip(),))
    rows = cursor.fetchall()
    conn.close()
    
    matched_chunks = []
    query_words = set(user_query.lower().split())
    
    for row in rows:
        content = row[0]
        if any(word in content.lower() for word in query_words if len(word) > 3):
            matched_chunks.append(content)
            if len(matched_chunks) >= 3:
                break
                
    return "\n".join(matched_chunks) if matched_chunks else ""

def get_bot_knowledge_sources(bot_id: str) -> List[Dict[str, Any]]:
    """Groups text fragments by filename to return a clean asset list to Laravel UI."""
    conn = sqlite3.connect(DB_NAME)
    cursor = conn.cursor()
    cursor.execute("""
        SELECT file_name, COUNT(id) 
        FROM bot_knowledge 
        WHERE bot_id = ? 
        GROUP BY file_name
    """, (str(bot_id).strip(),))
    rows = cursor.fetchall()
    conn.close()
    
    return [
        {
            "source_name": r[0],
            "type": "TXT",
            "sync_status": "Ready",
            "size": f"{r[1]} chunks"
        }
        for r in rows
    ]


# --- CONVERSATION AND REPLAY HISTORY TRACKING ---

def create_or_get_session(session_id: str, bot_id: str, first_message: str) -> str:
    clean_session_id = str(session_id).strip()
    clean_bot_id = str(bot_id).strip()
    
    conn = sqlite3.connect(DB_NAME)
    cursor = conn.cursor()
    cursor.execute("SELECT session_id FROM chat_sessions WHERE session_id = ?", (clean_session_id,))
    row = cursor.fetchone()
    
    if not row:
        words = first_message.split()
        title = " ".join(words[:4]) + "..." if len(words) > 4 else first_message
        cursor.execute(
            "INSERT INTO chat_sessions (session_id, bot_id, title) VALUES (?, ?, ?)",
            (clean_session_id, clean_bot_id, title)
        )
        conn.commit()
    
    conn.close()
    return clean_session_id

def save_chat_message(session_id: str, role: str, content: str):
    clean_session_id = str(session_id).strip()
    conn = sqlite3.connect(DB_NAME)
    cursor = conn.cursor()
    cursor.execute(
        "INSERT INTO chat_messages (session_id, role, content) VALUES (?, ?, ?)",
        (clean_session_id, role, content)
    )
    conn.commit()
    conn.close()

def get_bot_chat_sessions(bot_id: str) -> List[Dict[str, Any]]:
    clean_bot_id = str(bot_id).strip()
    conn = sqlite3.connect(DB_NAME)
    cursor = conn.cursor()
    cursor.execute(
        "SELECT session_id, title, created_at FROM chat_sessions WHERE bot_id = ? ORDER BY created_at DESC",
        (clean_bot_id,)
    )
    rows = cursor.fetchall()
    conn.close()
    return [{"session_id": str(r[0]), "title": r[1], "created_at": r[2]} for r in rows]

def get_session_history(session_id: str) -> List[Dict[str, str]]:
    clean_session_id = str(session_id).strip()
    conn = sqlite3.connect(DB_NAME)
    cursor = conn.cursor()
    cursor.execute(
        "SELECT role, content FROM chat_messages WHERE session_id = ? ORDER BY timestamp ASC",
        (clean_session_id,)
    )
    rows = cursor.fetchall()
    conn.close()
    return [{"role": r[0], "content": r[1]} for r in rows]