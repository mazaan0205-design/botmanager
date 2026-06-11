(function() {
    // 1. Inject Floating Bubble Styles directly onto the host website
    const style = document.createElement('style');
    style.innerHTML = `
        #botmanager-widget-container { position: fixed; bottom: 20px; right: 20px; z-index: 999999; font-family: 'Inter', sans-serif; }
        #botmanager-chat-bubble { width: 60px; height: 60px; background: #4f46e5; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; box-shadow: 0 4px 12px rgba(0,0,0,0.15); transition: transform 0.2s; }
        #botmanager-chat-bubble:hover { transform: scale(1.05); }
        #botmanager-chat-bubble svg { width: 28px; height: 28px; fill: white; }
        #botmanager-chat-window { display: none; width: 360px; height: 500px; background: white; border-radius: 12px; box-shadow: 0 8px 24px rgba(0,0,0,0.2); flex-direction: column; overflow: hidden; position: absolute; bottom: 80px; right: 0; border: 1px solid #e5e7eb; }
        #botmanager-chat-header { background: #4f46e5; color: white; padding: 16px; font-weight: 600; font-size: 16px; }
        #botmanager-chat-messages { flex: 1; padding: 16px; overflow-y: auto; display: flex; flex-direction: column; gap: 10px; background: #f9fafb; }
        .bm-msg { max-width: 80%; padding: 10px 14px; border-radius: 12px; font-size: 14px; line-height: 1.4; }
        .bm-msg.user { background: #4f46e5; color: white; align-self: flex-end; border-bottom-right-radius: 2px; }
        .bm-msg.bot { background: #e5e7eb; color: #1f2937; align-self: flex-start; border-bottom-left-radius: 2px; }
        #botmanager-chat-input-area { display: flex; border-top: 1px solid #e5e7eb; padding: 10px; background: white; }
        #botmanager-chat-input { flex: 1; border: 1px solid #d1d5db; border-radius: 6px; padding: 8px 12px; font-size: 14px; outline: none; }
        #botmanager-chat-submit { background: #4f46e5; color: white; border: none; border-radius: 6px; margin-left: 8px; padding: 0 14px; cursor: pointer; font-size: 14px; }
    `;
    document.head.appendChild(style);

    // 2. Create Widget Markup Structures
    const config = window.BotManagerConfig || { botId: 'new', backendUrl: 'http://127.0.0.1:8001' };
    let session_id = null;

    const container = document.createElement('div');
    container.id = 'botmanager-widget-container';
    container.innerHTML = `
        <div id="botmanager-chat-window">
            <div id="botmanager-chat-header">AI Assistant Support</div>
            <div id="botmanager-chat-messages">
                <div class="bm-msg bot">Hello! How can I help you today?</div>
            </div>
            <div id="botmanager-chat-input-area">
                <input type="text" id="botmanager-chat-input" placeholder="Type your message...">
                <button id="botmanager-chat-submit">Send</button>
            </div>
        </div>
        <div id="botmanager-chat-bubble">
            <svg viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 14H6l-2 2V4h16v12z"/></svg>
        </div>
    `;
    document.body.appendChild(container);

    // 3. UI Toggle Mechanics
    const bubble = document.getElementById('botmanager-chat-bubble');
    const windowEl = document.getElementById('botmanager-chat-window');
    const inputEl = document.getElementById('botmanager-chat-input');
    const submitBtn = document.getElementById('botmanager-chat-submit');
    const messagesContainer = document.getElementById('botmanager-chat-messages');

    bubble.addEventListener('click', () => {
        windowEl.style.display = windowEl.style.display === 'flex' ? 'none' : 'flex';
        if(windowEl.style.display === 'flex') inputEl.focus();
    });

    // 4. Message Streaming Handler
    async function sendMessage() {
        const text = inputEl.value.trim();
        if (!text) return;

        // Append User Message to UI
        appendMessage('user', text);
        inputEl.value = '';

        // Typing Indicator Placeholder
        const typingIndicator = appendMessage('bot', 'Thinking...');

        try {
            const response = await fetch(`${config.backendUrl}/bots/${config.botId}/chat`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ message: text, session_id: session_id, history: [] })
            });
            const data = await response.json();
            
            // Remove indicator and append real response
            typingIndicator.remove();
            if (data.reply) {
                appendMessage('bot', data.reply);
                session_id = data.session_id; // Remember sidebar tracking thread context
            } else {
                appendMessage('bot', 'Sorry, I ran into an issue.');
            }
        } catch (e) {
            typingIndicator.remove();
            appendMessage('bot', 'Unable to connect to service.');
        }
    }

    function appendMessage(sender, text) {
        const msg = document.createElement('div');
        msg.className = `bm-msg ${sender}`;
        msg.innerText = text;
        messagesContainer.appendChild(msg);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
        return msg;
    }

    submitBtn.addEventListener('click', sendMessage);
    inputEl.addEventListener('keypress', (e) => { if (e.key === 'Enter') sendMessage(); });
})();