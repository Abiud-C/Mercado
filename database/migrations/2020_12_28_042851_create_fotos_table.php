<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('File_Name');
            $table->string('Descripcion');
            $table->integer('user_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->cascade();
            $table->foreign('producto_id')->references('id')->on('productos')->cascade();
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
        Schema::dropIfExists('fotos');
    }
}
