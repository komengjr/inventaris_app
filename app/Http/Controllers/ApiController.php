<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function gateway_whatsapp(Request $request)
    {
        $data = DB::table('message')->where('status', 0)->first();
        if ($data) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.fonnte.com/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'target' => $data->number,
                    'message' => $data->pesan,
                ),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: ' . 'BKFshex2Z7ntm6wNKNTg'
                ),
            ));
            DB::table('message')->where('id', $data->id)->update(['status'=>1]);
            $response = curl_exec($curl);
            return response()->json($data->pesan);
        }
    }
}
