<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudAltaProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('solicitud_alta_productos', function(Blueprint $table)
        {
            $table->unsignedInteger('id_solicitud')->autoIncrement();
            $table->unsignedInteger('id_usu')->nullable();
            
            $table->string('nombre');
            $table->string('marca');
            $table->string('categoria');
            $table->float('precio')->nullable();
            $table->multiLineString('descripcion', 300)->nullable();
            $table->string('color')->nullable();
            $table->string('web')->nullable();
            $table->dateTime('fecha_modificacion')->nullable();
            $table->unsignedInteger('id_ultima_modificacion')->nullable();
            $table->dateTime('fecha_solicitud');

            $table->foreign('id_usu')->references('id_usu')->on('usuario')->onDelete('SET NULL');
         });

     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitud_alta_productos');
    }
}
