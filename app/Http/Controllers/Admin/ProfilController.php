<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Models\Sertifikasi;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $about_history = SiteSetting::getValue('about_history');
        $about_visi = SiteSetting::getValue('about_visi');
        $about_misi = SiteSetting::getValue('about_misi');
        
        $sertifikasis = Sertifikasi::orderBy('created_at', 'desc')->get();

        return view('admin.profil.index', compact('about_history', 'about_visi', 'about_misi', 'sertifikasis'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'about_history' => 'required|string',
            'about_visi' => 'required|string',
            'about_misi' => 'required|string',
        ]);

        SiteSetting::setValue('about_history', $request->about_history);
        SiteSetting::setValue('about_visi', $request->about_visi);
        SiteSetting::setValue('about_misi', $request->about_misi);

        return back()->with('success', 'Informasi profil LSP berhasil diperbarui.');
    }

    public function storeSertifikasi(Request $request)
    {
        $request->validate([
            'nama_skema' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'icon' => 'required|string|max:100',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        Sertifikasi::create([
            'nama_skema' => $request->nama_skema,
            'deskripsi' => $request->deskripsi,
            'icon' => $request->icon,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Skema sertifikasi berhasil ditambahkan.');
    }

    public function updateSertifikasi(Request $request, $id)
    {
        $scheme = Sertifikasi::findOrFail($id);

        $request->validate([
            'nama_skema' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'icon' => 'required|string|max:100',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $scheme->update([
            'nama_skema' => $request->nama_skema,
            'deskripsi' => $request->deskripsi,
            'icon' => $request->icon,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Skema sertifikasi berhasil diperbarui.');
    }

    public function destroySertifikasi($id)
    {
        $scheme = Sertifikasi::findOrFail($id);
        $scheme->delete();

        return back()->with('success', 'Skema sertifikasi berhasil dihapus.');
    }
}
