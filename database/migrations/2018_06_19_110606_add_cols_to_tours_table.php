<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColsToToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->integer('group_id')->after('max_altitude')->unsigned();
            $table->integer('meal_id')->after('group_id')->unsigned();
            $table->integer('accommodation_id')->after('meal_id')->unsigned();
            $table->integer('difficulty_id')->after('accommodation_id')->unsigned();
            $table->integer('category_id')->unsigned()->after('difficulty_id');
            $table->integer('country_id')->unsigned()->after('difficulty_id');
            $table->integer('region_id')->after('country_id')->unsigned()->nullable();

            $table->integer('start')->unsigned()->after('accommodation_id');
            $table->foreign('start')->references('id')->on('locations')->onDelete('cascade');

            $table->integer('end')->unsigned()->after('start');
            $table->foreign('end')->references('id')->on('locations')->onDelete('cascade');
            $table->integer('rating_count')->after('status')->nullable();
            $table->float('rating_cache')->after('rating_count')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->dropColumn('group_id');
            $table->dropColumn('meal_id');
            $table->dropColumn('accommodation_id');
            $table->dropColumn('difficulty_id');
            $table->dropColumn('category_id');
            $table->dropColumn('region_id');
            $table->dropForeign(['start']);
            $table->dropColumn('start');
            $table->dropForeign(['end']);
            $table->dropColumn('end');
        });
    }
}
