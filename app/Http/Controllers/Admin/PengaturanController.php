<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function index()
    {
        $settings = [
            'site_name' => SiteSetting::getValue('site_name', 'LSP Sanford'),
            'kontak_alamat' => SiteSetting::getValue('kontak_alamat'),
            'kontak_telepon' => SiteSetting::getValue('kontak_telepon'),
            'kontak_email' => SiteSetting::getValue('kontak_email'),
            'kontak_maps' => SiteSetting::getValue('kontak_maps'),
            'meta_title' => SiteSetting::getValue('meta_title'),
            'meta_description' => SiteSetting::getValue('meta_description'),
            'meta_keywords' => SiteSetting::getValue('meta_keywords'),
            'maintenance_mode' => SiteSetting::getValue('maintenance_mode', '0'),
        ];

        return view('admin.pengaturan.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'kontak_alamat' => 'required|string',
            'kontak_telepon' => 'required|string|max:50',
            'kontak_email' => 'required|email|max:100',
            'kontak_maps' => 'required|string',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string',
            'meta_keywords' => 'required|string',
            'maintenance_mode' => 'required|in:0,1',
        ]);

        SiteSetting::setValue('site_name', $request->site_name);
        SiteSetting::setValue('kontak_alamat', $request->kontak_alamat);
        SiteSetting::setValue('kontak_telepon', $request->kontak_telepon);
        SiteSetting::setValue('kontak_email', $request->kontak_email);
        SiteSetting::setValue('kontak_maps', $request->kontak_maps);
        SiteSetting::setValue('meta_title', $request->meta_title);
        SiteSetting::setValue('meta_description', $request->meta_description);
        SiteSetting::setValue('meta_keywords', $request->meta_keywords);
        SiteSetting::setValue('maintenance_mode', $request->maintenance_mode);

        return back()->with('success', 'Pengaturan situs berhasil disimpan.');
    }
}
