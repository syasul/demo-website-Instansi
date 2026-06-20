@extends('layouts.app')

@section('content')
<!-- Sertifikasi Hero -->
<section class="relative py-24 md:py-32 overflow-hidden bg-white">
    <!-- Background Decor -->
    <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/2 w-[600px] h-[600px] bg-lsp-primary/5 rounded-full blur-[120px]"></div>
    <div class="absolute bottom-0 left-0 translate-y-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-lsp-accent/5 rounded-full blur-[120px]"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center space-y-6 max-w-4xl mx-auto mb-20" data-aos="fade-up">
            <span class="inline-block px-3 py-1 rounded-lg bg-lsp-accent/10 text-lsp-primary text-[10px] font-extrabold tracking-widest uppercase">QUALIFICATIONS</span>
            <h1 class="font-heading font-extrabold text-5xl md:text-7xl text-lsp-text tracking-tighter leading-tight">
                Standar <span class="text-gradient">Kompetensi.</span>
            </h1>
            <p class="text-lg text-lsp-muted leading-relaxed font-medium">
                Pilihan skema sertifikasi nasional yang dirancang untuk memvalidasi keahlian teknis Anda sesuai dengan standar KKNI dan kebutuhan industri modern.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            @forelse($sertifikasis as $scheme)
                <div data-aos="fade-up" class="card-hover group relative rounded-[2.5rem] bg-white border border-slate-100 p-10 md:p-12 flex flex-col shadow-2xl shadow-slate-200/50 overflow-hidden">
                    <!-- Subtle pattern overlay -->
                    <div class="absolute inset-0 bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] bg-[size:2rem_2rem] opacity-20 pointer-events-none"></div>
                    
                    <div class="flex items-start justify-between relative z-10 mb-10">
                        <div class="h-16 w-16 rounded-2xl bg-lsp-primary/10 text-lsp-primary flex items-center justify-center text-3xl group-hover:bg-lsp-primary group-hover:text-white transition-all duration-500 shadow-lg shadow-lsp-primary/5">
                            @if($scheme->icon === 'code-bracket') 💻 @elseif($scheme->icon === 'paint-brush') 🎨 @elseif($scheme->icon === 'server') 🖥️ @elseif($scheme->icon === 'chart-bar') 📈 @else 🛠️ @endif
                        </div>
                        <div class="flex flex-col items-end space-y-2">
                            <span class="px-4 py-1.5 rounded-xl bg-emerald-500/10 text-emerald-600 text-[9px] font-extrabold tracking-widest uppercase border border-emerald-500/20">
                                ACTIVE SCHEME
                            </span>
                            <span class="text-[9px] font-extrabold text-lsp-muted tracking-widest uppercase">BNSP LICENSED</span>
                        </div>
                    </div>

                    <div class="space-y-4 relative z-10 flex-grow">
                        <h3 class="font-heading font-extrabold text-2xl text-lsp-text group-hover:text-lsp-primary transition-colors duration-300 tracking-tight">
                            {{ $scheme->nama_skema }}
                        </h3>
                        <p class="text-sm text-lsp-muted leading-relaxed font-medium">
                            {{ $scheme->deskripsi }}
                        </p>
                    </div>

                    <div class="mt-12 pt-8 border-t border-slate-100 relative z-10 flex items-center justify-between">
                        <div class="space-y-1">
                            <span class="block text-[9px] font-extrabold text-lsp-muted tracking-wider uppercase">LEVEL KUALIFIKASI</span>
                            <span class="block text-xs font-bold text-lsp-text">KKNI TINGKAT II / III</span>
                        </div>
                        <a href="{{ route('kontak.index') }}" class="group inline-flex items-center px-6 py-3 rounded-xl bg-slate-900 text-white text-[10px] font-extrabold tracking-widest hover:bg-lsp-primary transition-all duration-300">
                            REGISTER <span class="ml-3 group-hover:translate-x-1 transition-transform">→</span>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-2 text-center py-32 bg-slate-50 border-2 border-dashed border-slate-200 rounded-[3rem] text-slate-400 font-extrabold uppercase tracking-widest text-xs">
                    Certifications Coming Soon...
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Why Certify CTA -->
<section class="py-24 bg-[#0f172a] relative overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(#1e293b_1px,transparent_1px)] bg-[size:4rem_4rem] opacity-20"></div>
    <div class="max-w-7xl mx-auto px-6 relative z-10 text-center space-y-8">
        <h2 class="font-heading font-extrabold text-4xl md:text-5xl text-white tracking-tighter">Empower Your <span class="text-gradient">Career Path.</span></h2>
        <p class="text-slate-400 max-w-2xl mx-auto font-medium leading-relaxed">
            Sertifikasi kompetensi memberikan bukti objektif atas keahlian Anda, meningkatkan nilai tawar, dan membuka peluang karir yang lebih luas di pasar global.
        </p>
        <div class="pt-6">
            <a href="{{ route('kontak.index') }}" class="inline-flex items-center px-10 py-5 rounded-2xl bg-white text-slate-950 font-extrabold text-[11px] tracking-widest hover:bg-lsp-primary hover:text-white transition-all duration-500 shadow-2xl shadow-white/5">
                START VALUATION NOW
            </a>
        </div>
    </div>
</section>
@endsection
