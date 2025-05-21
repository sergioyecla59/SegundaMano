<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categorias')->insert([
            ['id' => 1, 'nombre' => 'Hogar'],
            ['id' => 2, 'nombre' => 'Libros'],
            ['id' => 3, 'nombre' => 'Coches'],
            ['id' => 4, 'nombre' => 'Moda y accesorios'],
            ['id' => 5, 'nombre' => 'Tecnología y electrónica'],
            ['id' => 6, 'nombre' => 'Consola y videojuegos'],
            ['id' => 7, 'nombre' => 'Deportes'],
        ]);
    }
}
