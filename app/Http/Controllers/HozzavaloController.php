<?php

namespace App\Http\Controllers;

use App\Models\Hozzavalo;

class HozzavaloController extends Controller
{
    public function index()
    {
        $hozzavalok = Hozzavalo::all();
        return view('hozzavalok.index', compact('hozzavalok'));
    }
}

