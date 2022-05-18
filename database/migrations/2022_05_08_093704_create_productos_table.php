<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('productos', function(Blueprint $table)
        {
            $table->id();

            $table->string('nombre');
            $table->string('marca');
            $table->string('categoria');
            $table->text('descripcion', 300);
            $table->float('precio');
            $table->string('tipo');
            $table->string('tono');
            $table->string('web');
            $table->string('ean')->nullable();

            $table->unsignedBigInteger('id_ultima_modificacion')->nullable();
            $table->foreign('id_ultima_modificacion')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            // $table->unsignedInteger('id_ultima_modificacion')->nullable()->foreign()->references('id_usu')->on('usuarios')->onDelete('cascade');


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
