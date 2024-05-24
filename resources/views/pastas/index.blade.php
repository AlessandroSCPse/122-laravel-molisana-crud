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
                            <p class="card-text">{{ $pasta->description }}</p>

                            <div>
                                <a href="{{ route('pastas.show', ['pasta' => $pasta->id]) }}" class="btn btn-primary">Scopri di più</a>
                            </div>
                            
                            <div class="py-1">
                                <a href="{{ route('pastas.edit', ['pasta' => $pasta->id]) }}" class="btn btn-primary">Modifica</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection