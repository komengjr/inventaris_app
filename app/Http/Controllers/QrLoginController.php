<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\User;
use DB;
use Session;
use App\Product;
use Excel;
class QrLoginController extends Controller
{
    public function index(Request $request) {
    	
		return view('auth.QrLogin');
	}
	public function indexoption2(Request $request) {
    	
		return view('auth.QrLogin2');
	}
	public function ViewUserQrCode($value='')
	{
		return view('backEnd.users.viewqrcode');
	}
	public function checkUser(Request $request) {
		 $result = 0;
			if ($request->data) {
				$user = User::where('QRpassword',$request->data)->first();
				if ($user) {
					Sentinel::authenticate($user);
				    $result =1;
				 }else{
				 	$result =0;
				 }

				
			}
			
			return $result;
	}
	public function checkData(Request $request) {
		 	$result = $request->data;
			// if ($request->data) {
			// 	$cekdata = DB::table('sub_tbl_inventory')->where('id_inventaris')->first();
			// 	// $user = User::where('QRpassword',$request->data)->first();
			// 	if ($cekdata) {
			// 		Sentinel::authenticate($user);
			// 	    $result =1;
			// 	 }else{
			// 	 	$result =0;
			// 	 }

				
			// }
			return $result;
	}
	public function hasil($id) {
		 	
			// if ($request->data) {
				$cekdata = DB::table('sub_tbl_inventory')
				->select('sub_tbl_inventory.*','no_urut_barang.*','tbl_lokasi.kd_lokasi','tbl_lokasi.nama_lokasi')
				->join('tbl_inventory','tbl_inventory.kd_inventaris','=','sub_tbl_inventory.kd_inventaris')
				->join('tbl_lokasi','tbl_lokasi.kd_lokasi','=','sub_tbl_inventory.kd_lokasi')
				->join('no_urut_barang','no_urut_barang.no_urut_barang','=','tbl_inventory.no_urut_barang')
				->where('sub_tbl_inventory.id_inventaris',$id)
				->orderBy('sub_tbl_inventory.id', 'asc')
				->get();
			// 	// $user = User::where('QRpassword',$request->data)->first();
				if ($cekdata->isEmpty()) {
					Session::flash('sukses','Data Tidak di Temukan ....');
					// return redirect('pesan');
					return redirect()->back();
				 }else{
					Session::flash('sukses','Data di Temukan ');
					return view('view.data',['id'=>$id, 'data'=>$cekdata]);
				 }

				
			// }
			
	}

	public function QrAutoGenerate(Request $request)
	{	
		$result=0;
		if ($request->action = 'updateqr') {
			$user = Sentinel::getUser();
			if ($user) {
				$qrLogin=bcrypt($user->personal_number.$user->email.str_random(40));
		        $user->QRpassword= $qrLogin;
		        $user->update();
		        $result=1;
			}
		
		}
		
        return $result;
	}
	public function finddatainventaris(Request $request) {
    	
		return view('finddata');
	}
	public function finddataxml(Request $request) {
    	$datacabang = DB::table('tbl_cabang')->get();
		return view('caridata',['datacabang'=> $datacabang]);
	}
	public function checkDataxml(Request $request) {
		// dd($request->data);
		$result = 1;
		
		return $result;
	}
	public function PostDataxml($id,$id1,$id3,$cb) {
		
		

		$link = "http://svc.efaktur.pajak.go.id/validasi/faktur/".$id."/".$id1."/".$id3;
		$xmlString = file_get_contents($link);
        $xmlObject = simplexml_load_string($xmlString);
        $json = json_encode($xmlObject);
        $phpArray = json_decode($json, true);

		$tblcekdata = DB::table('tbl_log_faktur')->where('link',$link)->get();
		
		
		// dd($xmlString);
		if ($phpArray['statusApproval'] == "Faktur tidak Valid, Tidak ditemukan data di DJP") {
			Session::flash('sukses','Data Tidak di Temukan ....');
			return redirect()->back();
		} else {

			if ($tblcekdata->isEmpty()) {
				DB::table('tbl_log_faktur')->insert(
					[
						'link' => $link,
						'kd_cabang' => $cb,
						'kdJenisTransaksi' => $phpArray['kdJenisTransaksi'],
						'fgPengganti' => $phpArray['fgPengganti'],
						'nomorFaktur' => $phpArray['nomorFaktur'],
						'tanggalFaktur' => $phpArray['tanggalFaktur'],
						'npwpPenjual' => $phpArray['npwpPenjual'],
						'namaPenjual' => $phpArray['namaPenjual'],
						'alamatPenjual' => $phpArray['alamatPenjual'],
						'npwpLawanTransaksi' => $phpArray['npwpLawanTransaksi'],
						'namaLawanTransaksi' => $phpArray['namaLawanTransaksi'],
						'alamatLawanTransaksi' => $phpArray['alamatLawanTransaksi'],
						'jumlahDpp' => $phpArray['jumlahDpp'],
						'jumlahPpn' => $phpArray['jumlahPpn'],
						'jumlahPpnBm' => $phpArray['jumlahPpnBm'],
						'statusApproval' => $phpArray['statusApproval'],
						'statusFaktur' => $phpArray['statusFaktur'],
						'referensi' => $phpArray['referensi'],
						'created_at' => date('Y-m-d H:i:s'),
					]
				);
			}
			return view('view.xmlreport',['data'=>$phpArray]);
		}
		
		
	}
	public function hasilxml(Request $request ,$id) {
		// dd($request->data);
		$xmlString = file_get_contents('http://svc.efaktur.pajak.go.id/validasi/faktur/751008657804000/0042350492312/3031300D0609608648016503040201050004207890D0A35932DE9944A48D7171B090DA45BA362FD941AFEF8842A6F0C20DAFD8');
        $xmlObject = simplexml_load_string($xmlString);
                
        $json = json_encode($xmlObject);
        $phpArray = json_decode($json, true);
        // dd($phpArray);
        // $cekdata = $phpArray;
        // return view('xml',['data'=>$phpArray]);
        // dd($data1);
		Excel::create('New file', function($excel){
			$excel->sheet('First sheet', function($sheet){
				$sheet->loadView('view.xml');
			});
		})->export('xls');;
		// return view('view.xml',['data'=>$phpArray]);

	}
	public function list()
	{
		$data = DB::table('tbl_log_faktur')
		->select('tbl_log_faktur.*','tbl_cabang.nama_cabang')
		->join('tbl_cabang','tbl_cabang.kd_cabang','=','tbl_log_faktur.kd_cabang')
		->get();
		return view('view.listxml',['data'=>$data]);
	}

}