<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $primaryKey = 'level_id';
    protected $table = 'level';
    protected $fillable = [
        'level_id',
        'level_name',
    ];
    public $timestamps = false;

    public function theme()
    {
        return $this->hasMany(Theme::class);
    }
}
