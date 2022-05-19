<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id',
        'username',
        'name',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function points()
    {
        return $this->hasMany(UserPoint::class);
    }
    public function badges()
    {
        return $this->hasMany(UserBadge::class);
    }
}
