<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Description;
use Illuminate\Http\Request;

class DescriptionController extends Controller
{

    public function index()
    {
        $description = Description::with('material')->get();
        return view('description.index', compact('description'));
    }

    public function create()
    {
        $mtrl = Material::all();
        return view('description.create', compact('mtrl'));
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
        Description::create($validatedData);
        return redirect()->route('description.index');
    }

    public function edit($desc_id)
    {
        $mtrl = Material::all();
        $description = Description::with('material')->where('desc_id', $desc_id)->first();
        return view('description.edit', compact('description', 'mtrl'));
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
        Description::where('desc_id', $desc_id)->update($validatedData);
        return redirect()->route('description.index');
    }

    public function destroy($desc_id)
    {
        $description = Description::where('desc_id', $desc_id)->first();
        if ($description != null) {
            $description->delete();
            return redirect()->route('description.index');
        }
        return redirect()->route('description.index');
    }
}
