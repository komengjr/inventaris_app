<?php

namespace App\Http\Controllers;

use Faker\Provider\Uuid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use DB;
use PDF;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function url_akses($akses)
    {
        $data = DB::table('z_menu_user')->where('menu_sub_code', $akses)->where('access_code', Auth::user()->akses)->first();
        if ($data) {
            return true;
        } else {
            return false;
        }
    }
    public function dashboard($akses){
          if ($this->url_akses($akses) == true) {
            return view('application.dashboard.home');
        } else {
            return Redirect::to('dashboard');
        }

    }
    public function dashboard_setup_profile(){
        return view('dashboard.setup-profile');
    }
    public function dashboard_setup_notification(){
        return view('dashboard.setup-notification');
    }
}
