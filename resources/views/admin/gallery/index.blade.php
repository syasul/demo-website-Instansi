@extends('layouts.admin')

@section('admin_content')
<div class="space-y-6">
    <div>
        <h1 class="font-heading font-bold text-2xl text-lsp-text">Kelola Galeri Foto</h1>
        <p class="text-xs text-slate-600">Unggah foto kegiatan LSP, ganti judul dokumentasi, atau hapus album foto.</p>
    </div>

    <!-- Upload Box -->
    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-4">
        <h3 class="font-heading font-bold text-lsp-text text-sm">Unggah Foto Baru (Bisa Banyak)</h3>
        
        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            
            <div class="border-2 border-dashed border-slate-200 rounded-2xl p-8 text-center hover:border-lsp-accent transition-colors relative cursor-pointer group bg-slate-50/50">
                <input type="file" name="files[]" id="files" multiple required class="absolute inset-0 opacity-0 cursor-pointer w-full h-full">
                <div class="flex justify-center mb-2">
                    <svg class="h-8 w-8 text-slate-400 group-hover:scale-110 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                    </svg>
                </div>
                <span class="block text-xs font-bold text-slate-600">Pilih atau Drag beberapa foto sekaligus</span>
                <span class="block text-[10px] text-slate-500 mt-1">Maksimal 5MB per file (format: JPG, PNG, WEBP, SVG)</span>
            </div>

            <button type="submit" class="px-6 py-3 rounded-xl bg-lsp-primary text-white text-xs font-semibold hover:bg-lsp-primary/95 transition-all">
                Mulai Unggah Galeri
            </button>
        </form>
    </div>

    <!-- Photo Grid -->
    <div class="space-y-4">
        <h3 class="font-heading font-bold text-lsp-text text-sm">Album Foto Kegiatan</h3>
        
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-6">
            @forelse($galleryItems as $item)
                <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden flex flex-col group relative shadow-sm">
                    <div class="aspect-square w-full bg-slate-100 overflow-hidden relative">
                        <img src="{{ asset($item->file_path) }}" alt="" class="object-cover w-full h-full">
                        
                        <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST" class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity" onsubmit="return confirm('Hapus foto ini dari galeri?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="h-8 w-8 rounded-lg bg-rose-50 border border-rose-200 text-rose-600 flex items-center justify-center hover:bg-rose-100 transition-colors" title="Hapus foto">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button>
                        </form>
                    </div>

                    <div class="p-4 space-y-1 flex-grow">
                        <span class="block text-[10px] text-slate-500 uppercase tracking-wide">Urutan: {{ $item->urutan }}</span>
                        <span class="block text-xs font-bold text-lsp-text truncate">{{ $item->judul }}</span>
                    </div>
                </div>
            @empty
                <div class="col-span-4 text-center p-12 bg-white border border-slate-200 rounded-2xl text-slate-500">
                    Belum ada foto galeri diunggah.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
