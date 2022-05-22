<?php

namespace App\Console\Commands;

use App\Models\PlantUser;
use App\Models\Stage;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class watering extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'watering:alert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command use for send alert to user for watering the plant';

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
     * @return int
     */
    public function handle()
    {
        $plantUsers = PlantUser::all();
        foreach ($plantUsers as $plantUser) {
            $stages = Stage::find($plantUser->stage_id);
            $now = Carbon::now();
            $end = Carbon::parse($plantUser['watering_date']);
            $diff = $now->diffInDays($end);
            print($diff . PHP_EOL);
            if ($diff > $stages->watering_period) {
                $plantUser->watering_date=$now;
                $plantUser->save();
                print("hi you must wattirng" . PHP_EOL);
            }
        }

        return 0;
    }
}
