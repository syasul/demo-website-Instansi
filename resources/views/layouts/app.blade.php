<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags -->
    <title>{{ $meta['title'] ?? 'LSP Jember' }}</title>
    <meta name="description" content="{{ $meta['description'] ?? 'Portal Resmi Lembaga Sertifikasi Profesi (LSP) Jember. Layanan sertifikasi profesi berkualitas dan akuntabel.' }}">
    <meta name="keywords" content="{{ $meta['keywords'] ?? 'lsp jember, sertifikasi profesi, bnsp' }}">
    <meta name="author" content="inxdvi">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $meta['title'] ?? 'LSP Jember' }}">
    <meta property="og:description" content="{{ $meta['description'] ?? 'Portal Resmi Lembaga Sertifikasi Profesi (LSP) Jember.' }}">
    <meta property="og:image" content="{{ asset('images/og-image.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $meta['title'] ?? 'LSP Jember' }}">
    <meta property="twitter:description" content="{{ $meta['description'] ?? 'Portal Resmi Lembaga Sertifikasi Profesi (LSP) Jember.' }}">

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
<body class="bg-lsp-bg text-lsp-text font-body selection:bg-lsp-primary/30 selection:text-white">

    <!-- Page Loader Transition Bar -->
    <div id="page-loader"></div>

    <!-- Header Navigation -->
    <header x-data="{ mobileMenuOpen: false, scrolled: false }" 
            x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
            :class="scrolled ? 'glass-effect shadow-xl py-4' : 'bg-transparent py-6'"
            class="fixed top-0 left-0 w-full z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
            <!-- Logo / Brand -->
            <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-lsp-primary to-lsp-accent flex items-center justify-center text-white font-heading font-bold text-lg shadow-lg shadow-lsp-primary/20 group-hover:scale-105 transition-transform duration-300">
                    L
                </div>
                <div>
                    <span class="font-heading font-bold text-xl tracking-tight text-lsp-text block group-hover:text-lsp-accent transition-colors duration-300">LSP JEMBER</span>
                    <span class="text-[9px] uppercase tracking-widest text-lsp-muted block -mt-1 font-semibold">Kompeten & Profesional</span>
                </div>
            </a>

            <!-- Desktop Navigation Links -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="font-medium text-sm tracking-wide transition-colors duration-300 {{ request()->routeIs('home') ? 'text-lsp-accent' : 'text-slate-600 hover:text-lsp-text' }}">HOME</a>
                <a href="{{ route('profil') }}" class="font-medium text-sm tracking-wide transition-colors duration-300 {{ request()->routeIs('profil') ? 'text-lsp-accent' : 'text-slate-600 hover:text-lsp-text' }}">PROFIL</a>
                <a href="{{ route('sertifikasi') }}" class="font-medium text-sm tracking-wide transition-colors duration-300 {{ request()->routeIs('sertifikasi') ? 'text-lsp-accent' : 'text-slate-600 hover:text-lsp-text' }}">SERTIFIKASI</a>
                <a href="{{ route('berita.index') }}" class="font-medium text-sm tracking-wide transition-colors duration-300 {{ request()->routeIs('berita.*') ? 'text-lsp-accent' : 'text-slate-600 hover:text-lsp-text' }}">BERITA</a>
                <a href="{{ route('kontak.index') }}" class="font-medium text-sm tracking-wide transition-colors duration-300 {{ request()->routeIs('kontak.*') ? 'text-lsp-accent' : 'text-slate-600 hover:text-lsp-text' }}">KONTAK</a>
            </nav>

            <!-- CTA Desktop Button -->
            <div class="hidden md:block">
                <a href="{{ route('kontak.index') }}" class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-lsp-primary to-lsp-accent text-white text-xs font-semibold tracking-wide hover:shadow-lg hover:shadow-lsp-primary/20 hover:scale-105 active:scale-95 transition-all duration-300">
                    HUBUNGI KAMI
                </a>
            </div>

            <!-- Hamburger Button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-slate-600 hover:text-lsp-text focus:outline-none">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Mobile Drawer Navigation -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="absolute top-full left-0 w-full glass-effect shadow-2xl py-6 px-6 border-t border-slate-200/50 md:hidden">
            <nav class="flex flex-col space-y-4">
                <a href="{{ route('home') }}" @click="mobileMenuOpen = false" class="py-2 font-medium tracking-wide text-sm transition-colors duration-300 {{ request()->routeIs('home') ? 'text-lsp-accent' : 'text-slate-600 hover:text-lsp-text' }}">HOME</a>
                <a href="{{ route('profil') }}" @click="mobileMenuOpen = false" class="py-2 font-medium tracking-wide text-sm transition-colors duration-300 {{ request()->routeIs('profil') ? 'text-lsp-accent' : 'text-slate-600 hover:text-lsp-text' }}">PROFIL</a>
                <a href="{{ route('sertifikasi') }}" @click="mobileMenuOpen = false" class="py-2 font-medium tracking-wide text-sm transition-colors duration-300 {{ request()->routeIs('sertifikasi') ? 'text-lsp-accent' : 'text-slate-600 hover:text-lsp-text' }}">SERTIFIKASI</a>
                <a href="{{ route('berita.index') }}" @click="mobileMenuOpen = false" class="py-2 font-medium tracking-wide text-sm transition-colors duration-300 {{ request()->routeIs('berita.*') ? 'text-lsp-accent' : 'text-slate-600 hover:text-lsp-text' }}">BERITA</a>
                <a href="{{ route('kontak.index') }}" @click="mobileMenuOpen = false" class="py-2 font-medium tracking-wide text-sm transition-colors duration-300 {{ request()->routeIs('kontak.*') ? 'text-lsp-accent' : 'text-slate-600 hover:text-lsp-text' }}">KONTAK</a>
                <a href="{{ route('kontak.index') }}" @click="mobileMenuOpen = false" class="mt-4 w-full py-3 rounded-xl bg-gradient-to-r from-lsp-primary to-lsp-accent text-white text-center text-xs font-semibold tracking-wide">
                    HUBUNGI KAMI
                </a>
            </nav>
        </div>
    </header>

    <!-- Main Content Slot -->
    <main class="min-h-screen pt-24">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-50 border-t border-slate-200/80 pt-16 pb-8 text-slate-500">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-12">
            <!-- Brand & Info -->
            <div class="space-y-4">
                <a href="{{ route('home') }}" class="flex items-center space-x-3">
                    <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-lsp-primary to-lsp-accent flex items-center justify-center text-white font-heading font-bold text-lg">
                        L
                    </div>
                    <span class="font-heading font-bold text-xl tracking-tight text-lsp-text">LSP JEMBER</span>
                </a>
                <p class="text-sm text-slate-500 leading-relaxed pt-2">
                    Lembaga Sertifikasi Profesi berlisensi resmi BNSP yang berfokus menciptakan SDM kompeten berstandar nasional dan industri modern.
                </p>
            </div>

            <!-- Navigation Links -->
            <div class="space-y-4">
                <h4 class="font-heading font-bold text-sm tracking-wider text-lsp-text uppercase">PETA SITUS</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-lsp-accent transition-colors duration-300">Beranda</a></li>
                    <li><a href="{{ route('profil') }}" class="hover:text-lsp-accent transition-colors duration-300">Profil LSP</a></li>
                    <li><a href="{{ route('sertifikasi') }}" class="hover:text-lsp-accent transition-colors duration-300">Skema Sertifikasi</a></li>
                    <li><a href="{{ route('berita.index') }}" class="hover:text-lsp-accent transition-colors duration-300">Berita Acara</a></li>
                </ul>
            </div>

            <!-- Certification Services -->
            <div class="space-y-4">
                <h4 class="font-heading font-bold text-sm tracking-wider text-lsp-text uppercase">LAYANAN</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('sertifikasi') }}" class="hover:text-lsp-accent transition-colors duration-300">Uji Kompetensi</a></li>
                    <li><a href="{{ route('profil') }}" class="hover:text-lsp-accent transition-colors duration-300">Pendaftaran Asesi</a></li>
                    <li><a href="{{ route('kontak.index') }}" class="hover:text-lsp-accent transition-colors duration-300">Konsultasi Skema</a></li>
                    <li><a href="{{ route('admin.login') }}" class="hover:text-lsp-accent transition-colors duration-300">Admin Login</a></li>
                </ul>
            </div>

            <!-- Contact / Address -->
            <div class="space-y-4">
                <h4 class="font-heading font-bold text-sm tracking-wider text-lsp-text uppercase">KONTAK UTAMA</h4>
                <p class="text-sm leading-relaxed">
                    Jl. Mastrip No. 164, Jember,<br>
                    Jawa Timur 68121
                </p>
                <div class="space-y-1 text-sm">
                    <p class="flex items-center"><span class="text-lsp-accent mr-2">📞</span> (0331) 1234567</p>
                    <p class="flex items-center"><span class="text-lsp-accent mr-2">✉️</span> info@lsp-jember.com</p>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-6 mt-16 pt-8 border-t border-slate-200/80 flex flex-col md:flex-row items-center justify-between text-xs text-slate-500">
            <p>&copy; {{ date('Y') }} LSP Jember. All rights reserved.</p>
            <p class="mt-4 md:mt-0 font-medium tracking-wide">
                Powered by <span class="text-slate-700 font-bold hover:text-lsp-accent transition-colors duration-300">inxdvi</span>
            </p>
        </div>
    </footer>

    <!-- Smooth Page Loader Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const loader = document.getElementById('page-loader');
            
            // Initial animation on load complete
            setTimeout(() => {
                loader.style.transform = 'translateX(0)';
                setTimeout(() => {
                    loader.style.opacity = '0';
                }, 150);
            }, 100);

            // Animate transition on clicking links
            const localLinks = document.querySelectorAll('a[href^="{{ url('/') }}"]:not([target="_blank"]):not([href*="#"])');
            localLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    const href = link.getAttribute('href');
                    if (href && !href.includes('logout') && !href.includes('javascript:')) {
                        e.preventDefault();
                        loader.style.opacity = '1';
                        loader.style.transform = 'translateX(-100%)';
                        setTimeout(() => {
                            loader.style.transform = 'translateX(0)';
                            setTimeout(() => {
                                window.location.href = href;
                            }, 350);
                        }, 50);
                    }
                });
            });
        });
    </script>
</body>
</html>
