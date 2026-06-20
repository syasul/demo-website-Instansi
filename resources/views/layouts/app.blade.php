<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags -->
    <title>{{ $meta['title'] ?? config('app.name') }}</title>
    <meta name="description" content="{{ $meta['description'] ?? 'Portal Resmi ' . config('app.name') . '. Layanan sertifikasi profesi berkualitas dan akuntabel.' }}">
    <meta name="keywords" content="{{ $meta['keywords'] ?? 'website instansi, sertifikasi profesi, bnsp' }}">
    <meta name="author" content="inxdvi">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $meta['title'] ?? config('app.name') }}">
    <meta property="og:description" content="{{ $meta['description'] ?? 'Portal Resmi ' . config('app.name') . '.' }}">
    <meta property="og:image" content="{{ asset('images/og-image.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $meta['title'] ?? config('app.name') }}">
    <meta property="twitter:description" content="{{ $meta['description'] ?? 'Portal Resmi ' . config('app.name') . '.' }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Custom page transition styles */
        #page-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(to right, var(--color-lsp-primary), var(--color-lsp-accent));
            z-index: 9999;
            transform: translateX(-100%);
            transition: transform 0.4s ease;
        }
    </style>
</head>
<body class="bg-lsp-bg text-lsp-text font-body selection:bg-lsp-primary/30 selection:text-white antialiased overflow-x-hidden">
    <!-- Subtle Grain Overlay for 'Non-AI' Texture -->
    <div class="fixed inset-0 pointer-events-none z-[1000] opacity-[0.04] mix-blend-overlay bg-[url('https://res.cloudinary.com/dydlv7s4w/image/upload/v1661858593/texture_grain_k2e9w8.png')]"></div>

    <!-- Enhanced Page Loader -->
    <div id="premium-loader" class="fixed inset-0 z-[2000] bg-white flex flex-col items-center justify-center transition-opacity duration-700">
        <div class="relative">
            <div class="h-20 w-20 rounded-3xl bg-gradient-to-br from-lsp-primary to-lsp-accent flex items-center justify-center text-white font-heading font-black text-3xl shadow-2xl animate-pulse">
                W
            </div>
            <div class="absolute -inset-4 rounded-[2rem] border-2 border-lsp-primary/20 animate-[spin_4s_linear_infinite]"></div>
        </div>
        <div class="mt-8 overflow-hidden w-48 h-1 bg-slate-100 rounded-full relative">
            <div id="loader-progress" class="absolute top-0 left-0 h-full bg-lsp-primary w-0 transition-all duration-500 ease-out"></div>
        </div>
        <span class="mt-4 text-[10px] font-black tracking-[0.3em] text-lsp-muted uppercase animate-pulse">Initializing Excellence</span>
    </div>

    <!-- Header Navigation -->
    <header x-data="{ mobileMenuOpen: false, scrolled: false }" 
            x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
            :class="scrolled ? 'glass-effect shadow-2xl py-3 border-b border-white/20' : 'bg-transparent py-6'"
            class="fixed top-0 left-0 w-full z-[100] transition-all duration-700 ease-in-out">
        <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
            <!-- Logo / Brand -->
            <a href="{{ route('home') }}" class="flex items-center space-x-4 group text-decoration-none">
                <div class="h-12 w-12 rounded-2xl bg-gradient-to-br from-lsp-primary to-lsp-accent flex items-center justify-center text-white font-heading font-black text-2xl shadow-xl shadow-lsp-primary/20 group-hover:rotate-12 transition-all duration-500 will-change-transform">
                    W
                </div>
                <div class="hidden sm:block">
                    <div class="flex items-center space-x-3">
                        <span class="font-heading font-black text-2xl tracking-tighter text-lsp-text block group-hover:text-lsp-primary transition-colors duration-300">{{ config('app.name') }}</span>
                        <span class="font-technical text-[7px] text-black/20 tracking-[0.3em] pt-1">BY INXDVI</span>
                    </div>
                    <span class="text-[9px] uppercase tracking-[0.3em] text-lsp-muted block -mt-1 font-black opacity-70">PROFESSIONAL CERTIFICATION</span>
                </div>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center bg-white/40 backdrop-blur-md rounded-2xl border border-white/50 p-1.5 shadow-sm">
                @php
                    $navItems = [
                        ['name' => 'HOME', 'route' => 'home'],
                        ['name' => 'PROFIL', 'route' => 'profil'],
                        ['name' => 'SERTIFIKASI', 'route' => 'sertifikasi'],
                        ['name' => 'BERITA', 'route' => 'berita.*'],
                        ['name' => 'KONTAK', 'route' => 'kontak.*'],
                    ];
                @endphp
                @foreach($navItems as $item)
                    <a href="{{ route(explode('.', $item['route'])[0] == $item['route'] ? $item['route'] : str_replace('.*', '.index', $item['route'])) }}" 
                       class="px-5 py-2.5 rounded-xl text-[10px] font-black tracking-widest transition-all duration-500 {{ request()->routeIs($item['route']) ? 'text-white bg-lsp-primary shadow-lg shadow-lsp-primary/30' : 'text-slate-600 hover:text-lsp-primary hover:bg-white/50' }}">
                        {{ $item['name'] }}
                    </a>
                @endforeach
            </nav>

            <!-- CTA Button -->
            <div class="hidden md:flex items-center">
                <a href="{{ route('kontak.index') }}" class="premium-btn px-7 py-3 rounded-2xl bg-slate-900 text-white text-[10px] font-black tracking-widest hover:bg-lsp-primary shadow-2xl shadow-slate-900/10 hover:shadow-lsp-primary/40 transition-all duration-700 group">
                    GET CERTIFIED
                    <span class="inline-block ml-2 group-hover:translate-x-1 transition-transform">→</span>
                </a>
            </div>

            <!-- Hamburger -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden h-12 w-12 flex items-center justify-center rounded-2xl bg-white border border-slate-100 shadow-sm hover:shadow-md transition-all">
                <div class="space-y-1.5">
                    <span :class="mobileMenuOpen ? 'rotate-45 translate-y-2' : ''" class="block w-6 h-0.5 bg-lsp-text transition-all duration-300"></span>
                    <span :class="mobileMenuOpen ? 'opacity-0' : ''" class="block w-4 h-0.5 bg-lsp-text transition-all duration-300"></span>
                    <span :class="mobileMenuOpen ? '-rotate-45 -translate-y-2' : ''" class="block w-6 h-0.5 bg-lsp-text transition-all duration-300"></span>
                </div>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-500"
             x-transition:enter-start="opacity-0 -translate-y-10"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-400"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-10"
             class="absolute top-full left-6 right-6 glass-effect shadow-[0_40px_80px_-20px_rgba(0,0,0,0.2)] py-10 px-8 rounded-[2.5rem] mt-4 border border-white/40 lg:hidden">
            <nav class="flex flex-col space-y-3">
                @foreach($navItems as $item)
                    <a href="{{ route(explode('.', $item['route'])[0] == $item['route'] ? $item['route'] : str_replace('.*', '.index', $item['route'])) }}" 
                       @click="mobileMenuOpen = false" 
                       class="px-6 py-4 rounded-2xl font-black tracking-[0.2em] text-[10px] transition-all duration-500 {{ request()->routeIs($item['route']) ? 'text-white bg-lsp-primary shadow-lg shadow-lsp-primary/20' : 'text-slate-600 hover:text-lsp-primary hover:bg-lsp-primary/5' }}">
                        {{ $item['name'] }}
                    </a>
                @endforeach
                <a href="{{ route('kontak.index') }}" @click="mobileMenuOpen = false" class="mt-8 w-full py-5 rounded-2xl bg-slate-900 text-white text-center text-[10px] font-black tracking-widest shadow-2xl">
                    CONSULT NOW
                </a>
            </nav>
        </div>
    </header>

    <!-- Content -->
    <main class="min-h-screen pt-24">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#0f172a] pt-32 pb-16 text-slate-500 overflow-hidden relative">
        <div class="absolute -top-32 -left-32 h-[500px] w-[500px] bg-lsp-primary/10 rounded-full blur-[120px]"></div>
        <div class="absolute top-0 right-0 w-full h-full bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-[0.02]"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-20">
                <div class="lg:col-span-5 space-y-10">
                    <a href="{{ route('home') }}" class="flex items-center space-x-4">
                        <div class="h-14 w-14 rounded-2xl bg-gradient-to-br from-lsp-primary to-lsp-accent flex items-center justify-center text-white font-heading font-black text-3xl shadow-2xl shadow-lsp-primary/20">W</div>
                        <span class="font-heading font-black text-3xl tracking-tighter text-white">{{ config('app.name') }}</span>
                    </a>
                    <p class="text-sm leading-relaxed max-w-md font-medium">
                        Mentransformasi masa depan profesional Indonesia melalui sistem sertifikasi yang futuristik, kredibel, dan berstandar internasional.
                    </p>
                    <div class="flex space-x-6">
                        @foreach(['𝕏', 'f', 'in', 'ig'] as $social)
                            <a href="#" class="h-12 w-12 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center transition-all duration-500 hover:bg-lsp-primary hover:text-white hover:-translate-y-2 group">
                                <span class="text-lg font-bold">{{ $social }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-3 gap-12">
                    <div class="space-y-8">
                        <h4 class="text-[10px] font-black tracking-[0.3em] text-white uppercase border-b border-white/10 pb-4">PLATFORM</h4>
                        <ul class="space-y-4 text-[13px] font-bold">
                            <li><a href="{{ route('home') }}" class="hover:text-lsp-primary transition-all duration-300">Academy</a></li>
                            <li><a href="{{ route('profil') }}" class="hover:text-lsp-primary transition-all duration-300">About us</a></li>
                            <li><a href="{{ route('sertifikasi') }}" class="hover:text-lsp-primary transition-all duration-300">Skema Uji</a></li>
                            <li><a href="{{ route('berita.index') }}" class="hover:text-lsp-primary transition-all duration-300">Insights</a></li>
                        </ul>
                    </div>
                    <div class="space-y-8">
                        <h4 class="text-[10px] font-black tracking-[0.3em] text-white uppercase border-b border-white/10 pb-4">RESOURCES</h4>
                        <ul class="space-y-4 text-[13px] font-bold">
                            <li><a href="#" class="hover:text-lsp-accent transition-all duration-300">Verification</a></li>
                            <li><a href="#" class="hover:text-lsp-accent transition-all duration-300">Documentation</a></li>
                            <li><a href="#" class="hover:text-lsp-accent transition-all duration-300">API Access</a></li>
                            <li><a href="{{ route('admin.login') }}" class="hover:text-lsp-accent transition-all duration-300 text-slate-700">Enterprise</a></li>
                        </ul>
                    </div>
                    <div class="space-y-8">
                        <h4 class="text-[10px] font-black tracking-[0.3em] text-white uppercase border-b border-white/10 pb-4">HQ ADRESS</h4>
                        <div class="text-[13px] leading-loose font-bold space-y-4">
                            <p class="text-white">Mastrip 164, Sanford, East Java, ID</p>
                            <p>081330012100</p>
                            <a href="mailto:independenttendiyvisual@gmail.com" class="text-lsp-primary block">independenttendiyvisual@gmail.com</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-48 pt-12 border-t border-black/5 flex flex-col md:flex-row items-center justify-between">
                <div class="space-y-4">
                    <p class="font-technical text-[7px] text-black/30 tracking-[0.6em]">ESTABLISHED MCMXCIV — {{ config('app.name') }}</p>
                    <div class="flex items-center space-x-6">
                        <a href="https://github.com/inxdvi" target="_blank" class="sig-inxdvi">DESIGNED BY INXDVI</a>
                        <span class="h-1 w-1 rounded-full bg-black/10"></span>
                        <span class="font-technical text-[7px] text-red-500/40 tracking-[0.4em]">WEBSITE DEMO ONLY</span>
                    </div>
                </div>
                <div class="mt-8 md:mt-0 flex space-x-16 font-technical text-[7px] text-black/40 tracking-[0.4em]">
                    <a href="#" class="hover:text-white transition-colors">Privacy</a>
                    <a href="#" class="hover:text-white transition-colors">Legal</a>
                    <a href="#" class="hover:text-white transition-colors">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Premium Interactions -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const loader = document.getElementById('premium-loader');
            const progress = document.getElementById('loader-progress');
            
            // Entrance
            setTimeout(() => {
                progress.style.width = '100%';
                setTimeout(() => {
                    loader.style.opacity = '0';
                    setTimeout(() => {
                        loader.style.display = 'none';
                    }, 700);
                }, 600);
            }, 100);

            // Exit
            const handleTransition = (e, href) => {
                e.preventDefault();
                loader.style.display = 'flex';
                progress.style.width = '0%';
                setTimeout(() => {
                    loader.style.opacity = '1';
                    setTimeout(() => {
                        progress.style.width = '100%';
                        setTimeout(() => {
                            window.location.href = href;
                        }, 500);
                    }, 100);
                }, 10);
            };

            const links = document.querySelectorAll('a[href^="{{ url('/') }}"]:not([target="_blank"]):not([href*="#"])');
            links.forEach(link => {
                link.addEventListener('click', (e) => {
                    const href = link.getAttribute('href');
                    if (href && !href.includes('logout') && !href.includes('javascript:') && !e.metaKey && !e.ctrlKey) {
                        handleTransition(e, href);
                    }
                });
            });
        });
    </script>
</body>
</html>
