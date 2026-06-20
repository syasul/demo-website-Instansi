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

        $about_history = str_replace('Jember', 'Sanford', SiteSetting::getValue('about_history'));
        $about_visi = str_replace('Jember', 'Sanford', SiteSetting::getValue('about_visi'));
        $about_misi = str_replace('Jember', 'Sanford', SiteSetting::getValue('about_misi'));

        $meta = [
            'title' => 'Profil Lembaga - ' . config('app.name'),
            'description' => 'Pelajari sejarah berdirinya, visi, misi, serta bagan struktur organisasi dari ' . config('app.name') . '.',
            'keywords' => 'profil ' . config('app.name') . ', visi misi, struktur organisasi',
        ];

        return view('pages.profile', compact('about_history', 'about_visi', 'about_misi', 'meta'));
    }
}
