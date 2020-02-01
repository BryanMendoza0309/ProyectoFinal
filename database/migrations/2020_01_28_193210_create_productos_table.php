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

        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('cantidadProducto');
            $table->decimal('precioVentaPublico');
            $table->decimal('precioAdministrador');
            $table->decimal('descuentoPublico');
            $table->decimal('gananciaUnidad');
            $table->decimal('gananciaTotal');
            $table->decimal('totalVentas');
            $table->Integer('totalProductosVentas');
            $table->unsignedBigInteger('provedor_id');
            $table->unsignedBigInteger('producto_id');
        });

        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('codigoProducto');
            $table->String('nombreProducto');
            $table->mediumText('descipcionProducto');
            $table->String('marcaProducto');
            $table->String('modeloProducto');
            $table->String('imagenProducto');
            $table->String('fecha_caducidadProducto');
            $table->unsignedBigInteger('categoriaproducto_id');
            $table->unsignedBigInteger('stock_id');
            $table->foreign('stock_id')->references('id')->on('stocks'); 
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
        Schema::dropIfExists('productos');
    }
}
