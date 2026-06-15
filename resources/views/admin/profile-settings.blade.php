@extends('layouts.admin')

@section('admin_content')
<div class="max-w-2xl space-y-6">
    <div>
        <h1 class="font-heading font-bold text-2xl text-lsp-text">Pengaturan Akun</h1>
        <p class="text-xs text-slate-600">Perbarui informasi nama, alamat email, dan ubah password akun administrator Anda.</p>
    </div>

    <div class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 shadow-sm">
        <form action="{{ route('admin.profile.settings.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="space-y-2">
                <label for="name" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Nama Lengkap</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required class="w-full bg-white border @error('name') border-rose-500 @else border-slate-200 @enderror rounded-xl px-4 py-3 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">
                @error('name') <span class="text-[10px] text-rose-600 block mt-1">{{ $message }}</span> @enderror
            </div>

            <div class="space-y-2">
                <label for="email" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Alamat Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required class="w-full bg-white border @error('email') border-rose-500 @else border-slate-200 @enderror rounded-xl px-4 py-3 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">
                @error('email') <span class="text-[10px] text-rose-600 block mt-1">{{ $message }}</span> @enderror
            </div>

            <div class="border-t border-slate-200/60 pt-6 space-y-4">
                <h3 class="font-heading font-bold text-lsp-text text-sm">Ganti Password (Opsional)</h3>
                <p class="text-[11px] text-slate-500">Kosongkan jika Anda tidak ingin mengubah password akun.</p>

                <div class="space-y-4">
                    <div class="space-y-2">
                        <label for="current_password" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Password Saat Ini</label>
                        <input type="password" name="current_password" id="current_password" class="w-full bg-white border @error('current_password') border-rose-500 @else border-slate-200 @enderror rounded-xl px-4 py-3 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">
                        @error('current_password') <span class="text-[10px] text-rose-600 block mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="new_password" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Password Baru</label>
                            <input type="password" name="new_password" id="new_password" class="w-full bg-white border @error('new_password') border-rose-500 @else border-slate-200 @enderror rounded-xl px-4 py-3 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">
                            @error('new_password') <span class="text-[10px] text-rose-600 block mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="new_password_confirmation" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Konfirmasi Password Baru</label>
                            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="w-full py-3.5 rounded-xl bg-gradient-to-r from-lsp-primary to-lsp-accent text-white font-semibold text-xs tracking-wide hover:shadow-lg hover:shadow-lsp-primary/20 transition-all duration-300">
                SIMPAN PERUBAHAN AKUN
            </button>
        </form>
    </div>
</div>
@endsection
