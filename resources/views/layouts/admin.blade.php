<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin Dashboard &mdash; LSP Sanford</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-lsp-bg text-lsp-text font-body">

    <div class="flex min-h-screen" x-data="{ sidebarOpen: false }">
        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" 
               class="fixed inset-y-0 left-0 w-64 bg-white border-r border-slate-200/80 z-40 transform transition-transform duration-300 md:translate-x-0 md:static md:h-auto">
            <!-- Brand header -->
            <div class="h-20 flex items-center px-6 border-b border-slate-200/80 space-x-3">
                <div class="h-9 w-9 rounded-lg bg-gradient-to-br from-lsp-primary to-lsp-accent flex items-center justify-center text-white font-heading font-bold text-base">
                    L
                </div>
                <div>
                    <span class="font-heading font-bold text-sm tracking-tight text-lsp-text block">LSP Sanford</span>
                    <span class="text-[9px] uppercase tracking-wider text-lsp-accent font-semibold block">ADMIN PANEL</span>
                </div>
            </div>

            <!-- Links list -->
            <nav class="p-6 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-xs font-semibold tracking-wide transition-colors duration-300 {{ request()->routeIs('admin.dashboard') ? 'bg-lsp-primary text-white' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-3.75-2.25v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                    </svg>
                    <span>DASHBOARD</span>
                </a>
                <a href="{{ route('admin.berita.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-xs font-semibold tracking-wide transition-colors duration-300 {{ request()->routeIs('admin.berita.*') ? 'bg-lsp-primary text-white' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                    <span>BERITA ACARA</span>
                </a>
                <a href="{{ route('admin.profil.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-xs font-semibold tracking-wide transition-colors duration-300 {{ request()->routeIs('admin.profil.*') ? 'bg-lsp-primary text-white' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.053.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                    </svg>
                    <span>PROFIL & SKEMA</span>
                </a>
                <a href="{{ route('admin.galeri.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-xs font-semibold tracking-wide transition-colors duration-300 {{ request()->routeIs('admin.galeri.*') ? 'bg-lsp-primary text-white' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375 0 11-.75 0 .375 0 01.75 0z" />
                    </svg>
                    <span>ALBUM GALERI</span>
                </a>
                <a href="{{ route('admin.pengaturan.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-xs font-semibold tracking-wide transition-colors duration-300 {{ request()->routeIs('admin.pengaturan.*') ? 'bg-lsp-primary text-white' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                    <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.43l-1.003.828c-.293.241-.438.613-.43.992a7.723 7.723 0 010 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.43l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.992l-1.004-.827a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.645-.869l.214-1.28z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>PENGATURAN</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-grow flex flex-col min-w-0">
            <!-- Header bar -->
            <header class="h-20 bg-white/80 backdrop-blur border-b border-slate-200/80 px-6 flex items-center justify-between z-10 sticky top-0">
                <button @click="sidebarOpen = !sidebarOpen" class="md:hidden text-slate-500 hover:text-slate-800 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                
                <div class="ml-auto flex items-center space-x-4">
                    <a href="{{ route('admin.profile.settings') }}" class="text-xs font-semibold text-slate-600 hover:text-slate-900 transition-colors">
                        👋 {{ auth()->user()->name ?? 'Administrator' }}
                    </a>
                    
                    <span class="text-slate-300">|</span>

                    <!-- Logout Button -->
                    <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="px-4 py-2 rounded-xl bg-rose-50 border border-rose-200 text-rose-600 text-xs font-semibold hover:bg-rose-100/70 transition-all">
                            LOGOUT
                        </button>
                    </form>
                </div>
            </header>

            <!-- Page content -->
            <main class="flex-grow p-6 md:p-8 space-y-6 max-w-7xl w-full mx-auto">
                <!-- Alerts / Banners -->
                @if(session('success'))
                    <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs shadow-sm">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-700 text-xs shadow-sm">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('admin_content')
            </main>
        </div>
    </div>
</body>
</html>
