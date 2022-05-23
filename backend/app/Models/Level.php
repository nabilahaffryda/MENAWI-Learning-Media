<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizLevel extends Model
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
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
