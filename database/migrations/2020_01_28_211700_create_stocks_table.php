<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('cantidadProducto');
            $table->decimal('precioVentaPublico');
            $table->decimal('precioAdministrador');
            $table->decimal('gananciaUnidad');
            $table->decimal('descuentoPublico')->nullable;
            $table->unsignedInteger('provedor_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
