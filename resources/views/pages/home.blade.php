@extends('layouts.app')

@section('content')
<!-- Luxury Hero Section -->
<section class="relative min-h-[90vh] flex items-center bg-white pt-20 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 w-full">
        <div class="grid grid-cols-12 gap-8 items-center">
            <div class="col-span-12 lg:col-span-7 space-y-16">
                <div class="space-y-6">
                    <span class="font-technical text-black/40 block">001. PANDUAN MASA DEPAN</span>
                    <h1 class="font-heading font-black text-7xl md:text-9xl tracking-tighter text-black leading-[0.85]">
                        The <span class="font-editorial text-black/90">Standard</span> <br>
                        Of Excellence.
                    </h1>
                </div>
                
                <p class="text-xl text-black/60 font-light leading-relaxed max-w-lg">
                    Lembaga Sertifikasi Profesi Sanford. Arsitek kompetensi Anda, memvalidasi keahlian dengan integritas editorial dan standar mutu industri yang tak tertandingi.
                </p>

                <div class="flex items-center space-x-12 pt-8">
                    <a href="{{ route('sertifikasi') }}" class="premium-btn">
                        Explore Schemes
                    </a>
                    <div class="hidden md:block h-px w-24 bg-black/10"></div>
                </div>
            </div>

            <div class="col-span-12 lg:col-span-5 relative">
                <div class="aspect-[4/6] bg-slate-50 relative overflow-hidden group border-clean">
                    <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=2069" alt="Office Detail" class="w-full h-full object-cover grayscale opacity-80 group-hover:scale-105 transition-transform duration-[3s] ease-out">
                    <div class="absolute inset-0 bg-white/10 mix-blend-overlay"></div>
                </div>
                <!-- Technical Floating Note -->
                <div class="absolute -bottom-8 -left-8 bg-white p-8 border-clean shadow-2xl space-y-4 max-w-[200px]">
                    <span class="font-technical text-[8px] text-black">QUALITY ASSURANCE</span>
                    <p class="text-[10px] text-black/50 leading-relaxed">Seluruh proses uji kompetensi dipantau secara langsung oleh BNSP RI.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Separator Line -->
<div class="max-w-7xl mx-auto px-6">
    <div class="h-px w-full bg-black/5"></div>
</div>

<!-- The Philosophy / Mission Section -->
<section class="section-padding bg-white relative">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-12 gap-12">
            <div class="col-span-12 lg:col-span-4 self-center">
                <h2 class="font-heading font-black text-5xl tracking-tighter text-black leading-tight">
                    Our <span class="font-editorial text-black/60">Legacy</span> & <br> Mission.
                </h2>
            </div>
            <div class="col-span-12 lg:col-span-1 flex justify-center">
                <div class="h-24 w-px bg-black/10"></div>
            </div>
            <div class="col-span-12 lg:col-span-7 space-y-12">
                <p class="text-2xl font-light text-black/80 leading-relaxed">
                    Kami percaya bahwa pengakuan formal adalah katalisator bagi transformasi karier. {{ config('app.name') }} berkomitmen untuk memberikan validasi yang objektif, melampaui standar nasional untuk menciptakan tenaga kerja yang siap bersaing secara global.
                </p>
                
                <div class="grid grid-cols-2 gap-12 pt-8">
                    <div class="space-y-4">
                        <span class="font-technical text-[9px] text-indigo-600">01 / INTEGRITAS</span>
                        <p class="text-sm text-black/60 leading-relaxed font-medium italic font-editorial">Menjaga objektivitas dalam setiap asesmen kompetensi.</p>
                    </div>
                    <div class="space-y-4">
                        <span class="font-technical text-[9px] text-indigo-600">02 / INOVASI</span>
                        <p class="text-sm text-black/60 leading-relaxed font-medium italic font-editorial">Terus memperbarui skema sertifikasi sesuai tuntutan zaman.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- New Showcase Section (Luxury Portfolio Look) -->
