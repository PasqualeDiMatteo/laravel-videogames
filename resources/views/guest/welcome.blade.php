@extends('layouts.app')
@section('content')
    <div class="jumbotron bg-dark">
        <div class="container py-5">
            <div class="d-flex justify-content-center align-items-center">
                <h1 class="text-white">Lista Videogames</h1>
                <i class="ms-4 fa-brands fa-playstation text-white fa-2x"></i>
                <i class="ms-4 fa-brands fa-xbox text-white fa-2x"></i>
                <i class="ms-4 fa-brands fa-steam text-white fa-2x"></i>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container p-2">
            <div class="row">
                @forelse ($games as $game)
                    <div class="card p-0 mx-2 mt-4" style="width: 18rem;">
                        <img src="{{ $game->image }}" class="card-img-top img-fluid" style="height: 300px"
                            alt="{{ $game->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $game->title }}</h5>
                            <p>Prezzo: {{ $game->price }}</p>
                            <p>Voto: {{ $game->vote }}</p>
                            <p>Rilascio:{{ $game->date_release }}</p>
                            <a class="btn btn-primary" href="{{ route('admin.games.show', $game) }}">Guarda</a>
                        </div>
                    </div>
                @empty
                    <h3>Non ci sono giochi</h3>
                @endforelse
            </div>
        </div>
    </div>
@endsection
