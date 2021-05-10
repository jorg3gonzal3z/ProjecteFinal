<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscritsRallysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscrits_rallys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_rallys')->unsigned();
            $table->bigInteger('id_usuari')->unsigned();
            $table->bigInteger('id_cotxe')->unsigned();
            $table->timestamps();
            $table->foreign('id_rallys')->references('id')->on('rallys')->onUpdate('restrict');
            $table->foreign('id_usuari')->references('id')->on('users')->onUpdate('restrict');
            $table->foreign('id_cotxe')->references('id')->on('cotxes')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscrits_rallys');
    }
}
