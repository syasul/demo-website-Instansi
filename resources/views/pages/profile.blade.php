@extends('layouts.app')

@section('content')
<section class="py-16 relative overflow-hidden">
    <div class="absolute inset-0 bg-[linear-gradient(to_right,#e2e8f0_1px,transparent_1px),linear-gradient(to_bottom,#e2e8f0_1px,transparent_1px)] bg-[size:6rem_6rem] opacity-40"></div>
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <!-- Page Title Header -->
        <div class="text-center space-y-4 max-w-3xl mx-auto mb-20" data-aos="fade-up">
            <span class="text-xs font-bold tracking-widest text-lsp-accent uppercase">PROFIL LENGKAP</span>
            <h1 class="font-heading font-bold text-4xl sm:text-5xl text-lsp-text tracking-tight leading-none">
                Mengenal <span class="text-gradient">LSP Jember</span>
            </h1>
            <p class="text-slate-600 text-sm leading-relaxed">
                Menyelami sejarah berdirinya, arah visi misi, hingga jajaran pengurus komite pelaksana sertifikasi kompetensi.
            </p>
        </div>

        <!-- History Content -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start mb-24">
            <div class="lg:col-span-7 space-y-6" data-aos="fade-right">
                <h2 class="font-heading font-bold text-2xl text-lsp-text">Sejarah Berdiri</h2>
                <div class="text-slate-600 text-sm leading-relaxed space-y-4">
                    <p>
                        {{ $about_history ?? 'LSP Jember didirikan sebagai lembaga sertifikasi kompetensi kerja berlisensi resmi dari Badan Nasional Sertifikasi Profesi (BNSP). Berawal dari inisiatif untuk menjembatani kompetensi SDM lokal dengan kualifikasi standar industri, kami terus berkembang menjadi pilar penting di kawasan Jember dan Jawa Timur.' }}
                    </p>
                    <p>
                        Dengan didukung sarana Tempat Uji Kompetensi (TUK) yang terverifikasi dan asesor berlisensi resmi, kami menjamin seluruh proses asesmen dilakukan secara objektif, fair, transparan, dan dapat dipertanggungjawabkan hasilnya.
                    </p>
                </div>
            </div>

            <!-- Side visual info -->
            <div class="lg:col-span-5" data-aos="fade-left">
                <div class="bg-white border border-slate-200/80 rounded-3xl p-8 space-y-6 shadow-sm relative overflow-hidden">
                    <div class="absolute -top-10 -right-10 h-32 w-32 bg-lsp-accent/5 rounded-full blur-2xl"></div>
                    <h3 class="font-heading font-bold text-lsp-text text-lg">Mengapa Memilih Kami?</h3>
                    
                    <ul class="space-y-4 text-xs text-slate-600">
                        <li class="flex items-start">
                            <span class="text-lsp-accent mr-3">✔️</span>
                            <div>
                                <span class="block font-bold text-lsp-text mb-1">Berlisensi Resmi BNSP</span>
                                Sertifikat berlambang garuda diakui secara nasional oleh negara dan asosiasi industri.
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span class="text-lsp-accent mr-3">✔️</span>
                            <div>
                                <span class="block font-bold text-lsp-text mb-1">Asesor Kompeten</span>
                                Diuji langsung oleh praktisi berpengalaman dan bersertifikat asesor BNSP.
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span class="text-lsp-accent mr-3">✔️</span>
                            <div>
                                <span class="block font-bold text-lsp-text mb-1">TUK Terstandardisasi</span>
                                Fasilitas laboratorium komputer dan jaringan modern yang nyaman untuk mendukung ujian asesi.
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Vision and Mission Grid Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-24">
            <!-- Visi Card -->
            <div class="bg-white border border-slate-200 rounded-3xl p-8 sm:p-10 relative overflow-hidden shadow-sm" data-aos="fade-up">
                <div class="absolute top-0 left-0 w-full h-[3px] bg-lsp-primary"></div>
                <div class="h-12 w-12 rounded-xl bg-lsp-primary/10 text-lsp-accent flex items-center justify-center text-2xl font-bold mb-6">
                    🎯
                </div>
                <h3 class="font-heading font-bold text-xl text-lsp-text mb-4">Visi LSP Jember</h3>
                <p class="text-sm text-slate-600 leading-relaxed italic">
                    "{{ $about_visi ?? 'Menjadi Lembaga Sertifikasi yang unggul, terpercaya, dan berdaya saing global.' }}"
                </p>
            </div>

            <!-- Misi Card -->
            <div class="bg-white border border-slate-200 rounded-3xl p-8 sm:p-10 relative overflow-hidden shadow-sm" data-aos="fade-up" data-aos-delay="100">
                <div class="absolute top-0 left-0 w-full h-[3px] bg-lsp-accent"></div>
                <div class="h-12 w-12 rounded-xl bg-lsp-accent/10 text-lsp-accent flex items-center justify-center text-2xl font-bold mb-6">
                    ⚡
                </div>
                <h3 class="font-heading font-bold text-xl text-lsp-text mb-4">Misi LSP Jember</h3>
                <div class="text-sm text-slate-600 space-y-3 leading-relaxed">
                    @if(isset($about_misi) && $about_misi)
                        {!! nl2br(e($about_misi)) !!}
                    @else
                        1. Menyelenggarakan sertifikasi kompetensi kerja secara profesional dan akuntabel.<br>
                        2. Mengembangkan skema sertifikasi sesuai tuntutan kebutuhan pasar kerja.<br>
                        3. Memelihara kompetensi tenaga kerja bersertifikat.
                    @endif
                </div>
            </div>
        </div>

        <!-- Organizational Structure Section -->
        <div class="space-y-12" data-aos="fade-up">
            <div class="text-center space-y-2 mb-16">
                <h2 class="font-heading font-bold text-2xl text-lsp-text">Struktur Organisasi</h2>
                <p class="text-slate-600 text-sm max-w-xl mx-auto">
                    Jajaran komite eksekutif pelaksana operasional harian Lembaga Sertifikasi Profesi Jember.
                </p>
            </div>

            <!-- Tech diagram tree design -->
            <div class="max-w-4xl mx-auto flex flex-col items-center space-y-8 relative">
                <!-- Line connection guides -->
                <div class="absolute top-12 bottom-6 left-1/2 w-[2px] bg-slate-300 -z-10 hidden sm:block"></div>

                <!-- 1. Ketua LSP -->
                <div class="bg-white border border-lsp-accent/40 rounded-2xl p-6 text-center w-64 shadow-xl">
                    <span class="block text-[10px] font-bold tracking-widest text-lsp-accent uppercase mb-1">KETUA LSP</span>
                    <span class="block font-heading font-bold text-lsp-text text-base">Dr. Ir. Hermawan, M.T.</span>
                    <span class="block text-[11px] text-slate-500 mt-1">Direktur Utama Eksekutif</span>
                </div>

                <!-- 2. Komite Skema -->
                <div class="flex flex-col sm:flex-row gap-8 sm:gap-32 w-full justify-center">
                    <!-- Left: Bagian Administrasi -->
                    <div class="bg-white border border-slate-200 rounded-2xl p-5 text-center w-60 self-center shadow-md">
                        <span class="block text-[9px] font-bold tracking-widest text-lsp-primary uppercase mb-1">MANAJER ADMIN & KEUANGAN</span>
                        <span class="block font-heading font-bold text-lsp-text text-sm">Rina Amelia, S.E.</span>
                    </div>

                    <!-- Right: Manajer Standardisasi / Sertifikasi -->
                    <div class="bg-white border border-slate-200 rounded-2xl p-5 text-center w-60 self-center shadow-md">
                        <span class="block text-[9px] font-bold tracking-widest text-lsp-primary uppercase mb-1">MANAJER SERTIFIKASI</span>
                        <span class="block font-heading font-bold text-lsp-text text-sm">Bambang Wijaya, M.Kom.</span>
                    </div>
                </div>

                <!-- 3. Manajer Mutu -->
                <div class="bg-white border border-slate-200 rounded-2xl p-5 text-center w-60 shadow-md">
                    <span class="block text-[9px] font-bold tracking-widest text-lsp-primary uppercase mb-1">MANAJER MUTU & PENJAMINAN</span>
                    <span class="block font-heading font-bold text-lsp-text text-sm">Drs. Ahmad Fauzi, M.T.</span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
