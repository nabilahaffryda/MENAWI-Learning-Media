<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $primaryKey = 'question_id';
    protected $table = 'question';
    protected $fillable = [
        'question_id',
        'theme_id',
        'question',
        'question_pict',
        'correct_answer',
        'bank_answer'
    ];
    public $timestamps = false;
    public function tema()
    {
        return $this->belongsTo(Theme::class, 'theme_id');
    }
    public function answer()
    {
        return $this->hasMany(Answer::class);
    }
}
