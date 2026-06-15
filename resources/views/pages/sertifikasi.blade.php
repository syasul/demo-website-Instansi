@extends('layouts.app')

@section('content')
<section class="py-16 relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,#3b82f6/5,transparent_50%)] pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-6">
        
        <div class="text-center space-y-4 max-w-3xl mx-auto mb-20" data-aos="fade-up">
            <span class="text-xs font-bold tracking-widest text-lsp-accent uppercase">SKEMA UJI</span>
            <h1 class="font-heading font-bold text-4xl sm:text-5xl text-lsp-text tracking-tight">
                Skema Sertifikasi <span class="text-gradient">Kompetensi Kerja</span>
            </h1>
            <p class="text-slate-600 text-sm leading-relaxed">
                Kami menyediakan skema kualifikasi profesi nasional tingkat madya yang bersinkronisasi langsung dengan standar keahlian industri.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @forelse($sertifikasis as $scheme)
                <div data-aos="fade-up" class="group relative rounded-3xl bg-white border border-slate-200/80 p-8 sm:p-10 flex flex-col justify-between hover:shadow-xl transition-all duration-300 shadow-sm">
                    <div class="absolute top-0 left-0 w-full h-[3px] bg-gradient-to-r from-lsp-primary to-lsp-accent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <div class="space-y-6">
                        <div class="flex items-center justify-between">
                            <div class="h-14 w-14 rounded-2xl bg-lsp-primary/10 text-lsp-accent flex items-center justify-center text-3xl">
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
                            <span class="px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 text-[10px] font-bold tracking-wider uppercase">
                                Aktif / BNSP
                            </span>
                        </div>

                        <div class="space-y-2">
                            <h3 class="font-heading font-bold text-xl text-lsp-text group-hover:text-lsp-primary transition-colors duration-300">
                                {{ $scheme->nama_skema }}
                            </h3>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                {{ $scheme->deskripsi }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t border-slate-200/60 flex items-center justify-between text-xs">
                        <span class="text-slate-500">Kualifikasi: KKNI Tingkat II / III</span>
                        <a href="{{ route('kontak.index') }}" class="font-bold text-lsp-accent hover:text-lsp-primary transition-colors duration-300">
                            Daftar Skema Uji ➔
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-2 text-center p-12 bg-white border border-slate-200 rounded-3xl text-slate-500">
                    Belum ada skema kompetensi terdaftar saat ini.
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
