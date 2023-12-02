<?php
use App\Http\Controllers\FileUploadController;
use Illuminate\Support\Facades\Route;

Route::get('scan', 'DataController@scandata');
Route::post('pendaftaran', 'DataController@pendaftaran')->name('daftarakuncabang');
Route::post('data/{id}', 'DataController@cekdataineventaris');
Route::get('barcode_qr_reader', 'ImageUploadController@page');
Route::post('/barcode_qr_reader/upload', 'ImageUploadController@upload')->name('image.upload');

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
Route::get('masteradmindetail', 'MasterController@masteradmindetail');
Route::get('masterinjekupdate/{id}', 'MasterController@masterinjekupdate');
// Master Admin GET User
Route::get('master/datauser/{id}',['as'=>'master/datauser','uses'=> 'MasterController@datauser']);
// Master Data Excel
Route::get('master/dataexcel/{id}',['as'=>'master/dataexcel','uses'=> 'MasterController@dataexcelcabang']);
Route::get('master/dataexcel/detail/data/{id}',['as'=>'master/dataexcel/detail/data','uses'=> 'MasterController@editdataexcelcabang']);
Route::post('master/dataexcel/detail/postdata',['as'=>'master/dataexcel/detail/postdata','uses'=> 'MasterController@editpostdataexcelcabang']);
Route::get('master/masterdatainventaris/{id}',['as'=>'master/masterdatainventaris','uses'=> 'MasterController@masterdatainventaris']);
Route::get('master/masterdatalokasicabang/{id}',['as'=>'master/masterdatalokasicabang','uses'=> 'MasterController@masterdatalokasicabang']);

// Master Admin Get Inventaris
Route::get('master/datainventaris/{id}',['as'=>'master/datainventaris','uses'=> 'MasterController@datainventaris']);
Route::get('master/datainventaris/lihatdatabarang/{id}/{kd}',['as'=>'master/datainventaris/lihatdatabarang','uses'=> 'MasterController@lihatdatabarang']);
Route::get('master/datainventaris/tambahdatabarang/{id}/{kd}',['as'=>'master/datainventaris/tambahdatabarang','uses'=> 'MasterController@tambahdatabarang']);
Route::get('master/data-inventaris/update/{id}',['as'=>'master/data-inventaris/update','uses'=> 'MasterController@updatedatainevntaris']);
Route::get('masteradmin/data-inventaris/updatedata/{id}',['as'=>'masteradmin/data-inventaris/updatedata','uses'=> 'MasterController@getupdatedatainevntaris']);
// Master Admin Post Inventaris
Route::post('master/datainventaris/simpandetailbarang', 'MasterController@simpandetailbarang');
Route::post('master/datainventaris/createnomorinventariscabang', 'MasterController@createnomorinventariscabang');

Route::post('master/datainventaris/simpanupdateinventaris', 'MasterController@simpanupdateinventaris');
Route::get('master/datainventaris/simpanupdateinventaris/{id}', 'MasterController@simpanupdateinventariscabang');
// Master Admin Get Lokasi
Route::get('master/datalokasi/{id}',['as'=>'master/datalokasiid','uses'=> 'MasterController@datalokasi']);
// Master Admin Get Data Peminjaman
Route::get('master/datapeminjaman/{id}',['as'=>'master/datapeminjaman','uses'=> 'MasterController@datapeminjaman']);
// Master Admin Get Data Mutasi
Route::get('master/datamutasi/{id}',['as'=>'master/datamutasi','uses'=> 'MasterController@datamutasi']);
Route::get('master/datamutasi/tampilformmuitasi/{id}',['as'=>'master/datamutasi/tampilformmuitasi','uses'=> 'MasterController@tampilformmuitasi']);
// Master Admin Get Data Pemusnahan
Route::get('master/datapemusnahan/{id}',['as'=>'master/datapemusnahan','uses'=> 'MasterController@datapemusnahan']);


