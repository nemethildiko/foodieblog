<?php

namespace App\Http\Controllers;

use App\Models\Etel;
use Illuminate\Http\Request;

class EtelController extends Controller
{
    public function index()
{
    $etelek = Etel::with(['kategoria', 'hozzavalok'])->get();
    return view('etelek.index', compact('etelek'));
}

}
