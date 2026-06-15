<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\BeritaAcara;
use App\Models\Sertifikasi;
use App\Models\GalleryItem;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBerita = BeritaAcara::count();
        $totalSertifikasi = Sertifikasi::count();
        $totalGallery = GalleryItem::count();
        $latestNews = BeritaAcara::orderBy('tanggal', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('totalBerita', 'totalSertifikasi', 'totalGallery', 'latestNews'));
    }

    public function profileSettings()
    {
        $user = auth()->user();
        return view('admin.profile-settings', compact('user'));
    }

    public function updateProfileSettings(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'current_password' => ['nullable', 'required_with:new_password'],
            'new_password' => ['nullable', 'confirmed', Password::defaults()],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->new_password) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Password saat ini salah.']);
            }
            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        return back()->with('success', 'Profil admin berhasil diperbarui.');
    }
}
