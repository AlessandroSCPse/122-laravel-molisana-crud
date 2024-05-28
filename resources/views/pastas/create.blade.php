@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1>Crea un nuovo prodotto</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pastas.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="title" class="form-label">Titolo</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                </div>
                {{-- @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror --}}

                <div class="mb-3">
                    <label for="image" class="form-label">Immagine</label>
                    <input type="text" class="form-control" id="image" name="image" value="{{ old('image') }}">
                </div>
                {{-- @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror --}}

                <div class="mb-3">
                    <label for="type" class="form-label">Tipo</label>
                    <select class="form-select" id="type" name="type">
                        {{-- <option {{ old('type') === '' ? 'selected' : '' }} value="">Scegli un'opzione</option>
                        <option {{ old('type') === 'lunga' ? 'selected' : '' }} value="lunga">Lunga</option>
                        <option {{ old('type') === 'corta' ? 'selected' : '' }} value="corta">Corta</option>
                        <option {{ old('type') === 'cortissima' ? 'selected' : '' }} value="cortissima">Cortissima</option> --}}
                        <option @selected(old('type') === '') value="">Scegli un'opzione</option>
                        <option @selected(old('type') === 'lunga') value="lunga">Lunga</option>
                        <option @selected(old('type') === 'corta') value="corta">Corta</option>
                        <option @selected(old('type') === 'cortissima') value="cortissima">Cortissima</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="cooking_time" class="form-label">Tempo di cottura</label>
                    <input type="text" class="form-control" id="cooking_time" name="cooking_time" value="{{ old('cooking_time') }}">
                </div>

                <div class="mb-3">
                    <label for="weight" class="form-label">Peso</label>
                    <input type="text" class="form-control" id="weight" name="weight" value="{{ old('weight') }}">
                </div>

                <div class="mb-3">
                    <label for="origin_country" class="form-label">Paese d'origine</label>
                    <input type="text" class="form-control" id="origin_country" name="origin_country" value="{{ old('origin_country') }}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" id="description" rows="5" name="description">{{ old('description') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
@endsection