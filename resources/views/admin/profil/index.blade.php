@extends('layouts.admin')

@section('admin_content')
<div class="space-y-6" x-data="{ activeTab: 'profil', showAddModal: false, showEditModal: null }">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="font-heading font-bold text-2xl text-lsp-text">Profil & Skema Sertifikasi</h1>
            <p class="text-xs text-slate-600">Atur konten statis Profil LSP (Visi, Misi, Sejarah) dan Kelola Skema Sertifikasi.</p>
        </div>
    </div>

    <!-- Tabs header -->
    <div class="flex border-b border-slate-200/80 space-x-6 text-xs font-bold tracking-wider">
        <button @click="activeTab = 'profil'" :class="activeTab === 'profil' ? 'border-b-2 border-lsp-accent text-lsp-primary pb-3' : 'text-slate-500 pb-3 hover:text-slate-800'">
            INFORMASI PROFIL LSP
        </button>
        <button @click="activeTab = 'skema'" :class="activeTab === 'skema' ? 'border-b-2 border-lsp-accent text-lsp-primary pb-3' : 'text-slate-500 pb-3 hover:text-slate-800'">
            SKEMA SERTIFIKASI (CRUD)
        </button>
    </div>

    <!-- Tab 1: Profil LSP -->
    <div x-show="activeTab === 'profil'" class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 shadow-sm">
        <form action="{{ route('admin.profil.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="space-y-2">
                <label for="about_history" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Sejarah Singkat LSP</label>
                <textarea name="about_history" id="about_history" rows="5" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">{{ old('about_history', $about_history) }}</textarea>
            </div>

            <div class="space-y-2">
                <label for="about_visi" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Visi LSP</label>
                <textarea name="about_visi" id="about_visi" rows="3" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">{{ old('about_visi', $about_visi) }}</textarea>
            </div>

            <div class="space-y-2">
                <label for="about_misi" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Misi LSP (Tulis per baris)</label>
                <textarea name="about_misi" id="about_misi" rows="5" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">{{ old('about_misi', $about_misi) }}</textarea>
            </div>

            <button type="submit" class="w-full py-3.5 rounded-xl bg-gradient-to-r from-lsp-primary to-lsp-accent text-white font-semibold text-xs tracking-wide hover:shadow-lg hover:shadow-lsp-primary/20 transition-all duration-300">
                SIMPAN PROFIL LSP
            </button>
        </form>
    </div>

    <!-- Tab 2: Skema Sertifikasi -->
    <div x-show="activeTab === 'skema'" class="space-y-6" style="display: none;">
        <div class="flex justify-between items-center">
            <h3 class="font-heading font-bold text-lsp-text text-base">Daftar Skema Uji</h3>
            <button @click="showAddModal = true" class="px-4 py-2.5 rounded-xl bg-lsp-primary text-white text-xs font-semibold hover:bg-lsp-primary/95 transition-all flex items-center space-x-1.5">
                <svg class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <span>TAMBAH SKEMA BARU</span>
            </button>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-600">
                    <thead>
                        <tr class="border-b border-slate-100 text-slate-500 font-bold uppercase text-[10px] tracking-wider">
                            <th class="pb-3 w-10">Icon</th>
                            <th class="pb-3">Nama Skema</th>
                            <th class="pb-3">Deskripsi</th>
                            <th class="pb-3">Status</th>
                            <th class="pb-3 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($sertifikasis as $scheme)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="py-4 text-base">
                                    @if($scheme->icon === 'code-bracket')
                                        <svg class="h-5 w-5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" />
                                        </svg>
                                    @elseif($scheme->icon === 'paint-brush')
                                        <svg class="h-5 w-5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.53 16.122l9.37-9.37a2.25 2.25 0 113.182 3.182l-9.37 9.37a4.5 4.5 0 01-1.897 1.13L6 21l.8-2.685a4.5 4.5 0 011.13-1.897l1.598-1.597-1.597-1.597-1.597 1.597zm0 0L8.25 14.875" />
                                        </svg>
                                    @elseif($scheme->icon === 'server')
                                        <svg class="h-5 w-5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 14.25h13.5m-13.5 3h13.5m-13.5-6h13.5m-13.5-3h13.5m-16.5 12h19.5c.621 0 1.125-.504 1.125-1.125V3.375c0-.621-.504-1.125-1.125-1.125H3c-.621 0-1.125.504-1.125 1.125v16.25c0 .621.504 1.125 1.125 1.125z" />
                                        </svg>
                                    @elseif($scheme->icon === 'chart-bar')
                                        <svg class="h-5 w-5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                                        </svg>
                                    @else
                                        <svg class="h-5 w-5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.43l-1.003.828c-.293.241-.438.613-.43.992a7.723 7.723 0 010 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.43l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.992l-1.004-.827a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.645-.869l.214-1.28z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    @endif
                                </td>
                                <td class="py-4 font-semibold text-lsp-text">{{ $scheme->nama_skema }}</td>
                                <td class="py-4 text-[11px] text-slate-600 max-w-[300px] truncate">{{ $scheme->deskripsi }}</td>
                                <td class="py-4">
                                    <span class="px-2 py-0.5 rounded text-[9px] font-bold uppercase tracking-wider {{ $scheme->status === 'aktif' ? 'bg-emerald-50 text-emerald-600 border border-emerald-200' : 'bg-rose-50 text-rose-600 border border-rose-200' }}">
                                        {{ $scheme->status }}
                                    </span>
                                </td>
                                <td class="py-4 text-right space-x-2">
                                    <button @click="showEditModal = {{ $scheme->toJson() }}" class="px-2.5 py-1.5 bg-indigo-50 hover:bg-indigo-100 text-indigo-600 border border-indigo-200 rounded-lg">
                                        Edit
                                    </button>
                                    <form action="{{ route('admin.sertifikasi.destroy', $scheme->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus skema sertifikasi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2.5 py-1.5 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-200 rounded-lg">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-8 text-center text-slate-500">Belum ada skema sertifikasi ditambahkan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Add Modal -->
        <div x-show="showAddModal" class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-6 bg-black/60 backdrop-blur-sm" style="display: none;">
            <div class="relative max-w-md w-full bg-white border border-slate-200/80 rounded-3xl p-8 shadow-2xl">
                <h3 class="font-heading font-bold text-lg text-lsp-text mb-6">Tambah Skema Sertifikasi</h3>
                
                <form action="{{ route('admin.sertifikasi.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="space-y-2">
                        <label for="nama_skema" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Nama Skema</label>
                        <input type="text" name="nama_skema" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">
                    </div>

                    <div class="space-y-2">
                        <label for="deskripsi" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Deskripsi Singkat</label>
                        <textarea name="deskripsi" rows="3" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent"></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label for="icon" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Pilih Icon / Simbol</label>
                            <select name="icon" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">
                                <option value="code-bracket">💻 Code / IT</option>
                                <option value="paint-brush">🎨 Paint / Art</option>
                                <option value="server">🖥️ Server / Network</option>
                                <option value="chart-bar">📈 Chart / Bisnis</option>
                                <option value="cog">🛠️ Cog / Teknik</option>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label for="status" class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Status Skema</label>
                            <select name="status" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Nonaktif</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex gap-3 pt-4 border-t border-slate-100">
                        <button type="button" @click="showAddModal = false" class="w-1/2 py-3 bg-slate-50 border border-slate-200 text-slate-600 rounded-xl text-xs font-semibold hover:bg-slate-100 transition-all">
                            BATAL
                        </button>
                        <button type="submit" class="w-1/2 py-3 bg-lsp-primary text-white rounded-xl text-xs font-semibold hover:bg-lsp-primary/95 transition-all">
                            SIMPAN SKEMA
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit Modal -->
        <div x-show="showEditModal !== null" class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-6 bg-black/60 backdrop-blur-sm" style="display: none;">
            <div class="relative max-w-md w-full bg-white border border-slate-200/80 rounded-3xl p-8 shadow-2xl">
                <h3 class="font-heading font-bold text-lg text-lsp-text mb-6">Ubah Skema Sertifikasi</h3>
                
                <form :action="`{{ url('admin/sertifikasi') }}/${showEditModal?.id}`" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-2">
                        <label class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Nama Skema</label>
                        <input type="text" name="nama_skema" :value="showEditModal?.nama_skema" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Deskripsi Singkat</label>
                        <textarea name="deskripsi" rows="3" :value="showEditModal?.deskripsi" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent"></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Pilih Icon / Simbol</label>
                            <select name="icon" :value="showEditModal?.icon" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">
                                <option value="code-bracket">💻 Code / IT</option>
                                <option value="paint-brush">🎨 Paint / Art</option>
                                <option value="server">🖥️ Server / Network</option>
                                <option value="chart-bar">📈 Chart / Bisnis</option>
                                <option value="cog">🛠️ Cog / Teknik</option>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Status Skema</label>
                            <select name="status" :value="showEditModal?.status" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-lsp-text focus:outline-none focus:border-lsp-accent">
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Nonaktif</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex gap-3 pt-4 border-t border-slate-100">
                        <button type="button" @click="showEditModal = null" class="w-1/2 py-3 bg-slate-50 border border-slate-200 text-slate-600 rounded-xl text-xs font-semibold hover:bg-slate-100 transition-all">
                            BATAL
                        </button>
                        <button type="submit" class="w-1/2 py-3 bg-lsp-primary text-white rounded-xl text-xs font-semibold hover:bg-lsp-primary/95 transition-all">
                            PERBARUI SKEMA
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
