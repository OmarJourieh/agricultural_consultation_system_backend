<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use mysql_xdevapi\Exception;
use phpDocumentor\Reflection\Types\Object_;

class WeatherController extends Controller
{


    public  function currentWeather(Request $request){
        try {


            $obj = new \stdClass();
            $response = Http::get('https://api.openweathermap.org/data/2.5/weather?lat=' . $request->lat . '&lon=' . $request->lon . '&appid=' . $request->key);
            $res = json_decode($response->body(), true);
            $obj->temp = (int)($res['main']['temp'] - 273.15);
            $obj->humidity = $res['main']['humidity'];
            $obj->pressure = $res['main']['pressure'];
            $obj->wind = $res['wind']['speed'];
            $obj->city = $res['name'];
            $obj->description = $res['weather'][0]['main'];
            $obj->icon = $res['weather'][0]['icon'];
            return $obj;
        }catch (\Exception $e){

        }

    }


}
