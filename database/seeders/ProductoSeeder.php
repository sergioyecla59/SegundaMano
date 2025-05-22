<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        // 🏠 Hogar (ID 1)
        Producto::create(['nombre' => 'Lámpara de escritorio', 'precio' => 15.99, 'imagen_url' => 'https://iluminaciondediseño.com/cdn/shop/files/lampara_de_mesa_blanco_y_dorado.jpg?v=1739523652', 'categoria_id' => 1, 'user_id' => 1]);
        Producto::create(['nombre' => 'Alfombra suave', 'precio'=>10.54,  'imagen_url' => 'https://m.media-amazon.com/images/I/71-8zQ6l68L._AC_UF894,1000_QL80_.jpg', 'categoria_id' => 1, 'user_id' => 1]);
        Producto::create(['nombre' => 'Cojín decorativo', 'precio' => 9.50, 'imagen_url' => 'https://pictureserver.net/pic_storage/pic/15/0a/undef_src_sa_picid_839089_x_1000_type_color_quality_100_image.jpg?ver=5', 'categoria_id' => 1,'user_id' => 1]);
        Producto::create(['nombre' => 'Mesa plegable', 'precio' => 39.00, 'imagen_url' => 'https://www.oviala.es/15556-big_default/mesa-de-jardin-con-tablero-de-ceramica-con-efecto-de-hormigon-encerado-182-x-121-x-74-cm.jpg', 'categoria_id' => 1,'user_id' => 1]);

        // 📚 Libros (ID 2)
        Producto::create(['nombre' => '1984 - George Orwell', 'precio' => 10.00, 'imagen_url' => 'https://www.libreriaalberti.com/media/img/portadas/_visd_0000JPG02KVE.jpg', 'categoria_id' => 2, 'user_id' => 1]);
        Producto::create(['nombre' => 'Cien años de soledad', 'precio' => 14.95, 'imagen_url' => 'https://airenuestro.com/wp-content/uploads/2017/05/cienac3b1os-portada-2x.jpg', 'categoria_id' => 2, 'user_id' => 1]);
        Producto::create(['nombre' => 'Sapiens', 'precio' => 18.50, 'imagen_url' => 'https://m.media-amazon.com/images/I/713jIoMO3UL.jpg', 'categoria_id' => 2,'user_id' => 1]);

        // 🚗 Coches (ID 3)
        Producto::create(['nombre' => 'Limpiaparabrisas', 'precio' => 8.99, 'imagen_url' => 'https://cdn-prod-eu.yepgarage.info/upload/euromaster-es/catalog/1609832610124/cmo-cambiar-los-limpiaparabrisas-del-coche-4.jpg?411261536', 'categoria_id' => 3, 'user_id' => 1]);
        Producto::create(['nombre' => 'Soporte móvil para coche', 'precio' => 11.00, 'imagen_url' => 'https://vysan.es/4255-large_default/soporte-telefono-movil-para-salida-de-ventilacion-del-coche-con-rotacion-de-360-grados.jpg', 'categoria_id' => 3, 'user_id' => 1]);
        Producto::create(['nombre' => 'Alfombrillas de coche', 'precio' => 19.99, 'imagen_url' => 'https://www.portaldetuciudad.com/imagenes/2/noticias/amp_651824-1.jpg', 'categoria_id' => 3, 'user_id' => 1]);

        // 👗 Moda y accesorios (ID 4)
        Producto::create(['nombre' => 'Gafas de sol', 'precio' => 22.00, 'imagen_url' => 'https://e00-expansion.uecdn.es/assets/multimedia/imagenes/2023/02/01/16752529056126.jpg', 'categoria_id' => 4, 'user_id' => 1]);
        Producto::create(['nombre' => 'Reloj digital', 'precio' => 35.99, 'imagen_url' => 'https://i.pinimg.com/736x/be/77/f2/be77f28cb384ca6b21a00131c4185d71.jpg', 'categoria_id' => 4, 'user_id' => 1]);
        Producto::create(['nombre' => 'Mochila urbana', 'precio' => 27.50, 'imagen_url' => 'https://images.napali.app/global/billabong-products/all/default/large/abybp00141_billabong,l_blk_frt1.jpg', 'categoria_id' => 4,'user_id' => 1]);

        // 💻 Tecnología y electrónica (ID 5)
        Producto::create(['nombre' => 'Auriculares Bluetooth', 'precio' => 49.99, 'imagen_url' => 'https://i.blogs.es/1fdc17/google-pixel-buds-pro-6/450_1000.webp', 'categoria_id' => 5, 'user_id' => 1]);
        Producto::create(['nombre' => 'Ratón ergonómico', 'precio' => 24.95, 'imagen_url' => 'https://electronicarey.com/33904-large_default/raton-optico-ergonomico-inalambrico-bateria-recargable.jpg', 'categoria_id' => 5, 'user_id' => 1]);

        // 🎮 Consola y videojuegos (ID 6)
        Producto::create(['nombre' => 'Mando para PS5', 'precio' => 69.99, 'imagen_url' => 'https://i0.wp.com/imgs.hipertextual.com/wp-content/uploads/2022/06/Mando-Scuf-Reflex-PS5-05.jpg?fit=2500%2C1667&quality=50&strip=all&ssl=1', 'categoria_id' => 6, 'user_id' => 1]);
        Producto::create(['nombre' => 'The Last of Us Part II', 'precio' => 29.99, 'imagen_url' => 'https://m.media-amazon.com/images/I/81d0Z3upHEL._AC_UF894,1000_QL80_.jpg', 'categoria_id' => 6, 'user_id' => 1]);
        Producto::create(['nombre' => 'Auriculares gaming', 'precio' => 34.99, 'imagen_url' => 'https://m.media-amazon.com/images/S/aplus-media-library-service-media/6d4979e0-7874-499c-a0be-099e95f2af7e.__CR25,0,600,450_PT0_SX600_V1___.jpg', 'categoria_id' => 6, 'user_id' => 1]);

        // 🏀 Deportes (ID 7)
        Producto::create(['nombre' => 'Cinta de correr portátil', 'precio' => 299.00, 'imagen_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTyj5wcvCc-JW2-wZxg79ACijxABk3S6kMriw&s', 'categoria_id' => 7, 'user_id' => 1]);
        Producto::create(['nombre' => 'Botella deportiva', 'precio' => 12.00, 'imagen_url' => 'https://waterdrop.es/cdn/shop/products/ATP-2024-Gallery-3.png?v=1707143738', 'categoria_id' => 7, 'user_id' => 1]);
    }
}
