<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Documentation - BotManager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #F8FAFC; }
    </style>
</head>
<body class="flex">

    <!-- Sidebar (Paste your sidebar code here) -->
    <aside class="w-[280px] h-screen bg-white border-r border-slate-200 fixed flex flex-col p-4">
        <!-- ... Your Logo and Nav Links ... -->
        
        <!-- Footer Section we just updated -->
        <div class="mt-auto pt-4 border-t border-slate-200 flex flex-col gap-1">
            <a href="{{ route('bot.config') }}" class="w-full mb-4 py-2.5 bg-indigo-600 text-white rounded-lg flex items-center justify-center gap-2 hover:opacity-90 font-medium text-sm">
                <span class="material-symbols-outlined text-[20px]">add</span> Create New Bot
            </a>
            <a href="{{ route('documentation') }}" class="flex items-center gap-3 px-4 py-2 text-indigo-600 bg-indigo-50 rounded-lg transition-all text-sm font-medium">
                <span class="material-symbols-outlined">menu_book</span> Documentation
            </a>
            <a href="{{ route('account') }}" class="flex items-center gap-3 px-4 py-2 text-slate-600 hover:bg-slate-200/50 rounded-lg transition-all text-sm font-medium">
                <span class="material-symbols-outlined">person</span> Account
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="ml-[280px] flex-1 p-10">
        <header class="mb-10">
            <h1 class="text-3xl font-bold text-slate-900">Documentation</h1>
            <p class="text-slate-500 mt-2">Learn how to build and deploy your intelligent automation agents.</p>
        </header>

        <section class="max-w-4xl space-y-8">
            <div class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
                <h2 class="text-xl font-bold text-slate-800 mb-4">Introduction</h2>
                <p class="text-slate-600 leading-relaxed">
                    Welcome to BotManager. This platform helps university students and developers build chatbots using 
                    <strong>Laravel</strong> and <strong>FastAPI</strong>.
                </p>
            </div>
            <!-- Add more documentation sections here -->
        </section>
    </main>

</body>
</html>