<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('usuario', function(Blueprint $table)
        {
            //sustituido por users
            $table->unsignedInteger('id_usu')->autoIncrement();
            //$table->primary('id_usu');
            $table->string('nombre');
            $table->string('correo')->unique();
            $table->string('contraseña');
            $table->boolean('is_user')->default(false);
            $table->boolean('is_admin')->default(false);
            $table->timestamps();
         });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
