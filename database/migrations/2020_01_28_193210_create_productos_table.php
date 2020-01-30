<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('codigoProducto');
            $table->String('nombreProducto');
            $table->String('descipcionProducto');
            $table->String('marcaProducto');
            $table->String('modeloProducto');
            $table->String('imagenProducto');
            $table->String('fecha_caducidadProducto');
            $table->unsignedInteger('categoriaproducto_id');
            $table->unsignedInteger('stock_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
