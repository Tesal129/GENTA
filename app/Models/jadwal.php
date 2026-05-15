<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kegiatan',
        'tanggal',
        'lokasi',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}