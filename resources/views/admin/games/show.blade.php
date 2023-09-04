@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex mb-5">
            <img src="{{ $game->image }}" alt="{{ $game->title }}">
            <div class="ms-5">
                <h1><strong>{{ $game->title }}</strong></h1>
                <p><strong>{{ $game->price }}</strong></p>
                <p>Uscito il {{ $game->date_release }}</p>
            </div>
        </div>
        <p>{{ $game->title }}:{{ $game->description }}</p>
        <div class="d-flex justify-content-between my-5">
            <a class="btn btn-sm btn-warning me-2" href="{{ route('admin.games.edit', $game) }}"><i class="fas fa-pencil"></i>
                modifica</a>
            Quanto i nostri utenti l'hanno apprezzato:{{ $game->vote }}
        </div>
    </div>
@endsection
