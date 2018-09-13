<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_tour', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_id')->unsigned();
            $table->foreign('tour_id')->references('id')->on('tours')->onDelete('cascade');;

            $table->integer('media_id')->unsigned();
            $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');
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
        Schema::dropIfExists('media_tour');
    }
}
