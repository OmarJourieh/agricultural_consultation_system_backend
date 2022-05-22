<?php

namespace App\Console\Commands;

use App\Models\PlantUser;
use App\Models\Stage;
use Illuminate\Console\Command;

class disease extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'alert:disease';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command alert user about the disease';

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
            $res =$stages->Diseases;
            print($res);
        }
        return 0;
    }
}
