<?php
// Kategóriák kilistázása – készítette: Mészáros Eszter

namespace App\Http\Controllers;

use App\Models\Kategoria;

class KategoriaController extends Controller
{
    public function index()
    {
        $kategoriak = Kategoria::all();
        return view('kategoriak.index', compact('kategoriak'));
    }
}
