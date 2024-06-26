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
            $table->integer('proceso');
            $table->String('id_encargado')->nullable()->default('0');
            $table->String('id_cliente')->nullable()->default('0');
            $table->String('fecha_entrega')->nullable()->default('0000-00-00');
            //$table->Float('subtotal');
            //$table->Float('descuento');
            //$table->Float('impuestos');
            $table->Double('total_venta')->nullable()->default('00.00');
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
