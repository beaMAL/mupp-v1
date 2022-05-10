<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('registros', function(Blueprint $table)
        {
            $table->unsignedInteger('id_registro')->autoIncrement();
            $table->string('imagen')->nullable();
            $table->string('formato');
            $table->string('web')->nullable();
            $table->multiLineString('review', 400)->nullable();
            $table->float('precio')->nullable();
            $table->string('calificacion');// tipo??
            $table->string('tamaño')->nullable();

            $table->string('tono')->nullable();
            $table->string('familia_color')->nullable();
            $table->boolean('recompra')->default(false);
            $table->string('pao')->nullable();
            $table->dateTime('fecha_compra')->nullable();
            $table->dateTime('fecha_apertura')->nullable();
            $table->dateTime('fecha_agotado')->nullable();

         });
        }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registros');
    }
}
