<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use App\Models\Sertifikasi;
use App\Models\BeritaAcara;
use App\Models\GalleryItem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (SiteSetting::getValue('maintenance_mode') === '1') {
            return response()->view('errors.maintenance', [], 503);
        }

        $site_name = SiteSetting::getValue('site_name', 'LSP Jember');
        $about_history = SiteSetting::getValue('about_history');
        $about_visi = SiteSetting::getValue('about_visi');
        $about_misi = SiteSetting::getValue('about_misi');
        
        $sertifikasis = Sertifikasi::where('status', 'aktif')->take(4)->get();
        
        $featuredNews = BeritaAcara::where('status', 'published')
            ->where('tampil_di_home', true)
            ->orderBy('urutan_home', 'asc')
            ->orderBy('tanggal', 'desc')
            ->take(3)
            ->get();
            
        if ($featuredNews->count() < 3) {
            $excludeIds = $featuredNews->pluck('id')->toArray();
            $fillNews = BeritaAcara::where('status', 'published')
                ->whereNotIn('id', $excludeIds)
                ->orderBy('tanggal', 'desc')
                ->take(3 - $featuredNews->count())
                ->get();
            $featuredNews = $featuredNews->concat($fillNews);
        }

        $galleryItems = GalleryItem::orderBy('urutan', 'asc')->get();

        $meta = [
            'title' => SiteSetting::getValue('meta_title', 'LSP Jember'),
            'description' => SiteSetting::getValue('meta_description'),
            'keywords' => SiteSetting::getValue('meta_keywords'),
        ];

        return view('pages.home', compact(
            'site_name',
            'about_history',
            'about_visi',
            'about_misi',
            'sertifikasis',
            'featuredNews',
            'galleryItems',
            'meta'
        ));
    }
}
