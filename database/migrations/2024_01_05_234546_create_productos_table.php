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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('codeProduct')->comment('Código Producto');
            $table->string('nameProduct')->comment('Producto');
            $table->string('descriptionProduct')->comment('Descripción');
            $table->string('unitProduct')->comment('Unidad');
            $table->integer('cantidadUnit')->comment('Cantidad por Unidad');
            $table->integer('cantidad_Stock')->comment('Cantidad Stock')->default(0);
            $table->float('priceProduct')->comment('Precio por cajas');
            $table->integer('linea_producto')->comment('Linea de Producto');
            $table->integer('id_categoria')->comment('Categoria del producto');
            $table->string('foto');
            $table->boolean('activo')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
