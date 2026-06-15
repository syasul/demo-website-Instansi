@extends('layouts.admin')

@section('admin_content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="font-heading font-bold text-2xl text-lsp-text">Kelola Berita Acara</h1>
            <p class="text-xs text-slate-600">Tulis, publikasikan, dan atur penampilan berita di landing page.</p>
        </div>
        <a href="{{ route('admin.berita.create') }}" class="px-5 py-3 rounded-xl bg-lsp-primary text-white text-xs font-semibold hover:bg-lsp-primary/90 transition-all flex items-center justify-center space-x-2">
            <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <span>TULIS BERITA BARU</span>
        </a>
    </div>

    <!-- Table Card -->
    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-600">
                <thead>
                    <tr class="border-b border-slate-100 text-slate-500 font-bold uppercase text-[10px] tracking-wider">
                        <th class="pb-3 w-16">Cover</th>
                        <th class="pb-3">Judul Berita</th>
                        <th class="pb-3">Kategori</th>
                        <th class="pb-3">Tanggal</th>
                        <th class="pb-3">Status</th>
                        <th class="pb-3">Tampil di Home</th>
                        <th class="pb-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($beritas as $news)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="py-3">
                                <div class="h-10 w-16 rounded overflow-hidden bg-slate-100 border border-slate-200/80">
                                    @if($news->thumbnail)
                                        <img src="{{ $news->thumbnail }}" alt="" class="object-cover h-full w-full">
                                    @else
                                        <div class="h-full w-full flex items-center justify-center text-slate-400">
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375 0 11-.75 0 .375 0 01.75 0z" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="py-3 font-semibold text-lsp-text max-w-[240px] truncate">
                                {{ $news->judul }}
                                <span class="block text-[10px] text-slate-500 font-normal">Oleh: {{ $news->penulis }}</span>
                            </td>
                            <td class="py-3">{{ $news->kategori }}</td>
                            <td class="py-3">{{ $news->tanggal->format('d M Y') }}</td>
                            <td class="py-3">
                                <span class="px-2 py-0.5 rounded text-[9px] font-bold uppercase tracking-wider {{ $news->status === 'published' ? 'bg-emerald-50 text-emerald-600 border border-emerald-200' : 'bg-amber-50 text-amber-600 border border-amber-200' }}">
                                    {{ $news->status }}
                                </span>
                            </td>
                            <td class="py-3">
                                <form action="{{ route('admin.berita.toggle-home', $news->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="flex items-center space-x-1.5 px-3 py-1.5 rounded-lg border text-[10px] font-bold tracking-wide uppercase transition-all duration-300 {{ $news->tampil_di_home ? 'bg-indigo-50 border-indigo-200 text-indigo-600 hover:bg-indigo-100' : 'bg-slate-50 border border-slate-200 text-slate-500 hover:bg-slate-100' }}">
                                        @if($news->tampil_di_home)
                                            <svg class="h-3.5 w-3.5 fill-indigo-600 stroke-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499c.195-.39.687-.39.882 0l2.4 4.87 5.38.784c.43.063.602.585.29.892l-3.89 3.792.918 5.358c.074.434-.38.764-.766.559L12 17.25l-4.82 2.532c-.386.205-.84-.125-.766-.56l.92-5.357-3.89-3.793c-.312-.307-.14-.829.29-.892l5.38-.784 2.4-4.87z" />
                                            </svg>
                                            <span>Aktif</span>
                                        @else
                                            <svg class="h-3.5 w-3.5 stroke-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499c.195-.39.687-.39.882 0l2.4 4.87 5.38.784c.43.063.602.585.29.892l-3.89 3.792.918 5.358c.074.434-.38.764-.766.559L12 17.25l-4.82 2.532c-.386.205-.84-.125-.766-.56l.92-5.357-3.89-3.793c-.312-.307-.14-.829.29-.892l5.38-.784 2.4-4.87z" />
                                            </svg>
                                            <span>Pasif</span>
                                        @endif
                                    </button>
                                </form>
                            </td>
                            <td class="py-3 text-right space-x-2">
                                <a href="{{ route('admin.berita.edit', $news->id) }}" class="px-3 py-1.5 bg-indigo-50 hover:bg-indigo-100 text-indigo-600 rounded-lg font-bold border border-indigo-200">
                                    Edit
                                </a>
                                <form action="{{ route('admin.berita.destroy', $news->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1.5 bg-rose-50 hover:bg-rose-100 text-rose-600 rounded-lg font-bold border border-rose-200">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-8 text-center text-slate-500">Belum ada berita dibuat. Silakan klik tombol Tulis Berita Baru.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $beritas->links() }}
        </div>
    </div>
</div>
@endsection
