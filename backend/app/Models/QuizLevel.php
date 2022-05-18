<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizLevel extends Model
{
    protected $primaryKey = 'level_id';
    protected $table = 'quiz_level';
    protected $fillable = [
        'level_id',
        'level_name',
    ];
    public $timestamps = false;

    public function theme()
    {
        return $this->hasMany(QuizTheme::class);
    }
}