// Divisi Controller
Route::get('lihatdatabarang1/{id}',['as'=>'lihatdatabarang1','uses'=> 'DivisiController@lihatdatabarang1']);
Route::get('menu/formpinjam','DivisiController@menu');
Route::get('menu/formdepresiasi','DivisiController@depresiasisemuaaset');
Route::get('menu/formmutasi','DivisiController@mutasidatainventaris');
Route::get('menu/formpemusnahan','DivisiController@menupemusnahan');
Route::get('menu/verifdatainventaris','DivisiController@verifdatainventaris');
//PEMINJAMAN
Route::post('divisi/peminjaman/tambah','DivisiController@posttambah');
Route::post('divisi/peminjaman/editdata','DivisiController@editdatapeminjamanpost');
Route::get('divisi/tambahdatapeminjaman',['as'=>'master/tambahdatapeminjaman','uses'=> 'DivisiController@tambahdatapeminjaman']);
Route::get('divisi/peminjaman/lengkapi/{id}',['as'=>'master/peminjaman/lengkapi','uses'=> 'DivisiController@lengkapipeminjaman']);
Route::get('divisi/peminjaman/inputdatabarang/{id}',['as'=>'divisi/peminjaman/inputdatabarang','uses'=> 'DivisiController@inputdatabarangpinjam']);
Route::get('divisi/peminjaman/caridatabarang/{id}',['as'=>'divisi/peminjaman/caridatabarang','uses'=> 'DivisiController@caridatabarang']);
Route::get('divisi/peminjaman/pengembaliandatabarang/{id}',['as'=>'divisi/peminjaman/pengembaliandatabarang','uses'=> 'DivisiController@pengembaliandatabarang']);
Route::get('divisi/peminjaman/caribarang/{id}/{datax}',['as'=>'divisi/peminjaman/caribarang','uses'=> 'DivisiController@tablecaripeminjaman']);
Route::get('divisi/peminjaman/inserttable/{id}/{ids}/{datax}',['as'=>'divisi/peminjaman/inserttable','uses'=> 'DivisiController@inserttablepeminjaman']);
Route::get('divisi/peminjaman/tablepeminjaman/{id}/{ids}',['as'=>'divisi/peminjaman/tablepeminjaman','uses'=> 'DivisiController@tablepeminjaman']);
Route::get('divisi/peminjaman/refreshtablepeminjaman/{id}',['as'=>'divisi/peminjaman/refreshtablepeminjaman','uses'=> 'DivisiController@refreshtablepeminjaman']);
Route::get('divisi/peminjaman/editdatatablepeminjaman/{id}',['as'=>'divisi/peminjaman/editdatatablepeminjaman','uses'=> 'DivisiController@editdatatablepeminjaman']);
Route::get('divisi/peminjaman/editdatapeminjaman/{id}',['as'=>'divisi/peminjaman/editdatapeminjaman','uses'=> 'DivisiController@editdatapeminjaman']);
Route::get('divisi/peminjaman/balikdatapeminjaman/{id}',['as'=>'divisi/peminjaman/balikdatapeminjaman','uses'=> 'DivisiController@balikdatapeminjaman']);
Route::get('divisi/peminjaman/hapusdetaildatapeminjaman/{id}/{ids}',['as'=>'divisi/peminjaman/hapusdetaildatapeminjaman','uses'=> 'DivisiController@hapusdetaildatapeminjaman']);
Route::post('divisi/peminjaman/posteditdatapeminjaman',['as'=>'divisi/peminjaman/posteditdatapeminjaman','uses'=> 'DivisiController@posteditdatapeminjaman']);
Route::get('divisi/peminjaman/pengembaliantablepeminjaman/{id}/{ids}',['as'=>'divisi/peminjaman/pengembaliantablepeminjaman','uses'=> 'DivisiController@pengembaliantablepeminjaman']);
// MAINTENANCE
Route::get('menu/formmaintenance','MaintenanceController@menumaintenance');
Route::get('divisi/tambahdatamaintenance',['as'=>'divisi/tambahdatamaintenance','uses'=> 'MaintenanceController@tambahdatamaintenance']);
Route::post('divisi/tambahdatamaintenance','MaintenanceController@posttambahdatamaintenance');
Route::get('divisi/maintenance/caridatabarang/{id}','MaintenanceController@caridatabarangmaintenance');
Route::get('divisi/maintenance/pilihdatabarang/{id}','MaintenanceController@pilihdatabarangmaintenance');
Route::get('divisi/maintenance/showfilemaintenance/{id}','MaintenanceController@showfilemaintenance');
Route::get('divisi/maintenance/tindakan/{id}','MaintenanceController@tindakanmaintenance');
Route::post('divisi/maintenance/tindakan','MaintenanceController@posttindakanmaintenance');
Route::get('divisi/maintenance/printmaintenance/{id}','MaintenanceController@printmaintenance');


