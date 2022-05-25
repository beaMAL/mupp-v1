<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favoritos', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('producto_id')->constrained()->onDelete('cascade')->onUpdate('cascade');

            //$table->unsignedBigInteger('id_usu')->foreign('id_usu')->references('id')->on('users')->onDelete('cascade');
            //$table->unsignedBigInteger('id_producto')->foreign()->references('id_producto')->on('productos')->onDelete('cascade');
            $table->timestamps();

            $table->primary(['user_id', 'producto_id']);
            //$table->foreign('id_usu')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favoritos');
    }
}
