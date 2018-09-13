<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExcludedesTourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excludes_tour', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_id')->unsigned();
            $table->foreign('tour_id')->references('id')->on('tours')->onDelete('cascade');;

            $table->integer('excluded_id')->unsigned();
            $table->foreign('excluded_id')->references('id')->on('excludeds')->onDelete('cascade');
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
        Schema::dropIfExists('excludes_tour');
    }
}