Route::get('divisi/masterbarang/dataloginventaris',['as'=>'divisi/masterbarang/dataloginventaris','uses'=> 'DivisiController@masterbarangloginventaris']);
Route::get('divisi/masterbarang/dataloginventaris/cekeror',['as'=>'divisi/masterbarang/dataloginventaris/cekeror','uses'=> 'DivisiController@cekerorloginventaris']);
Route::get('divisi/masterbarang/dataloginventaris/cekerorklasifikasi',['as'=>'divisi/masterbarang/dataloginventaris/cekerorklasifikasi','uses'=> 'DivisiController@cekerorklasifikasiloginventaris']);
Route::get('divisi/masterbarang/dataloginventaris/editdata/{id}',['as'=>'divisi/masterbarang/dataloginventaris/editdata','uses'=> 'DivisiController@masterbarangeditloginventaris']);
Route::get('divisi/masterbarang/dataloginventaris/editdataklasifikasi/{id}',['as'=>'divisi/masterbarang/dataloginventaris/editdataklasifikasi','uses'=> 'DivisiController@masterbarangeditloginventarisklasifikasi']);
Route::get('divisi/masterbarang/showedit/{id}',['as'=>'divisi/masterbarang/showedit','uses'=> 'DivisiController@masterbarangshowedit']);
Route::post('divisi/masterbarang/postedit/{id}',['as'=>'divisi/masterbarang/postedit','uses'=> 'DivisiController@posteditdataloginventory']);
Route::get('divisi/masterbarang/dataloginventaris/downloaddataloginventory',['as'=>'divisi/masterbarang/dataloginventaris/downloaddataloginventory','uses'=> 'DivisiController@downloaddataloginventory']);
Route::get('divisi/masterbarang/dataloginventaris/resetdataloginventory',['as'=>'divisi/masterbarang/dataloginventaris/resetdataloginventory','uses'=> 'DivisiController@resetdataloginventory']);
Route::get('divisi/masterbarang/dataloginventaris/fixtanggaldataloginventory',['as'=>'divisi/masterbarang/dataloginventaris/fixtanggaldataloginventory','uses'=> 'DivisiController@fixtanggaldataloginventory']);

