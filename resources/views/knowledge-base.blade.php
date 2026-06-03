<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Knowledge Base Management - BotManager AI</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
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
                        "h3": ["24px", {"lineHeight": "32px", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                        "body-sm": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                        "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                        "h1": ["36px", {"lineHeight": "44px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "h2": ["30px", {"lineHeight": "38px", "letterSpacing": "-0.02em", "fontWeight": "600"}],
                        "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                        "label-md": ["14px", {"lineHeight": "20px", "fontWeight": "500"}],
                        "label-sm": ["12px", {"lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600"}]
                    }
                },
            },
        }
    </script>
</head>
<body class="bg-background text-on-background min-h-screen flex">
<!-- Mobile Sidebar Backdrop -->
<div id="sidebar-backdrop" class="fixed inset-0 bg-slate-900/50 z-40 hidden lg:hidden transition-opacity"></div>
<!-- SideNavBar -->
<aside id="sidebar" class="fixed left-0 top-0 h-screen w-[280px] border-r border-slate-200 bg-slate-50 flex flex-col gap-1 p-4 h-full font-['Inter'] text-sm font-medium z-50 transition-transform duration-300 -translate-x-full lg:translate-x-0">
<div class="flex items-center gap-3 px-2 mb-8">
<div class="w-10 h-10 bg-primary flex items-center justify-center rounded-xl">
<span class="material-symbols-outlined text-white" data-icon="smart_toy">smart_toy</span>
</div>
<div>
<h1 class="text-xl font-black text-indigo-600">BotManager</h1>
<p class="text-xs text-slate-500 font-normal">v2.4.0</p>
</div>
</div>
<nav class="flex flex-col gap-1 flex-1">
    <a class="flex items-center gap-3 px-4 py-2 text-slate-600 hover:bg-slate-200/50 rounded-lg transition-all" href="{{ route('dashboard') }}">
        <span class="material-symbols-outlined">dashboard</span> Dashboard
    </a>
    
    <a class="flex items-center gap-3 px-4 py-2 text-slate-600 hover:bg-slate-200/50 rounded-lg transition-all" 
       href="{{ isset($bot) ? route('editBot', ['id' => $bot->id]) : '#' }}">
        <span class="material-symbols-outlined">settings</span> Configuration
    </a>
    
    <a class="flex items-center gap-3 px-4 py-2 text-indigo-600 bg-indigo-50 rounded-lg transition-all font-semibold" 
       href="{{ isset($bot) ? route('knowledgeBase', ['botId' => $bot->id]) : '#' }}">
        <span class="material-symbols-outlined">database</span> Knowledge Base
    </a>
    
    <a class="flex items-center gap-3 px-4 py-2 text-slate-600 hover:bg-slate-200/50 rounded-lg transition-all" 
       href="{{ isset($bot) ? route('test.preview', ['bot_id' => $bot->id]) : '#' }}">
        <span class="material-symbols-outlined">chat_bubble</span> Test Preview
    </a>

    <div class="mt-8 px-4">
        <button class="w-full h-10 bg-indigo-600 text-white font-medium rounded-lg flex items-center justify-center gap-2 hover:bg-indigo-700 transition-all">
            <span class="material-symbols-outlined text-[20px]">add</span> Create New Bot
        </button>
    </div>
</nav>

<div class="border-t border-slate-200 pt-4 flex flex-col gap-1">
 <a class="flex items-center gap-3 px-4 py-2 text-slate-600 hover:bg-slate-200/50 rounded-lg transition-all" 
   href="{{ route('documentation') }}">
    <span class="material-symbols-outlined">menu_book</span> Documentation
</a>
    <a class="flex items-center gap-3 px-4 py-2 text-slate-600 hover:bg-slate-200/50 rounded-lg transition-all" href="{{ route('account') }}">
        <span class="material-symbols-outlined">person</span> Account
    </a>
