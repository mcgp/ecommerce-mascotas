@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de Productos</h1>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $product->imagen) }}" class="card-img-top" alt="Imagen del Producto">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->nombre }}</h5>
                            <p class="card-text">{{ $product->descripcion }}</p>
                            <p class="card-text">Precio: ${{ $product->precio }}</p>
                        </div>
                        <a href="{{ route('productos.show', $product->id) }}" class="btn btn-info">Ver Detalles</a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="form-group">
            <label for="categoria">Categoría:</label>
            <select name="categoria" id="categoria" class="form-control" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>

        <!-- Formulario para enviar un correo -->
        <div class="mt-4">
            <h2>Contactar al Vendedor</h2>
            <form action="{{ route('enviar-correo') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">Tu Correo Electrónico:</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="mensaje">Mensaje:</label>
                    <textarea name="mensaje" id="mensaje" class="form-control" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar Correo</button>
            </form>
        </div>
    </div>
@endsection
