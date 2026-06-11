import os
from groq import Groq
import database

# Initialize the Groq core interface client
GROQ_API_KEY = os.environ.get("GROQ_API_KEY", "your-fallback-groq-key")
client = Groq(api_key=GROQ_API_KEY)

def generate_bot_reply(bot_id: str, user_message: str, history: list, temperature: float = 0.3) -> str:
    try:
        # 1. Fetch system instructions from database configuration metrics
        bot_config = database.get_bot_config(bot_id)
        if bot_config:
            base_instructions = bot_config.get("instructions", "You are a helpful AI assistant.")
            engine_model = bot_config.get("engine", "llama-3.3-70b-versatile")
        else:
            base_instructions = "You are a helpful AI assistant."
            engine_model = "llama-3.3-70b-versatile"

        # 2. Extract context from knowledge base documents
        retrieved_knowledge = database.query_bot_knowledge(bot_id, user_message)

        # 3. Augment system template dynamically if matching files exist
        if retrieved_knowledge:
            system_instruction = f"""
            {base_instructions}
            
            CRITICAL KNOWLEDGE BASE CONTEXT:
            You must use the following facts verified by the business owner to resolve the user's question. If the answer cannot be generated from this documentation context, inform them clearly that you lack that data.
            
            Verified Business Facts:
            {retrieved_knowledge}
            """
        else:
            system_instruction = base_instructions

        # 4. Compile messages structural payload arrays
        messages = [{"role": "system", "content": system_instruction}]
        
        for msg in history:
            messages.append({"role": msg["role"], "content": msg["content"]})
            
        messages.append({"role": "user", "content": user_message})

        # 5. Route structured transaction payloads directly to Groq Cloud API
        completion = client.chat.completions.create(
            model=engine_model,
            messages=messages,
            temperature=temperature,
            max_tokens=1024,
            top_p=1,
            stream=False,
        )
        
        return completion.choices[0].message.content

    except Exception as e:
        print(f"Groq API Inference Engine Error: {e}")
        return "I apologize, but I am having trouble connecting to my processing networks right now."