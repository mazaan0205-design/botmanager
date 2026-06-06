<!DOCTYPE html <html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
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
                },
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
    <!-- Mobile Sidebar Backdrop -->
    <div id="sidebar-backdrop" class="fixed inset-0 bg-slate-900/50 z-40 hidden lg:hidden transition-opacity"></div>
    <!-- SideNavBar Anchor -->
    <aside id="sidebar"
        class="fixed left-0 top-0 h-screen w-[280px] border-r border-slate-200 bg-slate-50 flex flex-col p-4 z-50 transition-transform duration-300 -translate-x-full lg:translate-x-0">
        <div class="flex items-center gap-3 px-4 py-6 mb-4">
            <div class="w-10 h-10 rounded-lg bg-primary-container flex items-center justify-center">
                <span class="material-symbols-outlined text-on-primary-container"
                    style="font-variation-settings: 'FILL' 1;">smart_toy</span>
            </div>
            <div>
                <h2 class="text-xl font-black text-indigo-600">BotManager</h2>
                <p class="text-[10px] font-bold text-slate-400 tracking-widest uppercase">v2.4.0</p>
            </div>
            <a href="/bots/dashboard/{{ isset($bot) ? $bot->id : 'new' }}"
                class="flex items-center gap-3 px-4 py-2 text-slate-600 hover:bg-slate-200/50 rounded-lg transition-all font-medium">
                <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                Dashboard
            </a>

            <a href="{{ isset($bot) && $bot->id !== 'new' ? '/bots/edit/' . $bot->id : '#' }}"
                class="flex items-center gap-3 px-4 py-2 text-slate-600 hover:bg-slate-200/50 rounded-lg transition-all font-medium">
                <span class="material-symbols-outlined" data-icon="settings">settings</span>
                Configuration
            </a>

            <a href="{{ isset($bot) && $bot->id !== 'new' ? '/bots/knowledge/' . $bot->id : '#' }}"
                class="flex items-center gap-3 px-4 py-2 text-slate-600 hover:bg-slate-200/50 rounded-lg transition-all font-medium">
                <span class="material-symbols-outlined" data-icon="database">database</span>
                Knowledge Base
            </a>

            <a href="{{ isset($bot) && $bot->id !== 'new' ? '/bots/preview/' . $bot->id : '#' }}"
                class="flex items-center gap-3 px-4 py-2 text-slate-600 hover:bg-slate-200/50 rounded-lg transition-all font-medium">
                <span class="material-symbols-outlined">chat_bubble</span>
                Test Preview
            </a>
            <button
                class="w-full h-10 bg-primary text-white font-label-md rounded-lg flex items-center justify-center gap-2 hover:opacity-90 active:opacity-80 transition-opacity">
                <span class="material-symbols-outlined">add</span> Create New Bot
            </button>
            <!-- Footer Section of Sidebar -->
            <div class="mt-auto pt-4 border-t border-slate-200 flex flex-col gap-1">


                <!-- Documentation Link -->
                <a href="{{ route('documentation') }}"
                    class="flex items-center gap-3 px-4 py-2 {{ request()->routeIs('documentation') ? 'text-indigo-600 bg-indigo-50' : 'text-slate-600 hover:bg-slate-200/50' }} rounded-lg transition-all font-['Inter'] text-sm font-medium">
                    <span class="material-symbols-outlined" data-icon="menu_book">menu_book</span>
                    Documentation
                </a>

                <!-- Account Link -->
                <a href="{{ route('account') }}"
                    class="flex items-center gap-3 px-4 py-2 {{ request()->routeIs('account') ? 'text-indigo-600 bg-indigo-50' : 'text-slate-600 hover:bg-slate-200/50' }} rounded-lg transition-all font-['Inter'] text-sm font-medium">
                    <span class="material-symbols-outlined" data-icon="person">person</span>
                    Account
                </a>
            </div>
    </aside>
    <header
        class="fixed top-0 right-0 left-0 lg:ml-[280px] h-16 bg-white border-b border-slate-200 flex justify-between items-center px-4 sm:px-6 z-30 shadow-sm transition-all duration-300">

        <div class="flex items-center flex-1">
            <button id="mobile-menu-btn"
                class="p-2 mr-2 -ml-2 text-slate-500 hover:bg-slate-50 rounded-lg lg:hidden transition-colors">
                <span class="material-symbols-outlined">menu</span>
            </button>

            <form action="{{ route('dashboard') }}" method="GET" class="w-full max-w-[130px] sm:max-w-md">
                <div class="relative w-full">
                    <span
                        class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">search</span>
                    <input
                        class="w-full pl-10 pr-12 py-2 bg-slate-50 border-none rounded-lg focus:ring-2 focus:ring-indigo-500 text-sm"
                        placeholder="Search chatbots..." type="text" name="search"
                        value="{{ request('search') }}" />

                    @if (request('search'))
                        <a href="{{ route('dashboard') }}"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-[11px] text-slate-400 hover:text-slate-600 underline decoration-dotted">
                            Clear
                        </a>
                    @endif
                </div>
            </form>
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
            <img alt="User profile avatar" class="w-8 h-8 rounded-full border border-slate-200"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBnU_jKs9zLGqPyg_PZFk17MZwvSmn8fVsLhp_jXO6xqix6xuzhtDdcEsAR35dmrfeyJXu-xZ5LaoAq9AWYTKIm-wy5Xgsd_GLSQqh0e3Zw9UNk2X0UXXBIiUgp0UvlyUzQXH_Gf6Sedp5EPG0OMYav96PUyzjHstBuKlZShdLKBk2tpLmWS_tglX9nyx2LnjAm_AodgIrxQKJYEww7j8NdIgcbQRRB1PCX1WppqeJbw_8lI-FTuYomOQoo6NbYgUAyEijyu6y1bN8" />
        </div>
    </header>



    <!-- Update your main tag to include these classes -->
    <main class="lg:ml-[280px] pt-16 min-h-screen transition-all duration-300 border border-3 border-[red]">
        <div class="p-4 md:p-[40px]">
        </div>
    </main>
    </div>
    </div>
    <!-- Bento Grid Stats Section -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter mb-xl">
        <div class="bg-white p-lg rounded-xl border border-slate-200 flex flex-col gap-2 shadow-sm">
            <span class="text-slate-500 font-label-sm uppercase tracking-wider">Total Active
                Bots</span>
            <div class="flex items-center justify-between">
                <span class="text-h2 font-h2 text-slate-900">12</span>
                <span class="px-2 py-1 bg-green-50 text-green-700 text-xs font-bold rounded">+2
                    this month</span>
            </div>
        </div>
        <div class="bg-white p-lg rounded-xl border border-slate-200 flex flex-col gap-2 shadow-sm">
            <span class="text-slate-500 font-label-sm uppercase tracking-wider">Total
                Interactions</span>
            <div class="flex items-center justify-between">
                <span class="text-h2 font-h2 text-slate-900">48.2k</span>
                <span class="px-2 py-1 bg-indigo-50 text-indigo-700 text-xs font-bold rounded">Top
                    5%</span>
            </div>
        </div>
        <div class="bg-white p-lg rounded-xl border border-slate-200 flex flex-col gap-2 shadow-sm">
            <span class="text-slate-500 font-label-sm uppercase tracking-wider">Avg.
                Response Time</span>
            <div class="flex items-center justify-between">
                <span class="text-h2 font-h2 text-slate-900">1.2s</span>
                <span class="px-2 py-1 bg-indigo-50 text-indigo-700 text-xs font-bold rounded">-0.4s</span>
            </div>
        </div>
        <div class="bg-white p-lg rounded-xl border border-slate-200 flex flex-col gap-2 shadow-sm">
            <span class="text-slate-500 font-label-sm uppercase tracking-wider">Success
                Rate</span>
            <div class="flex items-center justify-between">
                <span class="text-h2 font-h2 text-slate-900">94.8%</span>
                <div class="w-16 bg-slate-100 h-1.5 rounded-full overflow-hidden">
                    <div class="bg-indigo-600 h-full w-[94.8%]"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-gutter">
        @forelse($bots as $bot)
            <div
                class="bg-white border border-slate-200 rounded-xl overflow-hidden hover:shadow-md transition-shadow group {{ ($bot->statistics->status ?? 'Online') !== 'Online' ? 'opacity-75' : '' }}">
                <div class="p-lg">
                    <div class="flex justify-between items-start mb-md">
                        <div class="flex items-center gap-3">
                            <div class="relative">
                                <div
                                    class="w-12 h-12 rounded-lg bg-indigo-50 flex items-center justify-center text-indigo-600">
                                    <span class="material-symbols-outlined text-2xl"
                                        style="font-variation-settings: 'FILL' 1;">
                                        {{ $bot->icon ?? 'support_agent' }}
                                    </span>
                                </div>
                                <span
                                    class="absolute -bottom-1 -right-1 w-4 h-4 {{ ($bot->statistics->status ?? 'Online') == 'Online' ? 'bg-green-500' : 'bg-slate-400' }} border-2 border-white rounded-full"></span>
                            </div>
                            <div>
                                <h3 class="font-h3 text-[18px] text-slate-900">{{ $bot->name }}</h3>
                                <span
                                    class="{{ ($bot->statistics->status ?? 'Online') == 'Online' ? 'text-green-600' : 'text-slate-500' }} font-label-sm flex items-center gap-1">
                                    <span
                                        class="w-1.5 h-1.5 {{ ($bot->statistics->status ?? 'Online') == 'Online' ? 'bg-green-500' : 'bg-slate-400' }} rounded-full"></span>
                                    {{ $bot->statistics->status ?? 'Online' }}
                                </span>
                            </div>
                        </div>

                        <button onclick="openEmbedModal('{{ $bot->id }}')"
                            class="p-2 text-slate-400 hover:text-slate-600 rounded-full hover:bg-slate-100 transition-all">
                            <span class="material-symbols-outlined">more_vert</span>
                        </button>
                    </div>

                    <p class="text-slate-600 font-body-sm line-clamp-2 mb-lg">{{ $bot->description }}</p>

                    <div class="flex items-center justify-between pt-md border-t border-slate-50">
                        <div class="flex flex-col">
                            <span class="text-slate-400 font-label-sm">Conversations</span>
                            <span
                                class="text-slate-700 font-label-md">{{ $bot->statistics->conversations ?? 0 }}</span>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ url('/test-preview/' . ($bot->id ?? '')) }}"
                                class="px-3 py-1.5 bg-slate-100 text-slate-700 rounded-lg font-label-sm hover:bg-slate-200 transition-colors flex items-center gap-1 no-underline">
                                <span class="material-symbols-outlined text-base">play_arrow</span> Test
                            </a>
                            <a href="{{ url('/bot-config/' . ($bot->id ?? '')) }}"
                                class="px-3 py-1.5 border border-slate-200 text-slate-700 rounded-lg font-label-sm hover:bg-slate-50 transition-colors flex items-center gap-1 no-underline">
                                <span class="material-symbols-outlined text-base">edit</span> Edit
                            </a>
                            <div class="flex gap-2">
                                <a href="/bots/preview/{{ $bot->id ?? 'new' }}"
                                    class="px-4 py-2 bg-slate-100 rounded-lg text-sm font-medium">Test</a>
                                <a href="/bots/edit/{{ $bot->id ?? 'new' }}"
                                    class="px-4 py-2 bg-slate-100 rounded-lg text-sm font-medium">Edit</a>
                                <a href="/bots/knowledge/{{ $bot->id ?? 'new' }}"
                                    class="px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700">Knowledge
                                    Base</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full border-2 border-dashed border-slate-200 rounded-xl p-12 text-center my-4">
                <span class="material-symbols-outlined text-4xl text-slate-300 mb-2">smart_toy</span>
                <h4 class="text-base font-semibold text-slate-800">No Custom Assistants Found</h4>
                <p class="text-slate-500 text-xs max-w-xs mx-auto mt-1">Your backend agent array returned empty setup
                    fields.</p>
            </div>
        @endforelse
        <div id="embed-modal"
            class="hidden fixed inset-0 z-[9999] flex items-center justify-center p-4 bg-slate-900/40 backdrop-blur-sm">
            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg p-6 animate-in fade-in zoom-in duration-200">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-slate-800">Embed Your Assistant</h3>
                    <button onclick="closeEmbedModal()" class="text-slate-400 hover:text-slate-600">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>

                <p class="text-sm text-slate-500 mb-4">Copy this snippet and paste it into your website's &lt;body&gt;
                    tag.</p>

                <textarea id="modal-snippet"
                    class="w-full h-32 text-xs p-4 bg-slate-900 text-indigo-300 rounded-xl mb-4 font-mono shadow-inner" readonly></textarea>

                <button onclick="copyModalSnippet()"
                    class="w-full py-2.5 bg-indigo-600 text-white rounded-xl font-medium hover:bg-indigo-700 transition-colors flex items-center justify-center gap-2 shadow-lg">
                    <span class="material-symbols-outlined text-sm">content_copy</span> Copy Code
                </button>
            </div>
        </div>

        <a href="/bot-config"
            class="border-2 border-dashed border-slate-200 rounded-xl flex flex-col items-center justify-center p-lg min-h-[220px] hover:bg-slate-50 transition-colors">
            <div class="w-12 h-12 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 mb-3">
                <span class="material-symbols-outlined text-2xl">add</span>
            </div>
            <span class="text-slate-400 font-body-sm block mt-1">Deploy a brand new instance</span>
        </a>
    </div>
    <span class="material-symbols-outlined text-2xl">add</span>
    </div>
    <span class="mt-4 font-label-md text-slate-600 block">Create New Bot</span>
    </a>
    </div>
    <!-- Recent Activity Table -->
    <div class="mt-xl bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">
        <div class="px-lg py-md border-b border-slate-100 flex justify-between items-center">
            <h3 class="font-h3 text-[18px] text-slate-900">Global Activity Log</h3>
            <button class="text-indigo-600 font-label-sm hover:underline">View All</button>
        </div>
        <div class="overflow-x-auto w-full">
            <table class="w-full text-left min-w-[600px]">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-lg py-3 text-[12px] font-bold text-slate-500 uppercase tracking-wider">
                            Event</th>
                        <th class="px-lg py-3 text-[12px] font-bold text-slate-500 uppercase tracking-wider">
                            Bot Source</th>
                        <th class="px-lg py-3 text-[12px] font-bold text-slate-500 uppercase tracking-wider">
                            User ID</th>
                        <th class="px-lg py-3 text-[12px] font-bold text-slate-500 uppercase tracking-wider">
                            Status</th>
                        <th
                            class="px-lg py-3 text-[12px] font-bold text-slate-500 uppercase tracking-wider text-right">
                            Timestamp</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-lg py-4 font-body-sm text-slate-900">New lead
                            captured</td>
                        <td class="px-lg py-4 font-body-sm text-slate-600">Sales
                            Assistant</td>
                        <td class="px-lg py-4 font-body-sm text-slate-600">#US-9281</td>
                        <td class="px-lg py-4">
                            <span
                                class="px-2 py-0.5 bg-green-50 text-green-700 text-xs font-medium rounded">Success</span>
                        </td>
                        <td class="px-lg py-4 font-body-sm text-slate-400 text-right">2m
                            ago</td>
                    </tr>
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-lg py-4 font-body-sm text-slate-900">Documentation
                            query</td>
                        <td class="px-lg py-4 font-body-sm text-slate-600">Customer
                            Support</td>
                        <td class="px-lg py-4 font-body-sm text-slate-600">#ANON-04</td>
                        <td class="px-lg py-4">
                            <span
                                class="px-2 py-0.5 bg-indigo-50 text-indigo-700 text-xs font-medium rounded">Handled</span>
                        </td>
                        <td class="px-lg py-4 font-body-sm text-slate-400 text-right">
                            14m ago</td>
                    </tr>
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-lg py-4 font-body-sm text-slate-900">Critical
                            Error: API Timeout</td>
                        <td class="px-lg py-4 font-body-sm text-slate-600">IT Helpdesk
                        </td>
                        <td class="px-lg py-4 font-body-sm text-slate-600">#ADMIN-01
                        </td>
                        <td class="px-lg py-4">
                            <span
                                class="px-2 py-0.5 bg-error-container text-error text-xs font-medium rounded">Failed</span>
                        </td>
                        <td class="px-lg py-4 font-body-sm text-slate-400 text-right">1h
                            ago</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </main>
    <!-- Contextual FAB (Only for main landing/dashboards) -->
    <button
        class="fixed bottom-base right-base w-14 h-14 bg-primary text-on-primary rounded-full shadow-xl flex items-center justify-center hover:scale-105 transition-transform z-50">
        <span class="material-symbols-outlined text-2xl">chat</span>
    </button>

    <script>
        function openEmbedModal(botId) {
            const modal = document.getElementById('embed-modal');
            const textarea = document.getElementById('modal-snippet');

            // This injects your exact requested structure with the dynamic botId
            textarea.value = `<script>
  window.BotManagerConfig = {
    botId: "${botId}",
    backendUrl: "http://127.0.0.1:8001"
  };
<script src="http://127.0.0.1:8001/static/widget.js" async><\/script>`;

            modal.classList.remove('hidden');
        }

        function closeEmbedModal() {
            document.getElementById('embed-modal').classList.add('hidden');
        }

        function copySnippet() {
            const area = document.getElementById("modal-snippet");
            // Ensure the textarea is visible/focused before selecting
            area.select();
            document.execCommand("copy");

            // Visual feedback
            const btn = document.querySelector('button[onclick="copySnippet()"]');
            const originalText = btn.innerText;
            btn.innerText = "Copied!";
            setTimeout(() => btn.innerText = originalText, 2000);
        }
    </script>
</body>

</html>
