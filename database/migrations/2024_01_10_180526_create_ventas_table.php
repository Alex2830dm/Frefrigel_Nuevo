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
            $table->String('id_encargado');
            $table->String('id_cliente');
            //$table->Float('subtotal');
            //$table->Float('descuento');
            //$table->Float('impuestos');
            $table->Double('total_venta');
            $table->date('fecha_venta');
            $table->timestamps();
        });

        Schema::create('detalles_ventas', function (Blueprint $table) {
            $table->id();
            $table->string('folio_venta');
            $table->integer('id_producto');
            $table->float('cantidad_venta');
            $table->float('importe_venta');
            //$table->float('descuento')->default('00.00');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
        Schema::dropIfExists('detalles_ventas');
    }
};
