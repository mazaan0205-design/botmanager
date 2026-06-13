import uuid
import uvicorn
import os
from fastapi import FastAPI, HTTPException, UploadFile, File
from fastapi.middleware.cors import CORSMiddleware
from fastapi.staticfiles import StaticFiles
from pydantic import BaseModel, ConfigDict
from typing import List, Dict, Any, Optional
import database
import ai_service
from fastapi import FastAPI
from fastapi.staticfiles import StaticFiles
from starlette.middleware.base import BaseHTTPMiddleware
from starlette.requests import Request

app = FastAPI(title="Bot Manager Backend")

class NoCacheMiddleware(BaseHTTPMiddleware):
    async def dispatch(self, request: Request, call_next):
        response = await call_next(request)
        if request.url.path.endswith('.js'):
            response.headers['Cache-Control'] = 'no-store'
        return response

app.add_middleware(NoCacheMiddleware)


# Enable CORS for internal Laravel and external client website widgets
app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

# Mount the static folder where widget.js is located
# Assuming your folder structure is: /project/static/embed/widget.js
app.mount("/embed", StaticFiles(directory="static/embed"), name="embed")

# Initialize the SQLite database tables
database.init_db()

# Mount the static directory to serve widget.js to user websites
STATIC_DIR = os.path.dirname(os.path.abspath(__file__))
app.mount("/static", StaticFiles(directory=STATIC_DIR), name="static")

# --- REQUEST PAYLOAD SCHEMAS ---
class BotConfigPayload(BaseModel):
    name: str
    description: Optional[str] = "Active AI Automation Agent"
    instructions: Optional[str] = "You are a helpful AI assistant."
    engine: Optional[str] = "llama-3.3-70b-versatile"
    temperature: Optional[float] = 0.3
    guardrails: Optional[bool] = True

    # Allows extra keys from the Laravel UI (Greetings, variables) without crashing
    model_config = ConfigDict(extra="allow")

class ChatPayload(BaseModel):
    message: str
    session_id: Optional[str] = None
    history: List[Dict[str, str]] = []

    model_config = ConfigDict(extra="allow")


# --- BOT CONFIGURATION ROUTES ---
@app.get("/")
async def welcome():
    return 'backend is running'

@app.get("/bots/list")
async def list_all_configured_bots():
    return database.get_all_bots_with_stats()

@app.get("/bots/{bot_id}")
async def get_single_bot_configuration(bot_id: str):
    config = database.get_bot_config(bot_id)
    if not config:
        raise HTTPException(status_code=404, detail="Bot configuration not found.")
    return config

@app.post("/bots/update/{bot_id}")
async def save_or_modify_bot_profile(bot_id: str, payload: BotConfigPayload):
    if bot_id == "new":
        target_id = str(uuid.uuid4())
    else:
        target_id = bot_id

    if not payload.description or payload.description.strip() == "":
        safe_description = "Active AI Automation Agent"
    else:
        safe_description = payload.description

    safe_instructions = payload.instructions if payload.instructions is not None else "You are a helpful AI assistant."
    guardrail_flag = 1 if payload.guardrails else 0

    saved_successfully = database.save_bot(
        bot_id=target_id,
        name=payload.name,
        description=safe_description,
        instructions=safe_instructions,
        engine=payload.engine if payload.engine else "llama-3.3-70b-versatile",
        temperature=payload.temperature if payload.temperature is not None else 0.3,
        guardrails=guardrail_flag
    )

    if not saved_successfully:
        raise HTTPException(status_code=500, detail="Database write failure.")

    return {
        "status": "success",
        "message": "Bot saved successfully.",
        "bot_id": target_id
    }

@app.delete("/bots/{bot_id}")
async def terminate_bot_configuration(bot_id: str):
    if not database.delete_bot_from_db(bot_id):
        raise HTTPException(status_code=500, detail="Failed to delete bot.")
    return {"status": "success", "message": "Bot profile deleted successfully."}


# --- KNOWLEDGE BASE MANAGEMENT ENDPOINTS ---

@app.post("/bots/{bot_id}/knowledge/upload")
async def upload_bot_knowledge_file(bot_id: str, file: UploadFile = File(...)):
    if bot_id in ["new", "playground"]:
        raise HTTPException(status_code=400, detail="Please save your bot before uploading document files.")

    try:
        contents = await file.read()
        text_content = contents.decode("utf-8")

        # Chunk text by double newlines (paragraphs)
        paragraphs = [p.strip() for p in text_content.split("\n\n") if p.strip()]

        for paragraph in paragraphs:
            database.add_knowledge_content(bot_id=bot_id, file_name=file.filename, content=paragraph)

        return {"status": "success", "message": f"Successfully loaded {len(paragraphs)} facts from {file.filename}."}
    except Exception as e:
        raise HTTPException(status_code=500, detail=f"File parsing error: {str(e)}")

@app.get("/bots/{bot_id}/knowledge")
async def list_bot_knowledge_sources(bot_id: str):
    """Fetches real database-stored sources to populate her Laravel front-end dynamically."""
    if bot_id in ["new", "playground"]:
        return []
    return database.get_bot_knowledge_sources(bot_id)


# --- EXECUTION CHAT PIPELINE ---

@app.post("/bots/{bot_id}/chat")
async def execute_chatbot_inference(bot_id: str, payload: ChatPayload):
    # Intercept sandbox/test configurations instantly
    if bot_id in ["new", "playground"]:
        response_string = ai_service.generate_bot_reply(
            bot_id="new", user_message=payload.message, history=payload.history, temperature=0.3
        )
        return {"status": "success", "reply": response_string, "session_id": "playground"}

    bot_config = database.get_bot_config(bot_id)
    if not bot_config:
        raise HTTPException(status_code=404, detail="Chatbot matrix profile not found.")

    active_session_id = payload.session_id if payload.session_id else str(uuid.uuid4())
    database.create_or_get_session(active_session_id, bot_id, payload.message)
    database.save_chat_message(active_session_id, "user", payload.message)

    response_string = ai_service.generate_bot_reply(
        bot_id=bot_id,
        user_message=payload.message,
        history=payload.history,
        temperature=float(bot_config.get("temperature", 0.3))
    )

    database.save_chat_message(active_session_id, "assistant", response_string)
    database.increment_conversation_count(bot_id)

    return {
        "status": "success",
        "reply": response_string,
        "session_id": active_session_id
    }

if __name__ == "__main__":
    uvicorn.run("main:app", host="127.0.0.1", port=8001, reload=True)
