<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizThemeQuestion extends Model
{
    use HasFactory;
    protected $primaryKey = 'question_id';
    protected $table = 'quiz_theme_question';
    protected $fillable = [
        'question_id',
        'theme_id',
        'question',
        'question_pict',
        'question_point',
    ];
    public $timestamps = false;
    public function tema()
    {
        return $this->belongsTo(QuizTheme::class, 'theme_id');
    }
    public function answer()
    {
        return $this->hasMany(QuizThemeAnswer::class);
    }
}
