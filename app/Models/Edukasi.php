<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Edukasi extends Model
{
    protected $table = 'edukasis';

    protected $fillable = [
        'judul',
        'kategori',
        'ringkasan',
        'url_konten',
        'gambar_thumbnail',
        'is_featured'
    ];
}
