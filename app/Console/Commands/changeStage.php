<?php

namespace App\Console\Commands;

use App\Models\Plant;
use App\Models\PlantUser;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class changeStage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'change:stage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command this apple to change stage for the farmer';

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
            $stages = Plant::find($plantUser->plant_id)->stages()->orderBy('step', 'asc')->get();
            $now = Carbon::now();
            $end = Carbon::parse($plantUser['created_at']);
            $diff = $now->diffInDays($end);

            $sum = $sum = 0;
            foreach ($stages as $key => $value) {
                if ($diff > $sum) {
                    $sum = $sum + $value->interval;
                }
                if ($diff <= $sum) {
                    print( $value->name.PHP_EOL);
                    $plantUser->stage_id=$value->id;
                    $plantUser->save();
                    break;
                }

            }
        }
        return 0;
    }
}
