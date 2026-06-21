<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    protected $table      = 'pemeriksaan';
    protected $primaryKey = 'id_pemeriksaan';
    public    $timestamps = false;

    protected $fillable = [
        'Balita_id_balita',
        'User_id_user',
        'tanggal_periksa',
        'berat_badan',
        'tinggi_badan',
        'lingkar_kepala',
        'lingkar_lengan',
        'status_gizi',
        'catatan',
    ];

    public function balita()
    {
        return $this->belongsTo(Balita::class, 'Balita_id_balita', 'id_balita');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'User_id_user', 'id_user');
    }
}