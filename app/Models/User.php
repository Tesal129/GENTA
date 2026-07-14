<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'id_user';
    public $timestamps = true;

    protected $fillable = [
        'username',
        'password',
        'nama_kader',
        'role',
        'no_hp',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    // Login pakai username, bukan email
}