<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Plant;
use App\Models\Disease;
use App\Models\Post;
use App\Models\Comment;
use App\Models\PlantSchedule;
use App\Models\UserPlant;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        //PLANTS
        $plant = Plant::create();
        $plant->id = 1;
        $plant->name = "Apple";
        $plant->description = "A nice fuit or whatever";
        $plant->season = "all";
        $plant->save();

        $plant = Plant::create();
        $plant->id = 2;
        $plant->name = "Tomato";
        $plant->description = "A plant which nobody to this day knows whether it's a fruit or a vegetable";
        $plant->season = "spring";
        $plant->save();


        //DISEASES
        $disease = Disease::create();
        $disease->name = "Black Rot";
        $disease->plant_id = 1;
        $disease->description = "This fungal disease causes leaf spot, fruit rot and cankers on branches.";
        $disease->symptoms = "Large brown rotten areas can form anywhere on the fruit but are most common on the blossom end.
        Brown to black concentric rings can often be seen on larger infections.
        The flesh of the apple is brown but remains firm.
        Small, black spots can be seen on older fruit infections. These are fungal spore producing structures, called pycnidia.
        Some fruit mummify (shrivel and dry out) and remain attached to the tree.
        Occasionally fruit are infected early in the season. This results in fruit that ripen early and are rotten at the core.
        ";
        $disease->cure = "Prune out dead or diseased branches.
        Pick all dried and shriveled fruits remaining on the trees.
        Remove infected plant material from the area.
        All infected plant parts should be burned, buried or sent to a municipal composting site.
        Be sure to remove the stumps of any apple trees you cut down. Dead stumps can be a source of spores.
        ";
        $disease->save();

        $disease = Disease::create();
        $disease->name = "Black Rot";
        $disease->plant_id = 1;
        $disease->description = "Apple Scab is caused by a fungus that infects both leaves and fruit.";
        $disease->symptoms = "Leaf spots are round, olive-green in color and up to ½-inch across.
        Spots are velvet-like with fringed borders.
        As they age, leaf spots turn dark brown to black, get bigger and grow together.
        Leaf spots often form along the leaf veins.
        Leaves with many leaf spots turn yellow and drop by mid-summer.
        Infected fruit have olive-green spots that turn brown and corky with time.
        Fruit that are infected when very young become deformed and cracked as the fruit grows.
        ";
        $disease->cure = "Planting disease resistant varieties is the best way to prevent apple scab. Many varieties of apple and crabapple trees are resistant or completely immune to apple scab.";
        $disease->save();



        //SCHEDULES
        // $sched = PlantSchedule::create();
        // $sched->plant_id = 1;
        // $sched->interval = 1;
        // $sched->description = "Water the plant";
        // $sched->is_repeating = true;
        // $sched->save();
        // $sched = PlantSchedule::create();
        // $sched->plant_id = 1;
        // $sched->interval = 10;
        // $sched->description = "Apply fertilizer";  //just an example
        // $sched->is_repeating = false;
        // $sched->save();

    }
}
