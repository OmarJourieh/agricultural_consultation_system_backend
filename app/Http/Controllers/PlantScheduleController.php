<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\PlantScheduleRepositoryInterface;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\PlantScheduleRequest;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class PlantScheduleController extends Controller
{

    use GeneralTrait;
    private  $PlantScheduleRepository;
    public function __construct(PlantScheduleRepositoryInterface $PlantScheduleRepository)
    {
        $this->PlantScheduleRepository = $PlantScheduleRepository;
    }


    protected function getAllPlantSchedules() {
        $plantSchedules = $this->PlantScheduleRepository->all();
        return $this->returnData('PlantSchedule',$plantSchedules);


    }

    protected function getPlantScheduleById($id) {
        $plantSchedule= $this->PlantScheduleRepository->getOne($id);
        if(!$plantSchedule)
            return $this->returnError("400","This PlantSchedule does not exist");
        return $this->returnData('PlantSchedule',$plantSchedule);
    }




    protected function addPlantSchedule(PlantScheduleRequest $request) {


        $res= $this->PlantScheduleRepository->create($request->validated());
        if($res == null){
            return $this->returnError("400","Invalid Data");
        }
        return $this->returnSuccessMessage("PlantSchedule added successfully");


    }

    protected function deletePlantSchedule($id) {
        $res=  $this->PlantScheduleRepository->delete($id);
        if($res == 0){
            return $this->returnError("400","The PlantSchedule  does not exist");

        }

        return $this->returnSuccessMessage("500","The PlantSchedule has been removed successfully");


    }

    protected function updatePlantSchedule(PlantScheduleRequest $request, $id) {
        $res=  $this->PlantScheduleRepository->update($request->validated(),$id);
        if($res == null){
            return $this->returnError("400","Invalid Data");
        }
        return $this->returnSuccessMessage("PlantSchedule Update successfully");

    }


    protected function getScheduleWork($id) {
        $plantSchedule= $this->PlantScheduleRepository->getOne($id);
        if(!$plantSchedule){
            return $this->returnError("400","This PlantSchedule does not exist");
        }else{
            $res= $plantSchedule->steps()->get();
            return $this->returnData('PlantSchedule',$res);
        }
      //  ->where('stage_id',3)
      //  return $this->returnData('PlantSchedule',$plantSchedule);

    }


}
