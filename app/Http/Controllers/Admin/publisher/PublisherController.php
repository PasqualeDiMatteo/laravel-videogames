<?php

namespace App\Http\Controllers\Admin\publisher;

use App\Http\Controllers\Controller;
use App\Models\Publisher;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $publishers = Publisher::paginate(5);
        return view('admin.publishers.index', compact("publishers"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $publisher = new Publisher();
        $colors = config('color');
        return view("admin.publishers.create", compact("publisher", "colors"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'label' => 'required|unique:publishers|string',
            "color" => "nullable",

        ], [
            "label.required" => "Il Nome è mancante",
            "label.unique" => "Il Nome esiste già",
        ]);

        $new_publisher = new Publisher();
        $new_publisher->label = $request->label;
        $new_publisher->color = $request->color;

        $new_publisher->save();
        return to_route("admin.publishers.index")->with("type", "success")->with("message", "Distributore caricato con successo");
    }
    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        //
        return view("admin.publishers.show", compact("publisher"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
        //
        $colors = config('color');
        return view("admin.publishers.edit", compact("publisher", "colors"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publisher $publisher)
    {
        //
        $request->validate([
            'label' =>  ["required", "string", Rule::unique("publishers")->ignore($publisher->id)],
            "color" => "nullable",

        ], [
            "label.required" => "Il Nome è mancante",
            "label.unique" => "Il Nome esiste già",
        ]);

        $publisher->label = $request->label;
        $publisher->color = $request->color;
        $publisher->save();
        return to_route('admin.publishers.index')->with("type", "success")->with("message", "Distributore modificato con successo");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        //
        $publisher->delete();
        return to_route("admin.publishers.index")->with("type", "success")->with("message", "Distributore cancellato con successo");
    }
}
