@extends('layouts.app')

@section('content')
<!-- Kontak Hero -->
<section class="relative py-24 md:py-32 overflow-hidden bg-white">
    <!-- Background Decor -->
    <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/2 w-[600px] h-[600px] bg-lsp-primary/5 rounded-full blur-[120px]"></div>
    
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center space-y-6 max-w-4xl mx-auto mb-20" data-aos="fade-up">
            <span class="inline-block px-3 py-1 rounded-lg bg-emerald-500/10 text-emerald-600 text-[10px] font-extrabold tracking-widest uppercase">CONNECT</span>
            <h1 class="font-heading font-extrabold text-5xl md:text-7xl text-lsp-text tracking-tighter leading-tight">
                Hubungi <span class="text-gradient">Kami.</span>
            </h1>
            <p class="text-lg text-lsp-muted leading-relaxed font-medium">
                Siap berkonsultasi mengenai karir profesional Anda? Tim kami siap menjawab setiap pertanyaan mengenai skema, jadwal, dan pendaftaran.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 md:gap-20 items-start mb-20">
            <!-- Left Info Cards -->
            <div class="lg:col-span-5 space-y-10" data-aos="fade-right">
                <div class="bg-white rounded-[2.5rem] p-10 space-y-10 shadow-2xl shadow-slate-200/50 border border-slate-100 relative overflow-hidden">
                    <div class="absolute -top-10 -right-10 h-32 w-32 bg-lsp-primary/5 rounded-full blur-3xl"></div>
                    <h3 class="font-heading font-extrabold text-lsp-text text-2xl tracking-tight">Direct Channels</h3>
                    
                    <div class="space-y-8">
                        <div class="flex items-start group">
                            <div class="h-12 w-12 shrink-0 rounded-2xl bg-lsp-primary/10 text-lsp-primary flex items-center justify-center text-xl mr-6 group-hover:bg-lsp-primary group-hover:text-white transition-all duration-300">📍</div>
                            <div class="space-y-1">
                                <span class="block text-[10px] font-extrabold text-lsp-muted uppercase tracking-[0.2em]">OFFICE LOCATION</span>
                                <p class="text-sm font-bold text-lsp-text leading-relaxed">
                                    {{ $alamat ?? 'Jl. Mastrip No. 164, Sanford, Jawa Timur 68121' }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start group">
                            <div class="h-12 w-12 shrink-0 rounded-2xl bg-lsp-accent/10 text-lsp-accent flex items-center justify-center text-xl mr-6 group-hover:bg-lsp-accent group-hover:text-white transition-all duration-300">📞</div>
                            <div class="space-y-1">
                                <span class="block text-[10px] font-extrabold text-lsp-muted uppercase tracking-[0.2em]">PHONE & SUPPORT</span>
                                <p class="text-sm font-bold text-lsp-text leading-relaxed">
                                    081330012100 (WEBSITE DEMO)
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start group">
                            <div class="h-12 w-12 shrink-0 rounded-2xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center text-xl mr-6 group-hover:bg-emerald-500 group-hover:text-white transition-all duration-300">✉️</div>
                            <div class="space-y-1">
                                <span class="block text-[10px] font-extrabold text-lsp-muted uppercase tracking-[0.2em]">EMAIL SUPPORT</span>
                                <p class="text-sm font-bold text-lsp-text leading-relaxed">
                                    independenttendiyvisual@gmail.com
                                </p>
                            </div>
                        </div>
                    </div>

                    <hr class="border-slate-100">
                    
                    <div class="space-y-4">
                        <p class="text-[11px] font-bold text-lsp-muted uppercase tracking-widest text-center">Inquiry via WhatsApp (Demo)</p>
                        <a href="https://wa.me/6281330012100" class="w-full py-5 rounded-2xl bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-[11px] tracking-widest flex items-center justify-center shadow-xl shadow-emerald-200 transition-all duration-300">
                            CHAT WITH US NOW
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Form -->
            <div class="lg:col-span-7" data-aos="fade-left">
                <div class="bg-white rounded-[2.5rem] p-10 md:p-14 shadow-2xl shadow-slate-200/50 border border-slate-100 relative overflow-hidden">
                    <h3 class="font-heading font-extrabold text-2xl text-lsp-text mb-8 tracking-tight">Kirim Pesan Cepat</h3>

                    @if(session('success'))
                        <div class="p-5 rounded-2xl bg-emerald-50 border border-emerald-100 text-emerald-600 text-xs font-bold mb-8">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('kontak.send') }}" method="POST" class="space-y-8">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-3">
                                <label class="text-[9px] font-extrabold uppercase tracking-[0.2em] text-lsp-muted ml-2">YOUR NAME</label>
                                <input type="text" name="nama" value="{{ old('nama') }}" required placeholder="Jane Doe" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-xs text-lsp-text placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-lsp-primary/20 focus:bg-white transition-all">
                                @error('nama') <span class="text-[9px] text-rose-600 font-bold ml-2">{{ $message }}</span> @enderror
                            </div>

                            <div class="space-y-3">
                                <label class="text-[9px] font-extrabold uppercase tracking-[0.2em] text-lsp-muted ml-2">EMAIL ADDRESS</label>
                                <input type="email" name="email" value="{{ old('email') }}" required placeholder="jane@example.com" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-xs text-lsp-text placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-lsp-primary/20 focus:bg-white transition-all">
                                @error('email') <span class="text-[9px] text-rose-600 font-bold ml-2">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="space-y-3">
                            <label class="text-[9px] font-extrabold uppercase tracking-[0.2em] text-lsp-muted ml-2">SUBJECT</label>
                            <input type="text" name="subject" value="{{ old('subject') }}" required placeholder="Inquiry about certification..." class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-xs text-lsp-text placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-lsp-primary/20 focus:bg-white transition-all">
                            @error('subject') <span class="text-[9px] text-rose-600 font-bold ml-2">{{ $message }}</span> @enderror
                        </div>

                        <div class="space-y-3">
                            <label class="text-[9px] font-extrabold uppercase tracking-[0.2em] text-lsp-muted ml-2">MESSAGE</label>
                            <textarea name="pesan" rows="6" required placeholder="How can we help you today?" class="w-full bg-slate-50 border border-slate-100 rounded-2xl px-6 py-5 text-xs text-lsp-text placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-lsp-primary/20 focus:bg-white transition-all">{{ old('pesan') }}</textarea>
                            @error('pesan') <span class="text-[9px] text-rose-600 font-bold ml-2">{{ $message }}</span> @enderror
                        </div>

                        <button type="submit" class="w-full py-5 rounded-2xl bg-slate-900 text-white font-extrabold text-[11px] tracking-widest hover:bg-lsp-primary transition-all duration-500 shadow-xl shadow-slate-200">
                            SEND MESSAGE NOW
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Google Maps -->
        <div class="w-full h-[500px] rounded-[3rem] overflow-hidden border border-slate-100 shadow-3xl relative mb-20" data-aos="zoom-in">
            {!! $maps ?? '<iframe class="w-full h-full border-0 grayscale invert opacity-70" src="https://maps.google.com/maps?q=Politeknik%20Negeri%20Sanford&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>' !!}
        </div>
    </div>
</section>
@endsection
