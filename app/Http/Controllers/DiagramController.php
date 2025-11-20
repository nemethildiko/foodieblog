<?php
// Diagram oldal logikája és adatlekérése - Németh Ildikó

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etel;

class DiagramController extends Controller
{
    public function index()
    {
        $data = Etel::with('kategoria')->get();
        return view('diagram.index', compact('data'));
    }
}
