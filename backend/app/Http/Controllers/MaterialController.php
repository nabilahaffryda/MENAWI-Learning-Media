<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $material = Material::all();
        return view('material.index', compact('material'));
    }

    public function create()
    {
        return view('material.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'material_name' => 'required',
            'material_desc' => 'required',
        ]);
        Material::create($validatedData);
        return redirect()->route('material.index');
    }

    public function edit($material_id)
    {
        $material = Material::where('material_id', $material_id)->first();
        return view('material.edit', compact('material'));
    }

    public function update(Request $request, $material_id)
    {
        $validatedData = $request->validate([
            'material_id' => 'required',
            'material_name' => 'required',
            'material_desc' => 'required',
        ]);
        Material::where('material_id', $material_id)->update($validatedData);
        return redirect()->route('material.index');
    }

    public function destroy($material_id)
    {
        $material = Material::where('material_id', $material_id)->first();
        if ($material != null) {
            $material->delete();
            return redirect()->route('material.index');
        }
        return redirect()->route('material.index');
    }
}
