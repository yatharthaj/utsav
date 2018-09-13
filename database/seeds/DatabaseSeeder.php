<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
       $this->call(LaratrustSeeder::class);
        $this->call(TableSeeder::class);
       factory(App\Tour::class, 20)->create();
    }
}
