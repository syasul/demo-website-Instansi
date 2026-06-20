@extends('layouts.app')

@section('content')
<!-- Berita Hero -->
<section class="relative py-24 md:py-32 overflow-hidden bg-white text-center">
    <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] bg-[size:3rem_3rem] opacity-20"></div>
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="space-y-6 max-w-3xl mx-auto" data-aos="fade-up">
            <span class="inline-block px-3 py-1 rounded-lg bg-lsp-primary/10 text-lsp-primary text-[10px] font-extrabold tracking-widest uppercase">INSIGHTS</span>
            <h1 class="font-heading font-extrabold text-5xl md:text-7xl text-lsp-text tracking-tighter leading-tight">
                Kabar <span class="text-gradient">{{ config('app.name') }}.</span>
            </h1>
            <p class="text-lg text-lsp-muted leading-relaxed font-medium">
                Pusat informasi terbaru mengenai agenda sertifikasi, pengumuman resmi, dan artikel edukatif seputar dunia profesi.
            </p>
        </div>
    </div>
</section>

<section class="py-24 relative bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Filter bar -->
        <div class="bg-white rounded-[2rem] p-8 shadow-2xl shadow-slate-200/50 border border-slate-100 mb-16 relative -mt-32 z-20" data-aos="fade-up">
            <form action="{{ route('berita.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-6 items-end">
                <div class="space-y-3">
                    <label class="text-[9px] font-extrabold uppercase tracking-[0.2em] text-lsp-muted ml-2">SEARCH KEYWORD</label>
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari judul..." class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-5 py-3.5 text-xs text-lsp-text placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-lsp-primary/20 transition-all">
                </div>

                <div class="space-y-3">
                    <label class="text-[9px] font-extrabold uppercase tracking-[0.2em] text-lsp-muted ml-2">CATEGORY</label>
                    <select name="kategori" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-5 py-3.5 text-xs text-lsp-text focus:outline-none focus:ring-2 focus:ring-lsp-primary/20 transition-all appearance-none cursor-pointer">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category }}" {{ request('kategori') == $category ? 'selected' : '' }}>{{ $category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-3">
                    <label class="text-[9px] font-extrabold uppercase tracking-[0.2em] text-lsp-muted ml-2">YEAR</label>
                    <select name="tahun" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-5 py-3.5 text-xs text-lsp-text focus:outline-none focus:ring-2 focus:ring-lsp-primary/20 transition-all appearance-none cursor-pointer">
                        <option value="">Semua Tahun</option>
                        @foreach($years as $year)
                            <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>{{ $year }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex gap-4">
                    <button type="submit" class="flex-grow py-4 bg-slate-900 text-white rounded-2xl text-[10px] font-extrabold tracking-widest hover:bg-lsp-primary transition-all duration-300 shadow-xl shadow-slate-200">
                        FILTER
                    </button>
                    @if(request()->anyFilled(['q', 'kategori', 'tahun']))
                        <a href="{{ route('berita.index') }}" class="py-4 px-6 bg-slate-100 text-slate-500 rounded-2xl text-[10px] font-extrabold tracking-widest hover:bg-slate-200 transition-all duration-300">
                            RESET
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- News list grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mb-20">
            @forelse($beritas as $news)
                <article data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" class="card-hover group flex flex-col h-full bg-white rounded-[2.5rem] border border-slate-100 overflow-hidden shadow-sm">
                    <div class="aspect-[16/10] overflow-hidden bg-slate-100 relative">
                        @if($news->thumbnail)
                            <img src="{{ asset($news->thumbnail) }}" alt="{{ $news->judul }}" class="object-cover w-full h-full group-hover:scale-110 transition-transform duration-1000">
                        @else
                            <div class="absolute inset-0 bg-gradient-to-br from-lsp-primary to-lsp-accent flex items-center justify-center text-4xl grayscale opacity-20">📰</div>
                        @endif
                        <div class="absolute top-6 left-6 px-4 py-1.5 rounded-xl glass-effect border border-white/20 text-white text-[9px] font-extrabold tracking-widest uppercase">
                            {{ $news->kategori }}
                        </div>
                    </div>

                    <div class="p-8 flex flex-col flex-grow space-y-5">
                        <div class="flex items-center space-x-3 text-[10px] font-bold text-lsp-muted uppercase tracking-widest">
                            <span>{{ $news->tanggal->format('d M, Y') }}</span>
                            <span class="h-1 w-1 rounded-full bg-slate-300"></span>
                            <span>{{ $news->penulis }}</span>
                        </div>
                        <h3 class="font-heading font-extrabold text-xl text-lsp-text group-hover:text-lsp-primary transition-colors duration-300 leading-[1.2]">
                            <a href="{{ route('berita.show', $news->slug) }}">{{ $news->judul }}</a>
                        </h3>
                        <p class="text-xs text-lsp-muted leading-relaxed line-clamp-3 font-medium">
                            {{ Str::limit(strip_tags($news->konten), 140) }}
                        </p>
                        <hr class="border-slate-100 mt-auto pt-6">
                        <a href="{{ route('berita.show', $news->slug) }}" class="group inline-flex items-center text-[10px] font-extrabold tracking-widest text-lsp-text uppercase mt-auto">
                            READ ARTICLE <span class="ml-3 text-lsp-primary group-hover:translate-x-2 transition-transform">→</span>
                        </a>
                    </div>
                </article>
            @empty
                <div class="col-span-3 text-center py-32 bg-white/50 border-2 border-dashed border-slate-200 rounded-[3rem] text-slate-400 font-extrabold uppercase tracking-widest text-xs">
                    No articles found matching your criteria.
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-center pt-10">
            {{ $beritas->links() }}
        </div>
    </div>
</section>
@endsection
