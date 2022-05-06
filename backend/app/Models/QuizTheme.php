<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizTheme extends Model
{
    use HasFactory;
    protected $primaryKey = 'theme_id';
    protected $table = 'quiz_theme';
    protected $fillable = [
        'theme_id',
        'level_id',
        'theme_name',
    ];
    public $timestamps = false;
}
