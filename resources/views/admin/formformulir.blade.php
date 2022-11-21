@extends('layouts.app')
@section('content')
<style>
    .table-bordered td, .table-bordered tr, .table-bordered th {
    border-top: 1px solid #000000;
}
.table-bordered td, .table-bordered th {
    border: 1px solid #030403;
}
.table td, .table th {
    white-space: normal;
    /* border-top: 1px solid #dee2e6; */
}
</style>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-uppercase">
                Form Data
                </div>
                <div class="card-body">
                <form id="wizard-validation-form" action="#">
                    <div>
                    <h3>FR.APL.01</h3>
                    <section>
                        <h4>Bagian 1 :  Rincian Data Pemohon Sertifikasi </h4>
                        <p>Pada bagian ini,  cantumlan data pribadi, data pendidikan formal serta data pegawaian anda pada saat ini.</p>
                        <h5>A. Data Pribadi</h5>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6"> 
                                    <label for="userName2">Nama lengkap </label>
                                    <input class=" form-control" id="userName2" name="userName" type="text"/>
                                </div>
                                <div class="col-6">
                                    <label for="password2">No. KTP/NIK/Paspor</label>
                                    <input id="password2" name="password" type="text" class=" form-control" />
                                </div>
                            </div>
                       
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-6"> 
                                    <label for="confirm2">Tempat / tgl. Lahir</label>
                                    <div class="row">
                                        <div class="col-6"><input id="confirm2" name="confirm" type="text" class=" form-control" /></div>
                                        <div class="col-6"><input id="confirm2" name="confirm" type="date" class=" form-control" /></div>
                                    </div>
                                   
                                    
                                </div>
                                <div class="col-6">
                                    <label for="confirm2">Jenis Kelamin</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="icheck-material-primary">
                                                <input type="radio"  id="user-checkbox1" name="cek">
                                                <label for="user-checkbox1">Laki Laki</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="icheck-material-primary">
                                                <input type="radio" id="user-checkbox2" name="cek" >
                                                <label for="user-checkbox2">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6"> 
                                    <label for="userName2">Kebangsaan </label>
                                    <input class="form-control" id="userName2" name="userName" type="text"/>
                                </div>
                                <div class="col-6">
                                    <label for="password2">Alamat Rumah</label>
                                    <textarea name="" class="form-control" id="" cols="10" rows="3"></textarea>
                                </div>
                            </div>
                       
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4"> 
                                    <label for="userName2">Nomor Telpon </label>
                                    <input class=" form-control" id="userName2" name="userName" type="text"/>
                                </div>
                                <div class="col-4">
                                    <label for="password2">Kode Pos</label>
                                    <input id="password2" name="password" type="text" class=" form-control" />
                                </div>
                                <div class="col-4">
                                    <label for="password2">Kantor</label>
                                    <input id="password2" name="password" type="text" class=" form-control" />
                                </div>
                            </div>
                       
                        </div>
                        <hr>
                        <h5>B. Data Pegawai Sekarang</h5>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6"> 
                                    <label for="userName2">Nama Institusi / Perusahaan  </label>
                                    <input class=" form-control" id="userName2" name="userName" type="text"/>
                                </div>
                                <div class="col-6">
                                    <label for="password2">Jabatan</label>
                                    <input id="password2" name="password" type="text" class=" form-control" />
                                </div>
                            </div>
                       
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4"> 
                                    <label for="userName2">Alamat Kantor </label>
                                    <textarea name="" class="form-control" id="" cols="30" rows="3"></textarea>
                                </div>
                                <div class="col-4">
                                    <label for="password2">No Telp / Fax </label>
                                    <input id="password2" name="password" type="text" class=" form-control" />
                                </div>
                                <div class="col-4">
                                    <label for="password2"> Email</label>
                                    <input id="password2" name="password" type="text" class=" form-control" />
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="form-group">
                        <label class="col-lg-12 control-label">(*) Mandatory</label>
                        </div>
                    </section>

                    <h3>Step 2</h3>
                    <section>
                        <h4>Bagian  2 :  Data Sertifikasi</h4>
                        <p>Tuliskan Judul dan Nomor Skema Sertifikasi yang anda ajukan berikut Daftar Unit Kompetensi sesuai kemasan pada skema sertifikasi untuk mendapatkan pengakuan sesuai dengan latar belakang pendidikan, pelatihan serta pengalaman kerja yang anda miliki.</p>
                        <div class="form-group">
                            <div class="table-responsive" style="letter-spacing: .0px;">
                                <table id="default-datatable1" class="table table-bordered" >
                                <tr >
                                    <td class="text-center" rowspan="3" width="30" >Skema Sertifikasi   (KKNI/Okupasi/Klaster)</td>
                                   
                                        <tr>
                                            <td width="10">Judul</td>
                                            <td width="2">:</td>
                                            <td><input type="text" class="form-control" value="Sertifikasi Asisten Analis SDM"></td>
                                        </tr>
                                        <tr>
                                            <td width="10">Nomor</td>
                                            <td width="2">:</td>
                                            <td></td>
                                        </tr>
                                    
                                    
                                </tr>
                                <tr>
                                    <td rowspan="6" colspan="2">Tujuan Asesmen</td>
                                    <tr>
                                        <td width="2">:</td>
                                        <td>
                                            <div class="icheck-material-primary">
                                                <input type="checkbox"  id="user-checkbox4" >
                                                <label for="user-checkbox4"> Sertifikasi</label>
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="2">:</td>
                                        <td>
                                            <div class="icheck-material-primary">
                                                <input type="checkbox"  id="user-checkbox5" >
                                                <label for="user-checkbox5"> Sertifikasi Ulang</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="2">:</td>
                                        <td>
                                            <div class="icheck-material-primary">
                                                <input type="checkbox"  id="user-checkbox6" >
                                                <label for="user-checkbox6"> Pengakuan Kompetensi Terkini (PKT)</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="2">:</td>
                                        <td>
                                            <div class="icheck-material-primary">
                                                <input type="checkbox"  id="user-checkbox8" >
                                                <label for="user-checkbox8"> Rekognisi Pembelajaran Lampau</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="2">:</td>
                                        <td>
                                            <div class="icheck-material-primary">
                                                <input type="checkbox"  id="user-checkbox9" >
                                                <label for="user-checkbox9"> Lainnya</label>
                                            </div>
                                        </td>
                                    </tr>
                                  
                                </tr>
                            </table>
                            </div>
                        </div>
                        <strong><h5> Daftar Unit Kompetensi sesuai kemasan: </h5></strong>
                        <div class="form-group">
                            <table id="" class="table table-bordered">
                             
                                    <tr>
                                        <td width="10">No.</td>
                                        <td>Kode Unit</td>
                                        <td>Judul Unit</td>
                                        <td width="10">Jenis Standar (Standar Khusus/Standar Internasional/SKKNI)</td>
                                    
                                    </tr>
                             
                              
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                               
                               
                            </table>
                        </div>

                    

                        <div class="form-group">
                        <label class="col-lg-12 control-label"
                            >(*) Mandatory</label
                        >
                        </div>
                    </section>
                    <h3>Step 3</h3>
                    <section>
                        <h5>Bagian  3  :  Bukti Kelengkapan Pemohon  </h5>
                        <p>Bukti Persyaratan Dasar Pemohon</p>
                        <div class="form-group">
                            <table id="" class="table table-bordered">
                                <tr>
                                    <td width="5">No.</td>
                                    <td width="50">Bukti Persyaratan Dasar</td>
                                    <td width="10">Ada ( Memenuhi Syarat )</td>
                                    <td width="10">Ada ( Tidak Memenuhi Syarat )</td>
                                    <td width="10">Tidak Ada </td>
                                    <td width="10">File ( Jika Ada )</td>
                                
                                </tr>
                                <tr>
                                    <td>1. </td>
                                    <td width="50">Memiliki  ijazah DIII Semua Disiplin Ilmu</td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="file" class="form-control" name="" id=""></td>
                                
                                </tr>
                                <tr>
                                    <td>2. </td>
                                    <td>Pemohon dalam status masa percobaan</td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="file" class="form-control" name=""  id=""></td>
                                
                                </tr>
                            </table><br>
                            <table class="table table-bordered">
                                <tr>
                                    <td rowspan="3"><strong> Rekomendasi (diisi oleh LSP):</strong>
                                    <br>Berdasarkan ketentuan persyaratan dasar, maka pemohon: 
                                    <br><strong>Diterima/ Tidak diterima *) </strong>sebagai peserta  sertifikasi
                                    <br>* coret yang tidak sesuai
                                    </td>
                                    <td colspan="2"><strong>Pemohon/ Kandidat :</strong></td>
                                    
                                </tr>
                                <tr>
                                   
                                    <td>Nama </td>
                                    <td><input type="text" class="form-control" name="" id=""></td>
                                </tr>
                                <tr>
                                    
                                    <td>Tanda tangan/ Tanggal </td>
                                    <td><input type="date" class="form-control" name="" id=""></td>
                                </tr>

                                <tr>
                                    <td rowspan="4"><strong> Catatan :</strong>
                                    
                                    </td>
                                    <td colspan="2"><strong>Admin LSP :</strong></td>
                                    
                                </tr>
                                <tr>
                                   
                                    <td>Nama </td>
                                    <td><input type="text" class="form-control" name="" id=""></td>
                                </tr>
                                <tr>
                                    
                                    <td>No Reg </td>
                                    <td><input type="text" class="form-control" name="" id=""></td>
                                </tr>
                                <tr>
                                    
                                    <td>Tanda tangan / Tanggal </td>
                                    <td><input type="date" class="form-control" name="" id=""></td>
                                </tr>
                            </table>
                        </div>
                    </section>
                    <h3>Step 4</h3>
                    <section>
                        <h5>FR.APL.02. ASESMEN MANDIRI</h5>
                        <div class="form-group">
                            <table class="table table-bordered">
                                <tr>
                                    <td rowspan="2">Skema Sertifikasi   (KKNI/Okupasi/Klaster)</td>
                                    <td>Judul</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Nomor</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                            </table>
                            <br>
                            <table class="table table-bordered">
                                <tr>
                                    <td>PANDUAN ASESMEN MANDIRI</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Instruksi:</strong>
                                        <br>
                                        <ul>•	Baca setiap pertanyaan di kolom sebelah kiri</ul>
                                        <ul>•	Beri tanda centang () pada kotak jika Anda yakin dapat melakukan tugas yang dijelaskan.</ul>
                                        <ul>•	Isi kolom di sebelah kanan dengan mendaftar bukti yang Anda miliki untuk menunjukkan bahwa Anda melakukan tugas-tugas ini.</ul>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <table class="table table-bordered">
                                <tr>
                                    <td><strong>Unit Kompetensi: 1</strong></td>
                                    <td><strong>Q.86-PRM-07.0907.1</strong>
                                        <br><strong>Melakukan Pengelolaan Administrasi pegawai</strong>
                                    </td>
                                </tr>
                             
                            </table>
                            <table class="table table-bordered">
                                <tr>
                                    <td><strong>Dapatkah Saya ................?</strong></td>
                                    <td><strong>K</strong></td>
                                    <td><strong>BK</strong></td>
                                    <td><strong>Bukti yang relevan</strong></td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>1. Elemen :</strong> Menggunakan APD
                                        <br><strong>Kriteria Untuk Kerja</strong>
                                        <br>1.1 Memilih Jenis APD
                                        <br>1.2 Memilih Jenis APD
                                        <br>1.3 Memilih Jenis APD
                                    </td>
                                    <td><strong><input type="checkbox" name="" id=""></strong></td>
                                    <td><strong><input type="checkbox" name="" id=""></strong></td>
                                    <td><strong></strong></td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>1. Elemen :</strong> Menggunakan APD
                                        <br><strong>Kriteria Untuk Kerja</strong>
                                        <br>1.1 Memilih Jenis APD
                                        <br>1.2 Memilih Jenis APD
                                        <br>1.3 Memilih Jenis APD
                                    </td>
                                    <td><strong><input type="checkbox" name="" id=""></strong></td>
                                    <td><strong><input type="checkbox" name="" id=""></strong></td>
                                    <td><strong></strong></td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>1. Elemen :</strong> Menggunakan APD
                                        <br><strong>Kriteria Untuk Kerja</strong>
                                        <br>1.1 Memilih Jenis APD
                                        <br>1.2 Memilih Jenis APD
                                        <br>1.3 Memilih Jenis APD
                                    </td>
                                    <td><strong><input type="checkbox" name="" id=""></strong></td>
                                    <td><strong><input type="checkbox" name="" id=""></strong></td>
                                    <td><strong></strong></td>
                                </tr>
                            </table>
                        </div>
                    </section>
                    <h3>Step 5</h3>
                    <section>
                        <div class="form-group">
                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <tr>
                                    <td><strong>Unit Kompetensi: 2</strong></td>
                                    <td><strong>Q.86-PRM-08.0405.1</strong>
                                        <br><strong>Menangani Keadaan Darurat </strong>
                                    </td>
                                </tr>
                             
                            </table>
                            <table class="table table-bordered">
                                <tr>
                                    <td><strong>Dapatkah Saya ................?</strong></td>
                                    <td><strong>K</strong></td>
                                    <td><strong>BK</strong></td>
                                    <td><strong>Bukti yang relevan</strong></td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>1. Elemen :</strong> Melakukan penanganan keadaan darurat bahaya kebakaran</strong>
                                        <br>1.1 Menangani Kebakaran ringan dengan APAR
                                        <br>1.2	Melaporkan Kejadian kebakaran kepada pimpinan
                                        <br>1.3	Melakukan evakuasi terhadap bahaya kebakaran yang tidak tertangani dengan APAR
                                        <br>1.4	Menghubungi Dinas Pemadam Kebakaran
                                        <br>1.5	Melakukan  P3K sederhana bagi pegawai yang 
                                        mengalami kecelakaan/luka bakar
                                        
                                    </td>
                                    <td><strong><input type="checkbox" name="" id=""></strong></td>
                                    <td><strong><input type="checkbox" name="" id=""></strong></td>
                                    <td><strong></strong></td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>2. Elemen :</strong> Menggunakan APD
                                        <br><strong>Kriteria Untuk Kerja</strong>
                                        <br>1.1 Memilih Jenis APD
                                        <br>1.2 Memilih Jenis APD
                                        <br>1.3 Memilih Jenis APD
                                    </td>
                                    <td><strong><input type="checkbox" name="" id=""></strong></td>
                                    <td><strong><input type="checkbox" name="" id=""></strong></td>
                                    <td><strong></strong></td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>3. Elemen :</strong> Menggunakan APD
                                        <br><strong>Kriteria Untuk Kerja</strong>
                                        <br>1.1 Memilih Jenis APD
                                        <br>1.2 Memilih Jenis APD
                                        <br>1.3 Memilih Jenis APD
                                    </td>
                                    <td><strong><input type="checkbox" name="" id=""></strong></td>
                                    <td><strong><input type="checkbox" name="" id=""></strong></td>
                                    <td><strong></strong></td>
                                </tr>
                            </table>
                        </div>
                        </div>
                    </section>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><i class="fa fa-table"></i> Data Table Example</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="default-datatable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Kode Barang</th>
                                        <th>Gambar</th>
                                        <th>Qr Code</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Kode Barang</th>
                                        <th>Gambar</th>
                                        <th>Qr Code</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection