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
        'notification_settings',
        'dark_mode',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'notification_settings' => 'array',
        'dark_mode' => 'boolean',
    ];

    public function loginLogs()
    {
        return $this->hasMany(LoginLog::class, 'user_id', 'id_user');
    }
}