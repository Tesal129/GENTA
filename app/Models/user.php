<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nama_kader',
        'username',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Login pakai username, bukan email
    public function getAuthIdentifierName()
    {
        return 'username';
    }
}