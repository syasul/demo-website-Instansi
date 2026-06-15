<?php

namespace App\Http\Controllers;

use App\Models\Sertifikasi;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SertifikasiController extends Controller
{
    public function index()
    {
        if (SiteSetting::getValue('maintenance_mode') === '1') {
            return response()->view('errors.maintenance', [], 503);
        }

        $sertifikasis = Sertifikasi::where('status', 'aktif')->orderBy('created_at', 'desc')->get();

        $meta = [
            'title' => 'Skema Sertifikasi - LSP Jember',
            'description' => 'Daftar skema sertifikasi kompetensi kerja resmi berstandar BNSP yang tersedia di LSP Jember.',
            'keywords' => 'skema sertifikasi jember, uji kompetensi bnsp, sertifikat garuda, lsp jember skema',
        ];

        return view('pages.sertifikasi', compact('sertifikasis', 'meta'));
    }
}
