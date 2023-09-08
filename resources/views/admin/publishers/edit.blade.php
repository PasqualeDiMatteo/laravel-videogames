{{-- Extend admin --}}
@extends('layouts.app')

{{-- Titolo --}}
@section('title', 'Update')

{{-- Main --}}
@section('content')

    <H1 class="text-center my-4">Modifica un Distributore</H1>
    <div class="container">
        {{-- Form --}}
        <form action="{{ route('admin.publishers.update', $publisher) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="label" class="form-label">Distributore</label>
                <input type="text" class="form-control" id="label" name="label"
                    value="{{ old('label', $publisher->label) }}">
            </div>
            <select class="form-select" id="color" name="color">
                <option selected>Nessuno</option>
                @foreach ($colors as $color)
                    <option value="{{ $color['color'] }}"@if (old('color', $publisher->color) == $color['color']) selected @endif>
                        {{ $color['info'] }}</option>
                @endforeach
                {{-- Buttons --}}
            </select>
            <div class="col-12 d-flex align-items-center justify-content-start mt-3">
                <button type="reset" class="btn btn-primary me-2">Reset</button>
                <button class="btn btn-success">Aggiungi</button>
            </div>
        </form>
    </div>
@endsection
{{-- Scripts --}}
@section('scripts')
    @vite('resources/js/preview-image.js')
@endsection
