<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\MaterialDesc;
use Illuminate\Http\Request;

class MaterialDescController extends Controller
{

    public function index()
    {
        $materialdesc = MaterialDesc::with('materi')->get();
        return view('materialdesc.index', compact('materialdesc'));
    }

    public function create()
    {
        $mtrl = Material::all();
        return view('materialdesc.create', compact('mtrl'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'material_id' => 'required',
            'description' => 'required',
            'desc_pict' => 'image|file|max:1024',
        ]);
        if ($request->file('desc_pict')) {
            $validatedData['desc_pict'] = $request->file('desc_pict')->store('post-images');
        }
        MaterialDesc::create($validatedData);
        return redirect()->route('materialdesc.index');
    }

    public function edit($desc_id)
    {
        $mtrl = Material::all();
        $materialdesc = MaterialDesc::with('materi')->where('desc_id', $desc_id)->first();
        return view('materialdesc.edit', compact('materialdesc', 'mtrl'));
    }

    public function update(Request $request, $desc_id)
    {
        $validatedData = $request->validate([
            'desc_id' => 'required',
            'material_id' => 'required',
            'description' => 'required',
            'desc_pict' => 'image|file|max:1024',
        ]);
        if ($request->file('desc_pict')) {
            $validatedData['desc_pict'] = $request->file('desc_pict')->store('post-images');
        }
        MaterialDesc::where('desc_id', $desc_id)->update($validatedData);
        return redirect()->route('materialdesc.index');
    }

    public function destroy($desc_id)
    {
        $materialdesc = MaterialDesc::where('desc_id', $desc_id)->first();
        if ($materialdesc != null) {
            $materialdesc->delete();
            return redirect()->route('materialdesc.index');
        }
        return redirect()->route('materialdesc.index');
    }
}