</div>
</div>
</aside>
<div class="flex-1 lg:ml-[280px] w-full transition-all duration-300">
<!-- TopNavBar -->
<header class="sticky top-0 z-30 w-full h-16 px-4 sm:px-6 bg-white border-b border-slate-200 flex justify-between items-center shadow-sm font-['Inter'] antialiased">
<div class="flex items-center gap-2 sm:gap-4">
<button id="mobile-menu-btn" class="p-2 -ml-2 mr-1 text-slate-500 hover:bg-slate-50 rounded-lg lg:hidden transition-colors">
<span class="material-symbols-outlined">menu</span>
</button>
<div class="relative w-full max-w-[130px] sm:max-w-xs">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[20px]" data-icon="search">search</span>
<input class="pl-10 pr-4 py-1.5 w-full bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary" placeholder="Search..." type="text"/>
</div>
</div>
<div class="flex items-center gap-4">
<button class="p-2 text-slate-500 hover:bg-slate-50 rounded-full transition-colors cursor-pointer" title="Notifications">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
</button>
<button class="p-2 text-slate-500 hover:bg-slate-50 rounded-full transition-colors cursor-pointer" title="Settings">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
</button>
<button class="p-2 text-slate-500 hover:bg-slate-50 rounded-full transition-colors cursor-pointer" title="Help">
<span class="material-symbols-outlined" data-icon="help">help</span>
</button>
<div class="h-8 w-px bg-slate-200 mx-2"></div>
<img alt="User profile avatar" class="w-8 h-8 rounded-full border border-slate-200" data-alt="professional male headshot with a friendly expression in a clean studio setting with neutral lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAagt61MURBXW2AaE2ObzkKIp4WaC8PbzV_RdYPVjjxY5Ya2mPVuEMfIh070AokY_I4IFgSUCojBHQyglfKKm4u_qlAm8B0lEYmxqIODEzxcC4HMEsAGNWvLhoWcN-ucFw-rvMExGSrlIy9od2LFzJ8RuEkhflpJtYuc5BpDHSufGsoJY-CnZYPV6ceajSdZLNCb1wSpYcHcVegN3oXzcBMdgx1BvgJwGtPj2giTJqOPFVAvsKs8E2ROH8CyXP0ercgQ039PjU1O-w"/>
</div>
</header>
<main class="p-4 md:p-[40px] max-w-7xl mx-auto w-full">
    <div class="mb-8">
        <div class="flex items-center gap-2 text-slate-500 mb-2">
            <a class="text-xs uppercase tracking-wider hover:text-indigo-600" href="#">Bots</a>
            <span class="material-symbols-outlined text-[16px]">chevron_right</span>
            <span class="text-xs uppercase tracking-wider">Nexus-7 Sales Agent</span>
        </div>
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Knowledge Base</h2>
                <p class="text-slate-500 mt-1">Manage the data sources that power your chatbot's intelligence.</p>
            </div>
            <button class="px-4 h-10 border border-slate-200 text-slate-600 rounded-lg flex items-center gap-2 hover:bg-slate-50 transition-colors">
                <span class="material-symbols-outlined text-[20px]">sync</span> Sync All
            </button>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mb-8">
        <div class="col-span-12 lg:col-span-7 space-y-6">
            <div class="bg-white border border-slate-200 rounded-xl p-6">
                <div class="flex items-center gap-2 mb-4">
                    <span class="material-symbols-outlined text-indigo-600">upload_file</span>
                    <h3 class="text-lg font-bold text-slate-800">Upload Files</h3>
                </div>
                <div class="border-2 border-dashed border-slate-200 rounded-xl py-10 text-center bg-slate-50 hover:bg-indigo-50/50 hover:border-indigo-300 transition-all cursor-pointer" onclick="document.getElementById('file-input').click()">
                    <span class="material-symbols-outlined text-4xl text-slate-300 mb-2">cloud_upload</span>
                    <p class="font-medium text-slate-600">Drag & drop files here</p>
                    <p class="text-sm text-slate-400 mt-1">Supported: PDF, DOCX, TXT</p>
                    <input type="file" id="file-input" class="hidden" onchange="handleFileUpload(event)">
                    <button type="button" class="mt-4 px-6 py-2 bg-white border border-slate-300 rounded-lg text-sm font-medium text-slate-700 hover:border-indigo-500 transition-colors">Browse Files</button>
                </div>
            </div>

            <div class="bg-white border border-slate-200 rounded-xl p-6">
                <div class="flex items-center gap-2 mb-4">
                    <span class="material-symbols-outlined text-indigo-600">link</span>
                    <h3 class="text-lg font-bold text-slate-800">Import URL</h3>
                </div>
                <div class="flex gap-2">
                    <input class="flex-1 px-4 h-11 border border-slate-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none" placeholder="https://example.com/docs" type="url"/>
                    <button class="px-6 h-11 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition-all">Add URL</button>
                </div>
            </div>
        </div>

        <div class="col-span-12 lg:col-span-5 space-y-6">
            <div class="bg-white border border-slate-200 rounded-xl p-6">
                <h3 class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-4">Storage Usage</h3>
                <div class="space-y-2">
                    <div class="flex justify-between items-end">
                        <span class="text-2xl font-bold">1.2 GB</span>
                        <span class="text-sm text-slate-500">of 5 GB limit</span>
                    </div>
                    <div class="h-2 bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full bg-indigo-600 w-[24%] rounded-full"></div>
                    </div>
                </div>
            </div>
            <div class="bg-indigo-600 rounded-xl p-6 text-white">
                <h3 class="font-bold mb-2">Optimization Tip</h3>
                <p class="text-sm opacity-90">Break down large PDF manuals into chapters for better retrieval accuracy.</p>
            </div>
        </div>
    </div>

    <div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-200 flex justify-between items-center">
            <h3 class="text-lg font-bold text-slate-900">Current Sources</h3>
            <span class="px-3 py-1 bg-slate-100 rounded-full text-xs text-slate-600">Total: 48 sources</span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <tbody id="sources-table-body" class="divide-y divide-slate-100">
    </tbody>
            </table>
        </div>
    </div>
