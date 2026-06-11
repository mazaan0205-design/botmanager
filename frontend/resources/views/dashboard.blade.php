<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Material+Symbols+Outlined&display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "surface-container-lowest": "#ffffff",
                        "inverse-on-surface": "#f3effc",
                        "surface-variant": "#e4e1ee",
                        "primary-fixed": "#e2dfff",
                        "on-tertiary-fixed-variant": "#7b2f00",
                        "on-secondary-fixed-variant": "#38485d",
                        "on-tertiary-container": "#ffd2be",
                        "surface-tint": "#4d44e3",
                        "error": "#ba1a1a",
                        "on-surface": "#1b1b24",
                        "on-tertiary-fixed": "#351000",
                        "on-primary-fixed": "#0f0069",
                        "surface-container-low": "#f5f2ff",
                        "error-container": "#ffdad6",
                        "tertiary-fixed": "#ffdbcc",
                        "primary-fixed-dim": "#c3c0ff",
                        "surface-container-high": "#eae6f4",
                        "surface": "#fcf8ff",
                        "on-background": "#1b1b24",
                        "on-secondary-fixed": "#0b1c30",
                        "on-primary": "#ffffff",
                        "tertiary-fixed-dim": "#ffb695",
                        "surface-bright": "#fcf8ff",
                        "on-secondary-container": "#54647a",
                        "on-error-container": "#93000a",
                        "tertiary": "#7e3000",
                        "surface-container-highest": "#e4e1ee",
                        "surface-dim": "#dcd8e5",
                        "on-tertiary": "#ffffff",
                        "background": "#fcf8ff",
                        "primary": "#3525cd",
                        "outline-variant": "#c7c4d8",
                        "on-surface-variant": "#464555",
                        "inverse-surface": "#302f39",
                        "secondary-container": "#d0e1fb",
                        "on-primary-container": "#dad7ff",
                        "secondary-fixed": "#d3e4fe",
                        "on-secondary": "#ffffff",
                        "surface-container": "#f0ecf9",
                        "secondary": "#505f76",
                        "on-error": "#ffffff",
                        "inverse-primary": "#c3c0ff",
                        "primary-container": "#4f46e5",
                        "outline": "#777587",
                        "on-primary-fixed-variant": "#3323cc",
                        "secondary-fixed-dim": "#b7c8e1",
                        "tertiary-container": "#a44100"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "gutter": "20px",
                        "xl": "32px",
                        "lg": "24px",
                        "xs": "4px",
                        "container-margin": "40px",
                        "md": "16px",
                        "sm": "12px",
                        "base": "8px"
                    },
                    "fontFamily": {
                        "h3": ["Inter"],
                        "body-sm": ["Inter"],
                        "body-md": ["Inter"],
                        "h1": ["Inter"],
                        "h2": ["Inter"],
                        "body-lg": ["Inter"],
                        "label-md": ["Inter"],
                        "label-sm": ["Inter"]
                    },
                    "fontSize": {
                        "h3": ["24px", {
                            "lineHeight": "32px",
                            "letterSpacing": "-0.01em",
                            "fontWeight": "600"
                        }],
                        "body-sm": ["14px", {
                            "lineHeight": "20px",
                            "fontWeight": "400"
                        }],
                        "body-md": ["16px", {
                            "lineHeight": "24px",
                            "fontWeight": "400"
                        }],
                        "h1": ["36px", {
                            "lineHeight": "44px",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "700"
                        }],
                        "h2": ["30px", {
                            "lineHeight": "38px",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "600"
                        }],
                        "body-lg": ["18px", {
                            "lineHeight": "28px",
                            "fontWeight": "400"
                        }],
                        "label-md": ["14px", {
                            "lineHeight": "20px",
                            "fontWeight": "500"
                        }],
                        "label-sm": ["12px", {
                            "lineHeight": "16px",
                            "letterSpacing": "0.05em",
                            "fontWeight": "600"
                        }]
                    }
                }
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            line-height: 1;
            text-transform: none;
            letter-spacing: normal;
            word-wrap: normal;
            white-space: nowrap;
            direction: ltr;
        }
        body {
            background-color: #F8FAFC;
        }
    </style>
</head>

