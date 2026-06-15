<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $galleryItems = GalleryItem::orderBy('urutan', 'asc')->orderBy('created_at', 'desc')->get();
        return view('admin.gallery.index', compact('galleryItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'files' => 'required|array',
            'files.*' => 'image|mimes:jpeg,png,jpg,webp,svg|max:5120',
        ]);

        if ($request->hasFile('files')) {
            $nextOrder = GalleryItem::max('urutan') + 1;
            foreach ($request->file('files') as $file) {
                $filePath = $this->uploadAndCompressToWebp($file, 'gallery');

                GalleryItem::create([
                    'file_path' => $filePath,
                    'judul' => ucwords(str_replace(['-', '_'], ' ', pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))),
                    'urutan' => $nextOrder++,
                ]);
            }
        }

        return back()->with('success', 'Foto-foto berhasil diunggah ke galeri.');
    }

    public function destroy($id)
    {
        $item = GalleryItem::findOrFail($id);
        
        $filePath = public_path($item->file_path);
        if (file_exists($filePath)) {
            @unlink($filePath);
        }

        $item->delete();

        return back()->with('success', 'Foto galeri berhasil dihapus.');
    }

    /**
     * Upload and compress image to WebP using GD library.
     */
    private function uploadAndCompressToWebp($file, $directory)
    {
        $extension = strtolower($file->getClientOriginalExtension());
        $filename = uniqid('img_', true) . '.webp';
        $destinationPath = public_path('storage/' . $directory);
        
        if (!file_exists($destinationPath)) {
            @mkdir($destinationPath, 0755, true);
        }
        
        $targetFile = $destinationPath . '/' . $filename;
        
        switch ($extension) {
            case 'jpeg':
            case 'jpg':
                $image = @imagecreatefromjpeg($file->getRealPath());
                break;
            case 'png':
                $image = @imagecreatefrompng($file->getRealPath());
                break;
            case 'webp':
                $image = @imagecreatefromwebp($file->getRealPath());
                break;
            default:
                $file->move($destinationPath, $filename);
                return 'storage/' . $directory . '/' . $filename;
        }

        if ($image) {
            imagewebp($image, $targetFile, 75);
            imagedestroy($image);
            return 'storage/' . $directory . '/' . $filename;
        } else {
            $file->move($destinationPath, $filename);
            return 'storage/' . $directory . '/' . $filename;
        }
    }
}
