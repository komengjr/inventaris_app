<?php
use App\Http\Controllers\AppController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MasterAdminController;
use Illuminate\Support\Facades\Route;

Route::get('scan', 'DataController@scandata');
Route::post('masuk-halaman', 'Auth\LoginController@authenticate')->name('masuk');
// Route::post('masuk-halaman', [App\Http\Controllers\LoginController::class, 'authenticate'])->name('masuk');
Route::post('pendaftaran', 'DataController@pendaftaran')->name('daftarakuncabang');
Route::post('data/inventaris', 'DataController@cekdataineventaris');
Route::post('postdata/inventaris/{id}', 'DataController@scandataineventaris');
Route::get('barcode_qr_reader', 'ImageUploadController@page');
Route::post('/barcode_qr_reader/upload', 'ImageUploadController@upload')->name('image.upload');

// Master Cabang GET
Route::get('master/datacabang', ['as' => 'master/datacabang', 'uses' => 'MasterController@datacabang']);
Route::get('master/datalokasi', ['as' => 'master/datalokasi', 'uses' => 'MasterController@masterdatalokasi']);
Route::get('master/datalokasi/tambah', ['as' => 'master/datalokasi/tambah', 'uses' => 'MasterController@mastertambahdatalokasi']);
Route::get('master/datalokasi/edit/{id}', ['as' => 'master/datalokasi/edit/', 'uses' => 'MasterController@mastereditdatalokasi']);
Route::get('master/dataklasifikasi', ['as' => 'master/dataklasifikasi', 'uses' => 'MasterController@dataklasifikasi']);
Route::get('master/dataklasifikasi/tambah', ['as' => 'master/dataklasifikasi/tambah', 'uses' => 'MasterController@tambahdataklasifikasi']);
Route::get('master/dataklasifikasi/edit/{id}', ['as' => 'master/dataklasifikasi/edit', 'uses' => 'MasterController@editdataklasifikasi']);
// Master Cabang POST
Route::post('master/datacabang/simpandatacabang', 'MasterController@simpandatacabang');
Route::post('master/datacabang/deletedatacabang', 'MasterController@deletedatacabang');
Route::post('master/datacabang/lokasi/tambah', ['as' => 'master/datacabang/lokasi/tambah', 'uses' => 'MasterController@tambahlokasibaru']);
Route::post('master/datacabang/lokasi/update', ['as' => 'master/datacabang/lokasi/update', 'uses' => 'MasterController@updatelokasibaru']);
Route::post('master/datacabang/lokasi/delete', ['as' => 'master/datacabang/lokasi/delete', 'uses' => 'MasterController@deletelokasibaru']);

// Master Admin POST
Route::post('master/datauser/proses/tambah/{id}', ['as' => 'master/datauser/proses/tambah/', 'uses' => 'MasterController@tambahdatauser']);
Route::post('master/datauser/proses/edit', ['as' => 'master/datauser/proses/edit', 'uses' => 'MasterController@editdatauser']);
Route::post('master/datauser/proses/reset', ['as' => 'master/datauser/proses/reset', 'uses' => 'MasterController@resetdatauser']);
Route::post('master/datauser/proses/hapus', ['as' => 'master/datauser/proses/hapus', 'uses' => 'MasterController@hapusdatauser']);
// Master Admin GET
Route::get('masteradmin', 'MasterController@index')->name('index');
Route::get('masteradmindetail', 'MasterController@masteradmindetail');
Route::get('masterlogactifity', 'MasterController@masterlogactifity');
Route::get('masterlogactifity/detail/{id}', 'MasterController@findmymasterlogactifity');
Route::get('masterinjekupdate/{id}', 'MasterController@masterinjekupdate');

// Master Admin Telegram
Route::get('masteradmintelegram', 'MasterController@masteradmintelegram')->name('masteradmintelegram');
// Master Admin GET User
Route::get('master/datauser/{id}', ['as' => 'master/datauser', 'uses' => 'MasterController@datauser']);
// Master Data Excel
Route::get('master/dataexcel/{id}', ['as' => 'master/dataexcel', 'uses' => 'MasterController@dataexcelcabang']);
Route::get('master/dataexcel/detail/data/{id}', ['as' => 'master/dataexcel/detail/data', 'uses' => 'MasterController@editdataexcelcabang']);
Route::post('master/dataexcel/detail/postdata', ['as' => 'master/dataexcel/detail/postdata', 'uses' => 'MasterController@editpostdataexcelcabang']);
Route::get('master/masterdatainventaris/{id}', ['as' => 'master/masterdatainventaris', 'uses' => 'MasterController@masterdatainventaris']);
Route::get('master/masterdatalokasicabang/{id}', ['as' => 'master/masterdatalokasicabang', 'uses' => 'MasterController@masterdatalokasicabang']);

// Master Admin Get Inventaris
Route::get('master/datainventaris/{id}', ['as' => 'master/datainventaris', 'uses' => 'MasterController@datainventaris']);
Route::get('master/datainventaris/lihatdatabarang/{id}/{kd}', ['as' => 'master/datainventaris/lihatdatabarang', 'uses' => 'MasterController@lihatdatabarang']);
Route::get('master/datainventaris/tambahdatabarang/{id}/{kd}', ['as' => 'master/datainventaris/tambahdatabarang', 'uses' => 'MasterController@tambahdatabarang']);
Route::get('master/data-inventaris/update/{id}', ['as' => 'master/data-inventaris/update', 'uses' => 'MasterController@updatedatainevntaris']);
Route::get('masteradmin/data-inventaris/updatedata/{id}', ['as' => 'masteradmin/data-inventaris/updatedata', 'uses' => 'MasterController@getupdatedatainevntaris']);
// Master Admin Post Inventaris
Route::post('master/datainventaris/simpandetailbarang', 'MasterController@simpandetailbarang');
Route::post('master/datainventaris/createnomorinventariscabang', 'MasterController@createnomorinventariscabang');

Route::post('master/datainventaris/simpanupdateinventaris', 'MasterController@simpanupdateinventaris');
Route::get('master/datainventaris/simpanupdateinventaris/{id}', 'MasterController@simpanupdateinventariscabang');
// Master Admin Get Lokasi
Route::get('master/datalokasi/{id}', ['as' => 'master/datalokasiid', 'uses' => 'MasterController@datalokasi']);
Route::get('master/data-inventaris/detail/{id}', ['as' => 'master/data-inventaris/detail', 'uses' => 'MasterController@detaildatainventaris']);
Route::post('masteradmin/post-data-inventaris/', ['as' => 'masteradmin/post-data-inventaris/', 'uses' => 'MasterController@postdetaildatainventaris']);
// Master Admin Get Data Peminjaman
Route::get('master/datapeminjaman/{id}', ['as' => 'master/datapeminjaman', 'uses' => 'MasterController@datapeminjaman']);
// Master Admin Get Data Mutasi
Route::get('master/datamutasi/{id}', ['as' => 'master/datamutasi', 'uses' => 'MasterController@datamutasi']);
Route::get('master/datamutasi/tampilformmuitasi/{id}', ['as' => 'master/datamutasi/tampilformmuitasi', 'uses' => 'MasterController@tampilformmuitasi']);
// Master Admin Get Data Pemusnahan
Route::get('master/datapemusnahan/{id}', ['as' => 'master/datapemusnahan', 'uses' => 'MasterController@datapemusnahan']);

