<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Account Settings - BotManager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #F8FAFC; }
        .bg-primary { background-color: #4F46E5; } /* indigo-600 */
    </style>
</head>
<body class="flex">

    <!-- Sidebar -->
    <aside class="w-[280px] h-screen bg-white border-r border-slate-200 fixed flex flex-col p-4 z-50">
        <div class="flex items-center gap-3 px-2 mb-8">
            <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center text-white">
                <span class="material-symbols-outlined">smart_toy</span>
            </div>
            <h1 class="text-xl font-bold text-slate-900">BotManager</h1>
        </div>
        
        <nav class="flex-1 flex flex-col gap-1">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-2 text-slate-600 hover:bg-slate-50 rounded-lg transition-all text-sm font-medium">
                <span class="material-symbols-outlined">dashboard</span> Dashboard
            </a>
            <a href="{{ route('bot.config') }}" class="flex items-center gap-3 px-4 py-2 text-slate-600 hover:bg-slate-50 rounded-lg transition-all text-sm font-medium">
                <span class="material-symbols-outlined">settings</span> Configuration
            </a>
            <a href="{{ route('knowledge.base') }}" class="flex items-center gap-3 px-4 py-2 text-slate-600 hover:bg-slate-50 rounded-lg transition-all text-sm font-medium">
                <span class="material-symbols-outlined">database</span> Knowledge Base
            </a>
            <a href="{{ route('test.preview') }}" class="flex items-center gap-3 px-4 py-2 text-slate-600 hover:bg-slate-50 rounded-lg transition-all text-sm font-medium">
                <span class="material-symbols-outlined">chat_bubble</span> Test Preview
            </a>
        </nav>

        <!-- Footer Section -->
        <div class="mt-auto pt-4 border-t border-slate-200 flex flex-col gap-1">
            <a href="{{ route('bot.config') }}" class="w-full mb-4 py-2.5 bg-primary text-white rounded-lg flex items-center justify-center gap-2 hover:opacity-90 transition-all font-semibold text-sm">
                <span class="material-symbols-outlined text-[20px]">add</span> Create New Bot
            </a>
            <a href="{{ route('documentation') }}" class="flex items-center gap-3 px-4 py-2 text-slate-600 hover:bg-slate-50 rounded-lg transition-all text-sm font-medium">
                <span class="material-symbols-outlined">menu_book</span> Documentation
            </a>
            <a href="{{ route('account') }}" class="flex items-center gap-3 px-4 py-2 text-indigo-600 bg-indigo-50 rounded-lg transition-all text-sm font-medium">
                <span class="material-symbols-outlined">person</span> Account
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="ml-[280px] flex-1 p-10">
        <header class="mb-10">
            <h1 class="text-3xl font-bold text-slate-900">Account Settings</h1>
            <p class="text-slate-500 mt-2">Manage your developer profile and environment configurations.</p>
        </header>

        <div class="max-w-4xl space-y-8">
            <!-- Profile Section -->
            <section class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-100 bg-slate-50 flex items-center gap-2">
                    <span class="material-symbols-outlined text-slate-400">person</span>
                    <h3 class="font-bold text-slate-800">Personal Information</h3>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-1">Full Name</label>
                        <input type="text" class="w-full px-4 py-2 border border-slate-200 rounded-lg bg-slate-50 font-medium" value="Ayzm Abbas" readonly>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-1">Email Address</label>
                        <input type="email" class="w-full px-4 py-2 border border-slate-200 rounded-lg" placeholder="ayzam.abbas@university.edu">
                    </div>
                </div>
            </section>

            <!-- API Keys Section -->
            <section class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-100 bg-slate-50 flex items-center gap-2">
                    <span class="material-symbols-outlined text-slate-400">key</span>
                    <h3 class="font-bold text-slate-800">API Keys & Endpoints</h3>
                </div>
                <div class="p-6 space-y-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-1">OpenAI API Key</label>
                        <div class="flex gap-2">
                            <input type="password" class="flex-1 px-4 py-2 border border-slate-200 rounded-lg bg-slate-50" value="••••••••••••••••">
                            <button class="px-4 py-2 border border-slate-200 rounded-lg hover:bg-slate-50 text-sm font-medium transition-colors">Show</button>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-1">FastAPI / ChromaDB URL</label>
                        <input type="text" class="w-full px-4 py-2 border border-slate-200 rounded-lg" placeholder="http://127.0.0.1:8000">
                    </div>
                </div>
            </section>

            <!-- Environment Section (Windows) -->
            <section class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-100 bg-slate-50 flex items-center gap-2">
                    <span class="material-symbols-outlined text-slate-400">computer</span>
                    <h3 class="font-bold text-slate-800">Local Environment</h3>
                </div>
                <div class="p-6 grid grid-cols-2 gap-4 text-sm">
                    <div class="text-slate-500">Operating System</div>
                    <div class="text-slate-900 font-semibold">Windows (XAMPP Environment)</div>
                    <div class="text-slate-500">PHP Version</div>
                    <div class="text-slate-900 font-semibold">8.2.12</div>
                    <div class="text-slate-500">Vector Store</div>
                    <div class="text-slate-900 font-semibold">pgvector / ChromaDB</div>
                </div>
            </section>

            <div class="flex justify-end gap-3 pt-4">
                <button class="px-6 py-2 border border-slate-200 rounded-lg text-slate-600 font-bold hover:bg-slate-50">Cancel</button>
                <button class="px-6 py-2 bg-primary text-white rounded-lg font-bold hover:opacity-90">Save Settings</button>
            </div>
        </div>
    </main>

</body>
</html>