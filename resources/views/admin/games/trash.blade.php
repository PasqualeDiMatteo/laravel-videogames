@extends('layouts.app')

@section('title', 'Cestino')

@section('content')

    <div class="container">
        <h1 class="text-center my-3">Cancellati</h1>
        <div class="row">


            @forelse ($games as $game)
                <div class="card col-6 m-3" style="width: 18rem;">
                    <img src="{{ $game->img }}" class="card-img-top" alt="Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $game->title }}</h5>

                        {{-- Buttons --}}
                        <div class="d-flex justify-content-evenly">

                            {{-- Delete Button --}}
                            <form class="form-delete" action="{{ route('admin.games.drop', $game) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Elimina Definitivamente</button>
                            </form>

                            {{-- Restore Button --}}
                            {{-- !! ADD RESTORE ROUTE --}}
                            <form action="" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-success">Ripristina</button>
                            </form>

                        </div>
                    </div>
                </div>

            @empty
                <div class="alert alert-success">Non ci sono elementi</div>
            @endforelse

            <div class="d-flex justify-content-center">

                {{-- All games Button --}}
                <a href="{{ route('admin.games.index') }}" class="btn btn-primary">Tutti i giochi</a>

            </div>
        </div>
    </div>

@endsection
