@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Categoría</h1>

        <form method="POST" action="{{ route('productos.update', ['producto' => $product->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre">Nombre de la Categoría</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $categoria->nombre) }}" required>
            </div>


            <button type="submit" class="btn btn-primary">Actualizar Categoría</button>
        </form>
    </div>
@endsection
