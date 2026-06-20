@extends('layouts.app')

@section('content')
<!-- Profil Hero -->
<section class="relative py-32 md:py-48 overflow-hidden bg-slate-950">
    <div class="absolute inset-0 z-0 opacity-20 bg-[radial-gradient(#6366f1_1px,transparent_1px)] bg-[size:4rem_4rem]"></div>
    <div class="absolute top-1/2 left-0 w-full h-px bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>
    <div class="absolute inset-0 bg-[url('https://res.cloudinary.com/dydlv7s4w/image/upload/v1661858593/texture_grain_k2e9w8.png')] opacity-10 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center space-y-8 max-w-4xl mx-auto" data-aos="fade-up">
            <div class="inline-flex items-center space-x-3 px-4 py-2 rounded-full glass-effect border border-white/10 shadow-2xl">
                <span class="text-[9px] font-black tracking-[0.4em] uppercase text-white/70">ESTABLISHED QUALITY • BNSP LICENSED</span>
            </div>
            <h1 class="font-heading font-black text-6xl md:text-8xl text-white tracking-tighter leading-tight">
                Modern <span class="text-gradient">Legacy.</span>
            </h1>
            <p class="text-xl text-slate-400 leading-relaxed font-medium max-w-2xl mx-auto">
                Pusat keunggulan sertifikasi kompetensi profesi di kawasan Sanford yang berorientasi pada standar kualitas industri global dan integritas tinggi.
            </p>
        </div>
    </div>
</section>

