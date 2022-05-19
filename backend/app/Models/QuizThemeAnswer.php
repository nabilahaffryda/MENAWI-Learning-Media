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
        'question_id',
        'answer',
        'answer_status',
        'answer_pict',
    ];
    public $timestamps = false;
    public function questions()
    {
        return $this->belongsTo(QuizThemeQuestion::class, 'question_id');
    }
}
