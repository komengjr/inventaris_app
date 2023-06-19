<?php
use App\Http\Controllers\FileUploadController;
use Illuminate\Support\Facades\Route;
// Master Cabang GET
Route::get('master/datacabang',['as'=>'master/datacabang','uses'=> 'MasterController@datacabang']);
Route::get('master/datalokasi',['as'=>'master/datalokasi','uses'=> 'MasterController@masterdatalokasi']);
Route::get('master/datalokasi/tambah',['as'=>'master/datalokasi/tambah','uses'=> 'MasterController@mastertambahdatalokasi']);
Route::get('master/datalokasi/edit/{id}',['as'=>'master/datalokasi/edit/','uses'=> 'MasterController@mastereditdatalokasi']);
Route::get('master/dataklasifikasi',['as'=>'master/dataklasifikasi','uses'=> 'MasterController@dataklasifikasi']);
Route::get('master/dataklasifikasi/tambah',['as'=>'master/dataklasifikasi/tambah','uses'=> 'MasterController@tambahdataklasifikasi']);
Route::get('master/dataklasifikasi/edit/{id}',['as'=>'master/dataklasifikasi/edit','uses'=> 'MasterController@editdataklasifikasi']);
// Master Cabang POST
Route::post('master/datacabang/simpandatacabang', 'MasterController@simpandatacabang');
Route::post('master/datacabang/deletedatacabang', 'MasterController@deletedatacabang');
Route::post('master/datacabang/lokasi/tambah',['as'=>'master/datacabang/lokasi/tambah','uses'=> 'MasterController@tambahlokasibaru']);
Route::post('master/datacabang/lokasi/update',['as'=>'master/datacabang/lokasi/update','uses'=> 'MasterController@updatelokasibaru']);
Route::post('master/datacabang/lokasi/delete',['as'=>'master/datacabang/lokasi/delete','uses'=> 'MasterController@deletelokasibaru']);


// Master Admin POST
Route::post('master/datauser/proses/tambah/{id}',['as'=>'master/datauser/proses/tambah/','uses'=> 'MasterController@tambahdatauser']);
Route::post('master/datauser/proses/edit',['as'=>'master/datauser/proses/edit','uses'=> 'MasterController@editdatauser']);
Route::post('master/datauser/proses/reset',['as'=>'master/datauser/proses/reset','uses'=> 'MasterController@resetdatauser']);
Route::post('master/datauser/proses/hapus',['as'=>'master/datauser/proses/hapus','uses'=> 'MasterController@hapusdatauser']);
// Master Admin GET
Route::get('masteradmin', 'MasterController@index')->name('index');
// Master Admin GET User
Route::get('master/datauser/{id}',['as'=>'master/datauser','uses'=> 'MasterController@datauser']);

// Master Admin Get Inventaris
Route::get('master/datainventaris/{id}',['as'=>'master/datainventaris','uses'=> 'MasterController@datainventaris']);
Route::get('master/datainventaris/lihatdatabarang/{id}/{kd}',['as'=>'master/datainventaris/lihatdatabarang','uses'=> 'MasterController@lihatdatabarang']);
Route::get('master/datainventaris/tambahdatabarang/{id}/{kd}',['as'=>'master/datainventaris/tambahdatabarang','uses'=> 'MasterController@tambahdatabarang']);
// Master Admin Post Inventaris
Route::post('master/datainventaris/simpandetailbarang', 'MasterController@simpandetailbarang');
// Master Admin Get Lokasi
Route::get('master/datalokasi/{id}',['as'=>'master/datalokasi','uses'=> 'MasterController@datalokasi']);
// Master Admin Get Data Peminjaman
Route::get('master/datapeminjaman/{id}',['as'=>'master/datapeminjaman','uses'=> 'MasterController@datapeminjaman']);
// Master Admin Get Data Mutasi
Route::get('master/datamutasi/{id}',['as'=>'master/datamutasi','uses'=> 'MasterController@datamutasi']);
Route::get('master/datamutasi/tampilformmuitasi/{id}',['as'=>'tampilformmuitasi','uses'=> 'MasterController@tampilformmuitasi']);
// Master Admin Get Data Pemusnahan
Route::get('master/datapemusnahan/{id}',['as'=>'master/datapemusnahan','uses'=> 'MasterController@datapemusnahan']);



