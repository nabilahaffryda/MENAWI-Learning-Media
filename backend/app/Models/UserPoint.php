<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPoint extends Model
{
    use HasFactory;
    protected $primaryKey = 'theme_id';
    protected $table = 'user_point';
    protected $fillable = [
        'user_id',
        'theme_id',
        'total_point',
    ];
    public $timestamps = false;

    public function themes()
    {
        return $this->belongsTo(QuizTheme::class, 'theme_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
