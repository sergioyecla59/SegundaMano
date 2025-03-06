<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_comprador')->constrained('users')->onDelete('cascade'); // Relación con 'users' (comprador)
            $table->foreignId('id_vendedor')->constrained('users')->onDelete('cascade'); // Relación con 'users' (vendedor)
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade'); // Relación con 'productos'
            $table->decimal('total', 8, 2); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
