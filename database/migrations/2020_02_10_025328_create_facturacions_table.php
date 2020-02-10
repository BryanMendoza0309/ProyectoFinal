<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('nombreEmpresa');
            $table->string('numeroCasa_nombreCalle');
            $table->string('apartamento_haitacion_etc');
            $table->string('ciudad');
            $table->string('provincia');
            $table->string('codigoPostal');
            $table->string('telefono');
            $table->string('correoElectronico');
            $table->unsignedBigInteger('carrito_id');
            $table->unsignedBigInteger('comprador_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturacions');
    }
}
