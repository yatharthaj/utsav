<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Tour::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->sentence($nbWords = 3, $variableNbWords = true),
        'days' => $faker->numberBetween($min = 10, $max = 30),
        'price' => $faker->numberBetween($min = 1000, $max = 3000),
        'price1' => $faker->numberBetween($min = 1000, $max = 3000),
        'price2' => $faker->numberBetween($min = 1000, $max = 3000),
        'max_altitude' => $faker->numberBetween($min = 1400, $max = 5800),
        'group_id' => 1,
        'meal_id' => 1,
        'accommodation_id' => 1,
        'start' => 1,
        'end' => 1,
        'difficulty_id' => $faker->numberBetween($min = 1, $max = 3),
        'country_id' => $faker->numberBetween($min = 1, $max = 3),
        'region_id' => $faker->numberBetween($min = 1, $max = 3),
        'category_id' => $faker->numberBetween($min = 1, $max = 5),
        'featured' => $faker->numberBetween($min = 0, $max = 1),
        'overview' => $faker->text($maxNbChars = 200),
        'featured_image' => "http://source.unsplash.com/320x228/?nepal",
        'map' => "http://source.unsplash.com/320x228/?maps",
        'elevation' => "http://source.unsplash.com/320x228/?charts",
        'mtitle' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});
