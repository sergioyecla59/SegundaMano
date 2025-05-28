<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categorias')->insert([
            ['id' => 1, 'nombre' => 'Hogar', 'imagen_url' => 'https://images.unsplash.com/photo-1583847268964-b28dc8f51f92?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aG9nYXJ8ZW58MHx8MHx8fDA%3D'],
            ['id' => 2, 'nombre' => 'Libros', 'imagen_url' => 'https://images.unsplash.com/photo-1535905557558-afc4877a26fc?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8bGlicm9zfGVufDB8fDB8fHww'],
            ['id' => 3, 'nombre' => 'Coches', 'imagen_url' => 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8Y29jaGVzfGVufDB8fDB8fHww'],
            ['id' => 4, 'nombre' => 'Moda y accesorios', 'imagen_url' => 'https://images.unsplash.com/photo-1485518882345-15568b007407?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fG1vZGF8ZW58MHx8MHx8fDA%3D'],
            ['id' => 5, 'nombre' => 'Tecnología y electrónica', 'imagen_url' => 'https://images.unsplash.com/photo-1588508065123-287b28e013da?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fGVsZWN0cm9uaWNhfGVufDB8fDB8fHww'],
            ['id' => 6, 'nombre' => 'Consola y videojuegos', 'imagen_url' => 'https://images.unsplash.com/photo-1579373903781-fd5c0c30c4cd?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fHZpZGVvanVlZ29zfGVufDB8fDB8fHww'],
            ['id' => 7, 'nombre' => 'Deportes', 'imagen_url' => 'https://images.unsplash.com/photo-1565992441121-4367c2967103?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fGRlcG9ydGVzfGVufDB8fDB8fHww'],
        ]);
    }
}
