{{-- Extend admin --}}
@extends('layouts.app')

{{-- Titolo --}}
@section('title', $publisher->label)

{{-- Main --}}
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5 ">
            <div class="col-8">
                {{-- Card --}}
                <div class="card mb-3 py-2">
                    <div class="row g-0 justify-content-center">
                        <div class=" col-10 ">
                            <div class="card-body">
                                <h5 class="card-title">{{ $publisher->label }}</h5>
                                <p class="card-text">{{ $publisher->color }}</p>
                                <p class="card-text">Creato il: <small
                                        class="text-body-secondary">{{ $publisher->created_at }}</small>
                                </p>
                                <p class="card-text">Ultima modifica: <small
                                        class="text-body-secondary">{{ $publisher->updated_at }}</small>
                                </p>
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.publishers.index') }}" class="btn btn-secondary">Torna
                                        indietro</a>
                                    {{-- !! Cancella --}}
                                    <form action="#"method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Elimina</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
