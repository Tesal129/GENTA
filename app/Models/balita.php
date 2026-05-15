<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balita extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_balita',
        'nama_ortu',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'status_gizi',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    /**
     * Semua data pemeriksaan balita ini.
     */
    public function pemeriksaans()
    {
        return $this->hasMany(Pemeriksaan::class);
    }

    /**
     * Pemeriksaan terakhir (dipakai di tabel dashboard).
     */
    public function latestPemeriksaan()
    {
        return $this->hasOne(Pemeriksaan::class)
                    ->latestOfMany('tanggal_periksa');
    }
}