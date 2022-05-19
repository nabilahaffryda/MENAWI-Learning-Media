<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizTheme extends Model
{
    protected $primaryKey = 'theme_id';
    protected $table = 'quiz_theme';
    protected $fillable = [
        'theme_id',
        'level_id',
        'theme_name',
    ];
    public $timestamps = false;

    public function level()
    {
        return $this->belongsTo(QuizLevel::class, 'level_id');
    }
    public function question()
    {
        return $this->hasMany(QuizThemeQuestion::class);
    }
    public function point()
    {
        return $this->hasMany(UserPoint::class);
    }
}