<body class="font-body-md text-on-background antialiased">
    <div id="sidebar-backdrop" class="fixed inset-0 bg-slate-900/50 z-40 hidden lg:hidden transition-opacity"></div>

    <aside id="sidebar" class="fixed left-0 top-0 h-screen w-[280px] border-r border-slate-200 bg-slate-50 flex flex-col p-4 z-50 transition-transform duration-300 -translate-x-full lg:translate-x-0">
        <div class="flex items-center gap-3 px-4 py-6 mb-4">
            <div class="w-10 h-10 rounded-lg bg-primary-container flex items-center justify-center">
                <span class="material-symbols-outlined text-on-primary-container" style="font-variation-settings: 'FILL' 1;">smart_toy</span>
            </div>
            <div>
                <h2 class="text-xl font-black text-indigo-600">BotManager</h2>
                <p class="text-[10px] font-bold text-slate-400 tracking-widest uppercase">v2.4.0</p>
            </div>
        </div>
        <nav class="flex-1 flex flex-col gap-1">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-all {{ request()->routeIs('dashboard') ? 'text-indigo-600 bg-indigo-50 font-medium' : 'text-slate-600 hover:bg-slate-200/50' }}">
                <span class="material-symbols-outlined">dashboard</span> Dashboard
            </a>
            <a href="{{ route('bot-config', ['id' => $bot->id ?? 'new']) }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-all {{ request()->routeIs('bot-config') ? 'text-indigo-600 bg-indigo-50 font-medium' : 'text-slate-600 hover:bg-slate-200/50' }}">
                <span class="material-symbols-outlined">settings</span> Configuration
            </a>
            <a href="{{ route('knowledge', ['id' => $bot->id ?? 'new']) }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-all {{ request()->routeIs('knowledge') ? 'text-indigo-600 bg-indigo-50 font-medium' : 'text-slate-600 hover:bg-slate-200/50' }}">
                <span class="material-symbols-outlined">database</span> Knowledge Base
            </a>
            <a href="{{ route('preview', ['id' => $bot->id ?? 'new']) }}" class="flex items-center gap-3 px-4 py-2 rounded-lg transition-all {{ request()->routeIs('preview') ? 'text-indigo-600 bg-indigo-50 font-medium' : 'text-slate-600 hover:bg-slate-200/50' }}">
                <span class="material-symbols-outlined">chat_bubble</span> Test Preview
            </a>
        </nav>
        <a href="{{ route('bot-config', ['id' => 'new']) }}" class="w-full mb-4 py-3 px-4 bg-indigo-600 text-white rounded-lg font-medium flex items-center justify-center gap-2 hover:bg-indigo-700 transition-all">
            <span class="material-symbols-outlined text-sm">add</span> Create New Bot
        </a>
        <a class="flex items-center gap-3 px-4 py-2 text-slate-600 hover:bg-slate-200/50 rounded-lg transition-all font-medium" href="#">
            <span class="material-symbols-outlined">menu_book</span> <span class="font-label-md">Documentation</span>
        </a>
        <a class="flex items-center gap-3 px-4 py-2 text-slate-600 hover:bg-slate-200/50 rounded-lg transition-all font-medium" href="#">
            <span class="material-symbols-outlined">person</span> <span class="font-label-md">Account</span>
        </a>
    </aside>

    <header class="fixed top-0 right-0 left-0 lg:ml-[280px] h-16 bg-white border-b border-slate-200 flex justify-between items-center px-4 sm:px-6 z-30 shadow-sm transition-all duration-300">
        <div class="flex items-center flex-1">
            <button id="mobile-menu-btn" class="p-2 mr-2 -ml-2 text-slate-500 hover:bg-slate-50 rounded-lg lg:hidden transition-colors">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <div class="relative w-full max-w-[130px] sm:max-w-md">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">search</span>
                <input class="w-full pl-10 pr-4 py-2 bg-slate-50 border-none rounded-lg focus:ring-2 focus:ring-indigo-500 text-sm" placeholder="Search chatbots..." type="text" />
            </div>
        </div>
        <div class="flex items-center gap-2 sm:gap-4">
            <button class="p-2 text-slate-500 hover:bg-slate-50 rounded-full transition-colors relative">
                <span class="material-symbols-outlined">notifications</span>
                <span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full border-2 border-white"></span>
            </button>
            <button class="p-2 text-slate-500 hover:bg-slate-50 rounded-full transition-colors">
                <span class="material-symbols-outlined">settings</span>
            </button>
            <button class="p-2 text-slate-500 hover:bg-slate-50 rounded-full transition-colors">
                <span class="material-symbols-outlined">help</span>
            </button>
            <div class="h-8 w-[1px] bg-slate-200 mx-2"></div>
            <img alt="User profile avatar" class="w-8 h-8 rounded-full border border-slate-200" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBnU_jKs9zLGqPyg_PZFk17MZwvSmn8fVsLhp_jXO6xqix6xuzhtDdcEsAR35dmrfeyJXu-xZ5LaoAq9AWYTKIm-wy5Xgsd_GLSQqh0e3Zw9UNk2X0UXXBIiUgp0UvlyUzQXH_Gf6Sedp5EPG0OMYav96PUyzjHstBuKlZShdLKBk2tpLmWS_tglX9nyx2LnjAm_AodgIrxQKJYEww7j8NdIgcbQRRB1PCX1WppqeJbw_8lI-FTuYomOQoo6NbYgUAyEijyu6y1bN8" />
        </div>
    </header>

    <main class="lg:ml-[280px] pt-16 min-h-screen transition-all duration-300">
        <div class="p-4 md:p-[40px]">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4 mb-xl">
                <div>
                    <h1 class="font-h1 text-h1 text-slate-900">My Chatbots</h1>
                    <p class="text-on-surface-variant font-body-md mt-1">Manage and monitor your intelligent automation agents.</p>
                </div>
                <div class="flex gap-sm">
                    <button class="px-4 py-2 border border-slate-200 rounded-lg font-label-md text-secondary hover:bg-slate-50 transition-colors flex items-center gap-2">
                        <span class="material-symbols-outlined text-lg">filter_list</span> Filter
                    </button>
                    <a href="{{ route('bot-config', ['id' => 'new']) }}" class="py-2.5 px-4 bg-indigo-600 text-white rounded-lg font-medium flex items-center justify-center gap-2 hover:bg-indigo-700 transition-all shadow-sm">
                        <span class="material-symbols-outlined text-sm">add</span> Create New Bot
                    </a>
                </div>
            </div>

            <div id="bots-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($bots as $bot)
                    <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow relative">

                        <button type="button"
                                onclick="openEmbedModal('{{ $bot->bot_id ?? $bot->id }}')"
                                class="absolute top-4 right-4 text-indigo-600 hover:text-indigo-800 bg-slate-50 hover:bg-indigo-50 border border-slate-200 font-mono font-bold text-xs w-8 h-8 rounded-lg flex items-center justify-center shadow-sm transition-all z-20"
                                title="Get Embed Snippet">
                            &lt;/&gt;
                        </button>

                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-indigo-50 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-indigo-600">smart_toy</span>
                                </div>
                                <div>
                                    <h3 class="font-bold text-slate-900">{{ $bot->name ?? 'Unnamed Bot' }}</h3>
                                    <div class="flex items-center gap-1.5 text-xs text-slate-500">
                                        <span class="w-2 h-2 rounded-full {{ ($bot->status ?? 'offline') == 'online' ? 'bg-green-500' : 'bg-slate-400' }}"></span>
                                        {{ ucfirst($bot->status ?? 'offline') }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p class="text-slate-600 text-sm mb-6 line-clamp-2 pr-6">
                            {{ $bot->description ?? 'No description provided.' }}
                        </p>

                        <div class="flex gap-2">
                            <a href="{{ route('preview', $bot->id) }}" class="flex-1 flex items-center justify-center gap-2 py-2 bg-slate-50 hover:bg-slate-100 text-slate-700 rounded-lg text-sm font-medium transition-colors">
                                <span class="material-symbols-outlined text-base">play_arrow</span> Test
                            </a>
                            <a href="{{ route('bot-config', $bot->id) }}" class="flex-1 flex items-center justify-center gap-2 py-2 bg-slate-50 hover:bg-slate-100 text-slate-700 rounded-lg text-sm font-medium transition-colors">
                                <span class="material-symbols-outlined text-base">edit</span> Edit
                            </a>
                            <a href="{{ route('knowledge', $bot->id) }}" class="px-3 py-2 bg-slate-50 hover:bg-slate-100 text-slate-700 rounded-lg text-sm font-medium transition-colors flex items-center gap-2">
                                <span class="material-symbols-outlined text-base">menu_book</span> KB
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-12 text-center border-2 border-dashed border-slate-200 rounded-xl text-slate-400">
                        <p>No bots found. Click "Create New Bot" to start.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-xl bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">
                <div class="px-lg py-md border-b border-slate-100 flex justify-between items-center">
                    <h3 class="font-h3 text-[18px] text-slate-900">Global Activity Log</h3>
                    <button class="text-indigo-600 font-label-sm hover:underline">View All</button>
                </div>
                <div class="overflow-x-auto w-full">
                    <table class="w-full text-left min-w-[600px]">
                        <thead class="bg-slate-50">
                            <tr>
                                <th class="px-lg py-3 text-[12px] font-bold text-slate-500 uppercase tracking-wider">Event</th>
                                <th class="px-lg py-3 text-[12px] font-bold text-slate-500 uppercase tracking-wider">Bot Source</th>
                                <th class="px-lg py-3 text-[12px] font-bold text-slate-500 uppercase tracking-wider">User ID</th>
                                <th class="px-lg py-3 text-[12px] font-bold text-slate-500 uppercase tracking-wider">Status</th>
                                <th class="px-lg py-3 text-[12px] font-bold text-slate-500 uppercase tracking-wider text-right">Timestamp</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-lg py-4 font-body-sm text-slate-900">New lead captured</td>
                                <td class="px-lg py-4 font-body-sm text-slate-600">Sales Assistant</td>
                                <td class="px-lg py-4 font-body-sm text-slate-600">#US-9281</td>
                                <td class="px-lg py-4">
                                    <span class="px-2 py-0.5 bg-green-50 text-green-700 text-xs font-medium rounded">Success</span>
                                </td>
                                <td class="px-lg py-4 font-body-sm text-slate-400 text-right">2m ago</td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-lg py-4 font-body-sm text-slate-900">Documentation query</td>
                                <td class="px-lg py-4 font-body-sm text-slate-600">Customer Support</td>
                                <td class="px-lg py-4 font-body-sm text-slate-600">#ANON-04</td>
                                <td class="px-lg py-4">
                                    <span class="px-2 py-0.5 bg-indigo-50 text-indigo-700 text-xs font-medium rounded">Handled</span>
                                </td>
                                <td class="px-lg py-4 font-body-sm text-slate-400 text-right">14m ago</td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-lg py-4 font-body-sm text-slate-900">Critical Error: API Timeout</td>
                                <td class="px-lg py-4 font-body-sm text-slate-600">IT Helpdesk</td>
                                <td class="px-lg py-4 font-body-sm text-slate-600">#ADMIN-01</td>
                                <td class="px-lg py-4">
                                    <span class="px-2 py-0.5 bg-error-container text-error text-xs font-medium rounded">Failed</span>
                                </td>
                                <td class="px-lg py-4 font-body-sm text-slate-400 text-right">1h ago</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <button class="fixed bottom-base right-base w-14 h-14 bg-primary text-on-primary rounded-full shadow-xl flex items-center justify-center hover:scale-105 transition-transform z-50">
        <span class="material-symbols-outlined text-2xl">chat</span>
    </button>

    <div id="embed-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm">
        <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-md border border-slate-100">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold text-slate-800">Embed Code</h3>
                <button onclick="closeEmbedModal()" class="text-slate-400 hover:text-slate-600 text-xl font-bold transition-colors">✕</button>
            </div>
            <p class="text-sm text-slate-600 mb-2">Copy this script snippet to embed your bot widget window:</p>
            <div class="relative mb-4">
                <code id="embed-code-box" class="block bg-slate-900 text-indigo-300 p-4 rounded-lg text-xs overflow-x-auto border border-slate-800 font-mono whitespace-pre text-left shadow-inner select-all"></code>
            </div>
            <button id="copy-btn" onclick="copySnippet()" class="w-full py-2.5 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700 transition-colors shadow-sm">
                Copy Code
            </button>
        </div>
    </div>

    <script>
        /**
         * Dynamic Configuration Embed Script Generator
         */
        function openEmbedModal(botId) {
            const modal = document.getElementById('embed-modal');
            const codeBox = document.getElementById('embed-code-box');

            const sOpen = '<script>';
            const sClose = '</' + 'script>';

            const configurationSnippet =
`${sOpen}
  window.BotManagerConfig = {
    botId: "${botId}",
    apiUrl: "http://127.0.0.1:8001"
  };
${sClose}
${sOpen} src="http://127.0.0.1:8001/embed/widget.js" defer>${sClose}`;

            codeBox.innerText = configurationSnippet;
            modal.classList.remove('hidden');
        }

        function closeEmbedModal() {
            document.getElementById('embed-modal').classList.add('hidden');
        }

        function copySnippet() {
            const codeBox = document.getElementById('embed-code-box');
            const btn = document.getElementById('copy-btn');

            navigator.clipboard.writeText(codeBox.innerText).then(() => {
                const originalText = btn.innerText;
                btn.innerText = "Copied!";
                setTimeout(() => { btn.innerText = originalText; }, 2000);
            }).catch(err => {
                console.error("Failed copy fallback execution:", err);
            });
        }
    </script>
</body>
</html>
