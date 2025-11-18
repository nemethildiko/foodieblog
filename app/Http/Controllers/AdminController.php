<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Uzenet;

class AdminController extends Controller
{
    public function index()
    {
        // Statisztikák
        $stats = [
            'users' => User::count(),
            'messages' => Uzenet::count(),
            'admins' => User::where('role', 'admin')->count(),
        ];

        // Legutóbbi üzenetek
        $latestMessages = Uzenet::with('user')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.index', compact('stats', 'latestMessages'));
    }
}