</main>

<script>
    // Sidebar logic remains the same
    document.addEventListener('DOMContentLoaded', () => {
        const sidebar = document.getElementById('sidebar');
        const backdrop = document.getElementById('sidebar-backdrop');
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');

        function toggleSidebar() {
            if (sidebar && backdrop) {
                sidebar.classList.toggle('-translate-x-full');
                backdrop.classList.toggle('hidden');
            }
        }

        if (mobileMenuBtn && backdrop) {
            mobileMenuBtn.addEventListener('click', toggleSidebar);
            backdrop.addEventListener('click', toggleSidebar);
        }
    });

    // Unified handleFileUpload function
    async function handleFileUpload(event) {
        const file = event.target.files[0];
        if (!file) return;

        const botId = "{{ isset($bot) ? $bot->id : 'null' }}"; 
        if (botId === 'null' || botId === '') {
            alert("Error: Bot ID is missing. Cannot upload file.");
            return;
        }

        const formData = new FormData();
        formData.append('file', file);
        
        try {
            const response = await fetch(`http://127.0.0.1:8001/bots/${botId}/knowledge/upload`, {
                method: 'POST',
                body: formData,
            });

            const result = await response.json().catch(() => ({}));

            if (response.ok) {
                alert('File uploaded successfully!');
                
                // Update UI without reloading
                const tableBody = document.getElementById('sources-table-body');
                if (tableBody) {
                    const fileSize = (file.size / 1024 / 1024).toFixed(2) + ' MB';
                    const newRow = `
                    <tr class="hover:bg-slate-50 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-indigo-50 text-indigo-600 flex items-center justify-center rounded-lg">
                                    <span class="material-symbols-outlined">description</span>
                                </div>
                                <div>
                                    <p class="font-medium text-slate-900">${file.name}</p>
                                    <p class="text-xs text-slate-500">Just now</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4"><span class="px-2 py-1 bg-slate-100 rounded-full text-xs">FILE</span></td>
                        <td class="px-6 py-4 text-sm text-slate-600">${fileSize}</td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-2 py-1 bg-green-50 text-green-700 text-xs rounded-full">Ready</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-slate-400 hover:text-red-600"><span class="material-symbols-outlined">delete</span></button>
                        </td>
                    </tr>`;
                    
                    tableBody.insertAdjacentHTML('afterbegin', newRow);
                }
            } else {
                console.error("Server error:", result);
                alert('Upload failed: ' + (result.message || 'Check browser console.'));
            }
        } catch (error) {
            console.error('Fetch Error:', error);
            alert('Could not connect to the upload server.');
        }
    }
</script>     
</body></html>