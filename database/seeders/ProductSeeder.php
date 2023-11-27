<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Categoria;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Crear categorías
        $limpiezaCategoria = Categoria::create(['nombre' => 'Limpieza']);
        $comidaCategoria = Categoria::create(['nombre' => 'Comida']);

        // Crear productos de limpieza con imágenes
        Producto::create([
            'nombre' => 'Detergente',
            'descripcion' => 'Detergente para platos',
            'precio' => 5.99,
            'categoria_id' => $limpiezaCategoria->id,
            'imagen' => 'productos/m8HbHtrIl4KhDq3QYIcYyUNPJrhPi6iZRuc8CvVe.png', // Ruta de la imagenn
        ]);

        Producto::create([
            'nombre' => 'Limpiador Multiusos',
            'descripcion' => 'Limpiador multiusos para el hogar',
            'precio' => 3.99,
            'categoria_id' => $limpiezaCategoria->id,
            'imagen' => 'productos/m8HbHtrIl4KhDq3QYIcYyUNPJrhPi6iZRuc8CvVe.png', // Ruta de la imagenn
        ]);

        // Crear productoos de comida con imágenes
        Producto::create([
            'nombre' => 'Arroz',
            'descripcion' => 'Arroz de calidad premium',
            'precio' => 2.49,
            'categoria_id' => $comidaCategoria->id,
            'imagen' => 'productos/tZ2QaYJVYYhuNcWzWarJxH9zTdkbCoimtcNZucHw.jpg', // Ruta de la imagenn
        ]);

        Producto::create([
            'nombre' => 'Sopa enlatada',
            'descripcion' => 'Sopa lista para calentar y disfrutar',
            'precio' => 1.99,
            'categoria_id' => $comidaCategoria->id,
            'imagen' => 'productos/tZ2QaYJVYYhuNcWzWarJxH9zTdkbCoimtcNZucHw.jpg', // Ruta de la imagenn
        ]);

        // Agregar más productoos según sea necesario
    }
}