// Divisi Controller
Route::get('menu/form','DivisiController@menu');
Route::get('menu/verifdatainventaris','DivisiController@verifdatainventaris');
Route::post('divisi/peminjaman/tambah','DivisiController@posttambah');
Route::get('divisi/tambahdatapeminjaman',['as'=>'master/tambahdatapeminjaman','uses'=> 'DivisiController@tambahdatapeminjaman']);
Route::get('divisi/peminjaman/lengkapi/{id}',['as'=>'master/peminjaman/lengkapi','uses'=> 'DivisiController@lengkapipeminjaman']);
Route::get('divisi/peminjaman/inputdatabarang/{id}',['as'=>'divisi/peminjaman/inputdatabarang','uses'=> 'DivisiController@inputdatabarangpinjam']);
Route::get('divisi/peminjaman/pengembaliandatabarang/{id}',['as'=>'divisi/peminjaman/pengembaliandatabarang','uses'=> 'DivisiController@pengembaliandatabarang']);
Route::get('divisi/peminjaman/tablepeminjaman/{id}/{ids}',['as'=>'divisi/peminjaman/tablepeminjaman','uses'=> 'DivisiController@tablepeminjaman']);
Route::get('divisi/peminjaman/pengembaliantablepeminjaman/{id}/{ids}',['as'=>'divisi/peminjaman/pengembaliantablepeminjaman','uses'=> 'DivisiController@pengembaliantablepeminjaman']);


Route::post('divisi/inventori/updatedatainventori',['as'=>'divisi/inventori/updatedatainventori','uses'=> 'DivisiController@updatedatainventori']);



Route::get('divisi/tambahdatamutasi',['as'=>'master/tambahdatamutasi','uses'=> 'DivisiController@tambahdatamutasi']);
Route::get('divisi/tambahdatapemusnahan',['as'=>'master/tambahdatapemusnahan','uses'=> 'DivisiController@tambahdatapemusnahan']);
Route::get('divisi/tambahdataverifikasiinventaris',['as'=>'divisi/tambahdataverifikasiinventaris','uses'=> 'DivisiController@tambahdataverifikasiinventaris']);
Route::post('divisi/verifikasi/tambah','DivisiController@posttambahverifikasi');
Route::get('divisi/verifikasi/lengkapi/{id}',['as'=>'master/verifikasi/lengkapi','uses'=> 'DivisiController@verifikasilengkapi']);
Route::get('divisi/verifikasi/lokasi/{tiket}/{id}',['as'=>'master/verifikasi/lokasi','uses'=> 'DivisiController@verifikasilengkapilokasi']);
Route::get('menu/verifdatainventaris/lokasi/update/{id}/{tiket}/{id_inventaris}/{ket}',['as'=>'master/verifikasi/update','uses'=> 'DivisiController@verifikasilengkapiupdatebaranglokasi']);
// Admin Controller
//Mutasi
Route::get('/datamutasi', 'AdminController@formmutasi');
Route::get('tampilformmuitasi/{id}',['as'=>'tampilformmuitasi','uses'=> 'AdminController@tampilformmuitasi']);
Route::get('tambahsubdatamutasibarangx/{id}',['as'=>'tambahsubdatamutasibarangx','uses'=> 'AdminController@tambahsubdatamutasibarangx']);
Route::get('selectlokasi/{id}/{kd}',['as'=>'selectlokasi','uses'=> 'AdminController@selectlokasi']);
Route::post('inputdatamutasibaru',['as'=>'inputdatamutasibaru','uses'=> 'AdminController@inputdatamutasibaru']);
Route::post('kliktambahbrgmutasi/{id}',['as'=>'kliktambahbrgmutasi','uses'=> 'AdminController@kliktambahbrgmutasi']);
Route::get('hapussubtablemutasi/{id}/{no}',['as'=>'hapussubtablemutasi','uses'=> 'AdminController@hapussubtablemutasi']);
Route::get('jenis_mutasi/{id}',['as'=>'jenis_mutasi','uses'=> 'AdminController@jenis_mutasi']);

Route::get('printdokumenmutasi/{id}', 'PdfController@printdokumenmutasi');
Route::get('printdokumenmutasi', 'PdfController@printdokumenmutasi1');

