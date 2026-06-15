@extends('layouts.admin')

@section('admin_content')
<div class="space-y-8">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="font-heading font-bold text-2xl text-lsp-text">Dashboard Overview</h1>
            <p class="text-xs text-slate-600">Selamat datang kembali di panel administrasi portal LSP Jember.</p>
        </div>
        <span class="text-xs text-slate-600 font-semibold px-4 py-2 bg-white rounded-xl border border-slate-200 shadow-sm">
            Hari Ini: {{ date('d F Y') }}
        </span>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-sm relative overflow-hidden">
            <svg class="h-6 w-6 text-lsp-primary mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
            </svg>
            <span class="block text-[10px] font-bold tracking-wider text-slate-500 uppercase">Total Rilisan Berita</span>
            <span class="block font-heading font-bold text-3xl text-lsp-text mt-1">{{ $totalBerita }}</span>
        </div>
        <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-sm relative overflow-hidden">
            <svg class="h-6 w-6 text-lsp-primary mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.053.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
            </svg>
            <span class="block text-[10px] font-bold tracking-wider text-slate-500 uppercase">Skema Sertifikasi</span>
            <span class="block font-heading font-bold text-3xl text-lsp-text mt-1">{{ $totalSertifikasi }}</span>
        </div>
        <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-sm relative overflow-hidden">
            <svg class="h-6 w-6 text-lsp-primary mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375 0 11-.75 0 .375 0 01.75 0z" />
            </svg>
            <span class="block text-[10px] font-bold tracking-wider text-slate-500 uppercase">Foto di Galeri</span>
            <span class="block font-heading font-bold text-3xl text-lsp-text mt-1">{{ $totalGallery }}</span>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Latest News -->
        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-6">
            <h3 class="font-heading font-bold text-lsp-text text-base">Berita Terbaru</h3>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-600">
                    <thead>
                        <tr class="border-b border-slate-100 text-slate-500 font-bold uppercase text-[10px] tracking-wider">
                            <th class="pb-3">Judul Berita</th>
                            <th class="pb-3">Tanggal</th>
                            <th class="pb-3">Status</th>
                            <th class="pb-3 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($latestNews as $news)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="py-3 font-semibold text-lsp-text max-w-[200px] truncate">
                                    {{ $news->judul }}
                                </td>
                                <td class="py-3">{{ $news->tanggal->format('d M Y') }}</td>
                                <td class="py-3">
                                    <span class="px-2 py-0.5 rounded text-[9px] font-bold uppercase tracking-wider {{ $news->status === 'published' ? 'bg-emerald-50 text-emerald-600 border border-emerald-200' : 'bg-amber-50 text-amber-600 border border-amber-200' }}">
                                        {{ $news->status }}
                                    </span>
                                </td>
                                <td class="py-3 text-right">
                                    <a href="{{ route('admin.berita.edit', $news->id) }}" class="text-lsp-accent hover:underline font-bold">Edit</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-8 text-center text-slate-500">Belum ada berita dibuat.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Quick actions -->
        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-6">
            <h3 class="font-heading font-bold text-lsp-text text-base">Aksi Cepat</h3>
            
            <div class="flex flex-col gap-3">
                <a href="{{ route('admin.berita.create') }}" class="w-full py-3 px-4 rounded-xl bg-slate-50 hover:bg-slate-100/80 text-slate-700 text-xs font-semibold tracking-wide border border-slate-200 flex items-center justify-between transition-all">
                    <span class="flex items-center space-x-2">
                        <svg class="h-4 w-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                        <span>Buat Berita Acara Baru</span>
                    </span>
                    <span>➔</span>
                </a>
                <a href="{{ route('admin.galeri.index') }}" class="w-full py-3 px-4 rounded-xl bg-slate-50 hover:bg-slate-100/80 text-slate-700 text-xs font-semibold tracking-wide border border-slate-200 flex items-center justify-between transition-all">
                    <span class="flex items-center space-x-2">
                        <svg class="h-4 w-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375 0 11-.75 0 .375 0 01.75 0z" />
                        </svg>
                        <span>Unggah Album Foto Galeri</span>
                    </span>
                    <span>➔</span>
                </a>
                <a href="{{ route('admin.pengaturan.index') }}" class="w-full py-3 px-4 rounded-xl bg-slate-50 hover:bg-slate-100/80 text-slate-700 text-xs font-semibold tracking-wide border border-slate-200 flex items-center justify-between transition-all">
                    <span class="flex items-center space-x-2">
                        <svg class="h-4 w-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.43l-1.003.828c-.293.241-.438.613-.43.992a7.723 7.723 0 010 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.43l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.992l-1.004-.827a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.645-.869l.214-1.28z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>Edit Pengaturan SEO & Kontak</span>
                    </span>
                    <span>➔</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
