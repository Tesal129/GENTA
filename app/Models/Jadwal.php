<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table      = 'jadwal';
    protected $primaryKey = 'id_jadwal';
    public    $timestamps = false;

    protected $fillable = [
        'nama_kegiatan',
        'tanggal',
        'lokasi',
        'keterangan',
        'tipe_kegiatan',
        'user_id_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id_user', 'id_user');
    }
}