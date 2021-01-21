<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('metodo_pago_id')->unsigned();
            $table->integer('domicilio_id')->unsigned();
            $table->double('total');
            $table->foreign('user_id')->references('id')->on('users')->cascade();
            $table->foreign('metodo_pago_id')->references('id')->on('metodo_pagos')->cascade();
            $table->foreign('domicilio_id')->references('id')->on('domicilios')->cascade();
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
        Schema::dropIfExists('orden');
    }
}