// Divisi Controller
Route::get('lihatdatabarang1/{id}', ['as' => 'lihatdatabarang1', 'uses' => 'DivisiController@lihatdatabarang1']);
Route::get('divisi/printall/ruangan/{id}/{page}', ['as' => 'divisi/printall/ruangan/', 'uses' => 'PdfController@printdataalllokasi']);
Route::get('menu/formpinjam', 'DivisiController@menu');
Route::get('menu/formdepresiasi', 'DivisiController@depresiasisemuaaset');
Route::get('menu/formmutasi', 'DivisiController@mutasidatainventaris');
Route::get('menu/formpemusnahan', 'DivisiController@menupemusnahan');
Route::get('menu/verifdatainventaris', 'DivisiController@verifdatainventaris');
Route::post('menu/verifdatainventaris/stockopname-ruangan', 'DivisiController@verifdatastokopnameruangan');
//PEMINJAMAN
Route::post('divisi/peminjaman/tambah', 'DivisiController@posttambah');
Route::post('divisi/requestpeminjaman/tambah', 'DivisiController@postrequestpeminjaman');
Route::post('divisi/peminjaman/editdata', 'DivisiController@editdatapeminjamanpost');
Route::get('divisi/tambahdatapeminjaman', ['as' => 'master/tambahdatapeminjaman', 'uses' => 'DivisiController@tambahdatapeminjaman']);
Route::get('divisi/requestdatapeminjaman', ['as' => 'master/requestdatapeminjaman', 'uses' => 'DivisiController@requestdatapeminjaman']);
Route::get('divisi/peminjaman/lengkapi/{id}', ['as' => 'master/peminjaman/lengkapi', 'uses' => 'DivisiController@lengkapipeminjaman']);
Route::get('divisi/peminjaman/verifikasidata/{id}', ['as' => 'master/peminjaman/verifikasidata', 'uses' => 'DivisiController@lengkapiverifikasidatapeminjaman']);
Route::post('divisi/peminjaman/postverifikasidata/', ['as' => 'master/peminjaman/postverifikasidata', 'uses' => 'DivisiController@lengkapipostverifikasidatadatapeminjaman']);
Route::get('divisi/peminjaman/inputdatabarang/{id}', ['as' => 'divisi/peminjaman/inputdatabarang', 'uses' => 'DivisiController@inputdatabarangpinjam']);
Route::get('divisi/peminjaman/caridatabarang/{id}', ['as' => 'divisi/peminjaman/caridatabarang', 'uses' => 'DivisiController@caridatabarang']);
Route::get('divisi/peminjaman/pengembaliandatabarang/{id}', ['as' => 'divisi/peminjaman/pengembaliandatabarang', 'uses' => 'DivisiController@pengembaliandatabarang']);
Route::get('divisi/peminjaman/caribarang/{id}/{datax}', ['as' => 'divisi/peminjaman/caribarang', 'uses' => 'DivisiController@tablecaripeminjaman']);
Route::get('divisi/peminjaman/inserttable/{id}/{ids}/{datax}', ['as' => 'divisi/peminjaman/inserttable', 'uses' => 'DivisiController@inserttablepeminjaman']);
Route::get('divisi/peminjaman/tablepeminjaman/{id}/{ids}', ['as' => 'divisi/peminjaman/tablepeminjaman', 'uses' => 'DivisiController@tablepeminjaman']);
Route::get('divisi/peminjaman/refreshtablepeminjaman/{id}', ['as' => 'divisi/peminjaman/refreshtablepeminjaman', 'uses' => 'DivisiController@refreshtablepeminjaman']);
Route::get('divisi/peminjaman/editdatatablepeminjaman/{id}', ['as' => 'divisi/peminjaman/editdatatablepeminjaman', 'uses' => 'DivisiController@editdatatablepeminjaman']);
Route::get('divisi/peminjaman/editdatapeminjaman/{id}', ['as' => 'divisi/peminjaman/editdatapeminjaman', 'uses' => 'DivisiController@editdatapeminjaman']);
Route::get('divisi/peminjaman/balikdatapeminjaman/{id}', ['as' => 'divisi/peminjaman/balikdatapeminjaman', 'uses' => 'DivisiController@balikdatapeminjaman']);
Route::get('divisi/peminjaman/hapusdetaildatapeminjaman/{id}/{ids}', ['as' => 'divisi/peminjaman/hapusdetaildatapeminjaman', 'uses' => 'DivisiController@hapusdetaildatapeminjaman']);
Route::post('divisi/peminjaman/posteditdatapeminjaman', ['as' => 'divisi/peminjaman/posteditdatapeminjaman', 'uses' => 'DivisiController@posteditdatapeminjaman']);
Route::get('divisi/peminjaman/pengembaliantablepeminjaman/{id}/{ids}', ['as' => 'divisi/peminjaman/pengembaliantablepeminjaman', 'uses' => 'DivisiController@pengembaliantablepeminjaman']);
// MAINTENANCE
Route::get('menu/formmaintenance', 'MaintenanceController@menumaintenance');
Route::get('divisi/tambahdatamaintenance', ['as' => 'divisi/tambahdatamaintenance', 'uses' => 'MaintenanceController@tambahdatamaintenance']);
Route::post('divisi/tambahdatamaintenance', 'MaintenanceController@posttambahdatamaintenance');
Route::get('divisi/maintenance/caridatabarang/{id}', 'MaintenanceController@caridatabarangmaintenance');
Route::get('divisi/maintenance/pilihdatabarang/{id}', 'MaintenanceController@pilihdatabarangmaintenance');
Route::get('divisi/maintenance/showfilemaintenance/{id}', 'MaintenanceController@showfilemaintenance');
Route::get('divisi/maintenance/tindakan/{id}', 'MaintenanceController@tindakanmaintenance');
Route::post('divisi/maintenance/tindakan', 'MaintenanceController@posttindakanmaintenance');
Route::get('divisi/maintenance/printmaintenance/{id}', 'MaintenanceController@printmaintenance');


Route::get('divisi/masterbarang/dataloginventaris', ['as' => 'divisi/masterbarang/dataloginventaris', 'uses' => 'DivisiController@masterbarangloginventaris']);
Route::get('divisi/masterbarang/dataloginventaris/cekeror', ['as' => 'divisi/masterbarang/dataloginventaris/cekeror', 'uses' => 'DivisiController@cekerorloginventaris']);
Route::get('divisi/masterbarang/dataloginventaris/cekerorklasifikasi', ['as' => 'divisi/masterbarang/dataloginventaris/cekerorklasifikasi', 'uses' => 'DivisiController@cekerorklasifikasiloginventaris']);
Route::get('divisi/masterbarang/dataloginventaris/editdata/{id}', ['as' => 'divisi/masterbarang/dataloginventaris/editdata', 'uses' => 'DivisiController@masterbarangeditloginventaris']);
Route::get('divisi/masterbarang/dataloginventaris/editdataklasifikasi/{id}', ['as' => 'divisi/masterbarang/dataloginventaris/editdataklasifikasi', 'uses' => 'DivisiController@masterbarangeditloginventarisklasifikasi']);
Route::get('divisi/masterbarang/showedit/{id}', ['as' => 'divisi/masterbarang/showedit', 'uses' => 'DivisiController@masterbarangshowedit']);
Route::post('divisi/masterbarang/postedit/{id}', ['as' => 'divisi/masterbarang/postedit', 'uses' => 'DivisiController@posteditdataloginventory']);
Route::get('divisi/masterbarang/dataloginventaris/downloaddataloginventory', ['as' => 'divisi/masterbarang/dataloginventaris/downloaddataloginventory', 'uses' => 'DivisiController@downloaddataloginventory']);
Route::get('divisi/masterbarang/dataloginventaris/resetdataloginventory', ['as' => 'divisi/masterbarang/dataloginventaris/resetdataloginventory', 'uses' => 'DivisiController@resetdataloginventory']);
Route::get('divisi/masterbarang/dataloginventaris/fixtanggaldataloginventory', ['as' => 'divisi/masterbarang/dataloginventaris/fixtanggaldataloginventory', 'uses' => 'DivisiController@fixtanggaldataloginventory']);

Route::get('divisi/dataaset/tabledataaset', ['as' => 'divisi/dataaset/tabledataaset', 'uses' => 'DivisiController@tabledataaset']);
Route::get('divisi/dataaset/tambah', ['as' => 'divisi/dataaset/tambah', 'uses' => 'DivisiController@tambahdataaset']);
Route::get('divisi/dataaset/pilihdata', ['as' => 'divisi/dataaset/pilihdata', 'uses' => 'DivisiController@pilihdata']);
Route::get('divisi/dataaset/datadepresiasi', ['as' => 'divisi/dataaset/datadepresiasi', 'uses' => 'DivisiController@datadepresiasi']);
Route::get('divisi/dataaset/datadepresiasi/table', ['as' => 'divisi/dataaset/datadepresiasi/table', 'uses' => 'DivisiController@datadtableepresiasi']);
Route::get('divisi/dataaset/datadepresiasi/penambahandata', ['as' => 'divisi/dataaset/datadepresiasi/penambahandata', 'uses' => 'DivisiController@penambahandatadepresiasi']);
Route::post('divisi/dataaset/datadepresiasi/postpenambahandata', ['as' => 'divisi/dataaset/datadepresiasi/postpenambahandata', 'uses' => 'DivisiController@postpenambahandatadepresiasi']);
Route::get('divisi/data-aset/detaildataaset/{id}', ['as' => 'divisi/data-aset/detaildataaset', 'uses' => 'DivisiController@datadetailasetcabang']);
Route::get('divisi/dataaset/detaildataaset/{id}', ['as' => 'divisi/dataaset/detaildataaset', 'uses' => 'DivisiController@detaildataaset']);
Route::get('divisi/dataaset/editdetaildataaset/{id}', ['as' => 'divisi/dataaset/editdetaildataaset', 'uses' => 'DivisiController@editdetaildataaset']);
Route::get('divisi/dataaset/getdataoption/{id}/{tgl}/{harga}', ['as' => 'divisi/dataaset/getdataoption/', 'uses' => 'DivisiController@getdatadepresiasiaset']);
Route::post('divisi/dataaset/posttambahdatamaintenance', 'DivisiController@tambahdatamaintance');
Route::post('divisi/dataaset/postupdatedatamaintenance', 'DivisiController@updatedatamaintance');
Route::post('divisi/dataaset/posttambahdatainvoiceaset', 'DivisiController@tambahdatainvoice');
Route::post('divisi/dataaset/posttambahdatadepresiasi', 'DivisiController@tambahdatadepresiasiaset');
Route::post('divisi/dataaset/tambahdatamaintenance/{id}', [FileUploadController::class, 'uploaddatamaintenance'])->name('uploaddatamaintenance');
Route::post('divisi/dataaset/tambahdatainvoice/{id}', [FileUploadController::class, 'uploaddatainvoice'])->name('uploaddatainvoice');
Route::get('divisi/dataaset/depresiasi/detaildatainvoice/{id}', ['as' => 'divisi/dataaset/depresiasi/detaildatainvoice', 'uses' => 'DivisiController@detaildatainvoice']);
Route::get('divisi/dataaset/depresiasi/detaildatamaintenance/{id}', ['as' => 'divisi/dataaset/depresiasi/detaildatamaintenance', 'uses' => 'DivisiController@detaildatamaintenance']);
Route::get('divisi/dataaset/depresiasi/tambahmaintenance/{id}', ['as' => 'divisi/dataaset/depresiasi/tambahmaintenance', 'uses' => 'DivisiController@formtambahdatamaintenance']);
Route::get('divisi/dataaset/depresiasi/tambahinvoiceaset/{id}', ['as' => 'divisi/dataaset/depresiasi/tambahinvoiceaset', 'uses' => 'DivisiController@formtambahdatainvoiceaset']);
Route::get('divisi/dataaset/depresiasi/pilihdatadepresiasi/{id}', ['as' => 'divisi/dataaset/depresiasi/pilihdatadepresiasi', 'uses' => 'DivisiController@pilihdatadepresiasi']);

Route::get('menu/masterbarang', 'DivisiController@masterbarang');
Route::get('menu/masterbarang/table', 'BigDataController@masterbarang')->name('master.barang');
Route::get('divisi/masterbarang/dataloginventaris/table', 'BigDataController@masterbaranglog')->name('master.barang.upload.data');
Route::get('divisi/masterbarang/dataloginventaris/erordata', 'BigDataController@erorbaranglog')->name('master.barang.eror.data');
Route::get('divisi/masterbarang/dataloginventaris/erorklasifikasi', 'BigDataController@erorklasifikasi')->name('master.barang.erorklasifikasi.data');
Route::get('menu/masterstaff', 'DivisiController@masterstaff');

Route::get('divisi/masterstaff/tambah', ['as' => 'divisi/masterstaff/tambah', 'uses' => 'DivisiController@tambahdatastaffkaryawan']);
Route::get('divisi/masterstaff/uploadexcel', ['as' => 'divisi/masterstaff/uploadexcel', 'uses' => 'DivisiController@uploaddatastaffkaryawan']);
Route::get('divisi/masterbarang/fixdata', 'DivisiController@fixdatamasterbarang');
Route::get('divisi/masterbarang/fixnourutdata', 'DivisiController@fixnourutmasterbarang');
Route::post('divisi/masterstaff/tambah', 'DivisiController@posttambahdatastaff');
Route::post('divisi/masterstaff/edit', 'DivisiController@posteditdatastaff')->name('post-edit-data-staff');
Route::post('divisi/masterstaff/save-edit-staff', 'DivisiController@save_edit_staff');
Route::post('divisi/setting/system', 'DivisiController@settingsystem');
Route::post('divisi/masterbarang/editbarang', 'DivisiController@posteditbarang');

Route::post('divisi/inventori/updatedatainventori', ['as' => 'divisi/inventori/updatedatainventori', 'uses' => 'DivisiController@updatedatainventori']);
Route::post('admin/datainventaris/uploaddatabaranginventaris', 'DivisiController@simpandetailbarang');


Route::get('divisi/datamutasi/datatable/{id}', ['as' => 'divisi/datamutasi/datatable', 'uses' => 'DivisiController@datatablemutasi']);
Route::get('divisi/datamutasi/tambahdata', ['as' => 'divisi/datamutasi/tambahdata', 'uses' => 'DivisiController@ordertiketmutasi']);
Route::get('divisi/datamutasi/caridata/{id}/{ids}', ['as' => 'divisi/datamutasi/caridata', 'uses' => 'DivisiController@caridatabarangmutasi']);
Route::get('divisi/tambahdatamutasi', ['as' => 'master/tambahdatamutasi', 'uses' => 'DivisiController@tambahdatamutasi']);
Route::get('divisi/datamutasi/detaildatamutasi/{id}', ['as' => 'divisi/datamutasi/detaildatamutasi', 'uses' => 'DivisiController@detaildatamutasi']);
Route::get('divisi/datamutasi/editdatamutasi/{id}', ['as' => 'divisi/datamutasi/editdatamutasi', 'uses' => 'DivisiController@editdetailbarangmutasi']);
Route::get('divisi/datamutasi/inserttable/{ids}/{id}/{data}', ['as' => 'divisi/datamutasi/inserttable', 'uses' => 'DivisiController@inserttablepencarian']);
Route::get('divisi/datamutasi/hapusdetaildatamutasi/{id}/{kode}', ['as' => 'divisi/datamutasi/hapusdetaildatamutasi', 'uses' => 'DivisiController@hapusdetaildatamutasi']);
Route::get('divisi/datamutasi/showdataorder', ['as' => 'divisi/datamutasi/showdataorder', 'uses' => 'DivisiController@showdataordermutasi']);
Route::get('divisi/datamutasi/showdatarekaporder', ['as' => 'divisi/datamutasi/showdatarekaporder', 'uses' => 'DivisiController@showdatarekaporder']);
Route::get('divisi/datamutasi/lengkapimutasi/{id}', ['as' => 'divisi/datamutasi/lengkapimutasi', 'uses' => 'DivisiController@lengkapidataordermutasi']);
Route::get('divisi/datamutasi/lihatdatamutasi/{id}', ['as' => 'divisi/datamutasi/lihatdatamutasi', 'uses' => 'DivisiController@lihatdataordermutasi']);
Route::post('divisi/datamutasi/post/datamutasi', ['as' => 'divisi/datamutasi/post/datamutasi', 'uses' => 'DivisiController@penyelesaianpostdatamutasi']);
Route::post('divisi/datamutasi/postpenerimamutasi', ['as' => 'divisi/datamutasi/postpenerimamutasi', 'uses' => 'DivisiController@postpenerimadatamutasi']);

// DATA LOKASI
Route::get('menu/masterlokasi', 'DivisiController@masterlokasi');
Route::get('divisi/masterlokasi/tambah', ['as' => 'divisi/masterlokasi/tambah', 'uses' => 'DivisiController@formtambahnomoruangan']);
Route::get('divisi/masterlokasi/lihatdata', ['as' => 'divisi/masterlokasi/lihatdata', 'uses' => 'DivisiController@masterlihatdatalokasi']);
Route::get('divisi/masterlokasi/lihatdatacabang', ['as' => 'divisi/masterlokasi/lihatdatacabang', 'uses' => 'DivisiController@masterlihatdatalokasicabang']);
Route::get('divisi/masterlokasi/datasetup/{id}', ['as' => 'divisi/masterlokasi/datasetup', 'uses' => 'DivisiController@datasetuplokasiruangan']);
Route::get('divisi/masterlokasi/datasetup/inputdatamaster/{no}/{id}', ['as' => 'divisi/masterlokasi/datasetup/inputdatamaster/', 'uses' => 'DivisiController@inputdatamasterlokasibarang']);
Route::get('divisi/masterlokasi/datasetup/resetdatamaster/{no}/{id}', ['as' => 'divisi/masterlokasi/datasetup/resetdatamaster/', 'uses' => 'DivisiController@resetdatamasterlokasibarang']);
Route::get('divisi/masterlokasi/datasetup/tablemasterlokasibarang/{id}', ['as' => 'divisi/masterlokasi/datasetup/tablemasterlokasibarang/', 'uses' => 'DivisiController@tabledatamasterlokasibarang']);
Route::get('divisipost/datalokasi/delete/detail/{id}', ['as' => 'divisipost/datalokasi/delete/detail/', 'uses' => 'DivisiController@deletemasterlokasicabang']);
Route::get('divisi/masterlokasi/dataedit/masterlokasibarang/{id}', ['as' => 'divisi/masterlokasi/dataedit/masterlokasibarang/', 'uses' => 'DivisiController@editmasterlokasicabang']);
Route::post('divisi/masterlokasi/posttambah', 'DivisiController@posttambahdatanomorruangan');
Route::post('divisi/masterlokasi/postedit', 'DivisiController@posteditdatanomorruangan');
Route::post('divisi/postmasterlokasi/datasetup/postdataall', ['as' => 'divisi/postmasterlokasi/datasetup/postdataall', 'uses' => 'DivisiController@postdatasetuplokasiruangan']);
// PEMUSNAHAN
Route::get('divisi/tambahdatapemusnahan', ['as' => 'master/tambahdatapemusnahan', 'uses' => 'DivisiController@tambahdatapemusnahan']);
Route::post('divisi/posttambahdatapemusnahan', ['as' => 'master/posttambahdatapemusnahan', 'uses' => 'DivisiController@posttambahdatapemusnahan']);
Route::get('divisi/pemusnahan/caridatabarang/{id}', 'DivisiController@caridatabarangpemusnahan');
Route::get('divisi/pemusnahan/pilihdatabarang/{id}', 'DivisiController@pilihdatabarangpemusnahan');

Route::post('divisi/pemusnahan/report', ['as' => 'reportpemusnahan', 'uses' => 'DivisiController@reportpemusnahan']);
// STOCK OPNAME
Route::get('divisi/tambahdataverifikasiinventaris', ['as' => 'divisi/tambahdataverifikasiinventaris', 'uses' => 'DivisiController@tambahdataverifikasiinventaris']);
Route::get('divisi/editdataverifikasiinventaris/{id}', ['as' => 'divisi/editdataverifikasiinventaris', 'uses' => 'DivisiController@editdataverifikasiinventaris']);
Route::post('divisi/verifikasi/tambah', 'DivisiController@posttambahverifikasi');
Route::post('divisi/verifikasi/edit', 'DivisiController@posteditverifikasi');
Route::post('divisi/verifikasi/statusdatainevntariss', 'DivisiController@poststatusdatainevntarissverifikasi')->name('poststatusdatainevntarissverifikasi');
Route::get('divisi/verifikasi/lengkapi/{id}', ['as' => 'master/verifikasi/lengkapi', 'uses' => 'DivisiController@verifikasilengkapi']);
Route::get('divisi/verifikasi/kondisi/{status}/{id}', ['as' => 'divisi/verifikasi/kondisi', 'uses' => 'DivisiController@verifikasikondisibarang']);
Route::get('divisi/verifikasi/lokasi/{tiket}', ['as' => 'master/verifikasi/lokasi', 'uses' => 'DivisiController@verifikasilengkapilokasi']);
Route::get('divisi/verifikasi/scanner/{tiket}', ['as' => 'divisi/verifikasi/scanner', 'uses' => 'DivisiController@verifikasidatascanner']);
Route::post('divisi/postverifikasi/scanner/', ['as' => 'divisi/postverifikasi/scanner', 'uses' => 'DivisiController@postverifikasidatascanner']);
Route::post('divisi/postverifikasi/scanner/simpandata', ['as' => 'divisi/postverifikasi/scanner/simpandata', 'uses' => 'DivisiController@postverifikasisimpandatascanner']);
Route::get('menu/verifdatainventaris/lokasi/update/{id}/{tiket}/{id_inventaris}/{ket}', ['as' => 'master/verifikasi/update', 'uses' => 'DivisiController@verifikasilengkapiupdatebaranglokasi']);
Route::get('menu/verifdatainventaris/cetak/detail/{id}', ['as' => 'menu/verifdatainventaris/cetak/detail', 'uses' => 'DivisiController@cetakreportstockopname']);
Route::get('menu/verifdatainventaris/cetak/ruangan/{id}', ['as' => 'menu/verifdatainventaris/cetak/ruangan', 'uses' => 'DivisiController@cetakreportruangstockopname']);
Route::get('menu/verifdatainventaris/cetak/ruangan/print/{id}/{code}', ['as' => 'menu/verifdatainventaris/cetak/ruangan/print', 'uses' => 'DivisiController@cetakreportruangstockopnameprint']);
Route::get('divisi/verifikasi/print/verif/{id}', 'PdfController@printverifikasi');
Route::get('divisi/verifikasi/print/peminjaman/{id}', 'PdfController@printpeminjaman');
Route::get('divisi/verifikasi/print/pemusnahan/{id}', 'PdfController@printpemusnahan');
Route::get('divisi/datamutasi/print/datamutasi/{id}', 'PdfController@printdatamutasi');
Route::get('divisi/verifikasi/peminjaman/pemyelesaian/{id}', 'PdfController@penyelesaianpeminjaman');
Route::get('divisipostpenyelesaian/data/stockopname/{id}', 'DivisiController@divisipostpenyelesaianstockopname');
Route::get('menu/verifdatainventaris/unverified/data/{id}', 'StockopnameController@unverifieddatastockopname');
Route::post('divisi/postverifikasiall/datasemua/simpandata', ['as' => 'divisi/postverifikasiall/datasemua/simpandata', 'uses' => 'DivisiController@postverifikasialldatasimpandatascanner']);
Route::post('divisi/postverifikasiall/datasemua/fixdata', ['as' => 'divisi/postverifikasiall/datasemua/fixdata', 'uses' => 'DivisiController@postverifikasialldatasimpanfixdata']);
// Admin Controller
//Mutasi
Route::post('divisi/datamutasi/posttambahdata', 'DivisiController@posttambahdatamutasi');
Route::get('/datamutasi', 'AdminController@formmutasi');
Route::get('tampilformmuitasi/{id}', ['as' => 'tampilformmuitasi', 'uses' => 'AdminController@tampilformmuitasi']);
Route::get('tambahsubdatamutasibarangx/{id}', ['as' => 'tambahsubdatamutasibarangx', 'uses' => 'AdminController@tambahsubdatamutasibarangx']);
Route::get('selectlokasi/{id}/{kd}', ['as' => 'selectlokasi', 'uses' => 'AdminController@selectlokasi']);
Route::post('inputdatamutasibaru', ['as' => 'inputdatamutasibaru', 'uses' => 'AdminController@inputdatamutasibaru']);
Route::post('kliktambahbrgmutasi/{id}', ['as' => 'kliktambahbrgmutasi', 'uses' => 'AdminController@kliktambahbrgmutasi']);
Route::get('hapussubtablemutasi/{id}/{no}', ['as' => 'hapussubtablemutasi', 'uses' => 'AdminController@hapussubtablemutasi']);
Route::get('jenis_mutasi/{id}', ['as' => 'jenis_mutasi', 'uses' => 'AdminController@jenis_mutasi']);

