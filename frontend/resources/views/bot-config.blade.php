@php
    // Ensure $bot always exists to prevent crashes
    if (!isset($bot)) {
        $bot = (object) [
            'id' => '0',
            'name' => '',
            'instructions' => '',
            'first_message' => '',
        ];
    }
@endphp
<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>BotManager AI - Edit Bot</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        }

        body {
            background-color: #F8FAFC;
        }
    </style>
</head>

<body class="font-body-md text-on-surface antialiased">
    <div id="sidebar-backdrop" class="fixed inset-0 bg-slate-900/50 z-40 hidden lg:hidden transition-opacity"></div>

    <aside id="sidebar"
        class="fixed left-0 top-0 h-screen w-[280px] border-r border-slate-200 bg-slate-50 flex flex-col p-4 gap-1 z-50 transition-transform duration-300 -translate-x-full lg:translate-x-0">
        <div class="flex items-center gap-3 px-2 mb-8">
            <div class="w-10 h-10 bg-primary-container rounded-lg flex items-center justify-center text-white">
                <span class="material-symbols-outlined" data-icon="smart_toy">smart_toy</span>
            </div>
            <div>
                <h1 class="text-xl font-black text-indigo-600">BotManager</h1>
                <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">v2.4.0</p>
            </div>
        </div>

        <nav class="flex-1 flex flex-col gap-1">
            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg transition-all
   {{ request()->routeIs('dashboard') ? 'text-indigo-600 bg-indigo-50 font-medium' : 'text-slate-600 hover:bg-slate-200/50' }}">
                <span class="material-symbols-outlined">dashboard</span> Dashboard
            </a>

            <a href="{{ route('bot-config', ['id' => $bot->id]) }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg transition-all
   {{ request()->routeIs('bot-config') ? 'text-indigo-600 bg-indigo-50 font-medium' : 'text-slate-600 hover:bg-slate-200/50' }}">
                <span class="material-symbols-outlined">settings</span> Configuration
            </a>

            <a href="{{ route('knowledge', ['id' => $bot->id]) }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg transition-all
   {{ request()->routeIs('knowledge') ? 'text-indigo-600 bg-indigo-50 font-medium' : 'text-slate-600 hover:bg-slate-200/50' }}">
                <span class="material-symbols-outlined">database</span> Knowledge Base
            </a>

            <a href="{{ route('preview', ['id' => $bot->id]) }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg transition-all
   {{ request()->routeIs('preview') ? 'text-indigo-600 bg-indigo-50 font-medium' : 'text-slate-600 hover:bg-slate-200/50' }}">
                <span class="material-symbols-outlined">chat_bubble</span> Test Preview
            </a>
        </nav>
    </aside>

    <header
        class="fixed top-0 left-0 right-0 h-16 bg-white border-b border-slate-200 flex justify-between items-center px-4 sm:px-6 z-30 lg:ml-[280px] transition-all duration-300">
        <div class="flex items-center gap-2 sm:gap-4 min-w-0">
            <button id="mobile-menu-btn"
                class="p-2 -ml-2 mr-1 text-slate-500 hover:bg-slate-50 rounded-lg lg:hidden transition-colors shrink-0">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <nav class="flex items-center text-label-sm text-slate-500 truncate">
                <span class="hover:text-primary cursor-pointer transition-colors hidden sm:inline">Dashboard</span>
                <span class="material-symbols-outlined text-[16px] mx-1 sm:mx-2 hidden sm:inline"
                    data-icon="chevron_right">chevron_right</span>
                <span class="text-slate-900 font-semibold truncate">Edit Bot</span>
            </nav>
        </div>
        <div class="flex items-center gap-2 sm:gap-4 shrink-0">
            <button
                class="material-symbols-outlined p-2 text-slate-500 hover:bg-slate-50 rounded-full transition-colors hidden sm:block"
                data-icon="notifications">notifications</button>
            <button
                class="material-symbols-outlined p-2 text-slate-500 hover:bg-slate-50 rounded-full transition-colors hidden sm:block"
                data-icon="help">help</button>
            <div class="h-8 w-[1px] bg-slate-200 mx-0 sm:mx-2 hidden sm:block"></div>

            <button type="submit" form="bot-settings-form" id="save-changes"
                class="px-4 py-2 sm:px-6 sm:py-2 text-sm sm:text-base bg-primary text-white font-label-md rounded-lg hover:shadow-lg hover:shadow-primary/20 active:opacity-90 transition-all whitespace-nowrap">
                <span class="sm:hidden">Save</span>
                <span class="hidden sm:inline">Save Changes</span>
            </button>
        </div>
    </header>

    <form id="bot-settings-form" action="{{ route('bots.update', $bot->id) }}" method="POST">
        @csrf
    </form>
    <main class="lg:ml-[280px] mt-16 p-4 md:p-[40px] transition-all duration-300">
        <div class="max-w-5xl mx-auto">
            <div class="mb-xl text-center sm:text-left">
                <h2 class="font-h2 text-h2 text-on-surface">Bot Configuration</h2>
                <p class="font-body-md text-on-surface-variant mt-xs">Fine-tune your assistant's identity,
                    behavior, and
                    personality.</p>


            </div>
            <div class="grid grid-cols-12 gap-lg">
                <div class="col-span-12 lg:col-span-8 space-y-lg">
                    <section class="bg-white p-lg border border-slate-200 rounded-xl shadow-sm">
                        <div class="flex items-center gap-3 mb-md">
                            <span class="material-symbols-outlined text-primary" data-icon="badge">badge</span>
                            <h3 class="font-h3 text-[18px]">Identity</h3>
                        </div>
                        <div class="flex flex-col md:flex-row gap-lg">
                            <div class="flex-1 space-y-md">
                                <div>
                                    <label class="block font-label-sm text-on-surface-variant uppercase mb-xs">Bot
                                        Name</label>
                                    <input id="bot-name" name="name"
                                        class="w-full px-4 py-base bg-white border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all font-body-md"
                                        placeholder="Enter bot name..." type="text"
                                        value="{{ $bot->name ?? '' }}" />
                                </div>
                                <div>
                                    <label class="block font-label-sm text-on-surface-variant uppercase mb-xs">Short
                                        Description</label>
                                    <input id="bot-description" name="description"
                                        class="w-full px-4 py-base bg-white border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all font-body-md"
                                        placeholder="What does this bot do?" type="text"
                                        value="{{ $bot->description ?? '' }}" />
                                </div>
                            </div>
                            <div class="w-full md:w-48">
                                <label
                                    class="block font-label-sm text-on-surface-variant uppercase mb-xs">Avatar</label>
                                <label for="bot-avatar-upload" class="relative group cursor-pointer block">
                                    <div
                                        class="aspect-square w-full rounded-xl bg-slate-50 border-2 border-dashed border-slate-200 flex flex-col items-center justify-center overflow-hidden">
                                        <img id="avatar-preview" class="w-full h-full object-cover"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuD2KNpRebqydCjRtuLv831xpr5-Hnj_eoZRakhO7-d3bHzIHsjHWyNqCi5uRw9NxGKkCEH8uE_yG1O9vQQzLrImz0fazDtVWUaXMhjGesCNVMumb5gdo9DzYK84Lz8S09HgruF7nH3o-1sL7aEr_8wSFsujkJYllWOpvxvEAXNamtp7RIoaqXnVT3QN2WSrd5bZe9u8eYaYX4S6YschPF5d1Nj6nB4qxQ5jJd2ipXBvqrNU07w2gxtnB1ZsV7xwO-EIiSvMPin2d9s" />
                                        <div
                                            class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
                                            <span class="material-symbols-outlined text-white">upload</span>
                                        </div>
                                    </div>
                                </label>
                                <input type="file" id="bot-avatar-upload" class="hidden" accept="image/*">
                                <p class="text-[11px] text-center mt-2 text-slate-500 font-medium">Click to
                                    replace</p>
                            </div>
                        </div>
                    </section>
                    <section class="bg-white p-lg border border-slate-200 rounded-xl shadow-sm">
                        <div class="flex items-center justify-between mb-md">
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-primary"
                                    data-icon="description">description</span>
                                <h3 class="font-h3 text-[18px]">System Instructions</h3>
                            </div>
                            <div class="flex items-center gap-2">
                                <span
                                    class="bg-secondary-container text-on-secondary-container px-2 py-1 rounded text-[10px] font-bold uppercase tracking-wider">GPT-4o</span>
                            </div>
                        </div>
                        <div class="relative">
                            <textarea id="bot-instructions" name="instructions"
                                class="w-full px-4 py-4 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all font-body-md leading-relaxed resize-none"
                                placeholder="You are a helpful assistant that..." rows="10">{{ $bot->instructions ?? '' }}</textarea>

                            <div class="absolute bottom-4 right-4 flex gap-2">
                                <button type="button"
                                    class="p-2 bg-white border border-slate-200 rounded-lg shadow-sm hover:bg-slate-50 transition-colors text-slate-600">
                                    <span class="material-symbols-outlined text-[20px]"
                                        data-icon="auto_fix">auto_fix</span>
                                </button>
                                <button type="button" id="expand-instructions"
                                    class="p-2 bg-white border border-slate-200 rounded-lg shadow-sm hover:bg-slate-50 transition-colors text-slate-600">
                                    <span class="material-symbols-outlined text-[20px]"
                                        data-icon="full_screen">fullscreen</span>
                                </button>
                            </div>
                        </div>
                        <div class="mt-sm flex justify-between">
                            <p class="text-[12px] text-on-surface-variant italic">Tip: Use variables like
                                @{{ user_name }} to personalize responses.</p>
                            <p class="text-[12px] text-on-surface-variant font-medium">842 / 4000 tokens</p>
                        </div>
                    </section>
                    <section class="bg-white p-lg border border-slate-200 rounded-xl shadow-sm">
                        <div class="flex items-center gap-3 mb-md">
                            <span class="material-symbols-outlined text-primary" data-icon="chat">chat</span>
                            <h3 class="font-h3 text-[18px]">Greetings</h3>
                        </div>
                        <div class="space-y-base">
                            <label class="block font-label-sm text-on-surface-variant uppercase">First
                                Message</label>
                            <input id="bot-greeting" name="first_message"
                                class="w-full px-4 py-base bg-white border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all font-body-md"
                                placeholder="Enter first message..." type="text"
                                value="{{ $bot->first_message ?? '' }}" />
                            <p class="text-[12px] text-on-surface-variant">This message is triggered
                                automatically when
                                a user opens the chat window.</p>
                        </div>
                    </section>
                </div>
                <div class="col-span-12 lg:col-span-4 space-y-lg">
                    <div class="bg-surface-container-low border border-slate-200 rounded-xl overflow-hidden shadow-sm">
                        <div class="p-md bg-white border-b border-slate-200 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                                <span class="font-label-md">Live Preview</span>
                            </div>
                            <span class="material-symbols-outlined text-slate-400"
                                data-icon="open_in_new">open_in_new</span>
                        </div>
                        <div class="p-lg space-y-md">
                            <div class="flex gap-2">
                                <div
                                    class="w-8 h-8 rounded-full bg-slate-200 shrink-0 overflow-hidden border border-slate-300">
                                    <img class="w-full h-full object-cover"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAP55amJCDNnEczqYEp56Hvil0nbTMMI_uTZohyY9Du9-Pl1CEBluOD_Jy7X5mzOj_ik8OL_Lv-VqjV_xEORpaBkQPeHNdD_qHgJJEiXUxf7gz6gyyW52TgMqSmdnjnEnEiTrOpD7mkYcvfxLSKZtFqdct3UuWspVOba81cghZ2V0bN_iFObg34kn2x0kupj8QbhTTQtyFFtnsRNHFNmd-tyucgeA3k9zC77kZuJVxg2ix-UPFAdeuVF1O8GFizriZf-VzTw0Pa954" />
                                </div>
                                <div
                                    class="bg-white border border-slate-200 p-3 rounded-lg rounded-tl-none text-[13px] shadow-sm max-w-[85%]">
                                </div>
                            </div>
                            <div class="flex gap-2 justify-end">
                                <div
                                    class="bg-primary text-white p-3 rounded-lg rounded-tr-none text-[13px] shadow-sm max-w-[85%]">
                                    Can you help me export my bot's conversation history?
                                </div>
                                <div
                                    class="w-8 h-8 rounded-full bg-indigo-100 shrink-0 flex items-center justify-center border border-indigo-200">
                                    <span class="material-symbols-outlined text-[16px] text-primary"
                                        data-icon="person">person</span>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <div
                                    class="w-8 h-8 rounded-full bg-slate-200 shrink-0 flex items-center justify-center border border-slate-300">
                                    <span class="material-symbols-outlined text-[16px] text-slate-500"
                                        data-icon="smart_toy">smart_toy</span>
                                </div>
                                <div
                                    class="bg-white border border-slate-200 p-3 rounded-lg rounded-tl-none flex gap-1 items-center">
                                    <div class="w-1 h-1 bg-slate-400 rounded-full animate-bounce"></div>
                                    <div class="w-1 h-1 bg-slate-400 rounded-full animate-bounce"
                                        style="animation-delay: 0.2s"></div>
                                    <div class="w-1 h-1 bg-slate-400 rounded-full animate-bounce"
                                        style="animation-delay: 0.4s"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-lg border border-slate-200 rounded-xl shadow-sm">
                        <h4 class="font-label-sm text-on-surface-variant uppercase mb-md">Bot Statistics</h4>
                        <div class="space-y-md">
                            <div class="flex justify-between items-center">
                                <span class="text-slate-500 text-body-sm">Status</span>
                                <span
                                    class="px-2 py-0.5 bg-emerald-100 text-emerald-700 rounded text-[11px] font-bold">ACTIVE</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-slate-500 text-body-sm">Last Trained</span>
                                <span class="text-slate-900 font-medium text-body-sm">2 hours ago</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-slate-500 text-body-sm">Conversations</span>
                                <span class="text-slate-900 font-medium text-body-sm">1,284</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-slate-500 text-body-sm">Knowledge Source</span>
                                <span class="text-slate-900 font-medium text-body-sm">PDF (4), URL (12)</span>
                            </div>
                        </div>
                        <button type="button"
                            class="w-full mt-lg py-2 border border-slate-200 text-slate-600 rounded-lg font-label-md hover:bg-slate-50 transition-colors flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-[20px]" data-icon="history">history</span>
                            View Edit Logs
                        </button>
                    </div>
                    </form>
                    <div class="bg-red-50 p-lg border border-red-100 rounded-xl shadow-sm">
                        <h4 class="font-label-sm text-red-700 uppercase mb-xs">Danger Zone</h4>
                        <p class="text-[12px] text-red-600 mb-md leading-tight">Permanently delete this bot and
                            all its
                            configuration data. This action cannot be undone.</p>

                        <form action="{{ route('bots.destroy', $bot->id) }}" method="POST"
                            onsubmit="return confirm('Are you absolutely sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full py-3 bg-white border border-red-300 text-red-600 rounded-lg font-semibold hover:bg-red-50 transition">
                                Delete Assistant
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const configForm = document.getElementById('bot-settings-form');
            // Ensure botId is captured from the Blade template safely
            const botId = "{{ $bot->id ?? 'new' }}";

            if (configForm) {
                configForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const submitBtn = document.getElementById('save-changes');
                    if (submitBtn) {
                        submitBtn.disabled = true;
                        submitBtn.innerHTML = 'Saving...';
                    }

                    // Safely get values, providing empty strings if elements are missing
                    const jsonObject = {
                        "name": document.querySelector('input[name="name"]')?.value || "Unnamed Bot",
                        "description": document.querySelector('input[name="short_description"]')
                            ?.value || "",
                        "instructions": document.querySelector('textarea[name="instructions"]')
                            ?.value || "",
                        "first_message": document.querySelector('input[name="first_message"]')?.value ||
                            "Hello!"
                    };

                    fetch("/bots/update/" + botId, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    ?.content // Good practice for Laravel
                            },
                            body: JSON.stringify(jsonObject)
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                alert('Success: ' + data.message);
                                window.location.href = '/'; // Redirect to dashboard
                            } else {
                                alert('Backend Error: ' + JSON.stringify(data));
                            }
                        })
                        .catch(error => {
                            console.error('Submission Error:', error);
                            alert('Connection error. Check console.');
                        })
                        .finally(() => {
                            if (submitBtn) {
                                submitBtn.disabled = false;
                                submitBtn.innerHTML = 'Save Changes';
                            }
                        });
                });
            }
        });
    </script>
</body>

</html>
