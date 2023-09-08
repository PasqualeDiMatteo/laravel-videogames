<?php

namespace App\Http\Controllers\Admin\Games;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Publisher;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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
        $publishers = Publisher::select('id', 'label')->get();
        $genres = Genre::select('id', 'name')->get();
        return view('admin.games.create', compact('publishers', 'genres'));
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
            'publisher_id' => 'nullable|exists:publishers,id',
            'genre_id' => 'nullable|exists:genres,id'
        ]);
        $game->fill($data);
        $game->save();
        if (Arr::exists($data, 'genres')) $game->genres()->attach($data['genres']);
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
        $publishers = Publisher::select('id', 'label')->get();
        $genres = Genre::select('id', 'name')->get();
        $game_genre_ids = $game->genres->pluck('id')->toArray();
        return view('admin.games.edit', compact('game', 'publishers', 'genres', 'game_genre_ids'));
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
            'publisher_id' => 'nullable|exists:publishers,id',
            'genre_id' => 'nullable|exists:genres,id'
        ]);
        $game->update($data);
        if (!Arr::exists($data, 'genres') && count($game->genres)) $game->genres()->detach();
        elseif (Arr::exists($data, 'genres')) $game->genres()->sync($data['genres']);
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
            ->with('toast-message', 'Gioco eliminato')
            ->with('game', $game->id);
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
            ->with('toast-class', 'success');
    }
}
