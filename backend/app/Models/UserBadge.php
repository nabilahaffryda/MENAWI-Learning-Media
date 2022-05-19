<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBadge extends Model
{
    use HasFactory;
    protected $primaryKey = 'user_badge_id';
    protected $table = 'user_badge';
    protected $fillable = [
        'user_badge_id',
        'badge_id',
        'user_id',
        'badge_status',
    ];
    public $timestamps = false;

    public function badge()
    {
        return $this->belongsTo(Badge::class, 'badge_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
