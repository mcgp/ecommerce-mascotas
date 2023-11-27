@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nueva Categoría</h1>

        <form method="POST" action="{{ route('categorias.store') }}">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre de la Categoría</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Crear Categoría</button>
        </form>
    </div>
@endsection
