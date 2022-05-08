<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $primaryKey = 'material_id';
    protected $table = 'material';
    protected $fillable = [
        'material_id',
        'material_name',
    ];
    public $timestamps = false;
}
