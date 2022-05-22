<?php

namespace App\Console\Commands;

use App\Models\PlantUser;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class fieldClean extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'field:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'alert to field cleaning';

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
            $now = Carbon::now();
            $end = Carbon::parse($plantUser->is_clean);
            $diff = $now->diffInDays($end);
            if ($diff > 6) {
                print ($diff . PHP_EOL);
            }

        }
        return 0;
    }
}
