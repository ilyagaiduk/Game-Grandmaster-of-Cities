<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cities;
use App\Models\Rating;
use App\Models\World;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
class IndexController extends Controller
{
    use ValidatesRequests;
    public function index(Request $request){
        $model = new Cities();

        $countries = $model->getCountries();

            $country = "Весь мир";
            $bukva = null;
            $computer = null;
            $CityData = null;
            $cityInfo = $model->start($bukva, $country, $computer, $CityData);





        return view('index', ['cityStart' => $cityInfo, 'countries' => $countries]);
    }
    public function startGame(Request $request) {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'City' => 'required|string|min:2|max:255',
            ]);
            $model = new Cities();
            $modelRating = new Rating();
            $countries = $model->getCountries();
            $CityData = $request->post('CityData');
            $timestamp = $request->post('timestamp');
            if(!$request->post('name')) {
                $name = "Guest";
            }
            else {
                $name = $request->post('name');
            }
            if(!$request->post('score')) {
                $score = 2;
                $ratingNew = $modelRating->new($name, $score);
                $timestamp = $ratingNew;
            }
            else {
                $score = $request->post('score');
            }
            $ratingUpdate = $modelRating->update1($timestamp, $score);
            $city = ucfirst(strtolower($request->post('City')));
            if(substr($city, -1) == "'") {
                $bukva = substr($city, -2);
            }
            else {
                $bukva = substr($city, -1);
            }
            $country = $request->post('country');
            $computer = $request->post('computer');
            $cityInfo = $model->start($bukva, $country, $computer, $CityData);


        }
        if($cityInfo == "У компьютера нет вариантов! Вы выиграли!") {
            return view('congratulations', ['cityStart' => $cityInfo, 'computer' => $computer, 'CityData' => $CityData, 'city' => $city, 'name' => $name, 'score' => $score, 'country' => $country] );
        }
        return view('start', ['cityStart' => $cityInfo, 'countries' => $countries, 'computer' => $computer, 'CityData' => $CityData, 'city' => $city, 'name' => $name, 'score' => $score, 'country' => $country, 'timestamp' => $timestamp]);
    }
    public function rating() {
        $model = new Rating();
        $rating = $model->rating();
        return view('rating', ['rating' => $rating]);
    }
    public function cities(){
        $model = new World();
        $countries = $model->main();
        return view('countries', ['countries' => $countries]);
    }
    public function country(Request $request){
        $id = $request->id;
        $model = new World();
        $country = $model->currentCountry($id);
        $name = $model->nameCountry($id);
        return view('country', ['country' => $country, 'name' => $name]);
    }
    }
