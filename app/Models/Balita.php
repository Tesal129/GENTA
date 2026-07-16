<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balita extends Model
{
    protected $table      = 'balita';
    protected $primaryKey = 'id_balita';
    public    $timestamps = false;

    protected $fillable = [
        'nik_balita',
        'nama_balita',
        'tanggal_lahir',
        'jenis_kelamin',
        'nama_ibu',
        'nama_ayah',
        'no_hp_ortu',
        'alamat',
    ];
}