<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class BeritaAcara extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    protected $table = 'berita_acara';

    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'thumbnail',
        'kategori',
        'tanggal',
        'penulis',
        'status',
        'tampil_di_home',
        'urutan_home',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'tampil_di_home' => 'boolean',
        'urutan_home' => 'integer',
    ];
}
