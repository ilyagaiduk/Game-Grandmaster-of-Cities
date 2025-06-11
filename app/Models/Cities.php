<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cities extends Model
{
    public function start($bukva, $country, $computer, $CityData){
        $computer = explode(', ', $computer);
        $CityData = explode(', ', $CityData);
        if($bukva == null OR  $CityData == null OR $computer == null) {
        $capital = DB::table('worldcities')->where('capital', '=', 'primary')->get();
        $id = [];
        foreach($capital as $value) {
            $id[] = $value->id1;
        }
        $id1 = count($id);
        $randId = $id[mt_rand(0, $id1 - 1)];
        $random = DB::table('worldcities')->where('id1', '=', $randId)->first();
        }
        else {
            if($country != 'The whole world'){
                $cities = DB::table('worldcities')->select('id1')->where('city_ascii', 'like', $bukva.'%')->where('country', '=', $country)->whereNotIn('city_ascii', $computer)->whereNotIn('city_ascii', $CityData)->get();
                $id = [];
                foreach($cities as $value) {
                    $id[] = $value->id1;
                }
                $id1 = count($id);
                if($id1 == 1) {
                    $randId = $id[0];
                }
                elseif($id1 == 0) {
                    return "У компьютера нет вариантов! Вы выиграли!";
                }
                else {
                $randId = $id[mt_rand(0, $id1 - 1)];
                }
                $random = DB::table('worldcities')->where('id1', '=', $randId)->first();
            }
            else {
                $cities = DB::table('worldcities')->select('id1')->where('population', '>' ,0)->where('city_ascii', 'like', $bukva.'%')->whereNotIn('city_ascii', $computer)->whereNotIn('city_ascii', $CityData)->get();
                $id = [];
                foreach($cities as $value) {
                    $id[] = $value->id1;
                }
                $id1 = count($id);
                if($id1 == 1) {
                    $randId = $id[0];
                }
                elseif($id1 == 0) {
                    return "У компьютера нет вариантов! Вы выиграли!";
                }
                else {
                $randId = $id[mt_rand(0, $id1 - 1)];
                }
                $random = DB::table('worldcities')->where('id1', '=', $randId)->first();
            }

        }
        if(is_null($random)) {
            return "У компьютера нет вариантов! Вы выиграли!";
        }
        if(substr($random->city_ascii, -1) == "'") {
            $bukva = substr($random->city_ascii, -2);
        }
        else {
            $bukva = substr($random->city_ascii, -1);
        }
        $data = ['city' => $random->city_ascii, 'country' => $random->country, 'bukva' => strtoupper($bukva), 'iso2' => $random->iso2];

        return $data;
    }
    public function getCountries(){
        $countries = DB::table('country')
        ->GroupBy('country')
        ->where('country', '!=', 'Saint Helena, Ascension, And Tristan Da Cunha')
        ->get();
        return $countries;
    }
}
