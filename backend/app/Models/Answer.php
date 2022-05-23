<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $primaryKey = 'answer_id';
    protected $table = 'answer';
    protected $fillable = [
        'answer_id',
        'question_id',
        'answer',
        'point',
        'user_id'
    ];
    public $timestamps = false;
    public function quest()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
