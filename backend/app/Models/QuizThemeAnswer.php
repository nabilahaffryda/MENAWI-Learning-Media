<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizThemeAnswer extends Model
{
    use HasFactory;
    protected $primaryKey = 'answer_id';
    protected $table = 'quiz_theme_answer';
    protected $fillable = [
        'answer_id',
        'theme_question_id',
        'answer',
        'answer_status',
        'answer_pict',
    ];
    public $timestamps = false;
}
