<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Log;

class KontakController extends Controller
{
    public function index()
    {
        if (SiteSetting::getValue('maintenance_mode') === '1') {
            return response()->view('errors.maintenance', [], 503);
        }

        $alamat = "Jl. Mastrip No. 164, Sanford, Jawa Timur 68121";
        $telepon = "081330012100";
        $email = "independenttendiyvisual@gmail.com";
        $maps = '<iframe class="w-full h-full border-0 grayscale invert opacity-70" src="https://maps.google.com/maps?q=Sanford&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>';

        $meta = [
            'title' => 'Hubungi Kami - ' . config('app.name'),
            'description' => 'Hubungi layanan pelanggan ' . config('app.name') . ' untuk informasi uji kompetensi, pendaftaran skema, dan kerjasama kemitraan.',
            'keywords' => 'alamat ' . config('app.name') . ', kontak ' . config('app.name') . ', lokasi ' . config('app.name'),
        ];

        return view('pages.kontak', compact('alamat', 'telepon', 'email', 'maps', 'meta'));
    }

    public function send(Request $request)
    {
        if (SiteSetting::getValue('maintenance_mode') === '1') {
            return response()->view('errors.maintenance', [], 503);
        }

        $ipKey = 'send-message:' . $request->ip();
        if (RateLimiter::tooManyAttempts($ipKey, 3)) {
            $seconds = RateLimiter::availableIn($ipKey);
            return back()->withInput()->with('error', "Terlalu banyak mengirim pesan. Silakan coba lagi dalam {$seconds} detik.");
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'pesan' => 'required|string',
        ]);

        RateLimiter::hit($ipKey, 60);

        Log::info("Notifikasi Email Form Kontak LSP Sanford:\n" .
            "Nama: {$request->nama}\n" .
            "Email: {$request->email}\n" .
            "Subject: {$request->subject}\n" .
            "Pesan: {$request->pesan}"
        );

        return back()->with('success', 'Pesan Anda berhasil dikirim! Kami akan menghubungi Anda segera.');
    }
}
