@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1>Modifica il prodotto: {{ $pasta->title }}</h1>

            <form action="{{ route('pastas.update', ['pasta' => $pasta->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                  <label for="title" class="form-label">Titolo</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{ $pasta->title }}">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Immagine</label>
                    <input type="text" class="form-control" id="image" name="image" value="{{ $pasta->image }}">
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Tipo</label>
                    <select class="form-select" id="type" name="type">
                        <option>Scegli un'opzione</option>
                        <option {{ $pasta->type === 'lunga' ? 'selected' : '' }} value="lunga">Lunga</option>
                        <option {{ $pasta->type === 'corta' ? 'selected' : '' }} value="corta">Corta</option>
                        <option {{ $pasta->type === 'cortissima' ? 'selected' : '' }} value="cortissima">Cortissima</option>
                      </select>
                </div>

                <div class="mb-3">
                    <label for="cooking_time" class="form-label">Tempo di cottura</label>
                    <input type="text" class="form-control" id="cooking_time" name="cooking_time" value="{{ $pasta->cooking_time }}">
                </div>

                <div class="mb-3">
                    <label for="weight" class="form-label">Peso</label>
                    <input type="text" class="form-control" id="weight" name="weight" value="{{ $pasta->weight }}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" id="description" rows="5" name="description">{{ $pasta->description }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
@endsection