Route::get('divisi/dataaset/tabledataaset',['as'=>'divisi/dataaset/tabledataaset','uses'=> 'DivisiController@tabledataaset']);
Route::get('divisi/dataaset/tambah',['as'=>'divisi/dataaset/tambah','uses'=> 'DivisiController@tambahdataaset']);
Route::get('divisi/dataaset/pilihdata',['as'=>'divisi/dataaset/pilihdata','uses'=> 'DivisiController@pilihdata']);
Route::get('divisi/dataaset/datadepresiasi',['as'=>'divisi/dataaset/datadepresiasi','uses'=> 'DivisiController@datadepresiasi']);
Route::get('divisi/dataaset/datadepresiasi/table',['as'=>'divisi/dataaset/datadepresiasi/table','uses'=> 'DivisiController@datadtableepresiasi']);
Route::get('divisi/dataaset/datadepresiasi/penambahandata',['as'=>'divisi/dataaset/datadepresiasi/penambahandata','uses'=> 'DivisiController@penambahandatadepresiasi']);
Route::post('divisi/dataaset/datadepresiasi/postpenambahandata',['as'=>'divisi/dataaset/datadepresiasi/postpenambahandata','uses'=> 'DivisiController@postpenambahandatadepresiasi']);
Route::get('divisi/data-aset/detaildataaset/{id}',['as'=>'divisi/data-aset/detaildataaset','uses'=> 'DivisiController@datadetailasetcabang']);
Route::get('divisi/dataaset/detaildataaset/{id}',['as'=>'divisi/dataaset/detaildataaset','uses'=> 'DivisiController@detaildataaset']);
Route::get('divisi/dataaset/editdetaildataaset/{id}',['as'=>'divisi/dataaset/editdetaildataaset','uses'=> 'DivisiController@editdetaildataaset']);
Route::get('divisi/dataaset/getdataoption/{id}/{tgl}/{harga}',['as'=>'divisi/dataaset/getdataoption/','uses'=> 'DivisiController@getdatadepresiasiaset']);
Route::post('divisi/dataaset/posttambahdatamaintenance','DivisiController@tambahdatamaintance');
Route::post('divisi/dataaset/postupdatedatamaintenance','DivisiController@updatedatamaintance');
Route::post('divisi/dataaset/posttambahdatainvoiceaset','DivisiController@tambahdatainvoice');
Route::post('divisi/dataaset/posttambahdatadepresiasi','DivisiController@tambahdatadepresiasiaset');
Route::post('divisi/dataaset/tambahdatamaintenance/{id}', [FileUploadController::class, 'uploaddatamaintenance'])->name('uploaddatamaintenance');
Route::post('divisi/dataaset/tambahdatainvoice/{id}', [FileUploadController::class, 'uploaddatainvoice'])->name('uploaddatainvoice');
Route::get('divisi/dataaset/depresiasi/detaildatainvoice/{id}',['as'=>'divisi/dataaset/depresiasi/detaildatainvoice','uses'=> 'DivisiController@detaildatainvoice']);
Route::get('divisi/dataaset/depresiasi/detaildatamaintenance/{id}',['as'=>'divisi/dataaset/depresiasi/detaildatamaintenance','uses'=> 'DivisiController@detaildatamaintenance']);
Route::get('divisi/dataaset/depresiasi/tambahmaintenance/{id}',['as'=>'divisi/dataaset/depresiasi/tambahmaintenance','uses'=> 'DivisiController@formtambahdatamaintenance']);
Route::get('divisi/dataaset/depresiasi/tambahinvoiceaset/{id}',['as'=>'divisi/dataaset/depresiasi/tambahinvoiceaset','uses'=> 'DivisiController@formtambahdatainvoiceaset']);
Route::get('divisi/dataaset/depresiasi/pilihdatadepresiasi/{id}',['as'=>'divisi/dataaset/depresiasi/pilihdatadepresiasi','uses'=> 'DivisiController@pilihdatadepresiasi']);

Route::get('menu/masterbarang','DivisiController@masterbarang');
Route::get('menu/masterbarang/table','BigDataController@masterbarang')->name('master.barang');
Route::get('divisi/masterbarang/dataloginventaris/table','BigDataController@masterbaranglog')->name('master.barang.upload.data');
Route::get('divisi/masterbarang/dataloginventaris/erordata','BigDataController@erorbaranglog')->name('master.barang.eror.data');
Route::get('divisi/masterbarang/dataloginventaris/erorklasifikasi','BigDataController@erorklasifikasi')->name('master.barang.erorklasifikasi.data');
Route::get('menu/masterstaff','DivisiController@masterstaff');

Route::get('divisi/masterstaff/tambah',['as'=>'divisi/masterstaff/tambah','uses'=> 'DivisiController@tambahdatastaffkaryawan']);
Route::get('divisi/masterbarang/fixdata','DivisiController@fixdatamasterbarang');
Route::post('divisi/masterstaff/tambah','DivisiController@posttambahdatastaff');
Route::post('divisi/setting/system','DivisiController@settingsystem');
Route::post('divisi/masterbarang/editbarang','DivisiController@posteditbarang');

Route::post('divisi/inventori/updatedatainventori',['as'=>'divisi/inventori/updatedatainventori','uses'=> 'DivisiController@updatedatainventori']);
Route::post('admin/datainventaris/uploaddatabaranginventaris', 'DivisiController@simpandetailbarang');


