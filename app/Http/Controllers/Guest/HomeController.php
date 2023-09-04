<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $games = Game::all();
        return view('guest.welcome', compact('games'));
    }
}
