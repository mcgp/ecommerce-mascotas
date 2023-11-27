<!-- resources/views/productos/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $producto->nombre }}</h1>
        <p><strong>Categoría:</strong> {{ $producto->categoria->nombre }}</p>
        <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
        <p><strong>Precio:</strong> ${{ $producto->precio }}</p>

        @if ($producto->imagen)
            <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen del producto">
        @else
            <p>No hay imagen disponible</p>
        @endif

        <!-- Otros detalles del producto según sea necesario -->

        <a href="" class="btn btn-primary">Comprar</a>
    </div>
@endsection
