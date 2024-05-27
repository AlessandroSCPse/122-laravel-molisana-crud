@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1>Lista prodotti</h1>

            <div class="row row-cols-4">
                @foreach ($pastas as $pasta)
                    <div class="col">
                        <div class="card my-3">
                            <img src="{{ $pasta->image }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $pasta->title }}</h5>
                                <div>Cottura: {{ $pasta->cooking_time }}</div>
                                <div>Peso: {{ $pasta->weight }}</div>

                                <div>
                                    <a href="{{ route('pastas.show', ['pasta' => $pasta->id]) }}" class="btn btn-primary">Scopri di più</a>
                                </div>
                                
                                <div class="py-1">
                                    <a href="{{ route('pastas.edit', ['pasta' => $pasta->id]) }}" class="btn btn-primary">Modifica</a>
                                </div>

                                <div class="py-1">
                                    <form action="{{ route('pastas.destroy', ['pasta' => $pasta->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger js-delete-btn" data-pasta-title="{{ $pasta->title }}" type="submit">Elimina</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Conferma eliminazione</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="modal-confirm-deletion" class="btn btn-danger">Elimina</button>
            </div>
        </div>
        </div>
    </div>
@endsection