Route::get('printdokumenmutasi/{id}', 'PdfController@printdokumenmutasi');
Route::get('printdokumenmutasi', 'PdfController@printdokumenmutasi1');

Route::post('file-upload-dokumenmutasi/{id}', [FileUploadController::class, 'uploadDokumenMutasi'])->name('files.upload.dokumenmutasi');
//Musnah
Route::get('/datapemusnahan', 'AdminController@formmusnah');
Route::get('xxshowdatamusnah/{id}', ['as' => 'xxshowdatamusnah', 'uses' => 'AdminController@xxshowdatamusnah']);
Route::get('addpemusnahanbarang/{id}', ['as' => 'addpemusnahanbarang', 'uses' => 'AdminController@addpemusnahanbarang']);
Route::post('inputdatamusnahbaru', ['as' => 'inputdatamusnahbaru', 'uses' => 'AdminController@inputdatamusnahbaru']);
Route::get('selectlokasi1/{id}/{kd}', ['as' => 'selectlokasi1', 'uses' => 'AdminController@selectlokasi1']);
Route::post('kliktambahbrgmusnah/{id}', ['as' => 'kliktambahbrgmusnah', 'uses' => 'AdminController@kliktambahbrgmusnah']);
Route::get('hapussubtablemusnah/{id}/{no}', ['as' => 'hapussubtablemusnah', 'uses' => 'AdminController@hapussubtablemusnah']);
Route::post('data-pemusnahan-inventaris', ['as' => 'data-pemusnahan-inventaris', 'uses' => 'AdminController@datapemusnahaninventaris']);
Route::post('data-peminjaman-inventaris', ['as' => 'data-peminjaman-inventaris', 'uses' => 'AdminController@datapeminjamaninventaris']);
Route::post('data-peminjaman-inventaris/detail/{id}', ['as' => 'data-peminjaman-inventaris/detail/', 'uses' => 'AdminController@datapeminjamaninventarisdetail']);
Route::post('data-pemusnahan-inventaris/send', ['as' => 'data-pemusnahan-inventaris/send', 'uses' => 'AdminController@senddatapemusnahaninventaris']);


// Laporan
Route::get('menu/masterlaporan', 'LaporanController@laporan');
Route::get('menu/masterlaporan/all-barang-cabang', ['as' => 'menu/masterlaporan/all-barang-cabang', 'uses' => 'LaporanController@allbarangcabang']);
Route::get('menu/masterlaporan/lokasi-barang-cabang', ['as' => 'menu/masterlaporan/lokasi-barang-cabang', 'uses' => 'LaporanController@reportlokasibarangcabang']);
Route::get('menu/masterlaporan/klasifikasi-barang-cabang', ['as' => 'menu/masterlaporan/klasifikasi-barang-cabang', 'uses' => 'LaporanController@reportklasifikasibarangcabang']);
Route::get('menureport/masterlaporan/cetak-all-barang-cabang', ['as' => 'menureport/masterlaporan/cetak-all-barang-cabang', 'uses' => 'LaporanController@cetakallbarangcabang']);
Route::post('menu/postmasterlaporan/lokasi-barang-cabang-ruangan', ['as' => 'menu/postmasterlaporan/lokasi-barang-cabang-ruangan', 'uses' => 'LaporanController@cetakbarangperuanganpdf']);
Route::post('menu/postmasterlaporan/lokasi-barcode-barang-cabang-ruangan', ['as' => 'menu/postmasterlaporan/lokasi-barcode-barang-cabang-ruangan', 'uses' => 'LaporanController@cetakbarcodebarangperuanganpdf']);
Route::get('menu/masterlaporan/report-peminjaman/', ['as' => 'menu/masterlaporan/report-peminjaman/', 'uses' => 'LaporanController@reportpeminjaman']);
Route::get('menu/masterlaporan/report-stokopname/', ['as' => 'menu/masterlaporan/report-stokopname/', 'uses' => 'LaporanController@reportstokopname']);
Route::post('menu/postmasterlaporan/laporanpeminjaman', ['as' => 'menu/postmasterlaporan/laporanpeminjaman', 'uses' => 'LaporanController@postreportpeminjaman']);
Route::post('menu/postmasterlaporan/laporanstokopname', ['as' => 'menu/postmasterlaporan/laporanstokopname', 'uses' => 'LaporanController@postreportstokopname']);
Route::post('menu/postmasterlaporan/filterdataklasifikasi', ['as' => 'menu/postmasterlaporan/filterdataklasifikasi', 'uses' => 'LaporanController@filterdataklasifikasi']);
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
Route::get('faq', 'DivisiController@faq');
Route::get('divisi/case/databaru/', ['as' => 'divisi/case/databaru/', 'uses' => 'DivisiController@tambahdatacase']);
Route::get('divisi/case/datacase/detail/{id}', ['as' => 'divisi/case/datacase/detail/', 'uses' => 'DivisiController@detaildatacaseid']);
Route::get('divisi/case/datalokasi/', ['as' => 'divisi/case/datalokasi/', 'uses' => 'DivisiController@casedatalokasi']);
Route::get('divisi/case/dataklasifikasi/', ['as' => 'divisi/case/dataklasifikasi/', 'uses' => 'DivisiController@casedataklasifikasi']);
Route::get('/divisi/iklan/update/{id}', ['as' => '/divisi/iklan/update', 'uses' => 'DivisiController@updatedataiklan']);
Route::post('divisi/case/databaru/', 'DivisiController@posttambahdatacase');



Route::post('/pdf/{id}', 'PdfController@print');
Route::post('/printbarcodelokasi/{id}', 'PdfController@printbarcodelokasi');
Route::get('/printbarcodebyid/{id}', 'PdfController@printbarcodebyid');
Route::get('/printbarcodeksobyid/{id}', 'PdfController@printbarcodeksobyid');
Route::get('/printbarcodebyidinventaris/{id}', 'PdfController@printbarcodebyidinventaris');
Route::get('/printpeserta', 'PdfController@printpeserta');

Route::get('print/{id}', 'DataTableController@print');
Route::get('formbarang', 'DataTableController@formbarang');
Route::post('simpanjenisbarang', 'DataTableController@simpanjenisbarang');
Route::post('simpandetailbarang', 'DataTableController@simpandetailbarang');
Route::post('simpanlokasi', 'DataTableController@simpanlokasi');
Route::post('simpannourutbarang', 'DataTableController@simpannourutbarang');
Route::post('simpanpeserta', 'DataTableController@simpanpeserta');
Route::post('simpandatapeserta', 'DataTableController@simpandatapeserta');

Route::post('updatedatabarang/{id}', ['as' => 'updatedatabarang', 'uses' => 'HomeController@updatedatabarang']);
Route::post('updatedatabarang1/{id}', ['as' => 'updatedatabarang1', 'uses' => 'HomeController@updatedatabarang1']);

Route::post('simpandatasubbarang/{id}', ['as' => 'simpandatasubbarang', 'uses' => 'HomeController@simpandatasubbarang']);
Route::post('simpandatasubbarang1/{id}', ['as' => 'simpandatasubbarang1', 'uses' => 'HomeController@simpandatasubbarang1']);

Route::get('import', 'DataTableController@importData');
Route::post('import', 'DataTableController@import');
Auth::routes();

Route::get('/', 'HomeController@index')->name('base');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('lihatdatabarang/{id}', ['as' => 'lihatdatabarang', 'uses' => 'HomeController@lihatdatabarang']);

