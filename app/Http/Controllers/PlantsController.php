<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\PlantRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Plant;
use App\Models\PlantSchedule;
use App\Models\UserPlant;

class PlantsController extends Controller
{
     private  $plantRepository;

    public function __construct(PlantRepositoryInterface $plantRepository)
    {
        $this->plantRepository = $plantRepository;
    }

    protected function getAllPlants() {
        return $this->plantRepository->all();

       // return Plant::all();
    }

    protected function getPlantById($id) {
        return Plant::find($id);
    }

    protected function getPlantSchedule($id) {
        $sched = PlantSchedule::where('plant_id', $id)->get();
        return $sched;
    }

    protected function startPlantation($userId, $plantId) {
        $sched = UserPlant::create();
        $sched->user_id = $userId;
        $sched->plant_id = $plantId;
        $sched->is_finished = false;
        $sched->save();

        //start monitoring this record here



        return $sched;
    }

    protected function addPlant(Request $request) {

    }

    protected function deletePlant($id) {

    }

    protected function updatePlant(Request $request, $id) {

    }
}