<section class="py-40 relative bg-white">
    <!-- Technical Markers -->
    <div class="absolute top-40 left-10 text-[8px] font-black text-slate-200 tracking-[1em] vertical-text hidden xl:block">IDENTITY.CORE.V.2</div>
    
    <div class="max-w-7xl mx-auto px-6">
        <!-- History Content -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-24 items-start mb-40">
            <article class="lg:col-span-7 space-y-12" data-aos="fade-right">
                <div class="space-y-6">
                    <span class="inline-block px-4 py-1.5 rounded-full bg-indigo-600/5 text-indigo-600 text-[10px] font-black tracking-[0.3em] uppercase">THE GENESIS</span>
                    <h2 class="font-heading font-black text-4xl text-slate-900 tracking-tighter leading-tight">Mewujudkan Standar <span class="text-indigo-600">Kompetensi Nasional.</span></h2>
                    
                    <div class="text-slate-500 text-lg leading-relaxed space-y-8 font-medium">
                        <p>
                            {{ $about_history ?? config('app.name') . ' didirikan sebagai lembaga sertifikasi kompetensi kerja berlisensi resmi dari Badan Nasional Sertifikasi Profesi (BNSP). Berawal dari inisiatif untuk menjembatani kompetensi SDM lokal dengan kualifikasi standar industri, kami terus berkembang menjadi pilar penting di kawasan Sanford dan Jawa Timur.' }}
                        </p>
                        <p>
                            Dengan didukung sarana Tempat Uji Kompetensi (TUK) yang terverifikasi dan asesor berlisensi resmi, kami menjamin seluruh proses asesmen dilakukan secara objektif, fair, transparan, dan dapat dipertanggungjawabkan hasilnya sesuai dengan regulasi yang berlaku.
                        </p>
                    </div>
                </div>
            </article>

            <!-- Side visual info -->
            <aside class="lg:col-span-5" data-aos="fade-left">
                <div class="bg-slate-50 rounded-[3.5rem] p-12 space-y-10 border border-slate-100 relative overflow-hidden group shadow-sm">
                    <div class="absolute -top-20 -right-20 h-64 w-64 bg-indigo-600/5 rounded-full blur-3xl group-hover:scale-110 transition-transform duration-700"></div>
                    <h3 class="font-heading font-black text-slate-900 text-2xl tracking-tighter">Strategic Pillars</h3>
                    
                    <ul class="space-y-8">
                        @php
                            $pillars = [
                                ['icon' => '✓', 'title' => 'BNSP LICENSED', 'desc' => 'Sertifikat resmi berlogo Garuda yang diakui secara nasional.', 'color' => 'indigo'],
                                ['icon' => '★', 'title' => 'EXPERT ASESORS', 'desc' => 'Asesmen oleh praktisi ahli dengan jam terbang tinggi.', 'color' => 'amber'],
                                ['icon' => '⚡', 'title' => 'MODERN TUK', 'desc' => 'Fasilitas uji kompetensi standar teknologi terbaru.', 'color' => 'emerald']
                            ];
                        @endphp
                        @foreach($pillars as $p)
                            <li class="flex items-start group/pill">
                                <div class="h-12 w-12 shrink-0 rounded-2xl bg-white text-{{ $p['color'] }}-600 flex items-center justify-center font-black mr-6 shadow-sm group-hover/pill:bg-{{ $p['color'] }}-600 group-hover/pill:text-white transition-all duration-500">{{ $p['icon'] }}</div>
                                <div>
                                    <h5 class="font-heading font-black text-[11px] text-slate-900 uppercase tracking-widest mb-2">{{ $p['title'] }}</h5>
                                    <p class="text-sm text-slate-500 leading-relaxed font-medium">{{ $p['desc'] }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </aside>
        </div>

        <!-- Vision and Mission Refinement -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-40">
            <!-- Visi Card -->
            <div class="card-hover group bg-slate-950 rounded-[3.5rem] p-16 relative overflow-hidden shadow-2xl" data-aos="fade-up">
                <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-5"></div>
                <div class="h-16 w-16 rounded-[1.5rem] bg-indigo-600 text-white flex items-center justify-center text-3xl mb-12 shadow-xl shadow-indigo-500/20">🎯</div>
                <h3 class="font-heading font-black text-3xl text-white mb-6 tracking-tighter">Vision Excellence</h3>
                <p class="text-xl text-slate-400 leading-relaxed font-medium italic">
                    "{{ $about_visi ?? 'Menjadi Lembaga Sertifikasi yang unggul, terpercaya, dan berdaya saing global secara berkelanjutan.' }}"
                </p>
            </div>

            <!-- Misi Card -->
            <div class="card-hover group bg-white rounded-[3.5rem] p-16 relative overflow-hidden shadow-sm border border-slate-100" data-aos="fade-up" data-aos-delay="150">
                <div class="h-16 w-16 rounded-[1.5rem] bg-slate-900 text-white flex items-center justify-center text-3xl mb-12 shadow-xl shadow-slate-200">⚡</div>
                <h3 class="font-heading font-black text-3xl text-slate-900 mb-6 tracking-tighter">Core Mission</h3>
                <div class="text-lg text-slate-500 space-y-6 leading-relaxed font-medium">
                    @if(isset($about_misi) && $about_misi)
                        {!! nl2br(e($about_misi)) !!}
                    @else
                        <div class="flex items-start"><span class="text-indigo-600 font-black mr-4">01.</span> Menyelenggarakan sertifikasi kompetensi kerja secara profesional.</div>
                        <div class="flex items-start"><span class="text-indigo-600 font-black mr-4">02.</span> Mengembangkan skema sertifikasi sesuai tuntutan pasar global.</div>
                        <div class="flex items-start"><span class="text-indigo-600 font-black mr-4">03.</span> Memelihara kompetensi asesi secara berkesinambungan.</div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Organizational Structure Refinement -->
        <div class="py-20" data-aos="fade-up">
            <div class="text-center space-y-6 mb-24">
                <span class="inline-block px-4 py-1.5 rounded-full bg-slate-900 text-white text-[9px] font-black tracking-[0.4em] uppercase">HIERARCHY</span>
                <h2 class="font-heading font-black text-5xl text-slate-900 tracking-tighter leading-tight">Executive Council</h2>
                <p class="text-slate-500 text-lg max-w-2xl mx-auto font-medium leading-relaxed">
                    Struktur kepemimpinan yang berdedikasi menjaga integritas dan operasional harian {{ config('app.name') }}.
                </p>
            </div>

            <div class="max-w-6xl mx-auto relative overflow-x-auto pb-20 no-scrollbar">
                <div class="min-w-[1000px] flex flex-col items-center space-y-24 relative">
                    <!-- Connector Lines (Visual Tech Style) -->
                    <div class="absolute top-24 bottom-24 left-1/2 w-0.5 bg-indigo-100 -z-10">
                        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-2 h-2 bg-indigo-600 rounded-full"></div>
                        <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-2 h-2 bg-indigo-600 rounded-full"></div>
                    </div>
                    
                    <!-- Level 1: Director -->
                    <div class="relative group">
                        <div class="absolute -inset-6 bg-gradient-to-tr from-indigo-600 to-purple-600 rounded-[3rem] blur-2xl opacity-10 group-hover:opacity-30 transition-all duration-700"></div>
                        <div class="relative bg-slate-900 rounded-[3rem] p-12 text-center w-[22rem] shadow-2xl border border-white/10 group-hover:-translate-y-3 transition-transform duration-700">
                            <span class="block text-[10px] font-black tracking-[0.4em] text-indigo-400 uppercase mb-4">DIRECTOR GENERAL</span>
                            <h4 class="font-heading font-black text-white text-2xl leading-tight">Dr. Ir. Hermawan, M.T.</h4>
                            <div class="w-12 h-0.5 bg-indigo-600 mx-auto my-6 opacity-50"></div>
                            <span class="block text-[11px] text-slate-500 font-black uppercase tracking-[0.2em]">Strategic Ops Controller</span>
                        </div>
                    </div>

                    <!-- Level 2: Managers -->
                    <div class="flex justify-between w-full relative px-20">
                        <!-- Technical Horizontal connector -->
                        <div class="absolute top-1/2 left-40 right-40 h-0.5 bg-indigo-50 -z-10"></div>
                        
                        @php
                            $managers = [
                                ['role' => 'CERTIFICATION', 'name' => 'Bambang Wijaya, M.Kom.', 'dept' => 'Assessment Dept.'],
                                ['role' => 'ADMIN & FINANCE', 'name' => 'Rina Amelia, S.E.', 'dept' => 'Logistic & Finance']
                            ];
                        @endphp
                        @foreach($managers as $m)
                            <div class="bg-white rounded-[2.5rem] p-10 text-center w-72 shadow-xl border border-slate-100 hover:-translate-y-3 transition-all duration-700 group/node">
                                <span class="block text-[9px] font-black tracking-[0.3em] text-indigo-600 uppercase mb-4">{{ $m['role'] }}</span>
                                <h4 class="font-heading font-black text-slate-900 text-lg leading-tight">{{ $m['name'] }}</h4>
                                <span class="block text-[10px] text-slate-400 font-bold uppercase mt-4 tracking-widest">{{ $m['dept'] }}</span>
                            </div>
                        @endforeach
                    </div>

                    <!-- Level 3: Quality -->
                    <div class="bg-white rounded-[2.5rem] p-10 text-center w-72 shadow-xl border border-slate-100 hover:-translate-y-3 transition-all duration-700">
                        <span class="block text-[9px] font-black tracking-[0.3em] text-indigo-600 uppercase mb-4">QUALITY & COMPLIANCE</span>
                        <h4 class="font-heading font-black text-slate-900 text-lg leading-tight">Drs. Ahmad Fauzi, M.T.</h4>
                        <span class="block text-[10px] text-slate-400 font-bold uppercase mt-4 tracking-widest">Internal Control Lead</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
