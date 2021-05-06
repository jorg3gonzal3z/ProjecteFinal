<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRallysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rallys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->integer('distancia');
            $table->integer('numTC');
            $table->integer('numAssistencies');
            $table->string('localitzacio');
            $table->integer('numPlaces');
            $table->bigInteger('id_superficie')->unsigned();
            $table->bigInteger('id_usuari')->unsigned();
            $table->timestamps();
            $table->foreign('id_superficie')->references('id')->on('superficies')->onUpdate('cascade');
            $table->foreign('id_usuari')->references('id')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rallys');
    }
}
