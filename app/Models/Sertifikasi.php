<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sertifikasi extends Model
{
    protected $table = 'sertifikasi';

    protected $fillable = [
        'nama_skema',
        'deskripsi',
        'icon',
        'status',
    ];
}
