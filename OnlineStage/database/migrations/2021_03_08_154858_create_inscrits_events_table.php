<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscritsEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscrits_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_events')->unsigned();
            $table->bigInteger('id_usuari')->unsigned();
            $table->timestamps();
            $table->foreign('id_events')->references('id')->on('events')->onUpdate('cascade');
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
        Schema::dropIfExists('inscrits_events');
    }
}
