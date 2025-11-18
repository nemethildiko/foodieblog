<?php

namespace App\Http\Controllers;

use App\Models\Hasznalt;

class HasznaltController extends Controller
{
    public function index()
    {
        $hasznalt = Hasznalt::with(['etel', 'hozzavalo'])->get();
        return view('hasznalt.index', compact('hasznalt'));
    }
}
