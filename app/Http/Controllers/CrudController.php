<?php
// CRUD funkció (Create, Read, Update, Delete) kialakítása - Németh Ildikó

namespace App\Http\Controllers;

use App\Models\Etel;
use App\Models\Kategoria;
use Illuminate\Http\Request;

class CrudController extends Controller
{

    public function index()
    {
        $etelek = Etel::with('kategoria')->get();
        return view('crud.index', compact('etelek'));
    }


    public function create()
    {
        $kategoriak = Kategoria::all();
        return view('crud.create', compact('kategoriak'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nev' => 'required',
            'kategoria_id' => 'required|exists:kategorias,id',
            'leiras' => 'nullable',
            'felirdatum' => 'nullable|date',
            'elsodatum' => 'nullable|date'
        ]);

        Etel::create($request->all());

        return redirect()->route('crud.index')->with('success', 'Étel sikeresen hozzáadva!');
    }


    public function edit($id)
    {
        $etel = Etel::findOrFail($id);
        $kategoriak = Kategoria::all();

        return view('crud.edit', compact('etel', 'kategoriak'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nev' => 'required',
            'kategoria_id' => 'required|exists:kategorias,id',
            'leiras' => 'nullable',
            'felirdatum' => 'nullable|date',
            'elsodatum' => 'nullable|date'
        ]);

        $etel = Etel::findOrFail($id);
        $etel->update($request->all());

        return redirect()->route('crud.index')->with('success', 'Étel módosítva!');
    }


    public function destroy($id)
    {
        $etel = Etel::findOrFail($id);
        $etel->delete();

        return redirect()->route('crud.index')->with('success', 'Étel törölve!');
    }
}
