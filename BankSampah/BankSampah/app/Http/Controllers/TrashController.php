<?php

namespace App\Http\Controllers;

use App\Models\Trash;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    public function index()
    {
        $trash = Trash::all();
        return view('index', compact('trash'));
    }
    
    public function create()
    {
    $price = [
        'botol plastik' => 10000,
        'styrofoam' => 15000,
        'kardus' => 22000,
    ];

    return view('create', compact('price'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'weight' => 'required|numeric',
            'price' => 'nullable|numeric',
        ]);
        

    Trash::create([
        'name' => $validated['name'],
        'weight' => $validated['weight'],
        'price' => $validated['price'],
    ]);
    return redirect()->route('index')->with('success', 'Data berhasil disimpan');
    }

    public function destroy($id)
    {
    $trash = Trash::findOrFail($id);
    $trash->delete();

    return redirect()->route('index')->with('success', 'Data berhasil dihapus');
    }

}
