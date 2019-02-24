<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Tour;
use DB;
class DeleteDeparture extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Delete:Departure';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete expired date and price';

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
        $tours = Tour::all();
        $date = date('Y-m-d', strtotime("+1 week"));
        // $explode = explode("-", $week);
        foreach ($tours as $tour)
        {
            foreach($tour->departure as $d)
            {
                if ($d->count() > 0) {
                    DB::table('departures')
                    ->where('tour_id', '=', $tour->id)
                    ->whereDate('start', '<', $date)
                    ->delete();
                }
            }
        }
        echo "Done";
    }
}
