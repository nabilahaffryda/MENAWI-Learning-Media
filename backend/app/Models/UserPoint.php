<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPoint extends Model
{
    use HasFactory;
    protected $primaryKey = 'theme_question_id';
    protected $table = 'user_point';
    protected $fillable = [
        'user_id',
        'theme_question_id',
        'total_point',
    ];
    public $timestamps = false;
}
