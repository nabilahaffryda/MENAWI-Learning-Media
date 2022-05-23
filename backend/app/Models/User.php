<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

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
    public function jawaban()
    {
        return $this->hasMany(Answer::class);
    }
}
