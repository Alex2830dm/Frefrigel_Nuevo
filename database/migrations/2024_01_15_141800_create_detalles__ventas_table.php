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
        Schema::create('detalles_ventas', function (Blueprint $table) {
            $table->id();
            $table->string('folio_venta');
            $table->integer('id_producto');
            $table->float('cantidad_venta');
            $table->float('importe_venta')->default('00.00');
            $table->boolean('entregado')->default(0);
            //$table->float('descuento')->default('00.00');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_ventas');
    }
};
