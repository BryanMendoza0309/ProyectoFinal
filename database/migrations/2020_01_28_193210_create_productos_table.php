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
        Schema::create('provedors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('nombreProvedor');
            $table->String('tlfProvedor');
            $table->String('direccion');
             $table->boolean('eliminadolog');
            $table->String('caracteristicaProvedor');
        });

        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('cantidadProducto');
            $table->decimal('precioVentaPublico');
            $table->decimal('precioAdministrador');
            $table->decimal('descuentoPublico');
            $table->decimal('gananciaUnidad');
            $table->decimal('gananciaTotal');
            $table->decimal('totalVentas');
            $table->boolean('eliminadolog');
            $table->Integer('totalProductosVentas');
            $table->unsignedBigInteger('provedor_id');
            $table->foreign('provedor_id')->references('id')->on('provedors'); 
        });
        Schema::create('categorias', function (Blueprint $table) {
             $table->bigIncrements('id');
             $table->boolean('eliminadolog');
            $table->String('nombreTipoProducto');
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
            $table->boolean('eliminadolog');
            $table->unsignedBigInteger('stock_id');
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('stock_id')->references('id')->on('stocks'); 
            $table->foreign('categoria_id')->references('id')->on('categorias'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provedors');
        Schema::dropIfExists('stocks');
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('productos');
       
    }
}
