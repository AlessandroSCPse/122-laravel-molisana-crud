@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1>Crea un nuovo prodotto</h1>

            <form action="{{ route('pastas.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="title" class="form-label">Titolo</label>
                  <input type="text" class="form-control" id="title" name="title">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Immagine</label>
                    <input type="text" class="form-control" id="image" name="image">
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Tipo</label>
                    <select class="form-select" id="type" name="type">
                        <option selected>Scegli un'opzione</option>
                        <option value="lunga">Lunga</option>
                        <option value="corta">Corta</option>
                        <option value="cortissima">Cortissima</option>
                      </select>
                </div>

                <div class="mb-3">
                    <label for="cooking_time" class="form-label">Tempo di cottura</label>
                    <input type="text" class="form-control" id="cooking_time" name="cooking_time">
                </div>

                <div class="mb-3">
                    <label for="weight" class="form-label">Peso</label>
                    <input type="text" class="form-control" id="weight" name="weight">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" id="description" rows="5" name="description"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
@endsection