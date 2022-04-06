<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Disease;
use App\Models\Plant;

class PlantsController extends Controller
{
    protected function getAllPlants() {
        return Plant::all();
    }

    protected function getPlantById($id) {
        return Plant::find($id);
    }

    protected function addPlant(Request $request) {

    }

    protected function deletePlant($id) {

    }

    protected function updatePlant(Request $request, $id) {

    }
}
