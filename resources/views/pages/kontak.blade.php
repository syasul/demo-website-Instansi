@extends('layouts.app')

@section('content')
<section class="py-16 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        
        <!-- Title Banner -->
        <div class="text-center space-y-4 max-w-3xl mx-auto mb-20" data-aos="fade-up">
            <span class="text-xs font-bold tracking-widest text-lsp-accent uppercase">HUBUNGI KAMI</span>
            <h1 class="font-heading font-bold text-4xl sm:text-5xl text-lsp-text tracking-tight">
                Hubungi Layanan <span class="text-gradient">LSP Jember</span>
            </h1>
            <p class="text-slate-600 text-sm leading-relaxed">
                Kirimkan pertanyaan, saran, atau proposal kemitraan Anda. Tim administrasi kami akan merespons secepat mungkin.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start mb-20">
            <!-- Left Info Cards -->
            <div class="lg:col-span-5 space-y-8" data-aos="fade-right">
                <div class="bg-white border border-slate-200/80 rounded-3xl p-8 space-y-6 shadow-sm">
                    <h3 class="font-heading font-bold text-lsp-text text-lg">Informasi Kontak</h3>
                    
                    <div class="space-y-6 text-sm text-slate-600">
                        <div class="flex items-start">
                            <span class="text-2xl mr-4">📍</span>
                            <div>
                                <span class="block font-bold text-lsp-text mb-1">Alamat Kantor</span>
                                {{ $alamat ?? 'Jl. Mastrip No. 164, Jember, Jawa Timur 68121' }}
                            </div>
                        </div>
                        <div class="flex items-start">
                            <span class="text-2xl mr-4">📞</span>
                            <div>
                                <span class="block font-bold text-lsp-text mb-1">Telepon Resmi</span>
                                {{ $telepon ?? '(0331) 1234567' }}
                            </div>
                        </div>
                        <div class="flex items-start">
                            <span class="text-2xl mr-4">✉️</span>
                            <div>
                                <span class="block font-bold text-lsp-text mb-1">E-mail Hubungan</span>
                                {{ $email ?? 'info@lsp-jember.com' }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- WhatsApp floating prompt -->
                <div class="bg-emerald-50 border border-emerald-200 rounded-3xl p-6 text-center space-y-3">
                    <p class="text-xs text-emerald-800">Ingin respons instan chat 1-on-1?</p>
                    <a href="https://wa.me/628123456789" target="_blank" class="w-full py-3 rounded-2xl bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-xs tracking-wide inline-flex items-center justify-center transition-colors duration-300">
                        💬 HUBUNGI VIA WHATSAPP
                    </a>
                </div>
            </div>

            <!-- Right Form Container -->
            <div class="lg:col-span-7" data-aos="fade-left">
                <div class="bg-white border border-slate-200 rounded-3xl p-8 sm:p-10 space-y-6 shadow-lg relative">
                    <h3 class="font-heading font-bold text-lsp-text text-xl">Kirim Formulir Hubung</h3>

                    <!-- Alerts -->
                    @if(session('success'))
                        <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-600 text-xs">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-600 text-xs">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('kontak.send') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="nama" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Nama Anda</label>
                                <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required class="w-full bg-white border @error('nama') border-rose-500 @else border-slate-200 @enderror rounded-2xl px-4 py-3 text-xs text-lsp-text placeholder-slate-400 focus:outline-none focus:border-lsp-accent">
                                @error('nama') <span class="text-[10px] text-rose-600 block mt-1">{{ $message }}</span> @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="email" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">E-mail Valid</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required class="w-full bg-white border @error('email') border-rose-500 @else border-slate-200 @enderror rounded-2xl px-4 py-3 text-xs text-lsp-text placeholder-slate-400 focus:outline-none focus:border-lsp-accent">
                                @error('email') <span class="text-[10px] text-rose-600 block mt-1">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="subject" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Subjek Pesan</label>
                            <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required class="w-full bg-white border @error('subject') border-rose-500 @else border-slate-200 @enderror rounded-2xl px-4 py-3 text-xs text-lsp-text placeholder-slate-400 focus:outline-none focus:border-lsp-accent">
                            @error('subject') <span class="text-[10px] text-rose-600 block mt-1">{{ $message }}</span> @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="pesan" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Isi Pesan</label>
                            <textarea name="pesan" id="pesan" rows="5" required class="w-full bg-white border @error('pesan') border-rose-500 @else border-slate-200 @enderror rounded-2xl px-4 py-3 text-xs text-lsp-text placeholder-slate-400 focus:outline-none focus:border-lsp-accent">{{ old('pesan') }}</textarea>
                            @error('pesan') <span class="text-[10px] text-rose-600 block mt-1">{{ $message }}</span> @enderror
                        </div>

                        <button type="submit" class="w-full py-4 rounded-2xl bg-gradient-to-r from-lsp-primary to-lsp-accent text-white font-semibold text-xs tracking-wide hover:shadow-lg hover:shadow-lsp-primary/20 hover:scale-[1.01] active:scale-95 transition-all duration-300">
                            KIRIM SEKARANG
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Google Maps Full width embed -->
        <div class="w-full h-96 rounded-3xl overflow-hidden border border-slate-200 shadow-2xl relative" data-aos="zoom-in">
            {!! $maps ?? '<iframe class="w-full h-full border-0" src="https://maps.google.com/maps?q=Politeknik%20Negeri%20Jember&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>' !!}
        </div>
    </div>
</section>
@endsection
