<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\PlantRepositoryInterface;
use App\Http\Requests\PlantRequest;
use App\Models\Step;
use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Models\Plant;
use App\Models\PlantSchedule;
use App\Models\UserPlant;


class PlantsController extends Controller
{
    use GeneralTrait;
     private  $plantRepository;

    public function __construct(PlantRepositoryInterface $plantRepository)
    {
        $this->plantRepository = $plantRepository;
    }

    protected function getAllPlants() {
        $plants = $this->plantRepository->all();
        return $this->returnData('plants',$plants);


    }

    protected function getPlantById($id) {
        $plant = $this->plantRepository->getOne($id);
        if(!$plant)
            return $this->returnError("400","This plant does not exist");
        return $this->returnData('plant',$plant);
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

    protected function addPlant(PlantRequest $request) {


       $res=  $this->plantRepository->create($request->validated());
       if($res == null){
           return $this->returnError("400","Invalid Data");
       }
       return $this->returnSuccessMessage("Plant added successfully");


    }

    protected function deletePlant($id) {
      $res=  $this->plantRepository->delete($id);
      if($res == 0){
          return $this->returnError("400","The plant does not exist");

      }

      return $this->returnSuccessMessage("500","The plant has been removed successfully");


    }

    protected function updatePlant(PlantRequest $request, $id) {
        $res=  $this->plantRepository->update($request->validated(),$id);
        if($res == null){
            return $this->returnError("400","Invalid Data");
        }
        return $this->returnSuccessMessage("Plant Update successfully");

    }

    public function getStepForBlant($id){
        $plant = $this->plantRepository->getOne($id);
        if(!$plant){
            return $this->returnError("400","This plant does not exist");

        }else{
            $res =$plant->plantSchedules()->get();
            return $this->returnData('step',$res);
        }

    }


    public function getAllStep($id)
    {
        $plant = $this->plantRepository->getOne($id);
        if(!$plant){
            return $this->returnError("400","This plant does not exist");

        }else{
            $arr=array();
            $plantSchedules =$plant->plantSchedules()->get();
            foreach ($plantSchedules as $key => $value){
           $res =PlantSchedule::where('id',$value['id'])->get();
           $step = Step::with(['stage'=>function ($q){

           }])->where('plant_schedule_id',$res[0]['id'])->get();
             $arr[]=$step;
            }


            return $this->returnData('Steps',$arr);


        }

    }

    public  function getPlantByUser($id){
        $user = User::find($id);
        $res = $user->Plants()->with('Diseases')->get();
        return $this->returnData('Steps',$res);
    }

}
