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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nameClient')->comment('Cliente / Compañia');
            $table->string('rsCliente')->comment('Razón Social de la compañia')->nullable()->default('NA');
            $table->string('phoneClient')->comment('Teléfono de la compañia')->nullable()->default('NA');
            $table->string('emailClient')->comment('Correo de la compañia')->nullable()->default('NA');
            $table->string('contactClient')->comment('Nombre del contacto');
            $table->string('jobcontactClient')->comment('Puesto del contacto');
            $table->string('phonecontactClient')->comment('Teléfono del contacto');
            $table->string('emailcontactClient')->comment('Correo del contacto');
            $table->string('addressStreet')->comment('Dirección - Calle');
            $table->string('addressColony')->comment('Dirección - Colonia');
            $table->string('addressMunicipality')->comment('Dirección - Municipio');
            $table->string('addressState')->comment('Dirección - Estado');
            $table->string('addressCP')->comment('Dirección - CP');
            $table->string('imageClient')->comment('Logo del cliente');
            $table->boolean('activo')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