Route::post('file-upload-dokumenmutasi/{id}', [FileUploadController::class, 'uploadDokumenMutasi'])->name('files.upload.dokumenmutasi');
//Musnah
Route::get('/datapemusnahan', 'AdminController@formmusnah');
Route::get('xxshowdatamusnah/{id}',['as'=>'xxshowdatamusnah','uses'=> 'AdminController@xxshowdatamusnah']);
Route::get('addpemusnahanbarang/{id}',['as'=>'addpemusnahanbarang','uses'=> 'AdminController@addpemusnahanbarang']);
Route::post('inputdatamusnahbaru',['as'=>'inputdatamusnahbaru','uses'=> 'AdminController@inputdatamusnahbaru']);
Route::get('selectlokasi1/{id}/{kd}',['as'=>'selectlokasi1','uses'=> 'AdminController@selectlokasi1']);
Route::post('kliktambahbrgmusnah/{id}',['as'=>'kliktambahbrgmusnah','uses'=> 'AdminController@kliktambahbrgmusnah']);
Route::get('hapussubtablemusnah/{id}/{no}',['as'=>'hapussubtablemusnah','uses'=> 'AdminController@hapussubtablemusnah']);
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('faq','DivisiController@faq');





Route::get('formulir', function () {
    return view('admin.formformulir');
});
Route::get('formulir1', function () {
    return view('form.formformulir1');
});
Route::get('formulir2', function () {
    return view('form.formformulir2');
});
Route::get('template', function () {
    return view('index');
});

// Route::get('/pdf', 'PdfController@print')->name('print');
Route::post('/pdf/{id}', 'PdfController@print');
Route::post('/printbarcodelokasi/{id}', 'PdfController@printbarcodelokasi');
Route::get('/printpeserta', 'PdfController@printpeserta');

Route::get('print/{id}', 'DataTableController@print');
Route::get('formbarang', 'DataTableController@formbarang');
Route::post('simpanjenisbarang', 'DataTableController@simpanjenisbarang');
Route::post('simpandetailbarang', 'DataTableController@simpandetailbarang');
Route::post('simpanlokasi', 'DataTableController@simpanlokasi');
Route::post('simpannourutbarang', 'DataTableController@simpannourutbarang');
Route::post('simpanpeserta', 'DataTableController@simpanpeserta');
Route::post('simpandatapeserta', 'DataTableController@simpandatapeserta');

Route::post('updatedatabarang/{id}',['as'=>'updatedatabarang','uses'=> 'HomeController@updatedatabarang']);
Route::post('updatedatabarang1/{id}',['as'=>'updatedatabarang1','uses'=> 'HomeController@updatedatabarang1']);

Route::post('simpandatasubbarang/{id}',['as'=>'simpandatasubbarang','uses'=> 'HomeController@simpandatasubbarang']);
Route::post('simpandatasubbarang1/{id}',['as'=>'simpandatasubbarang1','uses'=> 'HomeController@simpandatasubbarang1']);

Route::get('import', 'DataTableController@importData');
Route::post('import', 'DataTableController@import');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('lihatdatabarang/{id}',['as'=>'lihatdatabarang','uses'=> 'HomeController@lihatdatabarang']);
Route::get('lihatdatabarang1/{id}',['as'=>'lihatdatabarang1','uses'=> 'HomeController@lihatdatabarang1']);
Route::get('editdatabarang/{id}',['as'=>'editdatabarang','uses'=> 'HomeController@editdatabarang']);
Route::get('editdatabarang1/{id}',['as'=>'editdatabarang1','uses'=> 'HomeController@editdatabarang1']);
Route::get('hapusdatabarang/{kode}/{id}',['as'=>'hapusdatabarang','uses'=> 'HomeController@hapusdatabarang']);
Route::get('tambahdatabarang/{id}',['as'=>'tambahdatabarang','uses'=> 'HomeController@tambahdatabarang']);
Route::get('admin/formdataaset/',['as'=>'admin/formdataaset','uses'=> 'HomeController@formdataaset']);


Route::get('mutasidatabarang/{id}',['as'=>'mutasidatabarang','uses'=> 'HomeController@mutasidatabarang']);




Route::get('file-upload', [FileUploadController::class, 'index'])->name('files.index');
Route::post('file-upload/upload-large-files/{id}', [FileUploadController::class, 'uploadLargeFiles'])->name('files.upload.large');
Route::post('file-upload/upload-large-files', [FileUploadController::class, 'uploadLargeFiles1'])->name('files.upload.large1');


Route::get('view/{no}/{cb}/{kd}/{id}', 'DataController@showdata');












Route::get('registerpasien', function () {
    return view('form.formregispasien');
});
Route::get('viewregistrasi/{id}', 'DataTableController@viewdatapasien');
Route::post('simpandataregsiter',['as'=>'simpandataregsiter','uses'=> 'DataController@simpandataregsiter']);
