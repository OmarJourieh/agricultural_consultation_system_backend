<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DiseasesController;
use App\Http\Controllers\PlantsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\User;
use App\Models\Plant;
use App\Models\Disease;
use App\Models\Post;
use App\Models\Comment;
use App\Models\PlantSchedule;
use App\Models\UserPlant;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});


Route::get('/test', function() {
    $p = Plant::find(1);
    return $p->diseases[0]->plant;
});


//Plants Controller
Route::get('/getAllPlants', [PlantsController::class,'getAllPlants']);
Route::get('/getPlantById/{id}', [PlantsController::class,'getPlantById']);


//Diseases Controller
Route::get('/getDiseasesOfPlant/{id}', [DiseasesController::class,'getDiseasesOfPlant']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

