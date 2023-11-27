@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles de la Categoría</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nombre: {{ $categoria->nombre }}</h5>
                <!-- Puedes mostrar más detalles según tus necesidades -->

                <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
