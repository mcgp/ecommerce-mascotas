<?php

// database/seeders/CategoriaSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        // Eliminar registros existentes para evitar duplicados
        Categoria::truncate();

        // Insertar datos de prueba
        Categoria::create(['nombre' => 'Higiene']);
        Categoria::create(['nombre' => 'comida']);
        Categoria::create(['nombre' => 'juguetes']);
        // Agrega más categorías según sea necesario
    }
}
