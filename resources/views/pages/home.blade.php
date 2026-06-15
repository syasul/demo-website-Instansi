@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-[90vh] flex items-center justify-center overflow-hidden pt-12">
    <!-- Cyber Geometric Background Grid -->
    <div class="absolute inset-0 bg-[linear-gradient(to_right,#1e293b_1px,transparent_1px),linear-gradient(to_bottom,#1e293b_1px,transparent_1px)] bg-[size:4rem_4rem] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_50%,#000_70%,transparent_100%)] opacity-35"></div>
    
    <!-- Glow spots -->
    <div class="absolute top-1/4 left-1/4 h-96 w-96 bg-lsp-primary/20 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-1/4 right-1/4 h-[35rem] w-[35rem] bg-lsp-accent/15 rounded-full blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10 text-center space-y-8">
        <!-- Floating Tech Badge -->
        <div class="inline-flex items-center space-x-2 px-4 py-2 rounded-full glass-effect border border-lsp-accent/30 hero-badge shadow-lg shadow-lsp-accent/5">
            <span class="h-2 w-2 rounded-full bg-lsp-accent animate-ping"></span>
            <span class="text-[11px] font-semibold tracking-wider uppercase text-lsp-accent">Uji Kompetensi Berstandar BNSP</span>
        </div>

        <!-- Headline -->
        <h1 class="font-heading font-bold text-4xl sm:text-6xl md:text-7xl text-lsp-text tracking-tight leading-none max-w-4xl mx-auto hero-title">
            Membangun Karir Unggul dengan <span class="text-gradient">Sertifikasi Resmi</span>
        </h1>

        <!-- Subheading -->
        <p class="text-lg text-lsp-muted max-w-2xl mx-auto leading-relaxed hero-desc">
            Lembaga Sertifikasi Profesi Jember membantu Anda melakukan validasi keahlian sesuai SKKNI untuk bersaing unggul di era industri digital global.
        </p>

        <!-- CTA Buttons -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 hero-cta">
            <a href="{{ route('sertifikasi') }}" class="w-full sm:w-auto px-8 py-4 rounded-2xl bg-gradient-to-r from-lsp-primary to-lsp-accent text-white font-semibold text-sm tracking-wide shadow-lg shadow-lsp-primary/20 hover:scale-105 hover:shadow-lsp-primary/30 transition-all duration-300">
                LIHAT SKEMA SERTIFIKASI
            </a>
            <a href="{{ route('profil') }}" class="w-full sm:w-auto px-8 py-4 rounded-2xl bg-white border border-slate-200 text-slate-700 font-semibold text-sm tracking-wide hover:bg-slate-50 transition-all duration-300 shadow-sm">
                PROFIL LEBIH LANJUT
            </a>
        </div>

        <!-- Floating Stats summary -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto pt-16 hero-stats">
            <div class="glass-effect rounded-2xl p-6 text-center border-slate-200/60 shadow-sm">
                <span class="block font-heading font-bold text-3xl sm:text-4xl text-lsp-text">1,200+</span>
                <span class="text-[11px] font-semibold text-lsp-muted uppercase tracking-wider">Asesi Teruji</span>
            </div>
            <div class="glass-effect rounded-2xl p-6 text-center border-slate-200/60 shadow-sm">
                <span class="block font-heading font-bold text-3xl sm:text-4xl text-lsp-text">4+</span>
                <span class="text-[11px] font-semibold text-lsp-muted uppercase tracking-wider">Skema Aktif</span>
            </div>
            <div class="glass-effect rounded-2xl p-6 text-center border-slate-200/60 shadow-sm">
                <span class="block font-heading font-bold text-3xl sm:text-4xl text-lsp-text">12+</span>
                <span class="text-[11px] font-semibold text-lsp-muted uppercase tracking-wider">Asesor Ahli</span>
            </div>
            <div class="glass-effect rounded-2xl p-6 text-center border-slate-200/60 shadow-sm">
                <span class="block font-heading font-bold text-3xl sm:text-4xl text-lsp-text">100%</span>
                <span class="text-[11px] font-semibold text-lsp-muted uppercase tracking-wider">Kredibilitas</span>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-24 relative">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <!-- Left Visual Card -->
        <div data-aos="fade-right" class="relative group">
            <div class="absolute -inset-1 rounded-3xl bg-gradient-to-r from-lsp-primary to-lsp-accent opacity-20 blur-2xl group-hover:opacity-30 transition duration-1000"></div>
            <div class="relative glass-effect rounded-3xl overflow-hidden border-slate-200/80 aspect-video flex flex-col justify-end p-8 bg-[url('https://images.unsplash.com/photo-1531482615713-2afd69097998?q=80&w=1740')] bg-cover bg-center">
                <!-- Overlay tint -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent z-0"></div>
                <div class="relative z-10 space-y-2">
                    <span class="text-xs font-bold tracking-widest text-white uppercase opacity-90">VISI KAMI</span>
                    <p class="text-white font-heading font-semibold text-lg sm:text-xl italic leading-relaxed">
                        "{{ $about_visi ?? 'Menjadi Lembaga Sertifikasi yang unggul, terpercaya, dan berdaya saing global.' }}"
                    </p>
                </div>
            </div>
        </div>

        <!-- Right Content Details -->
        <div data-aos="fade-left" class="space-y-6">
            <div class="space-y-2">
                <span class="text-xs font-bold tracking-widest text-lsp-accent uppercase">TENTANG LSP</span>
                <h2 class="font-heading font-bold text-3xl sm:text-4xl text-lsp-text leading-tight">
                    Menjamin Objektivitas Asesmen & Standar Nasional
                </h2>
            </div>
            
            <p class="text-slate-600 leading-relaxed text-sm">
                {{ $about_history ?? 'LSP Jember didirikan sebagai lembaga independen yang berkomitmen penuh dalam menguji dan menerbitkan sertifikasi kompetensi kerja.' }}
            </p>

            <div class="space-y-4 pt-4">
                <h4 class="font-heading font-bold text-lsp-text text-sm tracking-wider uppercase">MISI UTAMA KAMI:</h4>
                <div class="text-sm text-slate-600 space-y-3 leading-relaxed">
                    @if(isset($about_misi) && $about_misi)
                        {!! nl2br(e($about_misi)) !!}
                    @else
                        1. Menyelenggarakan sertifikasi kompetensi kerja secara profesional and akuntabel.<br>
                        2. Mengembangkan skema sertifikasi sesuai tuntutan kebutuhan pasar kerja.<br>
                        3. Memelihara kompetensi tenaga kerja bersertifikat.
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sertifikasi Section -->
<section id="sertifikasi" class="py-24 bg-slate-50 border-y border-slate-200/50 relative">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_bottom_left,var(--color-lsp-primary)/0.03,transparent_40%)] pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16">
            <div class="space-y-2">
                <span class="text-xs font-bold tracking-widest text-lsp-accent uppercase">KOMPETENSI</span>
                <h2 class="font-heading font-bold text-3xl sm:text-4xl text-lsp-text">Skema Uji Sertifikasi</h2>
            </div>
            <a href="{{ route('sertifikasi') }}" class="text-sm font-semibold text-lsp-accent hover:text-lsp-primary mt-4 md:mt-0 transition-colors duration-300 flex items-center">
                Lihat Semua Skema <span class="ml-2">➔</span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($sertifikasis as $scheme)
                <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" class="group relative rounded-2xl bg-white border border-slate-200/80 p-8 hover:-translate-y-2 transition-all duration-300 shadow-sm hover:shadow-lg">
                    <div class="absolute top-0 left-0 w-full h-[2px] bg-gradient-to-r from-lsp-primary to-lsp-accent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <!-- Icon -->
                    <div class="h-12 w-12 rounded-xl bg-lsp-primary/10 text-lsp-primary flex items-center justify-center text-2xl font-bold mb-6 group-hover:bg-lsp-primary group-hover:text-white transition-all duration-300">
                        @if($scheme->icon === 'code-bracket')
                            💻
                        @elseif($scheme->icon === 'paint-brush')
                            🎨
                        @elseif($scheme->icon === 'server')
                            🖥️
                        @elseif($scheme->icon === 'chart-bar')
                            📈
                        @else
                            🛠️
                        @endif
                    </div>

                    <h3 class="font-heading font-bold text-lg text-lsp-text mb-3 group-hover:text-lsp-primary transition-colors duration-300">
                        {{ $scheme->nama_skema }}
                    </h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        {{ Str::limit($scheme->deskripsi, 100) }}
                    </p>
                </div>
            @empty
                <!-- Default seeded cards -->
                <div class="p-8 bg-white border border-slate-200 rounded-2xl text-center col-span-4 text-slate-500">
                    Belum ada skema sertifikasi terdaftar.
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Berita Section -->
<section id="berita" class="py-24 relative">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16">
            <div class="space-y-2">
                <span class="text-xs font-bold tracking-widest text-lsp-accent uppercase">BERITA TERBARU</span>
                <h2 class="font-heading font-bold text-3xl sm:text-4xl text-lsp-text">Berita Acara & Pengumuman</h2>
            </div>
            <a href="{{ route('berita.index') }}" class="text-sm font-semibold text-lsp-accent hover:text-lsp-primary mt-4 md:mt-0 transition-colors duration-300 flex items-center">
                Lihat Semua Berita <span class="ml-2">➔</span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($featuredNews as $news)
                <article data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" class="group rounded-3xl overflow-hidden bg-white border border-slate-200/80 flex flex-col h-full hover:shadow-2xl transition-all duration-300 shadow-sm">
                    <!-- Image slot -->
                    <div class="aspect-video w-full overflow-hidden bg-slate-100 relative">
                        @if($news->thumbnail)
                            <img src="{{ $news->thumbnail }}" alt="{{ $news->judul }}" class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="absolute inset-0 bg-gradient-to-br from-lsp-primary/20 to-lsp-accent/20 flex items-center justify-center text-4xl">
                                📰
                            </div>
                        @endif
                        <span class="absolute top-4 left-4 px-3 py-1 rounded-full bg-lsp-accent/90 backdrop-blur text-white text-[10px] font-bold tracking-wide uppercase">
                            {{ $news->kategori }}
                        </span>
                    </div>

                    <!-- Content -->
                    <div class="p-6 flex flex-col flex-grow space-y-4">
                        <div class="text-[11px] text-lsp-muted flex items-center space-x-2">
                            <span>{{ $news->tanggal->format('d M Y') }}</span>
                            <span>&bull;</span>
                            <span>Oleh: {{ $news->penulis }}</span>
                        </div>
                        <h3 class="font-heading font-bold text-lg text-lsp-text group-hover:text-lsp-primary transition-colors duration-300 leading-snug">
                            <a href="{{ route('berita.show', $news->slug) }}">
                                {{ $news->judul }}
                            </a>
                        </h3>
                        <p class="text-xs text-slate-600 leading-relaxed flex-grow">
                            {{ Str::limit(strip_tags($news->konten), 120) }}
                        </p>
                        <a href="{{ route('berita.show', $news->slug) }}" class="text-xs font-semibold text-lsp-accent hover:text-lsp-primary transition-colors duration-300 inline-flex items-center pt-2">
                            Baca Selengkapnya <span class="ml-2">➔</span>
                        </a>
                    </div>
                </article>
            @empty
                <div class="p-8 bg-white border border-slate-200 rounded-2xl text-center col-span-3 text-slate-500">
                    Belum ada berita terbit.
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section id="gallery" class="py-24 bg-slate-50 border-y border-slate-200/50 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="space-y-2 mb-16 text-center">
            <span class="text-xs font-bold tracking-widest text-lsp-accent uppercase">GALERI KEGIATAN</span>
            <h2 class="font-heading font-bold text-3xl sm:text-4xl text-lsp-text">Dokumentasi & Album Foto</h2>
        </div>

        @if($galleryItems->count() > 0)
            <!-- Swiper container -->
            <div class="swiper gallery-swiper pb-12 overflow-visible">
                <div class="swiper-wrapper">
                    @foreach($galleryItems as $item)
                        <div class="swiper-slide rounded-2xl overflow-hidden border border-slate-200 aspect-square relative group">
                            <img src="{{ asset($item->file_path) }}" alt="{{ $item->judul ?? 'Foto Galeri' }}" class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-500">
                            <!-- Overlay detail -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6 z-10">
                                <p class="text-sm font-semibold text-white font-heading">
                                    {{ $item->judul ?? 'Kegiatan LSP' }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Pagination -->
                <div class="swiper-pagination !bottom-0"></div>
            </div>
        @else
            <!-- Placeholder grid in case of no gallery uploaded yet -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="aspect-square rounded-2xl flex flex-col justify-end p-6 bg-[url('https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=1740')] bg-cover bg-center border border-slate-200/80 relative overflow-hidden before:absolute before:inset-0 before:bg-gradient-to-t before:from-black/80 before:to-transparent before:z-0">
                    <span class="text-xs font-bold text-white relative z-10">Asesmen Kompetensi Jurnalistik</span>
                </div>
                <div class="aspect-square rounded-2xl flex flex-col justify-end p-6 bg-[url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=1740')] bg-cover bg-center border border-slate-200/80 relative overflow-hidden before:absolute before:inset-0 before:bg-gradient-to-t before:from-black/80 before:to-transparent before:z-0">
                    <span class="text-xs font-bold text-white relative z-10">Uji Sertifikasi Web Developer</span>
                </div>
                <div class="aspect-square rounded-2xl flex flex-col justify-end p-6 bg-[url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1740')] bg-cover bg-center border border-slate-200/80 relative overflow-hidden before:absolute before:inset-0 before:bg-gradient-to-t before:from-black/80 before:to-transparent before:z-0">
                    <span class="text-xs font-bold text-white relative z-10">Bimbingan Teknis Asesor</span>
                </div>
                <div class="aspect-square rounded-2xl flex flex-col justify-end p-6 bg-[url('https://images.unsplash.com/photo-1542744094-3a31f103e35f?q=80&w=1740')] bg-cover bg-center border border-slate-200/80 relative overflow-hidden before:absolute before:inset-0 before:bg-gradient-to-t before:from-black/80 before:to-transparent before:z-0">
                    <span class="text-xs font-bold text-white relative z-10">Rapat Pleno Komite Teknis</span>
                </div>
            </div>
        @endif
    </div>
</section>

<!-- Contact CTA Section -->
<section id="kontak-home" class="py-24 relative">
    <div class="max-w-7xl mx-auto px-6">
        <div class="bg-white border border-slate-200/80 rounded-3xl p-8 sm:p-12 relative overflow-hidden grid grid-cols-1 lg:grid-cols-2 gap-12 items-center shadow-xl shadow-slate-100">
            <!-- Glow background -->
            <div class="absolute -top-40 -right-40 h-80 w-80 bg-lsp-primary/5 rounded-full blur-3xl"></div>
            
            <div class="space-y-6 relative z-10">
                <span class="text-xs font-bold tracking-widest text-lsp-accent uppercase">MULAI SEKARANG</span>
                <h2 class="font-heading font-bold text-3xl sm:text-4xl text-lsp-text leading-tight">
                    Butuh Informasi Lebih Lengkap Mengenai Asesmen?
                </h2>
                <p class="text-sm text-slate-600 leading-relaxed">
                    Tim administrasi LSP Jember siap membantu Anda merinci prosedur pendaftaran, persyaratan skema, jadwal ujian terdekat, dan program kemitraan.
                </p>
                <div class="flex flex-wrap items-center gap-4">
                    <a href="{{ route('kontak.index') }}" class="px-6 py-3.5 rounded-2xl bg-gradient-to-r from-lsp-primary to-lsp-accent text-white font-semibold text-xs tracking-wide hover:shadow-lg hover:shadow-lsp-primary/20 hover:scale-105 active:scale-95 transition-all duration-300">
                        KIRIM PESAN LANGSUNG
                    </a>
                    <a href="https://wa.me/628123456789" target="_blank" class="px-6 py-3.5 rounded-2xl bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-xs tracking-wide inline-flex items-center hover:scale-105 transition-all duration-300">
                        💬 HUBUNGI WHATSAPP
                    </a>
                </div>
            </div>

            <!-- Map wrapper -->
            <div class="w-full h-72 rounded-2xl overflow-hidden shadow-lg border border-slate-200 relative z-10">
                {!! \App\Models\SiteSetting::getValue('kontak_maps', '<iframe class="w-full h-full border-0" src="https://maps.google.com/maps?q=Politeknik%20Negeri%20Jember&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>') !!}
            </div>
        </div>
    </div>
</section>

<!-- Init animations script -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        if (window.gsap) {
            const tl = gsap.timeline();
            tl.from('.hero-badge', { opacity: 0, y: -20, duration: 0.8, ease: 'power3.out' })
              .from('.hero-title', { opacity: 0, y: 30, duration: 1, ease: 'power3.out' }, '-=0.5')
              .from('.hero-desc', { opacity: 0, y: 20, duration: 0.8, ease: 'power3.out' }, '-=0.6')
              .from('.hero-cta', { opacity: 0, scale: 0.9, duration: 0.6, ease: 'back.out(1.7)' }, '-=0.4')
              .from('.hero-stats', { opacity: 0, y: 15, duration: 0.8, ease: 'power3.out' }, '-=0.3');
        }

        if (window.Swiper) {
            new Swiper('.gallery-swiper', {
                slidesPerView: 1,
                spaceBetween: 24,
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    640: { slidesPerView: 2 },
                    1024: { slidesPerView: 3 }
                }
            });
        }
    });
</script>
@endsection
