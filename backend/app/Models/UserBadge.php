<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBadge extends Model
{
    use HasFactory;
    protected $primaryKey = 'badge_id';
    protected $table = 'user_badge';
    protected $fillable = [
        'badge_id',
        'user_id',
        'badge_status',
    ];
    public $timestamps = false;
}
