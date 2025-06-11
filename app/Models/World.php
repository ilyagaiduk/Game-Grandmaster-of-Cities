<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class World extends Model
{
    public function main() {

        $country = DB::table('worldcities')
        ->where('capital', '=', 'primary')
        ->OrderBy('country', 'ASC')
        ->get();

    return $country;

    }
    public function currentCountry($query)
    {
        $country = DB::table('worldcities')
            ->where('iso2', '=', $query)
            ->OrderBy('city_ascii', 'ASC')
            ->paginate(24);

        return $country;
    }
    public function nameCountry($query)
    {
        $country = DB::table('worldcities')
            ->where('iso2', '=', $query)
            ->first();

        return $country;
    }
}
