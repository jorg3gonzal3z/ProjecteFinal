<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesRallysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_rallys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_categories')->unsigned();
            $table->bigInteger('id_rallys')->unsigned();
            $table->timestamps();
            $table->foreign('id_categories')->references('id')->on('categories')->onUpdate('restrict');
            $table->foreign('id_rallys')->references('id')->on('rallys')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories_rally');
    }
}
