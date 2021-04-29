<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('model');
            $table->integer('potencia');
            $table->string('trenMotriu');
            $table->integer('pes');
            $table->integer('any');
            $table->bigInteger('id_categoria')->unsigned();
            $table->bigInteger('id_usuari')->unsigned();
            $table->timestamps();
            $table->foreign('id_categoria')->references('id')->on('categories')->onUpdate('restrict');
            $table->foreign('id_usuari')->references('id')->on('users')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotxes');
    }
}
