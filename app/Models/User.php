<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'roles',
        'username',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function laboratorium()
    {
        return $this->hasMany(Laboratorium::class);
    }
    public function perusahaan()
    {
        return $this->hasOne(Perusahaan::class);
    }
    public function nib()
    {
        return $this->hasOne(NIB::class);
    }
    public function bidang()
    {
        return $this->hasMany(Bidang::class);
    }
    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }
    public function pimpinan()
    {
        return $this->hasMany(Pimpinan::class);
    }
}
