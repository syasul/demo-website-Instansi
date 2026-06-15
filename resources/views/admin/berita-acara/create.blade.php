@extends('layouts.admin')

@section('admin_content')
<!-- Quill editor CSS -->
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />

<div class="max-w-4xl space-y-6">
    <div>
        <a href="{{ route('admin.berita.index') }}" class="text-xs font-semibold text-lsp-accent hover:text-lsp-primary transition-colors">
            ← Kembali ke Daftar Berita
        </a>
        <h1 class="font-heading font-bold text-2xl text-lsp-text mt-4">Tulis Berita Baru</h1>
        <p class="text-xs text-slate-600">Buat artikel, berita acara, atau pengumuman resmi terbaru.</p>
    </div>

    <div class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 shadow-sm">
        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="space-y-2">
                <label for="judul" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Judul Berita</label>
                <input type="text" name="judul" id="judul" value="{{ old('judul') }}" required class="w-full bg-white border @error('judul') border-rose-500 @else border-slate-200 @enderror rounded-xl px-4 py-3 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">
                @error('judul') <span class="text-[10px] text-rose-600 block mt-1">{{ $message }}</span> @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="space-y-2">
                    <label for="kategori" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Kategori</label>
                    <input type="text" name="kategori" id="kategori" value="{{ old('kategori', 'Kegiatan') }}" required placeholder="Contoh: Pengumuman, Skema, dll" class="w-full bg-white border @error('kategori') border-rose-500 @else border-slate-200 @enderror rounded-xl px-4 py-3 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">
                    @error('kategori') <span class="text-[10px] text-rose-600 block mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="space-y-2">
                    <label for="penulis" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Penulis / Penanggung Jawab</label>
                    <input type="text" name="penulis" id="penulis" value="{{ old('penulis', auth()->user()->name) }}" required class="w-full bg-white border @error('penulis') border-rose-500 @else border-slate-200 @enderror rounded-xl px-4 py-3 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">
                    @error('penulis') <span class="text-[10px] text-rose-600 block mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="space-y-2">
                    <label for="tanggal" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Tanggal Rilis</label>
                    <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" required class="w-full bg-white border @error('tanggal') border-rose-500 @else border-slate-200 @enderror rounded-xl px-4 py-3 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">
                    @error('tanggal') <span class="text-[10px] text-rose-600 block mt-1">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="status" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Status Publikasi</label>
                    <select name="status" id="status" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft (Simpan Internal)</option>
                        <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published (Terbit Publik)</option>
                    </select>
                </div>

                <div class="space-y-2">
                    <label for="thumbnail" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Gambar Cover / Thumbnail (Maks 2MB)</label>
                    <input type="file" name="thumbnail" id="thumbnail" class="w-full bg-white border @error('thumbnail') border-rose-500 @else border-slate-200 @enderror rounded-xl px-4 py-2 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">
                    @error('thumbnail') <span class="text-[10px] text-rose-600 block mt-1">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Content Area (Quill WYSIWYG) -->
            <div class="space-y-2">
                <label class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Isi Konten Berita</label>
                <div id="editor-container" class="min-h-[300px] border border-slate-200 rounded-xl bg-white text-lsp-text"></div>
                <input type="hidden" name="konten" id="konten" value="{{ old('konten') }}">
                @error('konten') <span class="text-[10px] text-rose-600 block mt-1">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="w-full py-4 rounded-xl bg-gradient-to-r from-lsp-primary to-lsp-accent text-white font-semibold text-xs tracking-wide hover:shadow-lg hover:shadow-lsp-primary/20 transition-all duration-300">
                PUBLIKASIKAN ARTIKEL BARU
            </button>
        </form>
    </div>
</div>

<!-- Quill editor JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        if (typeof Quill !== 'undefined') {
            const quill = new Quill('#editor-container', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{ header: [1, 2, 3, false] }],
                        ['bold', 'italic', 'underline', 'strike'],
                        ['link', 'blockquote', 'code-block'],
                        [{ list: 'ordered' }, { list: 'bullet' }],
                        ['clean']
                    ]
                }
            });

            // Set initial content if old() exists
            const inputField = document.getElementById('konten');
            if (inputField.value) {
                quill.root.innerHTML = inputField.value;
            }

            // Sync on form submit
            const form = inputField.closest('form');
            form.addEventListener('submit', () => {
                inputField.value = quill.root.innerHTML;
            });
        }
    });
</script>

<style>
    /* Customize Quill styles to fit light mode */
    .ql-toolbar.ql-snow {
        border-color: #e2e8f0 !important;
        background: #f8fafc;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
    }
    .ql-container.ql-snow {
        border-color: #e2e8f0 !important;
        border-bottom-left-radius: 12px;
        border-bottom-right-radius: 12px;
        font-family: inherit;
        font-size: 13px;
    }
    .ql-stroke {
        stroke: #64748b !important;
    }
    .ql-fill {
        fill: #64748b !important;
    }
    .ql-picker {
        color: #64748b !important;
    }
</style>
@endsection
