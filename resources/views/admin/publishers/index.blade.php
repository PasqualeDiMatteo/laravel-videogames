{{-- Extend admin --}}
@extends('layouts.app')

{{-- Titolo --}}
@section('title', 'Publisher')

{{-- Main --}}
@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary mt-4">
            {{ __('Dashboard') }}
        </h2>
        {{-- !! Aggiungi --}}
        <div class="d-flex justify-content-end mb-3"><a href="{{ route('admin.publishers.create') }}"
                class="btn btn-success ">Aggiungi Distributore</a>
        </div>
        {{-- Table --}}
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Label</th>
                    <th scope="col">Colore</th>
                    <th scope="col">Data Creazione</th>
                    <th scope="col">Data Ultima Modifica</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($publishers as $publisher)
                    <tr>
                        <th scope="row" class="align-middle">{{ $publisher->id }}</th>
                        <td class="align-middle">{{ $publisher->label }}</td>
                        <td class="align-middle">{{ $publisher->color }}</td>
                        <td class="align-middle">{{ $publisher->created_at }}</td>
                        <td class="align-middle">{{ $publisher->updated_at }}</td>
                        <td>
                            <div class="d-flex justify-content-end gap-2 ">
                                {{-- !! Info --}}
                                <a href="{{ route('admin.publishers.show', $publisher) }}"
                                    class="btn btn-primary btn-sm">Info</a>
                                {{-- !! Modifica --}}
                                <a href="{{ route('admin.publishers.edit', $publisher) }}"
                                    class="btn btn-warning btn-sm">Modifica</a>
                                {{-- !! Cancella --}}
                                <form action="{{ route('admin.publishers.destroy', $publisher) }}"method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Elimina</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <td colspan="6">
                        <h3>Non ci sono progetti</h3>
                    </td>
                @endforelse
            </tbody>
        </table>
        {{-- !! Cestino --}}
        <a href="#">Cestino</a>
    </div>
@endsection