Route::get('editdatabarang/{id}', ['as' => 'editdatabarang', 'uses' => 'HomeController@editdatabarang']);
Route::get('editdatabarang1/{id}', ['as' => 'editdatabarang1', 'uses' => 'HomeController@editdatabarang1']);
// Route::get('hapusdatabarang/{kode}/{id}',['as'=>'hapusdatabarang','uses'=> 'HomeController@hapusdatabarang']);
Route::get('tambahdatabarang/{id}', ['as' => 'tambahdatabarang', 'uses' => 'HomeController@tambahdatabarang']);
Route::get('admin/formdataaset/', ['as' => 'admin/formdataaset', 'uses' => 'HomeController@formdataaset']);
Route::get('admin/formdatainventaris/tambadata', ['as' => 'admin/formdatainventaris/tambadata', 'uses' => 'HomeController@tambahdatainventaris']);
Route::post('admin/datainventaris/simpandata', 'HomeController@simpandatainventaris');


Route::get('mutasidatabarang/{id}', ['as' => 'mutasidatabarang', 'uses' => 'HomeController@mutasidatabarang']);
Route::get('admin/dataklasifikasi/seluruhcabang', ['as' => 'admin/dataklasifikasi/seluruhcabang', 'uses' => 'AdminController@dataklasifikasiseluruhcabang']);




Route::get('file-upload', [FileUploadController::class, 'index'])->name('files.index');
Route::post('file-upload/upload-large-files/{id}', [FileUploadController::class, 'uploadLargeFiles'])->name('files.upload.large');
Route::post('file-upload/upload-large-files', [FileUploadController::class, 'uploadLargeFiles1'])->name('files.upload.large1');
Route::post('file-upload/uploadgambarbarang', [FileUploadController::class, 'uploadgambarbarang'])->name('file-upload.uploadgambarbarang');
Route::post('file-upload/uploadgambarbarangkso', [FileUploadController::class, 'uploadgambarbarangkso'])->name('file-upload.uploadgambarbarangkso');
Route::post('file-upload/uploadgambarbarangkso/{id}', [FileUploadController::class, 'uploadgambarbarangkso1'])->name('file-upload.uploadgambarbarangkso1');
Route::post('file-upload/uploaddatamaintenance', [FileUploadController::class, 'uploaddatamaintenancebarang'])->name('file-upload.uploaddatamaintenance');
Route::post('file-upload/uploaddatakso', [FileUploadController::class, 'uploaddatakso'])->name('file-upload.uploaddatakso');
Route::post('file-upload/uploaddatamaintenance', [FileUploadController::class, 'fileuploaduploaddatamaintenance'])->name('file-upload.fileuploaduploaddatamaintenance');
Route::post('file-upload/uploadgambarinventaris', [FileUploadController::class, 'uploadgambarinventaris'])->name('file-upload.gambarinventaris');



Route::get('view/{no}/{cb}/{kd}/{id}', 'DataController@showdata');


Route::get('viewregistrasi/{id}', 'DataTableController@viewdatapasien');
Route::post('simpandataregsiter', ['as' => 'simpandataregsiter', 'uses' => 'DataController@simpandataregsiter']);
Route::get('log-eror-inventaris', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
Route::get('log-eror-aplikasi', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'indexx']);
Route::get('export-data', [\App\Http\Controllers\ExcelController::class, 'index']);
Route::get('export-data-ruangan/{id}', [\App\Http\Controllers\ExcelController::class, 'exportruangan']);
// Route::get('log-eror-aplikasi', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
// Route::get('log-eror-aplikasi',['as'=>'log-eror-aplikasi','uses'=> 'ErorController@eroraplikasi']);

Route::get('nav/user-login', ['as' => 'nav/user-login', 'uses' => 'NavController@recentuserlogin']);
Route::get('nav/user-order', ['as' => 'nav/user-order', 'uses' => 'NavController@recentuserorder']);
Route::get('nav/user-order/detail/{id}', ['as' => 'nav/user-order/detail', 'uses' => 'NavController@detailrecentuserorder']);
Route::get('nav/user-order/pindah-cabang/{id}', ['as' => 'nav/user-order/pindah-cabang', 'uses' => 'NavController@detailpindahcabangrecentuserorder']);
Route::post('nav/user-order/post-pindah-cabang', ['as' => 'nav/user-order/post-pindah-cabang', 'uses' => 'NavController@postpindahcabangrecentuserorder']);
Route::post('nav/user-order/post-terima-order', ['as' => 'nav/user-order/post-terima-order', 'uses' => 'NavController@postterimaordercabangrecentuserorder']);

Route::prefix('kso')->group(function () {
    Route::get('data-barang', 'KsoController@view');
    Route::get('tambah-data-barang', 'KsoController@tambahbarang');
    Route::post('simpan-data-barang', 'KsoController@simpanbarang');
    Route::post('detail-data-barang', 'KsoController@detailbarangkso')->name('detailbarangkso');
    Route::post('upload-dokument-barang-kso', 'KsoController@uploaddokumentbarangkso')->name('uploaddokumentbarangkso');
    Route::post('simpan-detail-data-barang', 'KsoController@simpandetailbarangkso')->name('simpandetailbarangkso');
    Route::post('simpan-dokument-barang-kso', 'KsoController@simpandokumentbarangkso')->name('simpandokumentbarangkso');
    Route::post('show-dokument-barang-kso', 'KsoController@showdokumentbarangkso')->name('showdokumentbarangkso');
});
Route::prefix('log_sdm')->group(function () {
    Route::get('setup', 'LogPuController@log_sdm');
    Route::post('setup/daftar_log', 'LogPuController@daftar_log')->name('daftar_log');
    Route::post('setup/daftar_peminjaman_user', 'LogPuController@daftar_peminjaman_user')->name('daftar_peminjaman_user');
    Route::post('setup/form_log', 'LogPuController@form_log')->name('form_log');
    Route::post('setup/form_peminjaman_barang', 'LogPuController@form_peminjaman_barang')->name('form_peminjaman_barang');
    Route::post('setup/simpan_peminjaman_barang_user', 'LogPuController@simpan_peminjaman_barang_user')->name('simpan_peminjaman_barang_user');
    Route::post('setup/simpan', 'LogPuController@simpan_form_log')->name('simpan_form_log');
    Route::get('setup/telegram', 'LogPuController@telegram')->name('telegram');
    Route::post('setup/show-laporan-user', 'LogPuController@show_laporan_user')->name('show_laporan_user');
});

Route::prefix('telegram')->group(function () {
    Route::get('notification', 'TelegramController@notificationtelegram')->name('notificationtelegram');

});

Route::prefix('dashboard')->group(function () {
    Route::post('setup-profil', [DashboardController::class, 'dashboard_setup_profile'])->name('dashboard_setup_profile');
    Route::post('setup-notification', [DashboardController::class, 'dashboard_setup_notification'])->name('dashboard_setup_notification');

});

