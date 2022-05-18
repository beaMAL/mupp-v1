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
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            //$table->foreignId('producto_id')->constrained()->onDelete('cascade');
            $table->foreignId('registro_id')->constrained()->onDelete('cascade');

            //$table->unsignedBigInteger('id_usu')->foreign()->references('id')->on('users');
            //$table->unsignedBigInteger('id_producto')->foreign()->references('id_producto')->on('productos')->onDelete('cascade');
            //$table->unsignedBigInteger('id_registro')->foreign()->references('id_registro')->on('registros')->onDelete('cascade');
            $table->timestamps();

            $table->primary(['user_id', 'registro_id']);
            // $table->foreign('id_usu')->references('id')->on('users');
            // $table->foreign('id_producto')->references('id_producto')->on('productos')->onDelete('cascade');
            // $table->foreign('id_registro')->references('id_registro')->on('registros')->onDelete('cascade');


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
