<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->integer('days');
            $table->integer('price');
            $table->integer('price1')->nullable();
            $table->integer('price2')->nullable();
            $table->integer('max_altitude');
            $table->boolean('featured')->default(0);
            $table->boolean('status')->default(0);
            $table->text('overview');
//            $table->string('featured_image');
            $table->string('map')->nullable();
            $table->string('elevation')->nullable();
            $table->string('mtitle')->nullable();
            $table->string('description');
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
        Schema::dropIfExists('tours');
    }
}
