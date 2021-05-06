<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->integer('distancia');
            $table->string('sortida');
            $table->string('final');
            $table->string('adressa');
            $table->bigInteger('id_superficie')->unsigned();
            $table->bigInteger('id_usuari')->unsigned();
            $table->timestamps();
            $table->foreign('id_superficie')->references('id')->on('superficies')->onUpdate('restrict');
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
        Schema::dropIfExists('trams');
    }
}
