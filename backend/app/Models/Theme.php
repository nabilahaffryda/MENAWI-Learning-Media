<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $primaryKey = 'theme_id';
    protected $table = 'theme';
    protected $fillable = [
        'theme_id',
        'level_id',
        'theme_name',
    ];
    public $timestamps = false;

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
    public function question()
    {
        return $this->hasMany(Question::class);
    }
}
