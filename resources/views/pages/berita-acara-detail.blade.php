@extends('layouts.app')

@section('content')
<section class="py-12 relative">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-16">
        
        <!-- Left: News Content -->
        <article class="lg:col-span-8 space-y-8" data-aos="fade-right">
            <!-- Back button -->
            <a href="{{ route('berita.index') }}" class="inline-flex items-center text-xs font-semibold text-lsp-accent hover:text-lsp-primary transition-colors duration-300">
                ← Kembali ke Daftar Berita
            </a>

            <!-- Header Info -->
            <div class="space-y-4">
                <span class="px-3 py-1 rounded-full bg-lsp-accent/10 border border-lsp-accent/20 text-lsp-accent text-[10px] font-bold tracking-wider uppercase">
                    {{ $berita->kategori }}
                </span>
                <h1 class="font-heading font-bold text-3xl sm:text-4xl md:text-5xl text-lsp-text leading-tight">
                    {{ $berita->judul }}
                </h1>
                <div class="text-xs text-lsp-muted flex items-center space-x-3 pt-2">
                    <span>📅 {{ $berita->tanggal->format('d F Y') }}</span>
                    <span>•</span>
                    <span>✍️ Ditulis oleh: {{ $berita->penulis }}</span>
                </div>
            </div>

            <!-- Big Thumbnail -->
            <div class="rounded-3xl overflow-hidden aspect-video w-full bg-slate-100 border border-slate-200/80 relative">
                @if($berita->thumbnail)
                    <img src="{{ $berita->thumbnail }}" alt="{{ $berita->judul }}" class="object-cover w-full h-full">
                @else
                    <div class="absolute inset-0 bg-gradient-to-br from-lsp-primary/20 to-lsp-accent/20 flex items-center justify-center text-6xl">
                        📰
                    </div>
                @endif
            </div>

            <!-- Content HTML body -->
            <div class="prose max-w-none text-slate-600 text-sm leading-relaxed space-y-6 pt-4">
                {!! $berita->konten !!}
            </div>
        </article>

        <!-- Right: Recent/Related News -->
        <aside class="lg:col-span-4 space-y-8" data-aos="fade-left">
            <div class="bg-white border border-slate-200 rounded-3xl p-6 sm:p-8 space-y-6 shadow-sm">
                <h3 class="font-heading font-bold text-lsp-text text-lg border-b border-slate-200/60 pb-4">Rekomendasi Rilisan</h3>
                
                <div class="space-y-6">
                    @forelse($latestNews as $item)
                        <div class="space-y-2 group">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-lsp-accent block">
                                {{ $item->kategori }}
                            </span>
                            <h4 class="font-heading font-bold text-sm text-lsp-text group-hover:text-lsp-primary transition-colors duration-300 leading-snug">
                                <a href="{{ route('berita.show', $item->slug) }}">
                                    {{ $item->judul }}
                                </a>
                            </h4>
                            <span class="text-[10px] text-slate-500 block">
                                {{ $item->tanggal->format('d M Y') }}
                            </span>
                        </div>
                    @empty
                        <p class="text-xs text-slate-500">Tidak ada berita lain saat ini.</p>
                    @endforelse
                </div>
            </div>
        </aside>
    </div>
</section>
@endsection
