<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rating extends Model
{
    public function new($name, $score){
        $timestamp = now();
        DB::table('rating')->insert([
            'name' => $name,
            'score' => $score,
            'timestamp' => $timestamp,
         ]);
         return $timestamp;
    }
    public function update1($timestamp, $score) {
       DB::table('rating')
        ->where('timestamp', '=', $timestamp)
        ->update(['score' => $score]);
        return null;
    }
    public function rating(){
        $rating = DB::table('rating')->OrderBy('score', 'DESC')->take(50)->get();
        return $rating;
    }
}
