@extends('layouts.app')

@section('content')
<section class="py-16 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        
        <!-- Header Banner -->
        <div class="text-center space-y-4 max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <span class="text-xs font-bold tracking-widest text-lsp-accent uppercase">BERITA & KEGIATAN</span>
            <h1 class="font-heading font-bold text-4xl sm:text-5xl text-lsp-text tracking-tight">
                Kabar <span class="text-gradient">LSP Jember</span>
            </h1>
            <p class="text-slate-600 text-sm leading-relaxed">
                Temukan rilisan berita harian, agenda kerja, pengumuman resmi, dan tips edukasi asesmen terbaru dari kami.
            </p>
        </div>

        <!-- Filter bar -->
        <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-sm mb-12" data-aos="fade-up">
            <form action="{{ route('berita.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                <!-- Search keyword -->
                <div class="space-y-2">
                    <label for="q" class="text-[11px] font-bold uppercase tracking-wider text-slate-500">Kata Kunci</label>
                    <input type="text" name="q" id="q" value="{{ request('q') }}" placeholder="Cari judul/konten..." class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-lsp-text placeholder-slate-400 focus:outline-none focus:border-lsp-accent">
                </div>

                <!-- Category selection -->
                <div class="space-y-2">
                    <label for="kategori" class="text-[11px] font-bold uppercase tracking-wider text-slate-500">Kategori</label>
                    <select name="kategori" id="kategori" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category }}" {{ request('kategori') == $category ? 'selected' : '' }}>{{ $category }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Year selection -->
                <div class="space-y-2">
                    <label for="tahun" class="text-[11px] font-bold uppercase tracking-wider text-slate-500">Tahun</label>
                    <select name="tahun" id="tahun" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">
                        <option value="">Semua Tahun</option>
                        @foreach($years as $year)
                            <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>{{ $year }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Buttons -->
                <div class="flex gap-2">
                    <button type="submit" class="flex-grow py-2.5 bg-gradient-to-r from-lsp-primary to-lsp-accent text-white rounded-xl text-xs font-semibold hover:shadow-lg hover:shadow-lsp-primary/20 transition-all duration-300">
                        CARI BERITA
                    </button>
                    @if(request()->anyFilled(['q', 'kategori', 'tahun']))
                        <a href="{{ route('berita.index') }}" class="py-2.5 px-4 bg-slate-100 border border-slate-200 hover:bg-slate-200 text-slate-700 rounded-xl text-xs font-semibold text-center flex items-center justify-center transition-colors duration-300">
                            BATAL
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- News list grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            @forelse($beritas as $news)
                <article class="group rounded-3xl overflow-hidden bg-white border border-slate-200/80 flex flex-col h-full hover:shadow-xl transition-all duration-300 shadow-sm">
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
                <div class="col-span-3 text-center p-16 bg-white border border-slate-200 rounded-3xl text-slate-500">
                    Tidak ditemukan berita dengan filter pencarian tersebut.
                </div>
            @endforelse
        </div>

        <!-- Pagination Links -->
        <div class="flex items-center justify-center">
            {{ $beritas->links() }}
        </div>
    </div>
</section>
@endsection
