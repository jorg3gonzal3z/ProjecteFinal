<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotosCotxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos_cotxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_fotos')->unsigned();
            $table->bigInteger('id_cotxes')->unsigned();
            $table->timestamps();
            $table->foreign('id_fotos')->references('id')->on('fotos')->onUpdate('cascade');
            $table->foreign('id_cotxes')->references('id')->on('cotxes')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fotos_cotxes');
    }
}
