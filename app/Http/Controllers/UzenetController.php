<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uzenet;

class UzenetController extends Controller
{
    public function index()
    {

        $uzenetek = Uzenet::orderBy('created_at', 'desc')->get();


        return view('uzenetek.index', compact('uzenetek'));
    }
}
