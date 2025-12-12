<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Response;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class InventarisController extends Controller
{
    public function index($id, $kode)
    {
        try {
            $category = DB::table('sub_tbl_inventory')->where('kd_cabang', $id)->where('kd_inventaris', $kode)->get();
            return response()->json($category);
        } catch (QueryException $e) {
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function datainventaris($id, $nama)
    {
        try {
            $category = DB::table('sub_tbl_inventory')->where('kd_cabang', $id)->where('nama_barang', 'like', '%' . $nama . '%')->get();
            return response()->json($category);
        } catch (QueryException $e) {
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function dataidinventaris($id)
    {
        try {
            $category = DB::table('sub_tbl_inventory')->where('id_inventaris', $id)->first();
            return response()->json($category);
        } catch (QueryException $e) {
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function caridatabyinventaris($id, $by, $nama)
    {
        try {
            if ($by == 'no') {
                $category = DB::table('sub_tbl_inventory')->where('kd_cabang', $id)->where('no_inventaris', 'like', '%' . $nama . '%')->get();
            } elseif ($by == 'nama') {
                $category = DB::table('sub_tbl_inventory')->where('kd_cabang', $id)->where('nama_barang', 'like', '%' . $nama . '%')->get();
            }

            return response()->json($category);
        } catch (QueryException $e) {
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function authenticate(Request $request)
    {
        $email = $request->username;
        $password = $request->password;
        $credentials = $request->only($email, $password);
        if (Auth::attempt($credentials)) {
            return 'Berhasil Login';
        }
        return '<div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
                                            <strong>Error!</strong> Username Dan Password Ada Kesalahan.
                                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>';
    }
    public function authenticate_v2($token, $user, $password)
    {
        $token = Str::uuid();
        return view('auth.auth-public', ['user' => $user, 'pass' => $password, 'token' => $token]);
    }
    public function getwaywhatsapp()
    {
        $pesan = DB::table('message')->where('status', 0)->first();
        return response()->json($pesan);
    }
    public function updategetway($token)
    {
        DB::table('message')->where('token_code', $token)->update(['status' => 1]);
        return response()->json('Berhasil Kirim');
    }
}