Route::get('divisi/datamutasi/datatable/{id}',['as'=>'divisi/datamutasi/datatable','uses'=> 'DivisiController@datatablemutasi']);
Route::get('divisi/datamutasi/tambahdata',['as'=>'divisi/datamutasi/tambahdata','uses'=> 'DivisiController@ordertiketmutasi']);
Route::get('divisi/datamutasi/caridata/{id}/{ids}',['as'=>'divisi/datamutasi/caridata','uses'=> 'DivisiController@caridatabarangmutasi']);
Route::get('divisi/tambahdatamutasi',['as'=>'master/tambahdatamutasi','uses'=> 'DivisiController@tambahdatamutasi']);
Route::get('divisi/datamutasi/detaildatamutasi/{id}',['as'=>'divisi/datamutasi/detaildatamutasi','uses'=> 'DivisiController@detaildatamutasi']);
Route::get('divisi/datamutasi/editdatamutasi/{id}',['as'=>'divisi/datamutasi/editdatamutasi','uses'=> 'DivisiController@editdetailbarangmutasi']);
Route::get('divisi/datamutasi/inserttable/{ids}/{id}/{data}',['as'=>'divisi/datamutasi/inserttable','uses'=> 'DivisiController@inserttablepencarian']);
Route::get('divisi/datamutasi/hapusdetaildatamutasi/{id}/{kode}',['as'=>'divisi/datamutasi/hapusdetaildatamutasi','uses'=> 'DivisiController@hapusdetaildatamutasi']);
Route::get('divisi/datamutasi/showdataorder',['as'=>'divisi/datamutasi/showdataorder','uses'=> 'DivisiController@showdataordermutasi']);

// DATA LOKASI
Route::get('menu/masterlokasi','DivisiController@masterlokasi');
Route::get('divisi/masterlokasi/tambah',['as'=>'divisi/masterlokasi/tambah','uses'=> 'DivisiController@formtambahnomoruangan']);
Route::get('divisi/masterlokasi/lihatdata',['as'=>'divisi/masterlokasi/lihatdata','uses'=> 'DivisiController@masterlihatdatalokasi']);
Route::get('divisi/masterlokasi/lihatdatacabang',['as'=>'divisi/masterlokasi/lihatdatacabang','uses'=> 'DivisiController@masterlihatdatalokasicabang']);
Route::get('divisi/masterlokasi/datasetup/{id}',['as'=>'divisi/masterlokasi/datasetup','uses'=> 'DivisiController@datasetuplokasiruangan']);
Route::get('divisi/masterlokasi/datasetup/inputdatamaster/{no}/{id}',['as'=>'divisi/masterlokasi/datasetup/inputdatamaster/','uses'=> 'DivisiController@inputdatamasterlokasibarang']);
Route::get('divisi/masterlokasi/datasetup/resetdatamaster/{no}/{id}',['as'=>'divisi/masterlokasi/datasetup/resetdatamaster/','uses'=> 'DivisiController@resetdatamasterlokasibarang']);
Route::get('divisi/masterlokasi/datasetup/tablemasterlokasibarang/{id}',['as'=>'divisi/masterlokasi/datasetup/tablemasterlokasibarang/','uses'=> 'DivisiController@tabledatamasterlokasibarang']);
Route::get('divisipost/datalokasi/delete/detail/{id}',['as'=>'divisipost/datalokasi/delete/detail/','uses'=> 'DivisiController@deletemasterlokasicabang']);
Route::post('divisi/masterlokasi/posttambah', 'DivisiController@posttambahdatanomorruangan');
Route::post('divisi/postmasterlokasi/datasetup/postdataall',['as'=>'divisi/postmasterlokasi/datasetup/postdataall','uses'=> 'DivisiController@postdatasetuplokasiruangan']);

