<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use DB;
class DataController extends Controller
{
    public function scandata()
    {
        return view('scan');
    }
    public function cekdataineventaris(Request $request)
    {

        $data = DB::table('sub_tbl_inventory')->join('tbl_lokasi','tbl_lokasi.kd_lokasi','=','sub_tbl_inventory.kd_lokasi')->where('sub_tbl_inventory.no_inventaris',$request->data)->get();
        return view('tampil',['data'=>$data]);
    }
    public function showdata($no,$cb,$kd,$id)
    {


        $data = DB::table('sub_tbl_inventory')
        ->select('sub_tbl_inventory.*','no_urut_barang.*','tbl_lokasi.kd_lokasi','tbl_lokasi.nama_lokasi')
        ->join('tbl_inventory','tbl_inventory.kd_inventaris','=','sub_tbl_inventory.kd_inventaris')
        ->join('tbl_lokasi','tbl_lokasi.kd_lokasi','=','sub_tbl_inventory.kd_lokasi')
        ->join('no_urut_barang','no_urut_barang.no_urut_barang','=','tbl_inventory.no_urut_barang')
        ->where('no_urut_barang.no_urut_barang',$no)
        ->where('sub_tbl_inventory.kd_cabang',$cb)
        ->where('sub_tbl_inventory.kd_inventaris',$kd)
        ->where('sub_tbl_inventory.id',$id)
        ->orderBy('sub_tbl_inventory.id', 'asc')
        ->get();

        if ($data->isEmpty()) {
            # code...
        } else {
            return view('showdata',['data'=>$data]);
        }

        // dd($data);
        // return view('admin.print',['data'=>$data]);

    }
    public function simpandataregsiter(Request $request)
    {



        $randomString = Str::random(30);
        $nomorregistrasi = 'REG-'.$randomString;
        DB::table('pasien_baru')->insert(
            [
                'no_registerasi' => $nomorregistrasi,
                'nama_pasien' => $request->input('nama_pasien'),
                'job' => $request->input('job'),
                'nik' => $request->input('nik'),
                'umur' => $request->input('umur'),
                'jk' => $request->input('jk'),
                'divisi' => $request->input('divisi'),
                'lokasi' => $request->input('lokasi'),
                'tgl_pemeriksaan' => $request->input('tgl'),
                'dokter_pemeriksa' => $request->input('dokter_pemeriksaan'),


                'ket_kel_1' => $request->input('ket_kel_1'),
                'ket_kel_2' => $request->input('ket_kel_2'),
                'ket_kel_3' => $request->input('ket_kel_3'),
                'ket_kel_4' => $request->input('ket_kel_4'),
                'ket_kel_5' => $request->input('ket_kel_5'),
                'ket_kel_6' => $request->input('ket_kel_6'),
                'ket_kel_7' => $request->input('ket_kel_7'),
                'ket_kel_8' => $request->input('ket_kel_8'),
                'ket_kel_9' => $request->input('ket_kel_9'),
                'ket_kel_10' => $request->input('ket_kel_10'),
                'ket_kel_11' => $request->input('ket_kel_11'),
                'ket_kel_12' => $request->input('ket_kel_12'),
                'ket_kel_13' => $request->input('ket_kel_13'),
                'ket_kel_14' => $request->input('ket_kel_14'),
                'ket_kel_15' => $request->input('ket_kel_15'),
                'ket_kel_16' => $request->input('ket_kel_16'),
                'ket_kel_17' => $request->input('ket_kel_17'),
                'ket_kel_18' => $request->input('ket_kel_18'),
                'ket_kel_19' => $request->input('ket_kel_19'),
                'ket_kel_20' => $request->input('ket_kel_20'),
                'ket_kel_21' => $request->input('ket_kel_21'),
                'ket_kel_22' => $request->input('ket_kel_22'),
                'ket_kel_23' => $request->input('ket_kel_23'),
                'ket_kel_24' => $request->input('ket_kel_24'),
                'ket_kel_25' => $request->input('ket_kel_25'),
                'ket_kel_26' => $request->input('ket_kel_26'),
                'ket_kel_27' => $request->input('ket_kel_27'),
                'ket_kel_28' => $request->input('ket_kel_28'),

            ]);

        DB::table('riwayat_penyakit')->insert(
            [
                'no_registerasi' => $nomorregistrasi,
                'gastritis' => $request->input('gastritis'),
                'hepatitis' => $request->input('hepatitis'),
                'batu_empedu' => $request->input('batu_empedu'),
                'demam_typoid' => $request->input('demam_typoid'),
                'haemorrid' => $request->input('haemorrid'),
                'osp' => $request->input('osp'),
                'asma' => $request->input('asma'),
                'tbc' => $request->input('tbc'),
                'batuk_lebih' => $request->input('batuk_lebih'),
                'pneumonia' => $request->input('pneumonia'),
                'jantung' => $request->input('jantung'),
                'hipertensi' => $request->input('hipertensi'),
                'stroke' => $request->input('stroke'),
                'pen' => $request->input('pen'),
                'anemia' => $request->input('anemia'),
                'vertigo' => $request->input('vertigo'),
                'epilepsi' => $request->input('epilepsi'),
                'polio' => $request->input('polio'),
                'kejiwaan' => $request->input('kejiwaan'),
                'cidera_kepala' => $request->input('cidera_kepala'),
                'mata_minus' => $request->input('mata_minus'),
                'mata_plus' => $request->input('mata_plus'),
                'mata_slinder' => $request->input('mata_slinder'),
                'trauma_pengelihatan' => $request->input('trauma_pengelihatan'),
                'fotopobia' => $request->input('fotopobia'),
                'pendengaran' => $request->input('pendengaran'),
                'sinusitis' => $request->input('sinusitis'),
                'rhinitis' => $request->input('rhinitis'),
                'amandel' => $request->input('amandel'),
                'otitis' => $request->input('otitis'),
                'trauma_pendengaran' => $request->input('trauma_pendengaran'),
                'batu_ginjal' => $request->input('batu_ginjal'),
                'penyakit_ginjal' => $request->input('penyakit_ginjal'),
                'isk' => $request->input('isk'),
                'osk' => $request->input('osk'),
                'patah_tulang' => $request->input('patah_tulang'),
                'radang_sendi' => $request->input('radang_sendi'),
                'rheumatik' => $request->input('rheumatik'),
                'cidera' => $request->input('cidera'),
                'nyeri_otot' => $request->input('nyeri_otot'),
                'nyeri_punggung' => $request->input('nyeri_punggung'),
                'gar' => $request->input('gar'),
                'kista' => $request->input('kista'),
                'pahs' => $request->input('pahs'),
                'hiv' => $request->input('hiv'),
                'lepra' => $request->input('lepra'),
                'pkyl' => $request->input('pkyl'),
                'diabetes' => $request->input('diabetes'),
                'gondok' => $request->input('gondok'),
                'alergi_obat' => $request->input('alergi_obat'),
                'alergi_makanan' => $request->input('alergi_makanan'),
                'alergi_hirupan' => $request->input('alergi_hirupan'),
                'alergi_kontak' => $request->input('alergi_kontak'),
                'alergi_lain' => $request->input('alergi_lain'),
                'dhf' => $request->input('dhf'),
                'malaria' => $request->input('malaria'),
                'typoid' => $request->input('typoid'),
                'tropis_lain' => $request->input('tropis_lain'),
                'kanker' => $request->input('kanker'),
                'leukimia' => $request->input('leukimia'),
                'pernah_oprasi' => $request->input('pernah_oprasi'),
                'penyakit_lain' => $request->input('penyakit_lain'),
            ]);

        DB::table('riwayat_penyakit_keluarga')->insert(
            [
                'no_registerasi' => $nomorregistrasi,
                'pk_diabetes' => $request->input('pk_diabetes'),
                'pk_hypertensi' => $request->input('pk_hypertensi'),
                'pk_stroke' => $request->input('pk_stroke'),
                'pk_jantung' => $request->input('pk_jantung'),
                'pk_ginjal' => $request->input('pk_ginjal'),
                'pk_tbc' => $request->input('pk_tbc'),
                'pk_lepra' => $request->input('pk_lepra'),
                'pk_hepatitis' => $request->input('pk_hepatitis'),
                'pk_epilepsi' => $request->input('pk_epilepsi'),
                'pk_kejiwaan' => $request->input('pk_kejiwaan'),
                'pk_kanker' => $request->input('pk_kanker'),
                'pk_lupus' => $request->input('pk_lupus'),
                'pk_asma' => $request->input('pk_asma'),
            ]);

        DB::table('riwayat_kebiasaan_hidup')->insert(
            [
                'no_registerasi' => $nomorregistrasi,
                'minum_alkohol' => $request->input('minum_alkoholx'),
                'ket_minum_alkohol' => $request->input('minum_alkohol'),
                'olahraga' => $request->input('olahraga'),
                'ket_olahraga' =>$request->input('olahraga-1'),
                'merokok' => $request->input('merokok') ,
                'ket_merokok' => $request->input('merokok-1'),
            ]);

        DB::table('riwayat_konsumsi_obat')->insert(
            [
                'no_registerasi' => $nomorregistrasi,
                'anti_diabetets' => $request->input('nama_pasien'),
                'anti_hypertensi' => $request->input('nama_pasien'),
                'obat_lainnya' => $request->input('nama_pasien'),
            ]);

        $data = DB::table('pasien_baru')
        ->select('pasien_baru.*')
        ->where('no_registerasi', $nomorregistrasi)
        ->get();
        return view('form.hasilregister',['data'=>$data]);
    }
    public function pendaftaran(Request $request)
    {
        $cekuser = DB::table('tbl_daftar_user')->where('username', $request->input('username'))->first();
        if ($cekuser) {
            Session::flash('Gagal','Pendaftaran Gagal');
            return redirect()->back();
        } else {
            DB::table('tbl_daftar_user')->insert([
                'username'=> $request->input('username'),
                'password'=> $request->input('password'),
                'nama_cabang'=> $request->input('cabang'),
            ]);
            Session::flash('sukses','Pendaftaran Berhasil');
            return redirect()->back();
        }


    }
}
