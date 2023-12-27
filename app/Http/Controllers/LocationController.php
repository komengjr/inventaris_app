<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class LocationController extends Controller
{
    public function index(Request $request)
    {

        $lat = YOUR_CURRENT_LATTITUDE;
        $lon = YOUR_CURRENT_LONGITUDE;

        $data = DB::table("users")
            ->select("users.id"
                , DB::raw("6371 * acos(cos(radians(" . $lat . "))
        * cos(radians(users.lat))
        * cos(radians(users.lon) - radians(" . $lon . "))
        + sin(radians(" . $lat . "))
        * sin(radians(users.lat))) AS distance"))
            ->groupBy("users.id")
            ->get();

        dd($data);
    }
}
