@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-end">
            {{-- Button added --}}
            <a href="{{ route('admin.games.create') }}" class="btn btn-success">Aggiungi un gioco</a>
        </div>
        {{-- Table --}}
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col">Voto</th>
                    <th scope="col">Data d'uscita</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            {{-- Body tabel --}}
            <tbody>
                @forelse ($games as $game)
                    <tr>
                        <th scope="row">{{ $game->id }}</th>
                        <td>{{ $game->title }}</td>
                        <td>{{ $game->price }}</td>
                        <td>{{ $game->vote }}</td>
                        <td>{{ $game->date_release }}</td>
                        <td>
                            <div class="d-flex gap-2 justify-content-end">
                                <a href="{{ route('admin.games.show', $game) }}" class="btn btn-primary">Info</a>
                                <a href="" class="btn btn-warning">Modifica</a>
                                <form action="">
                                    <button class="btn btn-danger">Elimina</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <h1>Non ci sono giochi</h1>
                @endforelse
            </tbody>
    </div>
@endsection
