<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uzenet;

class KapcsolatController extends Controller
{

    public function index()
    {
        return view('kapcsolat.index');
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'nev' => 'required|string|max:100',
            'email' => 'required|email',
            'uzenet' => 'required|string|max:500',
        ]);


        Uzenet::create($validated);

        return redirect()->route('kapcsolat')->with('success', 'Üzenet sikeresen elküldve!');
    }
}
