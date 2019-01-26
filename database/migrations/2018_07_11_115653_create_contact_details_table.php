<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_name')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('googleplus')->nullable();
            $table->string('youtube')->nullable();
            $table->string('tumbler')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('whats_app')->nullable();
            $table->string('skype')->nullable();
            $table->text('google_map_link')->nullable();
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
        Schema::dropIfExists('contact_details');
    }
}
