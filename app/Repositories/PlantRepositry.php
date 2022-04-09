<?php


namespace App\Repositories;
use App\Http\Interfaces\PlantRepositoryInterface;
use App\Models\Plant;

class PlantRepository extends Repository implements PlantRepositoryInterface
{
protected $model;

public function __construct(Plant $model)
{
    $this->model = $model;
}
}
