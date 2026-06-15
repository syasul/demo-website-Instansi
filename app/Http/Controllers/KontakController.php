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

        $alamat = SiteSetting::getValue('kontak_alamat');
        $telepon = SiteSetting::getValue('kontak_telepon');
        $email = SiteSetting::getValue('kontak_email');
        $maps = SiteSetting::getValue('kontak_maps');

        $meta = [
            'title' => 'Hubungi Kami - LSP Jember',
            'description' => 'Hubungi layanan pelanggan LSP Jember untuk informasi uji kompetensi, pendaftaran skema, dan kerjasama kemitraan.',
            'keywords' => 'alamat lsp jember, kontak lsp jember, lokasi lsp jember',
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

        Log::info("Notifikasi Email Form Kontak LSP Jember:\n" .
            "Nama: {$request->nama}\n" .
            "Email: {$request->email}\n" .
            "Subject: {$request->subject}\n" .
            "Pesan: {$request->pesan}"
        );

        return back()->with('success', 'Pesan Anda berhasil dikirim! Kami akan menghubungi Anda segera.');
    }
}
