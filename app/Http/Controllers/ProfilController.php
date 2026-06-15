<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        if (SiteSetting::getValue('maintenance_mode') === '1') {
            return response()->view('errors.maintenance', [], 503);
        }

        $about_history = SiteSetting::getValue('about_history');
        $about_visi = SiteSetting::getValue('about_visi');
        $about_misi = SiteSetting::getValue('about_misi');

        $meta = [
            'title' => 'Profil Lembaga - LSP Jember',
            'description' => 'Pelajari sejarah berdirinya, visi, misi, serta bagan struktur organisasi dari Lembaga Sertifikasi Profesi (LSP) Jember.',
            'keywords' => 'profil lsp jember, visi misi lsp, struktur organisasi lsp',
        ];

        return view('pages.profile', compact('about_history', 'about_visi', 'about_misi', 'meta'));
    }
}
