@extends('layouts.admin')

@section('admin_content')
<div class="max-w-4xl space-y-6">
    <div>
        <h1 class="font-heading font-bold text-2xl text-lsp-text">Pengaturan Situs & SEO</h1>
        <p class="text-xs text-slate-600">Kelola informasi kontak dasar, peta lokasi, tag metadata SEO, dan status pemeliharaan situs.</p>
    </div>

    <div class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 shadow-sm">
        <form action="{{ route('admin.pengaturan.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Maintenance Mode -->
            <div class="p-4 rounded-2xl bg-amber-50 border border-amber-200 space-y-3">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <div>
                        <h3 class="text-xs font-bold text-amber-800 uppercase tracking-wider">Mode Pemeliharaan (Maintenance Mode)</h3>
                        <p class="text-[10px] text-amber-700">Aktifkan ini untuk menutup akses publik dan mengalihkan ke halaman pemeliharaan.</p>
                    </div>
                    
                    <select name="maintenance_mode" class="bg-white border border-slate-200 rounded-xl px-4 py-2 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">
                        <option value="0" {{ $settings['maintenance_mode'] === '0' ? 'selected' : '' }}>Nonaktif (Situs Online)</option>
                        <option value="1" {{ $settings['maintenance_mode'] === '1' ? 'selected' : '' }}>Aktif (Situs Offline)</option>
                    </select>
                </div>
            </div>

            <!-- SEO Settings -->
            <div class="border-t border-slate-200/60 pt-6 space-y-4">
                <h3 class="font-heading font-bold text-lsp-text text-sm">Metadata SEO</h3>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="site_name" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Nama Situs (Site Name)</label>
                        <input type="text" name="site_name" id="site_name" value="{{ old('site_name', $settings['site_name']) }}" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">
                    </div>

                    <div class="space-y-2">
                        <label for="meta_title" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">SEO Meta Title</label>
                        <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $settings['meta_title']) }}" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="meta_description" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">SEO Meta Description</label>
                    <textarea name="meta_description" id="meta_description" rows="3" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">{{ old('meta_description', $settings['meta_description']) }}</textarea>
                </div>

                <div class="space-y-2">
                    <label for="meta_keywords" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">SEO Meta Keywords (Pisahkan dengan koma)</label>
                    <input type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords', $settings['meta_keywords']) }}" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">
                </div>
            </div>

            <!-- Contact Settings -->
            <div class="border-t border-slate-200/60 pt-6 space-y-4">
                <h3 class="font-heading font-bold text-lsp-text text-sm">Hubungi & Kontak Informasi</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="kontak_telepon" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Nomor Telepon Kantor</label>
                        <input type="text" name="kontak_telepon" id="kontak_telepon" value="{{ old('kontak_telepon', $settings['kontak_telepon']) }}" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">
                    </div>

                    <div class="space-y-2">
                        <label for="kontak_email" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Alamat E-mail Resmi</label>
                        <input type="email" name="kontak_email" id="kontak_email" value="{{ old('kontak_email', $settings['kontak_email']) }}" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="kontak_alamat" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Alamat Fisik Lengkap</label>
                    <textarea name="kontak_alamat" id="kontak_alamat" rows="3" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">{{ old('kontak_alamat', $settings['kontak_alamat']) }}</textarea>
                </div>

                <div class="space-y-2">
                    <label for="kontak_maps" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Kode Embed Google Maps (iframe src)</label>
                    <textarea name="kontak_maps" id="kontak_maps" rows="4" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">{{ old('kontak_maps', $settings['kontak_maps']) }}</textarea>
                </div>
            </div>

            <button type="submit" class="w-full py-4 rounded-xl bg-gradient-to-r from-lsp-primary to-lsp-accent text-white font-semibold text-xs tracking-wide hover:shadow-lg hover:shadow-lsp-primary/20 transition-all duration-300">
                SIMPAN PENGATURAN SITUS
            </button>
        </form>
    </div>
</div>
@endsection
