<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialDesc extends Model
{
    use HasFactory;
    protected $primaryKey = 'desc_id';
    protected $table = 'material_desc';
    protected $fillable = [
        'desc_id',
        'material_id',
        'description',
        'desc_pict',
    ];
    public $timestamps = false;
}
