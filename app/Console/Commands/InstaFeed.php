<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Vinkla\Instagram\Instagram;
use App\Insta;
class InstaFeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Insta:Feed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Insta feed & save into DB';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $feeds = new Instagram('5365129520.1677ed0.9a5ea6d9ae654821a210484962ecc42c');
        $posts = $feeds->media();
        $fromDBs = Insta::orderBy('id', 'desc')->take(20)->get(); //get last 20 rows from table
        foreach( $posts as $post)
        {
            Insta::firstOrCreate([
                'thumb' => $post->images->thumbnail->url  ,
                'link' => $post->images->standard_resolution->url  ,
                'caption' => $post->caption->text
            ]);
        }
//        foreach($feeds)
    }
}
