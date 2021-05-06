<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotosRallysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos_rallys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_fotos')->unsigned();
            $table->bigInteger('id_rallys')->unsigned();
            $table->timestamps();
            $table->foreign('id_fotos')->references('id')->on('fotos')->onUpdate('cascade');
            $table->foreign('id_rallys')->references('id')->on('rallys')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fotos_rallys');
    }
}
