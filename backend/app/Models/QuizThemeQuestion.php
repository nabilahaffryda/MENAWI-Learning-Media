<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizThemeQuestion extends Model
{
    use HasFactory;
    protected $primaryKey = 'theme_question_id';
    protected $table = 'quiz_theme_question';
    protected $fillable = [
        'theme_question_id',
        'theme_id',
        'question',
        'question_pict',
        'question_point',
    ];
    public $timestamps = false;
}
