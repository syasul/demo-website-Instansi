<?php

namespace App\Http\Controllers;

use App\Models\BeritaAcara;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaAcaraController extends Controller
{
    public function index(Request $request)
    {
        if (SiteSetting::getValue('maintenance_mode') === '1') {
            return response()->view('errors.maintenance', [], 503);
        }

        $query = BeritaAcara::where('status', 'published');

        if ($request->filled('q')) {
            $keyword = $request->q;
            $query->where(function($q) use ($keyword) {
                $q->where('judul', 'like', "%{$keyword}%")
                  ->orWhere('konten', 'like', "%{$keyword}%");
            });
        }

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        if ($request->filled('tahun')) {
            $query->whereYear('tanggal', $request->tahun);
        }

        $beritas = $query->orderBy('tanggal', 'desc')->paginate(6)->withQueryString();

        $categories = BeritaAcara::where('status', 'published')->distinct()->pluck('kategori');
        
        $years = BeritaAcara::where('status', 'published')
            ->pluck('tanggal')
            ->map(fn($date) => $date ? $date->format('Y') : null)
            ->filter()
            ->unique()
            ->sortDesc();

        $meta = [
            'title' => 'Berita & Pengumuman - LSP Jember',
            'description' => 'Daftar berita, pengumuman resmi, dan artikel kegiatan terbaru dari Lembaga Sertifikasi Profesi (LSP) Jember.',
            'keywords' => 'berita lsp, pengumuman lsp, kegiatan lsp jember, bnsp jember',
        ];

        return view('pages.berita-acara', compact('beritas', 'categories', 'years', 'meta'));
    }

    public function show($slug)
    {
        if (SiteSetting::getValue('maintenance_mode') === '1') {
            return response()->view('errors.maintenance', [], 503);
        }

        $berita = BeritaAcara::where('slug', $slug)->where('status', 'published')->firstOrFail();

        $description = strip_tags($berita->konten);
        $description = mb_strlen($description) > 160 ? mb_substr($description, 0, 157) . '...' : $description;

        $meta = [
            'title' => $berita->judul . ' - LSP Jember',
            'description' => $description,
            'keywords' => strtolower($berita->kategori) . ', berita lsp, ' . str_replace('-', ', ', Str::slug($berita->judul)),
        ];

        $latestNews = BeritaAcara::where('status', 'published')
            ->where('id', '!=', $berita->id)
            ->orderBy('tanggal', 'desc')
            ->take(3)
            ->get();

        return view('pages.berita-acara-detail', compact('berita', 'latestNews', 'meta'));
    }
}
