<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $casts = [
        'admin' => 'bool'
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'job',
        'about',
        'admin',
        'remember_token'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function blogs()
    {
        return $this->hasMany(\App\Models\Blog::class);
    }

    public function logins()
    {
        return $this->hasMany(\App\Models\Login::class);
    }

    public function logs()
    {
        return $this->hasMany(\App\Models\Log::class);
    }

    public function properties()
    {
        return $this->hasMany(\App\Models\Property::class);
    }

    /**
     * Retorna boolean
     * Checa se o usuario logado é Admin
     */
    public function isAdmin()
    {
        return $this->admin ? true : false;
    }

    /**
     * Retorna String
     * Checa se o usuario possui uma foto cadastrada
     * se não retorna uma imagem definada em public/uploads/avatar.jpg
     */
    public function getAvatar()
    {
        $avatar = $this->avatar;
        return $avatar == null ? asset('uploads/avatar.jpg') : asset('uploads/users/' . $this->id . '/' . $avatar);
    }
}