Route::prefix('{akses}/app')->group(function () {
    Route::get('dashboard', [AppController::class, 'dashboard'])->name('dashboard');
    Route::get('aplikasi', [AppController::class, 'aplikasi_app'])->name('aplikasi_app');
    Route::get('peminjaman', [AppController::class, 'peminjaman'])->name('peminjaman');
    Route::get('menu-mutasi', [AppController::class, 'menu_mutasi'])->name('menu_mutasi');
    Route::get('menu-pemusnahan', [AppController::class, 'menu_pemusnahan'])->name('menu_pemusnahan');
    Route::get('menu-stock-opname', [AppController::class, 'menu_stock_opname'])->name('menu_stock_opname');
    Route::get('menu-maintenance', [AppController::class, 'menu_maintenance'])->name('menu_maintenance');
    Route::get('menu-cabang', [AppController::class, 'menu_cabang'])->name('menu_cabang');
    Route::get('laporan', [AppController::class, 'menu_laporan'])->name('menu_laporan');
    Route::get('master-barang', [AppController::class, 'master_barang'])->name('master_barang');
    Route::get('master-no-document', [AppController::class, 'master_no_document'])->name('master_no_document');
    Route::get('master-no-whatsapp', [AppController::class, 'master_no_whatsapp'])->name('master_no_whatsapp');
    Route::get('master-location', [AppController::class, 'master_location'])->name('master_location');
    Route::get('master-staff', [AppController::class, 'master_staff'])->name('master_staff');
    Route::get('master-user-cabang', [AppController::class, 'master_user_cabang'])->name('master_user_cabang');
});
Route::prefix('app')->group(function () {
    Route::get('dashboard_home', [AppController::class, 'dashboard_home'])->name('dashboard_home');
    Route::post('dashboard/add', [AppController::class, 'dashboard_add'])->name('dashboard_add');
    Route::post('dashboard/add-aset', [AppController::class, 'dashboard_add_aset'])->name('dashboard_add_aset');
    Route::post('dashboard/add-kso', [AppController::class, 'dashboard_add_kso'])->name('dashboard_add_kso');
    Route::post('dashboard/add-kso-save', [AppController::class, 'dashboard_add_kso_save'])->name('dashboard_add_kso_save');
    Route::post('dashboard/add-data-non-aset', [AppController::class, 'dashboard_add_data_non_aset'])->name('dashboard_add_data_non_aset');
    Route::post('dashboard/data-non-aset', [AppController::class, 'dashboard_data_non_aset'])->name('dashboard_data_non_aset');
    Route::post('dashboard/export-data-non-aset', [AppController::class, 'dashboard_export_data_non_aset'])->name('dashboard_export_data_non_aset');
    Route::post('dashboard/export-data-non-aset/data', [AppController::class, 'dashboard_export_data_non_aset_data'])->name('dashboard_export_data_non_aset_data');
    Route::get('dashboard/export-data-non-aset/excel', [AppController::class, 'dashboard_export_data_non_aset_excel'])->name('dashboard_export_data_non_aset_excel');
    Route::post('dashboard/export-data-non-aset/pdf', [AppController::class, 'dashboard_export_data_non_aset_pdf'])->name('dashboard_export_data_non_aset_pdf');
    Route::post('dashboard/data-aset', [AppController::class, 'dashboard_data_aset'])->name('dashboard_data_aset');
    Route::post('dashboard/export-data-aset', [AppController::class, 'dashboard_export_data_aset'])->name('dashboard_export_data_aset');
    Route::post('dashboard/export-data-aset/data', [AppController::class, 'dashboard_export_data_aset_data'])->name('dashboard_export_data_aset_data');
    Route::get('dashboard/export-data-aset/excel', [AppController::class, 'dashboard_export_data_aset_excel'])->name('dashboard_export_data_aset_excel');
    Route::post('dashboard/export-data-aset/pdf', [AppController::class, 'dashboard_export_data_aset_pdf'])->name('dashboard_export_data_aset_pdf');
    Route::post('dashboard/data-depresiasi-aset', [AppController::class, 'dashboard_data_depresiasi_aset'])->name('dashboard_data_depresiasi_aset');
    Route::post('dashboard/data-kso', [AppController::class, 'dashboard_data_kso'])->name('dashboard_data_kso');
    Route::post('dashboard/data-kso/document', [AppController::class, 'dashboard_data_kso_document'])->name('dashboard_data_kso_document');
    Route::post('dashboard/data-lokasi/detail', [AppController::class, 'dashboard_data_lokasi_detail'])->name('dashboard_data_lokasi_detail');
    Route::get('dashboard/data-lokasi/detail-barcode/{id}', [AppController::class, 'dashboard_data_lokasi_detail_barcode'])->name('dashboard_data_lokasi_detail_barcode');
    Route::post('dashboard/data-lokasi/update', [AppController::class, 'dashboard_update_data_inventaris'])->name('dashboard_update_data_inventaris');

    Route::post('dashboard/klasifikasi/data', [AppController::class, 'dashboard_data_barang_klasifikasi'])->name('dashboard_data_barang_klasifikasi');
    Route::post('dashboard/view-lokasi-data-barang', [AppController::class, 'dashboard_lokasi_data_barang'])->name('dashboard_lokasi_data_barang');
    Route::post('dashboard/data-lokasi-print-barcode', [AppController::class, 'masteradmin_cabang_data_lokasi_print_barcode'])->name('masteradmin_cabang_data_lokasi_print_barcode');

    // APLIKASI
    Route::post('aplikasi/peminjaman-barang', [AppController::class, 'aplikasi_app_peminjaman_barang'])->name('aplikasi_app_peminjaman_barang');
    Route::post('aplikasi/peminjaman-barang/save', [AppController::class, 'aplikasi_app_peminjaman_barang_save'])->name('aplikasi_app_peminjaman_barang_save');
    Route::post('aplikasi/maintenance-log', [AppController::class, 'aplikasi_app_maintenance_log'])->name('aplikasi_app_maintenance_log');

    // PEMINJAMAN
    Route::post('peminjaman/add', [AppController::class, 'peminjaman_add'])->name('peminjaman_add');
    Route::post('peminjaman/data-order', [AppController::class, 'peminjaman_data_order'])->name('peminjaman_data_order');
    Route::post('peminjaman/data-rekap', [AppController::class, 'peminjaman_data_rekap'])->name('peminjaman_data_rekap');
    Route::post('peminjaman/terima-data-order-peminjaman', [AppController::class, 'peminjaman_terima_data_order'])->name('peminjaman_terima_data_order');
    Route::post('peminjaman/terima-data-order-peminjaman-cabang', [AppController::class, 'peminjaman_terima_data_order_cabang'])->name('peminjaman_terima_data_order_cabang');
    Route::post('peminjaman/terima-data-barang-peminjaman', [AppController::class, 'peminjaman_terima_data_barang'])->name('peminjaman_terima_data_barang');
    Route::post('peminjaman/verifikasi-data-barang-peminjaman', [AppController::class, 'verifikasi_peminjaman_terima_data_barang'])->name('verifikasi_peminjaman_terima_data_barang');
    Route::post('peminjaman/save', [AppController::class, 'peminjaman_save'])->name('peminjaman_save');
    Route::post('peminjaman/proses', [AppController::class, 'peminjaman_proses'])->name('peminjaman_proses');
    Route::post('peminjaman/find-data', [AppController::class, 'peminjaman_find_data'])->name('peminjaman_find_data');
    Route::post('peminjaman/chose-data', [AppController::class, 'peminjaman_pilih_data'])->name('peminjaman_pilih_data');
    Route::post('peminjaman/batal-chose-data', [AppController::class, 'peminjaman_batal_pilih_data'])->name('peminjaman_batal_pilih_data');
    Route::post('peminjaman/data-verifikasi', [AppController::class, 'peminjaman_data_verifikasi'])->name('peminjaman_data_verifikasi');
    Route::post('peminjaman/data-verifikasi-user', [AppController::class, 'peminjaman_data_verifikasi_user'])->name('peminjaman_data_verifikasi_user');
    Route::post('peminjaman/proses-verifikasi', [AppController::class, 'peminjaman_proses_verifikasi'])->name('peminjaman_proses_verifikasi');
    Route::post('peminjaman/proses-verifikasi-fix', [AppController::class, 'proses_verifikasi_data_peminjaman'])->name('proses_verifikasi_data_peminjaman');
    Route::post('peminjaman/check-barang-peminjaman', [AppController::class, 'proses_check_data_barang_peminjaman'])->name('proses_check_data_barang_peminjaman');
    Route::post('peminjaman/save-check-barang-peminjaman', [AppController::class, 'proses_save_check_data_barang_peminjaman'])->name('proses_save_check_data_barang_peminjaman');
    Route::post('peminjaman/verifikasi-data-peminjaman', [AppController::class, 'verifikasi_data_peminjaman'])->name('verifikasi_data_peminjaman');
    Route::post('peminjaman/print-report-data-peminjaman', [AppController::class, 'print_report_data_peminjaman'])->name('print_report_data_peminjaman');
    Route::post('peminjaman/print-report-data-peminjaman-show', [AppController::class, 'print_report_data_peminjaman_show'])->name('print_report_data_peminjaman_show');
    Route::post('peminjaman/request-peminjaman-cabang', [AppController::class, 'peminjaman_request_peminjaman_cabang'])->name('peminjaman_request_peminjaman_cabang');
    Route::post('peminjaman/request-peminjaman-cabang-find-data', [AppController::class, 'peminjaman_request_find_data_cabang_peminjaman'])->name('peminjaman_request_find_data_cabang_peminjaman');
    Route::post('peminjaman/request-peminjaman-cabang-pilih-data', [AppController::class, 'peminjaman_request_pilih_data_cabang_peminjaman'])->name('peminjaman_request_pilih_data_cabang_peminjaman');
    Route::post('peminjaman/request-peminjaman-cabang-remove-barang', [AppController::class, 'peminjaman_request_remove_barang_cabang_peminjaman'])->name('peminjaman_request_remove_barang_cabang_peminjaman');
    Route::post('peminjaman/request-peminjaman-cabang-save', [AppController::class, 'peminjaman_request_save_cabang_peminjaman'])->name('peminjaman_request_save_cabang_peminjaman');
    Route::post('peminjaman/request-peminjaman/pick', [AppController::class, 'peminjaman_request_take_request_peminjaman'])->name('peminjaman_request_take_request_peminjaman');
    Route::post('peminjaman/request-peminjaman/reject', [AppController::class, 'peminjaman_request_reject_request_peminjaman'])->name('peminjaman_request_reject_request_peminjaman');
    Route::post('peminjaman/request-peminjaman/accept', [AppController::class, 'peminjaman_request_accept_request_peminjaman'])->name('peminjaman_request_accept_request_peminjaman');

    // PEMUSNAHAN
    Route::post('menu-pemusnahan/add', [AppController::class, 'menu_pemusnahan_add'])->name('menu_pemusnahan_add');
    Route::post('menu-pemusnahan/check-barang-musnah', [AppController::class, 'menu_pemusnahan_check_data_pemusnahan'])->name('menu_pemusnahan_check_data_pemusnahan');
    Route::post('menu-pemusnahan/find-data-barang', [AppController::class, 'menu_pemusnahan_find_data_barang'])->name('menu_pemusnahan_find_data_barang');
    Route::post('menu-pemusnahan/pilih-data-barang', [AppController::class, 'menu_pemusnahan_pilih_data_barang'])->name('menu_pemusnahan_pilih_data_barang');
    Route::post('menu-pemusnahan/pilih-data-barang/save', [AppController::class, 'menu_pemusnahan_pilih_data_barang_save'])->name('menu_pemusnahan_pilih_data_barang_save');
    Route::post('menu-pemusnahan/pilih-data-barang/verifikasi', [AppController::class, 'menu_pemusnahan_pilih_data_barang_verifikasi'])->name('menu_pemusnahan_pilih_data_barang_verifikasi');
    Route::post('menu-pemusnahan/pilih-data-barang/verifikasi_code', [AppController::class, 'menu_pemusnahan_pilih_data_barang_verifikasi_code'])->name('menu_pemusnahan_pilih_data_barang_verifikasi_code');
    Route::post('menu-pemusnahan/pilih-data-barang/print', [AppController::class, 'menu_pemusnahan_pilih_data_barang_print'])->name('menu_pemusnahan_pilih_data_barang_print');
    Route::post('menu-pemusnahan/pilih-data-barang/print-report', [AppController::class, 'menu_pemusnahan_pilih_data_barang_print_report'])->name('menu_pemusnahan_pilih_data_barang_print_report');
    Route::post('menu-pemusnahan/pilih-data-barang/sinkronisasi', [AppController::class, 'menu_pemusnahan_pilih_data_barang_sinkronisasi'])->name('menu_pemusnahan_pilih_data_barang_sinkronisasi');
    Route::post('menu-pemusnahan/pilih-data-barang/pengembalian', [AppController::class, 'menu_pemusnahan_pilih_data_barang_pengembalian'])->name('menu_pemusnahan_pilih_data_barang_pengembalian');
    Route::post('menu-pemusnahan/pilih-data-barang/pengembalian-save', [AppController::class, 'menu_pemusnahan_pilih_data_barang_pengembalian_save'])->name('menu_pemusnahan_pilih_data_barang_pengembalian_save');
    Route::post('menu-pemusnahan/pilih-data-barang/verfikasi_pembatalan', [AppController::class, 'menu_pemusnahan_pilih_data_barang_verifikasi_pembatalan'])->name('menu_pemusnahan_pilih_data_barang_verifikasi_pembatalan');
    Route::post('menu-pemusnahan/pilih-data-barang/verfikasi_pembatalan_code', [AppController::class, 'menu_pemusnahan_pilih_data_barang_verifikasi_pembatalan_code'])->name('menu_pemusnahan_pilih_data_barang_verifikasi_pembatalan_code');

    // MENU MUTASI
    Route::post('menu-mutasi/add', [AppController::class, 'menu_mutasi_add'])->name('menu_mutasi_add');
    Route::post('menu-mutasi/save', [AppController::class, 'menu_mutasi_save'])->name('menu_mutasi_save');
    Route::post('menu-mutasi/rekap-data-order-mutasi', [AppController::class, 'menu_mutasi_rekap_data_order_mutasi'])->name('menu_mutasi_rekap_data_order_mutasi');
    Route::post('menu-mutasi/show-data-order-mutasi', [AppController::class, 'menu_mutasi_show_data_order_mutasi'])->name('menu_mutasi_show_data_order_mutasi');
    Route::post('menu-mutasi/terima-data-order-mutasi', [AppController::class, 'menu_mutasi_terima_data_order_mutasi'])->name('menu_mutasi_terima_data_order_mutasi');
    Route::post('menu-mutasi/pilih-lokasi-data-order-mutasi', [AppController::class, 'menu_mutasi_pilih_lokasi_data_order_mutasi'])->name('menu_mutasi_pilih_lokasi_data_order_mutasi');
    Route::post('menu-mutasi/proses-lokasi-data-order-mutasi', [AppController::class, 'menu_mutasi_proses_lokasi_data_order_mutasi'])->name('menu_mutasi_proses_lokasi_data_order_mutasi');
    Route::post('menu-mutasi/proses-terima-lokasi-data-order-mutasi', [AppController::class, 'menu_mutasi_proses_terima_lokasi_data_order_mutasi'])->name('menu_mutasi_proses_terima_lokasi_data_order_mutasi');
    Route::post('menu-mutasi/add-barang', [AppController::class, 'menu_mutasi_add_barang'])->name('menu_mutasi_add_barang');
    Route::post('menu-mutasi/remove-mutasi', [AppController::class, 'menu_mutasi_remove_mutasi'])->name('menu_mutasi_remove_mutasi');
    Route::post('menu-mutasi/proses-remove-mutasi', [AppController::class, 'menu_mutasi_proses_remove_mutasi'])->name('menu_mutasi_proses_remove_mutasi');
    Route::post('menu-mutasi/find-data', [AppController::class, 'menu_mutasi_find_data'])->name('menu_mutasi_find_data');
    Route::post('menu-mutasi/chose-data', [AppController::class, 'menu_mutasi_pilih_data'])->name('menu_mutasi_pilih_data');
    Route::post('menu-mutasi/verifikasi-data-mutasi', [AppController::class, 'menu_mutasi_verifikasi_data_mutasi'])->name('menu_mutasi_verifikasi_data_mutasi');
    Route::post('menu-mutasi/verifikasi-code-data-mutasi', [AppController::class, 'menu_mutasi_verifikasi_code_data_mutasi'])->name('menu_mutasi_verifikasi_code_data_mutasi');
    Route::post('menu-mutasi/proses-verifikasi-data-mutasi', [AppController::class, 'menu_mutasi_proses_verifikasi_data_mutasi'])->name('menu_mutasi_proses_verifikasi_data_mutasi');
    Route::post('menu-mutasi/print-data-mutasi', [AppController::class, 'menu_mutasi_print_data_mutasi'])->name('menu_mutasi_print_data_mutasi');
    Route::post('menu-mutasi/proses-print-data-mutasi', [AppController::class, 'menu_mutasi_proses_print_data_mutasi'])->name('menu_mutasi_proses_print_data_mutasi');

    // MENU STOCKOPNAME
    Route::post('menu-stock-opname/add', [AppController::class, 'menu_stock_opname_add'])->name('menu_stock_opname_add');
    Route::post('menu-stock-opname/save', [AppController::class, 'menu_stock_opname_save'])->name('menu_stock_opname_save');
    Route::post('menu-stock-opname/kondisi-data', [AppController::class, 'menu_stock_opname_kondisi_data'])->name('menu_stock_opname_kondisi_data');
    Route::post('menu-stock-opname/proses-data', [AppController::class, 'menu_stock_opname_proses_data'])->name('menu_stock_opname_proses_data');
    Route::post('menu-stock-opname/proses-data-with-kamera', [AppController::class, 'menu_stock_opname_proses_data_with_kamera'])->name('menu_stock_opname_proses_data_with_kamera');
    Route::post('menu-stock-opname/scan-data-with-kamera', [AppController::class, 'menu_stock_opname_scan_data_with_kamera'])->name('menu_stock_opname_scan_data_with_kamera');
    Route::post('menu-stock-opname/proses-data-with-scanner', [AppController::class, 'menu_stock_opname_proses_data_with_scanner'])->name('menu_stock_opname_proses_data_with_scanner');
    Route::post('menu-stock-opname/scan-data-with-scanner', [AppController::class, 'menu_stock_opname_scan_data_with_scanner'])->name('menu_stock_opname_scan_data_with_scanner');
    Route::post('menu-stock-opname/scan-data-with-scanner/save', [AppController::class, 'menu_stock_opname_scan_data_with_scanner_save'])->name('menu_stock_opname_scan_data_with_scanner_save');
    Route::post('menu-stock-opname/remove-full-data-stock-opname', [AppController::class, 'menu_stock_opname_remove_full_data'])->name('menu_stock_opname_remove_full_data');
    Route::post('menu-stock-opname/proses-remove-full-data-stock-opname', [AppController::class, 'menu_stock_opname_proses_remove_full_data'])->name('menu_stock_opname_proses_remove_full_data');
    Route::post('menu-stock-opname/edit-data-tanggal-stock', [AppController::class, 'menu_stock_opname_edit_data_tanggal'])->name('menu_stock_opname_edit_data_tanggal');
    Route::post('menu-stock-opname/penyelesaian-data-tanggal-stock', [AppController::class, 'menu_stock_opname_penyelesaian_data'])->name('menu_stock_opname_penyelesaian_data');
    Route::post('menu-stock-opname/form-laporan-data-stockopname', [AppController::class, 'menu_stock_opname_laporan_data'])->name('menu_stock_opname_laporan_data');
    Route::post('menu-stock-opname/print-data-tanggal-stock', [AppController::class, 'menu_stock_opname_print_data'])->name('menu_stock_opname_print_data');
    Route::post('menu-stock-opname/print-data-berita-acara-stock', [AppController::class, 'menu_stock_opname_print_berita_acara'])->name('menu_stock_opname_print_berita_acara');

    // MENU MAINTENANCE
    Route::post('menu-maintenance/add', [AppController::class, 'menu_maintenance_add'])->name('menu_maintenance_add');
    Route::post('menu-maintenance/save', [AppController::class, 'menu_maintenance_save'])->name('menu_maintenance_save');
    Route::post('menu-maintenance/find-data', [AppController::class, 'menu_maintenance_find_data'])->name('menu_maintenance_find_data');
    Route::post('menu-maintenance/pilih-data-barang', [AppController::class, 'menu_maintenance_pilih_data_barang'])->name('menu_maintenance_pilih_data_barang');
    Route::post('menu-maintenance/verifikasi-data-maintenance', [AppController::class, 'menu_maintenance_verifikasi_data_maintenance'])->name('menu_maintenance_verifikasi_data_maintenance');
    Route::post('menu-maintenance/verifikasi-data-maintenance-applay', [AppController::class, 'menu_maintenance_verifikasi_data_maintenance_applay'])->name('menu_maintenance_verifikasi_data_maintenance_applay');
    Route::post('menu-maintenance/proses-data-maintenance', [AppController::class, 'menu_maintenance_proses_data_maintenance'])->name('menu_maintenance_proses_data_maintenance');
    Route::post('menu-maintenance/proses-data-maintenance/save', [AppController::class, 'menu_maintenance_proses_data_maintenance_save'])->name('menu_maintenance_proses_data_maintenance_save');
    Route::post('menu-maintenance/print-laporan', [AppController::class, 'menu_maintenance_print_laporan'])->name('menu_maintenance_print_laporan');
    Route::post('menu-maintenance/print-laporan-cetak', [AppController::class, 'menu_maintenance_print_laporan_cetak'])->name('menu_maintenance_print_laporan_cetak');

    // MENU BARANG
    Route::post('menu-cabang/find-cabang', [AppController::class, 'menu_cabang_find_cabang'])->name('menu_cabang_find_cabang');
    Route::post('menu-cabang/data-barang', [AppController::class, 'menu_cabang_data_barang'])->name('menu_cabang_data_barang');
    Route::post('menu-cabang/data-peminjaman', [AppController::class, 'menu_cabang_data_peminjaman'])->name('menu_cabang_data_peminjaman');
    Route::post('menu-cabang/data-peminjaman/print', [AppController::class, 'menu_cabang_data_peminjaman_print'])->name('menu_cabang_data_peminjaman_print');
    Route::post('menu-cabang/data-mutasi', [AppController::class, 'menu_cabang_data_mutasi'])->name('menu_cabang_data_mutasi');
    Route::post('menu-cabang/data-mutasi/print', [AppController::class, 'menu_cabang_data_mutasi_print'])->name('menu_cabang_data_mutasi_print');
    Route::post('menu-cabang/data-stockopname', [AppController::class, 'menu_cabang_data_stockopname'])->name('menu_cabang_data_stockopname');
    Route::post('menu-cabang/data-stockopname/print', [AppController::class, 'menu_cabang_data_stockopname_print'])->name('menu_cabang_data_stockopname_print');

    // MENU BARANG
    Route::post('laporan/cetak-rekap-ruangan', [AppController::class, 'laporan_cetak_rekap_ruangan'])->name('laporan_cetak_rekap_ruangan');

    // MASTER BARANG
    Route::get('master-barang-data', [AppController::class, 'master_barang_data'])->name('master_barang_data');
    Route::post('master-barang-data/edit', [AppController::class, 'master_barang_data_edit'])->name('master_barang_data_edit');
    Route::post('master-barang-data/save', [AppController::class, 'master_barang_data_save'])->name('master_barang_data_save');
    Route::post('master-barang-data/cetak-barcode', [AppController::class, 'master_barang_data_cetak_barcode'])->name('master_barang_data_cetak_barcode');
    Route::post('master-barang-data/sinkronisasi-data-barang-cabang', [AppController::class, 'master_barang_sinkronisasi_data_cabang'])->name('master_barang_sinkronisasi_data_cabang');

    // WHATSAPP
    Route::post('master-no-whatsapp/add', [AppController::class, 'master_no_whatsapp_add'])->name('master_no_whatsapp_add');
    Route::post('master-no-whatsapp/save', [AppController::class, 'master_no_whatsapp_save'])->name('master_no_whatsapp_save');
    Route::post('master-no-whatsapp/update', [AppController::class, 'master_no_whatsapp_update'])->name('master_no_whatsapp_update');
    Route::post('master-no-whatsapp/update_save', [AppController::class, 'master_no_whatsapp_update_save'])->name('master_no_whatsapp_update_save');

    // MASTER LOKASI
    Route::post('master-location/add', [AppController::class, 'master_location_add'])->name('master_location_add');
    Route::post('master-location/save', [AppController::class, 'master_location_save'])->name('master_location_save');
    Route::post('master-location/data-lokasi', [AppController::class, 'master_location_data_lokasi'])->name('master_location_data_lokasi');
    Route::post('master-location/data-barang', [AppController::class, 'master_location_data_barang'])->name('master_location_data_barang');
    Route::post('master-location/update-nomor-ruangan', [AppController::class, 'master_location_update_no_ruangan'])->name('master_location_update_no_ruangan');
    Route::post('master-location/update-nomor-ruangan/save', [AppController::class, 'master_location_update_no_ruangan_save'])->name('master_location_update_no_ruangan_save');
    Route::post('master-location/update-location', [AppController::class, 'master_location_update_location'])->name('master_location_update_location');
    Route::post('master-location/update-location/save', [AppController::class, 'master_location_print_data_ruangan'])->name('master_location_update_location_save');
    Route::post('master-location/print-data-ruangan', [AppController::class, 'master_location_print_data_ruangan'])->name('master_location_print_data_ruangan');
    Route::post('master-location/print-data-ruangan/print', [AppController::class, 'master_location_print_data_ruangan_cetak'])->name('master_location_print_data_ruangan_cetak');

    // MASTER STAFF
    Route::post('master-staff/add', [AppController::class, 'master_staff_add'])->name('master_staff_add');
    Route::post('master-staff/save', [AppController::class, 'master_staff_save'])->name('master_staff_save');
    Route::post('master-staff/edit', [AppController::class, 'master_staff_edit'])->name('master_staff_edit');
    Route::post('master-staff/edit-save', [AppController::class, 'master_staff_edit_save'])->name('master_staff_edit_save');

     // MASTER DOCUMENT
    Route::post('master-document/update', [AppController::class, 'master_document_update'])->name('master_document_update');
    Route::post('master-document/update-save', [AppController::class, 'master_document_update_save'])->name('master_document_update_save');

    // MASTER USER CABANG
    Route::post('master-user-cabang/add', [AppController::class, 'master_user_cabang_add'])->name('master_user_cabang_add');
    Route::post('master-user-cabang/save', [AppController::class, 'master_user_cabang_save'])->name('master_user_cabang_save');
    Route::post('master-user-cabang/reset-password', [AppController::class, 'master_user_cabang_reset_password'])->name('master_user_cabang_reset_password');
    Route::post('master-user-cabang/reset-password/save', [AppController::class, 'master_user_cabang_reset_password_save'])->name('master_user_cabang_reset_password_save');
});


