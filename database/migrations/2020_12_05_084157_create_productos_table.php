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
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->String('Nombre');
            $table->String('Caracteristicas');
            $table->String('Descripcion');
            $table->String('Garantia');
            $table->Integer('Cantidad');
            $table->Double('Precio');
           // $table->string('foto');
            $table->Boolean('Estatus');
            $table->integer('categoria_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias')->cascade();
            $table->foreign('user_id')->references('id')->on('users')->cascade();
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
        Schema::dropIfExists('productos');
    }
}
