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
        return to_route('admin.games.show', $game)->with("type", "success")->with("message", "Gioco caricato con successo");
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
        return view('admin.games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        $data = $request->all();
        $request->validate([
            'title' => 'required|string',
            'price' => 'required|string',
            'date_release' => 'required|string',
            'image' => 'required|string',
            'vote' => 'required|string',
            'description' => 'required|string',
        ]);
        $game->title = $data['title'];
        $game->price = $data['price'];
        $game->date_release = $data['date_release'];
        $game->image = $data['image'];
        $game->vote = $data['vote'];
        $game->description = $data['description'];
        $game->save();
        return to_route('admin.games.index')->with('type', 'success')->with('message', 'Gioco modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        $game->delete();
        return to_route('admin.games.index')
            ->with("type", "success")
            ->with("message", "Gioco cancellato con successo")
            ->with('toast-class', 'success')
            ->with('toast-message', 'Gioco eliminato');
    }

    // Trash Game
    public function trash()
    {
        $games = Game::onlyTrashed()->get();
        return view('admin.games.trash', compact('games'));
    }

    // Drop Game
    public function drop(string $id)
    {
        $game = Game::onlyTrashed()->findOrFail($id);
        $game->forceDelete();
        return to_route('admin.games.trash')->with("type", "success")->with("message", "Gioco cancellato definitivamente");
    }

    // Restore Game
    public function restore(string $id)
    {
        $game = Game::onlyTrashed()->findOrFail($id);
        $game->restore();
        return to_route('admin.games.index')
            ->with('toast-class', 'success')
            ->with('toast-message', 'Gioco eliminato');
    }
}
