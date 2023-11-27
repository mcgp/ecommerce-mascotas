
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de Productos</h1>
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Categoría</th> <!-- Nueva columna para la categoría -->
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>{{ $producto->categoria->nombre }}</td>
                        <td>
                            <!-- Enlaces a las acciones, por ejemplo: -->
                            <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-info">Ver Detalles</a>
                            <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning">Editar</a>
                            <!-- Agrega un formulario para el borrado si es necesario -->
                            <!-- Formulario para eliminar -->
                            <form action="{{ route('productos.destroy', $producto->id) }}"
                                 method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return
                                 confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">No hay productos disponibles.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('productos.create') }}" class="btn btn-info">Crear Producto</a>
    </div>
@endsection
