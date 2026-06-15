<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BeritaAcara;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaAcaraController extends Controller
{
    public function index()
    {
        $beritas = BeritaAcara::orderBy('tanggal', 'desc')->paginate(10);
        return view('admin.berita-acara.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita-acara.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'kategori' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'penulis' => 'required|string|max:100',
            'status' => 'required|in:draft,published',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
        ]);

        $slug = Str::slug($request->judul);
        $originalSlug = $slug;
        $count = 1;
        while (BeritaAcara::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $berita = new BeritaAcara();
        $berita->judul = $request->judul;
        $berita->slug = $slug;
        $berita->konten = $request->konten;
        $berita->kategori = $request->kategori;
        $berita->tanggal = $request->tanggal;
        $berita->penulis = $request->penulis;
        $berita->status = $request->status;
        $berita->save();

        if ($request->hasFile('thumbnail')) {
            $media = $berita->addMediaFromRequest('thumbnail')->toMediaCollection('thumbnails');
            $berita->thumbnail = $media->getUrl();
            $berita->save();
        }

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $berita = BeritaAcara::findOrFail($id);
        return view('admin.berita-acara.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = BeritaAcara::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'kategori' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'penulis' => 'required|string|max:100',
            'status' => 'required|in:draft,published',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
        ]);

        if ($request->judul !== $berita->judul) {
            $slug = Str::slug($request->judul);
            $originalSlug = $slug;
            $count = 1;
            while (BeritaAcara::where('slug', $slug)->where('id', '!=', $id)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }
            $berita->slug = $slug;
        }

        $berita->judul = $request->judul;
        $berita->konten = $request->konten;
        $berita->kategori = $request->kategori;
        $berita->tanggal = $request->tanggal;
        $berita->penulis = $request->penulis;
        $berita->status = $request->status;

        if ($request->hasFile('thumbnail')) {
            $berita->clearMediaCollection('thumbnails');
            $media = $berita->addMediaFromRequest('thumbnail')->toMediaCollection('thumbnails');
            $berita->thumbnail = $media->getUrl();
        }

        $berita->save();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $berita = BeritaAcara::findOrFail($id);
        $berita->delete();
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    public function toggleHome(Request $request, $id)
    {
        $berita = BeritaAcara::findOrFail($id);
        
        if (!$berita->tampil_di_home) {
            $count = BeritaAcara::where('tampil_di_home', true)->count();
            if ($count >= 3) {
                return back()->with('error', 'Maksimal 3 berita yang dapat ditampilkan di Home page.');
            }
            $berita->tampil_di_home = true;
            $berita->urutan_home = $count + 1;
        } else {
            $berita->tampil_di_home = false;
            $berita->urutan_home = null;
        }
        
        $berita->save();
        return back()->with('success', 'Status penampilan berita di Home page berhasil diperbarui.');
    }
}
