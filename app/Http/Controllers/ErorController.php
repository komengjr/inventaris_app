<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
class ErorController extends Controller
{
    public function eroraplikasi()
    {
        $contents = File::get(storage_path('logs/laravel.log'));
        dd($contents);
    }
}
