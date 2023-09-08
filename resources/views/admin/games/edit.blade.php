@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fs-4 text-secondary my-4">
                Giochi
            </h2>
            <a class="btn btn-primary" href="{{ route('admin.games.index') }}">Torna indietro</a>
        </div>
        <div class="row justify-content-center">
            <div class="card m-4 px-0">
                <div class="row">
                    <div class="col-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.games.update', $game) }}" method="POST" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="row">

                            {{-- Title Form --}}
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title">Titolo</label>
                                    <input type="text"
                                        class="form-control @error('title') is-invalid @elseif(old('title')) is-valid @enderror"
                                        id="title" name="title" placeholder="Inserisci titolo"
                                        value="{{ old('title', $game->title) }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Release Price Form --}}
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="price">Prezzo</label>
                                    <input type="text"
                                        class="form-control @error('price') is-invalid @elseif(old('price')) is-valid @enderror"
                                        id="price" name="price" placeholder="Inserisci prezzo"
                                        value="{{ old('price', $game->price) }}" required>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Release Date Form --}}
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="date_release">Data Uscita</label>
                                    <input type="date"
                                        class="form-control @error('date_release') is-invalid @elseif(old('date_release')) is-valid @enderror"
                                        id="date_release" name="date_release" placeholder="Inserisci data d'uscita"
                                        value="{{ old('date_release', $game->date_release) }}" required>
                                    @error('date_release')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Vote Form --}}
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="vote">Voto</label>
                                    <input type="text"
                                        class="form-control @error('vote') is-invalid @elseif(old('vote')) is-valid @enderror"
                                        id="vote" name="vote" placeholder="Inserisci il voto"
                                        value="{{ old('vote', $game->vote) }}" required>
                                    @error('vote')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Developer Form --}}
                            <div class="col-6">
                                <div class="mb-3">

                                    <label for="developer_id">Sviluppatore</label>
                                    <select class="form-select" id="developer_id" name="developer_id"
                                        @error('developer_id') is-invalid @elseif(old('developer_id'))is-valid @enderror>
                                        <option value="">Nessuna
                                        </option>
                                        @foreach ($developers as $developer)
                                            <option @if (old('developer_id', $game->developer_id) == $developer->id) selected @endif
                                                value="{{ $developer->id }}">{{ $developer->label }}</option>
                                        @endforeach
                                    </select>
                                    @error('developer_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Publisher Form  --}}
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="publisher">Publisher</label>
                                    <select
                                        class="form-select @error('publisher_id') is-invalid @elseif(old('publisher_id')) is-valid @enderror"
                                        name="publisher_id" id="publisher">
                                        <option value="">Nessuno</option>
                                        @foreach ($publishers as $publisher)
                                            <option @if (old('publisher_id', $game->publisher_id) == $publisher->id) selected @endif
                                                value="{{ $publisher->id }}">
                                                {{ $publisher->label }}</option>
                                        @endforeach
                                    </select>
                                    @error('publisher_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Consoles Form  --}}
                            <div class="col-12">
                                <div class="mb-3">
                                    @foreach ($consoles as $console)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox"
                                                @if (in_array($console->id, old('consoles', $game_console_ids ?? []))) checked @endif
                                                id="tech-{{ $console->id }}" value="{{ $console->id }}"
                                                name="consoles[]">
                                            <label class="form-check-label"
                                                for="console-{{ $console->id }}">{{ $console->label }}</label>
                                        </div>
                                    @endforeach
                                    @error('console_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Cover Form  --}}
                            <div class="col-11">
                                <div class="mb-3">
                                    <label for="image">Copertina</label>
                                    <input type="url"
                                        class="form-control @error('image') is-invalid @elseif(old('image')) is-valid @enderror"
                                        id="image" name="image" placeholder="Inserisci copertina"
                                        value="{{ old('image', $game->image) }}" required>
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="mb-3">
                                    <img src="{{ $game->image }}" alt="preview" class="img-fluid"id="preview">
                                </div>
                            </div>

                            {{-- Description Form  --}}
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="description">Descrizione</label>
                                    <textarea
                                        class="form-control @error('description') is-invalid @elseif(old('description')) is-valid @enderror"
                                        placeholder="Inserisci descrizione" id="description" name="description" style="height: 100px" required>{{ old('description', $game->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-success" type="submit">Salva</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @vite('resources/js/image-preview')
@endsection
