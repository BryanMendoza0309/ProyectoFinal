<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carritos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('imagenProducto');
            $table->string('nombreProducto');
            $table->string('precioUnitarioProducto');
            $table->integer('cantidadArticulo');
            $table->decimal('totalArticulo');
            $table->decimal('subtotal');
            $table->decimal('precioEnvio');
            $table->decimal('iva');
            $table->decimal('total');
            $table->unsignedBigInteger('producto_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carritos');
    }
}
