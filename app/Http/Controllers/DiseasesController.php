<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Disease;
use App\Models\Plant;

class DiseasesController extends Controller
{
    protected function getDiseasesOfPlant($plant_id) {
        $plant = Plant::find($plant_id);
        return $plant->diseases;
    }
}
