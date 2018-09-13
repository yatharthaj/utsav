<?php

use Illuminate\Database\Seeder;
use App\Difficulty;
use App\Country;
use App\Accommodation;
use App\Group;
use App\Meal;
use App\Region;
use App\Location;
use App\TourCategory;
use App\Tour;
use App\FeaturedImage;
use App\Media;
use App\Review;
use App\Itinerary;
use App\Included;
use App\Excluded;
class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker\Factory::create();
       $group = new Group;
       $group->name = "Max 2 - Min 10";
       $group->save();

       $country = new Country;
       $country->name = 'Nepal';
       $country->save();

       $country = new Country;
       $country->name = 'Tibet';
       $country->save();

       $country = new Country;
       $country->name = 'Bhutan';
       $country->save();

       $difficulty = new Difficulty;
       $difficulty->name = 'Easy';
       $difficulty->save();

       $difficulty = new Difficulty;
       $difficulty->name = 'Medium';
       $difficulty->save();

       $difficulty = new Difficulty;
       $difficulty->name = 'Hard';
       $difficulty->save();

       $accommodation = new Accommodation;
       $accommodation->name = "3 Star Hotel in Kathmandu and tea house during the trek";
       $accommodation->save();

       $meal = new Meal;
       $meal->name = "All Meals Included";
       $meal->save();

       $region = new Region;
       $region->name = 'Everest Region';
       $region->slug = str_slug($region->name, '-');
       $region->save();

       $region = new Region;
       $region->name = 'Annapurna Region';
       $region->slug = str_slug($region->name, '-');
       $region->save();

       $region = new Region;
       $region->name = 'Langtang Region';
       $region->slug = str_slug($region->name, '-');
       $region->save();

       $region = new Location;
       $region->name = 'Kathmandu, Nepal';
       $region->save();

       $category = new TourCategory;
       $category->name = "Trekking";
       $category->slug = str_slug($category->name, '-');
       $category->save();

       $category = new TourCategory;
       $category->name = "Climbing";
       $category->slug = str_slug($category->name, '-');
       $category->save();

       $category = new TourCategory;
       $category->name = "Ski";
       $category->slug = str_slug($category->name, '-');
       $category->save();

       $category = new TourCategory;
       $category->name = "Day Tour";
       $category->slug = str_slug($category->name, '-');
       $category->save();

       $category = new TourCategory;
       $category->name = "Cultural Tour";
       $category->slug = str_slug($category->name, '-');
       $category->save();

        // $tour = Tour::all();
//        for ($i = 1; $i <= $tour->count(); $i++) {
//            $featuredImage = new FeaturedImage;
//            $featuredImage->tour_id = $i;
//            $featuredImage->thumbnail = 'http://source.unsplash.com/320x228/?nepal';
//            $featuredImage->path = 'http://source.unsplash.com/960x627/?nepal';
//            $featuredImage->save();
//        }

//        for ($i = 1; $i <= 20; $i++) {
//            $media = new Media;
//            $media->path = 'https://source.unsplash.com/random/966x1104';
//            $media->thumb = 'https://source.unsplash.com/random/370x270';
//            $media->save();
//        }

//        for ($i = 1; $i <= $tour->count(); $i++) {
//            for ($j = 1; $j<= 5; $j++) {
//                DB::table('media_tour')->insert([
//                    'tour_id' => $i,
//                    'media_id' => $faker->numberBetween(1,20)
//                ]);
//            }
//        }

//        for ($i = 1; $i <= 5; $i++) {
//            $review = new Review;
//            $review->fname = $faker->firstName();
//            $review->lname = $faker->lastName();
//            $review->email = $faker->freeEmail();
//            $review->country = $faker->countryCode();
//            $review->title = $faker->sentence($nbWords = 6, $variableNbWords = true);
//            $review->content = $faker->text($maxNbChars = 200);
//            $review->thumbnail = $faker->imageUrl($width = 50, $height = 50);
//            $review->rating = $faker->numberBetween(4,5);
//            $review->tour_id = 3;
//            $review->save();
//        }
//        for ($i=1; $i<=14; $i++)
//        {
//            $itinerary = new Itinerary;
//            $itinerary->tour_id = 3;
//            $itinerary->day = $i;
//            $itinerary->title = $faker->sentence($nbWords = 6, $variableNbWords = true);
//            $itinerary->plan = $faker->paragraph($nbSentences = 5, $variableNbSentences = true);
//            $itinerary->save();
//        }
        // for ($i=1; $i<=8; $i++)
        // {
        //     $included = new Included;
        //     $included->name = $faker->sentence($nbWords = $faker->numberBetween(4,5), $variableNbWords = true);
        //     $included->created_at = $faker->dateTime($max = 'now', $timezone = null);
        //     $included->updated_at = $faker->dateTime($max = 'now', $timezone = null);
        //     $included->save();

        //     $excluded = new Excluded;
        //     $excluded->name = $faker->sentence($nbWords = $faker->numberBetween(4,5), $variableNbWords = true);
        //     $excluded->created_at = $faker->dateTime($max = 'now', $timezone = null);
        //     $excluded->updated_at = $faker->dateTime($max = 'now', $timezone = null);
        //     $excluded->save();

        //     DB::table('includes_tour')->insert([
        //         'tour_id' => 3,
        //         'included_id' => $i
        //     ]);

        //     DB::table('excludes_tour')->insert([
        //         'tour_id' => 3,
        //         'excluded_id' => $i
        //     ]);
        // }

    }
}
