<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory;
    protected $primaryKey = 'badge_id';
    protected $table = 'badge';
    protected $fillable = [
        'badge_id',
        'badge_name',
    ];
    public $timestamps = false;
}