<section class="section-padding bg-[#fafafa] overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="mb-24 flex items-end justify-between">
            <div class="space-y-6">
                <span class="font-technical text-black/40">THE SHOWCASE.24</span>
                <h2 class="font-heading font-black text-6xl tracking-tighter text-black">
                    Featured <span class="font-editorial text-black/60">Expertise.</span>
                </h2>
            </div>
            <a href="{{ route('sertifikasi') }}" class="font-technical text-[10px] text-black hover:text-indigo-600 transition-colors border-b border-black pb-2">VIEW ALL DIRECTORY</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-1 grid-flow-row">
            @forelse($sertifikasis as $scheme)
                <div class="bg-white p-16 space-y-10 border-clean group hover:bg-black hover:text-white transition-all duration-700">
                    <div class="h-1px w-12 bg-black/10 group-hover:bg-white/20 transition-colors"></div>
                    <div class="space-y-4">
                        <h3 class="font-heading font-black text-2xl tracking-tighter">
                            {{ $scheme->nama_skema }}
                        </h3>
                        <p class="text-[11px] font-medium opacity-60 leading-relaxed uppercase tracking-widest line-clamp-2">
                            {{ $scheme->deskripsi }}
                        </p>
                    </div>
                    <div class="pt-8 flex items-center justify-between">
                        <span class="font-technical text-[8px] opacity-40">LC-002-SANFORD</span>
                        <div class="text-xl group-hover:translate-x-4 transition-transform duration-700">→</div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-40 font-technical text-[10px] opacity-30">Initialization...</div>
            @endforelse
        </div>
    </div>
</section>

<!-- Latest Insight (Editorial Style) -->
<section class="section-padding bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="asymmetric-layout gap-12 mb-24">
            <div class="col-span-12 lg:col-span-4 self-center">
                <span class="font-technical text-black/40 block mb-6">THE JOURNAL</span>
                <h2 class="font-heading font-black text-5xl tracking-tighter text-black">
                    Latest <br> Editorial.
                </h2>
            </div>
            <div class="col-span-12 lg:col-span-8 grid grid-cols-1 md:grid-cols-2 gap-16">
                @forelse($featuredNews as $news)
                    <article class="group space-y-8">
                        <div class="aspect-video bg-slate-50 overflow-hidden relative border-clean">
                            @if($news->thumbnail)
                                <img src="{{ asset($news->thumbnail) }}" alt="{{ $news->judul }}" class="object-cover w-full h-full grayscale group-hover:grayscale-0 group-hover:scale-105 transition-all duration-[2s]">
                            @else
                                <div class="absolute inset-0 flex items-center justify-center font-editorial text-4xl opacity-5">NEWS</div>
                            @endif
                        </div>
                        <div class="space-y-4">
                            <span class="font-technical text-[8px] text-black/40">{{ $news->kategori }} // {{ $news->tanggal->format('d.m.y') }}</span>
                            <h3 class="font-heading font-black text-2xl tracking-tighter leading-tight group-hover:text-indigo-600 transition-colors">
                                <a href="{{ route('berita.show', $news->slug) }}">{{ $news->judul }}</a>
                            </h3>
                            <a href="{{ route('berita.show', $news->slug) }}" class="inline-block text-[9px] font-black uppercase tracking-[0.4em] border-b border-black/5 pb-2 hover:border-black transition-all">Read Story</a>
                        </div>
                    </article>
                @empty
                    <div class="col-span-2 text-center py-20 font-technical text-[9px] opacity-20">No journals published.</div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<!-- The Contact Call / Subtle Signature -->
<section class="section-padding bg-black text-white relative overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-px bg-white/5"></div>
    <div class="max-w-7xl mx-auto px-6 text-center space-y-16">
        <div class="space-y-8 max-w-4xl mx-auto">
            <span class="font-technical text-white/40 block">ARE YOU READY?</span>
            <h2 class="font-heading font-black text-6xl md:text-8xl tracking-tighter leading-[0.85]">
                Start Your <span class="font-editorial text-white/80">Transformation</span> Today.
            </h2>
            <div class="flex justify-center pt-8">
                <a href="{{ route('kontak.index') }}" class="premium-btn !border-white/20 hover:!bg-white hover:!text-black">
                    Contact The Registry
                </a>
            </div>
        </div>
    </div>
    
    <!-- Signature Mark -->
    <div class="absolute bottom-12 left-1/2 -translate-x-1/2">
        <span class="sig-inxdvi text-white/10">INXDVI • SIGNATURE SYSTEM • 2026</span>
    </div>
</section>

<!-- Luxury GSAP Animations -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        if (typeof gsap !== 'undefined') {
            const tl = gsap.timeline({ defaults: { ease: 'power4.out', duration: 2 } });
            
            tl.from('h1', { opacity: 0, scale: 1.05, y: 100 })
              .from('h1 .font-editorial', { opacity: 0, x: -50, rotate: -5 }, '-=1.5')
              .from('. premium-btn', { opacity: 0, y: 30 }, '-=1')
              .from('section img', { opacity: 0, scale: 1.1, stagger: 0.2 }, '-=1.5');
        }
    });
</script>
@endsection
