<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique()->index();
            $table->boolean('category_id')->nullable();
            $table->text('page_content');
            $table->text('banner');
            $table->text('banner_alt')->nullable();
            $table->boolean('parent_id')->nullable();
            $table->boolean('main')->default(1);
            $table->integer('position');

            $table->integer('main_id')->nullable();
            $table->boolean('status')->default(0);
            $table->string('mtitle');
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
        Schema::dropIfExists('pages');
    }
}
