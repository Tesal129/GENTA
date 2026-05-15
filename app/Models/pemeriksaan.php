<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'balita_id',
        'tanggal_periksa',
        'berat_badan',
        'tinggi_badan',
        'lingkar_kepala',
        'status_gizi',
        'catatan',
    ];

    protected $casts = [
        'tanggal_periksa' => 'date',
        'berat_badan'     => 'float',
        'tinggi_badan'    => 'float',
    ];

    /**
     * Balita pemilik pemeriksaan ini.
     */
    public function balita()
    {
        return $this->belongsTo(Balita::class);
    }
}