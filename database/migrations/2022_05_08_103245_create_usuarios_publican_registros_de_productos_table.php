<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosPublicanRegistrosDeProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publican_reg_productos', function (Blueprint $table) {
            $table->unsignedInteger('id_usu');
            $table->unsignedInteger('id_producto');
            $table->unsignedInteger('id_registro');
            $table->dateTime('fecha_registro');

            $table->primary(['id_usu', 'id_producto', 'id_registro']);
            $table->foreign('id_usu')->references('id_usu')->on('usuario');
            $table->foreign('id_producto')->references('id_producto')->on('productos')->onDelete('cascade');
            $table->foreign('id_registro')->references('id_registro')->on('registros')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios_publican_registros_de_productos');
    }
}
