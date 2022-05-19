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
        'badge_point',
        'badge_level',
        'badge_pict_active',
        'badge_pict_non_active',
    ];
    public $timestamps = false;
    public function userBadge()
    {
        return $this->hasMany(UserBadge::class);
    }
}
