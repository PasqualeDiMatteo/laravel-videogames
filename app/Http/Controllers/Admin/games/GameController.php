<?php

namespace App\Http\Controllers\Admin\Games;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //request all
        $games = Game::all();
        return view("admin.games.index", compact("games"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.games.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $game = new Game();
        $request->validate([
            'title' => 'required|string',
            'price' => 'required|string',
            'date_release' => 'required|string',
            'image' => 'required|string',
            'vote' => 'required|string',
            'description' => 'required|string',
        ]);
        $game->fill($data);
        $game->save();
        return to_route('admin.games.show', $game);
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return view('admin.games.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        $game->delete();
        return to_route('admin.games.index');
    }

    // Trash Game
    public function trash()
    {
        $games = Game::onlyTrashed()->get();
        return view('admin.games.trash', compact('games'));
    }

    // Drop game
    public function drop(string $id)
    {
        $game = Game::onlyTrashed()->findOrFail($id);
        $game->forceDelete();
        return to_route('admin.games.trash');
    }
}