Route::get('divisi/tambahdatapemusnahan',['as'=>'master/tambahdatapemusnahan','uses'=> 'DivisiController@tambahdatapemusnahan']);
Route::get('divisi/tambahdataverifikasiinventaris',['as'=>'divisi/tambahdataverifikasiinventaris','uses'=> 'DivisiController@tambahdataverifikasiinventaris']);
Route::post('divisi/verifikasi/tambah','DivisiController@posttambahverifikasi');
Route::get('divisi/verifikasi/lengkapi/{id}',['as'=>'master/verifikasi/lengkapi','uses'=> 'DivisiController@verifikasilengkapi']);
Route::get('divisi/verifikasi/lokasi/{tiket}/{id}',['as'=>'master/verifikasi/lokasi','uses'=> 'DivisiController@verifikasilengkapilokasi']);
Route::get('menu/verifdatainventaris/lokasi/update/{id}/{tiket}/{id_inventaris}/{ket}',['as'=>'master/verifikasi/update','uses'=> 'DivisiController@verifikasilengkapiupdatebaranglokasi']);
Route::get('menu/verifdatainventaris/cetak/detail/{id}',['as'=>'menu/verifdatainventaris/cetak/detail','uses'=> 'DivisiController@cetakreportstockopname']);
Route::get('divisi/verifikasi/print/verif/{id}','PdfController@printverifikasi');
Route::get('divisi/verifikasi/print/peminjaman/{id}','PdfController@printpeminjaman');
Route::get('divisi/verifikasi/print/pemusnahan/{id}','PdfController@printpemusnahan');
Route::get('divisi/datamutasi/print/datamutasi/{id}','PdfController@printdatamutasi');
Route::get('divisi/verifikasi/peminjaman/pemyelesaian/{id}','PdfController@penyelesaianpeminjaman');
Route::get('divisipostpenyelesaian/data/stockopname/{id}','DivisiController@divisipostpenyelesaianstockopname');
// Admin Controller
//Mutasi
Route::post('divisi/datamutasi/posttambahdata', 'DivisiController@posttambahdatamutasi');
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
Route::get('divisi/case/databaru/',['as'=>'divisi/case/databaru/','uses'=> 'DivisiController@tambahdatacase']);
Route::get('divisi/case/datacase/detail/{id}',['as'=>'divisi/case/datacase/detail/','uses'=> 'DivisiController@detaildatacaseid']);
Route::get('divisi/case/datalokasi/',['as'=>'divisi/case/datalokasi/','uses'=> 'DivisiController@casedatalokasi']);
Route::get('divisi/case/dataklasifikasi/',['as'=>'divisi/case/dataklasifikasi/','uses'=> 'DivisiController@casedataklasifikasi']);
Route::post('divisi/case/databaru/','DivisiController@posttambahdatacase');

Route::post('/pdf/{id}', 'PdfController@print');
Route::post('/printbarcodelokasi/{id}', 'PdfController@printbarcodelokasi');
Route::get('/printbarcodebyid/{id}', 'PdfController@printbarcodebyid');
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

Route::get('/', 'HomeController@index')->name('base');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('lihatdatabarang/{id}',['as'=>'lihatdatabarang','uses'=> 'HomeController@lihatdatabarang']);

Route::get('editdatabarang/{id}',['as'=>'editdatabarang','uses'=> 'HomeController@editdatabarang']);
Route::get('editdatabarang1/{id}',['as'=>'editdatabarang1','uses'=> 'HomeController@editdatabarang1']);
Route::get('hapusdatabarang/{kode}/{id}',['as'=>'hapusdatabarang','uses'=> 'HomeController@hapusdatabarang']);
Route::get('tambahdatabarang/{id}',['as'=>'tambahdatabarang','uses'=> 'HomeController@tambahdatabarang']);
Route::get('admin/formdataaset/',['as'=>'admin/formdataaset','uses'=> 'HomeController@formdataaset']);
Route::get('admin/formdatainventaris/tambadata',['as'=>'admin/formdatainventaris/tambadata','uses'=> 'HomeController@tambahdatainventaris']);
Route::post('admin/datainventaris/simpandata', 'HomeController@simpandatainventaris');


Route::get('mutasidatabarang/{id}',['as'=>'mutasidatabarang','uses'=> 'HomeController@mutasidatabarang']);




Route::get('file-upload', [FileUploadController::class, 'index'])->name('files.index');
Route::post('file-upload/upload-large-files/{id}', [FileUploadController::class, 'uploadLargeFiles'])->name('files.upload.large');
Route::post('file-upload/upload-large-files', [FileUploadController::class, 'uploadLargeFiles1'])->name('files.upload.large1');
Route::post('file-upload/uploadgambarbarang', [FileUploadController::class, 'uploadgambarbarang'])->name('file-upload.uploadgambarbarang');
Route::post('file-upload/uploaddatamaintenance', [FileUploadController::class, 'uploaddatamaintenancebarang'])->name('file-upload.uploaddatamaintenance');



Route::get('view/{no}/{cb}/{kd}/{id}', 'DataController@showdata');


Route::get('viewregistrasi/{id}', 'DataTableController@viewdatapasien');
Route::post('simpandataregsiter',['as'=>'simpandataregsiter','uses'=> 'DataController@simpandataregsiter']);
Route::get('log-eror-inventaris', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
