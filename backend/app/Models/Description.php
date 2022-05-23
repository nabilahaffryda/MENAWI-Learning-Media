<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;
    protected $primaryKey = 'desc_id';
    protected $table = 'description';
    protected $fillable = [
        'desc_id',
        'material_id',
        'description',
        'desc_pict',
    ];
    public $timestamps = false;

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }
}
