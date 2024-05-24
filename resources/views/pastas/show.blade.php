@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $pasta->title }}</h1>

        <img src="{{ $pasta->image }}" class="card-img-top" alt="...">

        <div>Cottura: {{ $pasta->cooking_time }}</div>
        <div>Peso: {{ $pasta->weight }}</div>
        <div>Tipo: {{ $pasta->type }}</div>
        <p class="card-text">{{ $pasta->description }}</p>
    </div>
@endsection