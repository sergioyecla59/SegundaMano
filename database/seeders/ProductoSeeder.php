<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        // 🏠 Hogar (ID 1)
        Producto::create(['nombre' => 'Lámpara de escritorio', 'precio' => 15.99, 'imagen_url' => 'https://via.placeholder.com/300x180', 'categoria_id' => 1, 'user_id' => 1]);
        Producto::create(['nombre' => 'Alfombra suave', 'precio'=>10.54,  'imagen_url' => 'https://via.placeholder.com/300x180', 'categoria_id' => 1, 'user_id' => 1]);
        Producto::create(['nombre' => 'Cojín decorativo', 'precio' => 9.50, 'imagen_url' => 'https://via.placeholder.com/300x180', 'categoria_id' => 1,'user_id' => 1]);
        Producto::create(['nombre' => 'Mesa plegable', 'precio' => 39.00, 'imagen_url' => 'https://via.placeholder.com/300x180', 'categoria_id' => 1,'user_id' => 1]);

        // 📚 Libros (ID 2)
        Producto::create(['nombre' => '1984 - George Orwell', 'precio' => 10.00, 'imagen_url' => 'https://via.placeholder.com/300x180', 'categoria_id' => 2, 'user_id' => 1]);
        Producto::create(['nombre' => 'Cien años de soledad', 'precio' => 14.95, 'imagen_url' => 'https://via.placeholder.com/300x180', 'categoria_id' => 2, 'user_id' => 1]);
        Producto::create(['nombre' => 'Sapiens', 'precio' => 18.50, 'imagen_url' => 'https://via.placeholder.com/300x180', 'categoria_id' => 2,'user_id' => 1]);

        // 🚗 Coches (ID 3)
        Producto::create(['nombre' => 'Limpiaparabrisas', 'precio' => 8.99, 'imagen_url' => 'https://via.placeholder.com/300x180', 'categoria_id' => 3, 'user_id' => 1]);
        Producto::create(['nombre' => 'Soporte móvil para coche', 'precio' => 11.00, 'imagen_url' => 'https://via.placeholder.com/300x180', 'categoria_id' => 3, 'user_id' => 1]);
        Producto::create(['nombre' => 'Alfombrillas de coche', 'precio' => 19.99, 'imagen_url' => 'https://via.placeholder.com/300x180', 'categoria_id' => 3, 'user_id' => 1]);

        // 👗 Moda y accesorios (ID 4)
        Producto::create(['nombre' => 'Gafas de sol', 'precio' => 22.00, 'imagen_url' => 'https://via.placeholder.com/300x180', 'categoria_id' => 4, 'user_id' => 1]);
        Producto::create(['nombre' => 'Reloj digital', 'precio' => 35.99, 'imagen_url' => 'https://via.placeholder.com/300x180', 'categoria_id' => 4, 'user_id' => 1]);
        Producto::create(['nombre' => 'Mochila urbana', 'precio' => 27.50, 'imagen_url' => 'https://via.placeholder.com/300x180', 'categoria_id' => 4,'user_id' => 1]);

        // 💻 Tecnología y electrónica (ID 5)
        Producto::create(['nombre' => 'Auriculares Bluetooth', 'precio' => 49.99, 'imagen_url' => 'https://via.placeholder.com/300x180', 'categoria_id' => 5, 'user_id' => 1]);
        Producto::create(['nombre' => 'Ratón ergonómico', 'precio' => 24.95, 'imagen_url' => 'https://via.placeholder.com/300x180', 'categoria_id' => 5, 'user_id' => 1]);

        // 🎮 Consola y videojuegos (ID 6)
        Producto::create(['nombre' => 'Mando para PS5', 'precio' => 69.99, 'imagen_url' => 'https://via.placeholder.com/300x180', 'categoria_id' => 6, 'user_id' => 1]);
        Producto::create(['nombre' => 'The Last of Us Part II', 'precio' => 29.99, 'imagen_url' => 'https://via.placeholder.com/300x180', 'categoria_id' => 6, 'user_id' => 1]);
        Producto::create(['nombre' => 'Auriculares gaming', 'precio' => 34.99, 'imagen_url' => 'https://via.placeholder.com/300x180', 'categoria_id' => 6, 'user_id' => 1]);

        // 🏀 Deportes (ID 7)
        Producto::create(['nombre' => 'Cinta de correr portátil', 'precio' => 299.00, 'imagen_url' => 'https://via.placeholder.com/300x180', 'categoria_id' => 7, 'user_id' => 1]);
        Producto::create(['nombre' => 'Botella deportiva', 'precio' => 12.00, 'imagen_url' => 'https://via.placeholder.com/300x180', 'categoria_id' => 7, 'user_id' => 1]);
    }
}