Route::prefix('masteradmin')->group(function () {
    Route::get('user', [MasterAdminController::class, 'masteradmin_user'])->name('masteradmin_user');
    Route::post('user/add', [MasterAdminController::class, 'masteradmin_user_add'])->name('masteradmin_user_add');
    Route::post('user/edit', [MasterAdminController::class, 'masteradmin_user_edit'])->name('masteradmin_user_edit');
    Route::post('user/save', [MasterAdminController::class, 'masteradmin_user_save'])->name('masteradmin_user_save');
    Route::get('category', [MasterAdminController::class, 'masteradmin_category'])->name('masteradmin_category');
    Route::get('klasifikasi', [MasterAdminController::class, 'masteradmin_klasifikasi'])->name('masteradmin_klasifikasi');
    Route::post('klasifikasi/clone-data', [MasterAdminController::class, 'masteradmin_klasifikasi_clone_data'])->name('masteradmin_klasifikasi_clone_data');
    Route::post('klasifikasi/add-data-v2', [MasterAdminController::class, 'masteradmin_klasifikasi_add_data_v2'])->name('masteradmin_klasifikasi_add_data_v2');
    Route::post('klasifikasi/add-data-v2/save', [MasterAdminController::class, 'masteradmin_klasifikasi_add_data_v2_save'])->name('masteradmin_klasifikasi_add_data_v2_save');
    Route::get('cabang', [MasterAdminController::class, 'masteradmin_cabang'])->name('masteradmin_cabang');
    Route::post('cabang/edit', [MasterAdminController::class, 'masteradmin_cabang_edit'])->name('masteradmin_cabang_edit');
    Route::post('cabang/data-barang', [MasterAdminController::class, 'masteradmin_cabang_data_barang'])->name('masteradmin_cabang_data_barang');
    Route::post('cabang/option-data-barang', [MasterAdminController::class, 'masteradmin_cabang_option_data_barang'])->name('masteradmin_cabang_option_data_barang');
    Route::post('cabang/update-data-barang', [MasterAdminController::class, 'masteradmin_cabang_update_data_barang'])->name('masteradmin_cabang_update_data_barang');
    Route::post('cabang/data-lokasi', [MasterAdminController::class, 'masteradmin_cabang_data_lokasi'])->name('masteradmin_cabang_data_lokasi');
    Route::post('cabang/update-data-lokasi', [MasterAdminController::class, 'masteradmin_cabang_update_data_lokasi'])->name('masteradmin_cabang_update_data_lokasi');
    Route::post('cabang/data-barang-lokasi', [MasterAdminController::class, 'masteradmin_cabang_data_barang_lokasi'])->name('masteradmin_cabang_data_barang_lokasi');
    Route::post('cabang/data-peminjaman-cabang', [MasterAdminController::class, 'masteradmin_cabang_data_peminjaman'])->name('masteradmin_cabang_data_peminjaman');
    Route::post('cabang/preview-data-peminjaman-cabang', [MasterAdminController::class, 'masteradmin_cabang_preview_data_peminjaman'])->name('masteradmin_cabang_preview_data_peminjaman');
    Route::post('cabang/data-stock-opname-cabang', [MasterAdminController::class, 'masteradmin_cabang_data_stock_opname'])->name('masteradmin_cabang_data_stock_opname');
    Route::post('cabang/preview-data-stock-opname-cabang', [MasterAdminController::class, 'masteradmin_cabang_preview_data_stock_opname'])->name('masteradmin_cabang_preview_data_stock_opname');
    Route::post('cabang/remove-data-stock-opname-cabang', [MasterAdminController::class, 'masteradmin_cabang_remove_data_stock_opname'])->name('masteradmin_cabang_remove_data_stock_opname');
    Route::post('cabang/sinkron-data-stock-opname-cabang', [MasterAdminController::class, 'masteradmin_cabang_sinkron_data_stock_opname'])->name('masteradmin_cabang_sinkron_data_stock_opname');
    Route::post('cabang/print-data-peminjaman-cabang', [MasterAdminController::class, 'masteradmin_cabang_print_data_peminjaman'])->name('masteradmin_cabang_print_data_peminjaman');
    Route::post('cabang/migrasi-data-cabang', [MasterAdminController::class, 'masteradmin_cabang_migrasi_data_cabang'])->name('masteradmin_cabang_migrasi_data_cabang');
    Route::post('cabang/clone-data-master-barang', [MasterAdminController::class, 'masteradmin_cabang_clone_data_master_barang'])->name('masteradmin_cabang_clone_data_master_barang');
    Route::post('cabang/reset-clone-data-master-barang', [MasterAdminController::class, 'masteradmin_cabang_reset_clone_data_master_barang'])->name('masteradmin_cabang_reset_clone_data_master_barang');
    Route::get('cabang/export-excel-data-master-barang/{id}', [MasterAdminController::class, 'masteradmin_cabang_export_excel_data_master_barang'])->name('masteradmin_cabang_export_excel_data_master_barang');
    Route::get('cabang/export-excel-data-aset-master-barang/{id}', [MasterAdminController::class, 'masteradmin_cabang_export_excel_data_aset_master_barang'])->name('masteradmin_cabang_export_excel_data_aset_master_barang');
    Route::get('messages', [MasterAdminController::class, 'masteradmin_messages'])->name('masteradmin_messages');
    Route::post('messages/replay', [MasterAdminController::class, 'masteradmin_messages_replay'])->name('masteradmin_messages_replay');
    Route::get('menu', [MasterAdminController::class, 'masteradmin_menu'])->name('masteradmin_menu');
    Route::post('menu-add', [MasterAdminController::class, 'masteradmin_menu_add'])->name('masteradmin_menu_add');
    Route::post('menu-save', [MasterAdminController::class, 'masteradmin_menu_save'])->name('masteradmin_menu_save');
    Route::get('access', [MasterAdminController::class, 'masteradmin_access'])->name('masteradmin_access');
    Route::get('setting', [MasterAdminController::class, 'master_setting'])->name('master_setting');
});
