<?php

namespace App\Http\Controllers;

use App\Models\Description;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialAPIController extends Controller
{
    private $status = 200;

    public function getAllMaterial(){
        $mtr = Material::all();
        return response()->json($mtr);
    }

    public function getDescByMaterial($material_id){
        $des = Description::with('material')->where('material_id', $material_id)->get();
        return response()->json($des);
    }
}
