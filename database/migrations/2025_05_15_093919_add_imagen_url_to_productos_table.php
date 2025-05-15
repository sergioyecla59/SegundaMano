<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 // database/migrations/xxxx_xx_xx_add_imagen_to_productos_table.php

public function up()
{
    Schema::table('productos', function (Blueprint $table) {
        $table->string('imagen_url')->nullable();
    });
}

public function down()
{
    Schema::table('productos', function (Blueprint $table) {
        $table->dropColumn('imagen_url');
    });
}

};
