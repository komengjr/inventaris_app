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
                        <h4>FR.IA.08.	CEKLIS VERIFIKASI PORTOFOLIO</h4>
                        <p>Tuliskan Judul dan Nomor Skema Sertifikasi yang anda ajukan berikut Daftar Unit Kompetensi sesuai kemasan pada skema sertifikasi untuk mendapatkan pengakuan sesuai dengan latar belakang pendidikan, pelatihan serta pengalaman kerja yang anda miliki.</p>
                        <div class="form-group">
                            <div class="table-responsive" style="letter-spacing: .0px;">
                                <table id="default-datatable1" class="table table-bordered " >
                                    <tr>
                                        <td rowspan="2">Skema Sertifikasi</td>
                                        <td>Judul</td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor</td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">TUK</td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Nama Asesor</td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Nama Asesi</td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Tanggal</td>
                                        <td>:</td>
                                        <td><input type="date" class="form-control"></td>
                                    </tr>
                                </table>
                                <p>*Coret yang tidak perlu</p>
                                <table id="default-datatable1" class="table table-bordered " >
                                    <tr>
                                        <td class="bg-success">PANDUAN BAGI ASESOR</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <li>Isilah tabel ini sesuai dengan informasi sesuai pertanyaan/pernyataan dalam tabel dibawah ini.</li> 
                                            <li>Beri tanda centang () pada hasil penilaian portfolio berdasarkan aturan bukti.</li> 
                                        </td>
                                    </tr>
                                    
                                </table>
                                <br>
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
                                 
                                </table>
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-12 control-label"
                            >(*) Mandatory</label
                        >
                        </div>
                    </section>
                    <h3>Step 3</h3>
                    <section>
                       
                        <div class="form-group">
                            <table id="" class="table table-bordered">
                                <tr>
                                    <td rowspan="3">Dokumen PortoFolio :</td>
                                    <td colspan="8" class="text-center">Aturan Bukti</td> 
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-center">valid</td>
                                    <td colspan="2" class="text-center">Asli</td>
                                    <td colspan="2" class="text-center">Terkini</td>
                                    <td colspan="2" class="text-center">Memadai</td>
                                   
                                </tr>
                                <tr>
                                    <td>Ya</td>
                                    <td>Tidak</td>
                                    <td>Ya</td>
                                    <td>Tidak</td>
                                    <td>Ya</td>
                                    <td>Tidak</td>
                                    <td>Ya</td>
                                    <td>Tidak</td>
                                   
                                </tr>
                                <tr>
                                    <td>1. Dokumen Kebijakan dan/atau peraturan organisasi tentang kepegawaian sesuai prosedur kepegawaian dan kebijakan dan/atau peraturan organisasi serta mengacu pada ketentuan perundangan yang  berlaku.</td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                </tr>
                            </table><br>
                            <table class="table table-bordered">
                                <tr>
                                    <td><strong>Sebagai tindak lanjut dari hasil verifikasi bukti, substansi materi di bawah ini (no elemen yg di cek list) harus diklarifikasi selama wawancara:</strong></td>
                                </tr>
                            </table><br>
                            <table class="table table-bordered">
                                <tr>
                                    <td><strong>Cek List</strong></td>
                                    <td><strong>No. Elemen</strong></td>
                                    <td><strong>Materi / Substansi wawancara ( KUK )</strong></td>
                                </tr>
                                <tr>
                                    <td rowspan="5"></td>
                                    <td rowspan="5">1</td>
                                    <td>Cara menangani Kebakaran ringan dengan APAR</td>
                                </tr>
                                <tr>
                                    <td>Cara membuat laporan kejadian kebakaran kepada pimpinan</td>
                                </tr>
                                <tr>
                                    <td>Cara evakuasi bahaya kebakaran yang tidak tertangani dengan APAR</td>
                                </tr>
                                <tr>
                                    <td>Cara menghubungi Dinas Pemadam Kebakaran</td>
                                </tr>
                                <tr>
                                    <td>Cara melakukan P3K sederhana bagi pegawai yang mengalami kecelakaan/luka bakar</td>
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
                                    <td colspan="2"><strong>Bukti tambahan diperlukan pada unit / elemen kompetensi sebagai berikut: <br>Contoh :</strong></td>   
                                </tr>
                                <tr>
                                    <td rowspan="2"><strong>Rekomendasi Asesor</strong></td>
                                    <td>	Asesi telah memenuhi pencapaian seluruh kriteria unjuk kerja, direkomendasikan KOMPETEN</td>
                                </tr>
                                <tr>
                                    <td>
                                        	Asesi belum memenuhi pencapaian seluruh kriteria unjuk kerja, direkomendasikan uji demonstrasi pada: <br>
                                        Unit….. <br>
                                        Elemen: ….. <br>
                                        KUK: ……. <br>

                                    </td>
                                </tr>
                            </table>
                            <br>
                            <table class="table table-bordered">
                                <tr>
                                    <td><strong>Nama</strong></td>
                                    <td><strong>Asesi</strong></td>
                                    <td><strong>Asesor</strong></td>
                                </tr>
                                <tr class="text-center">
                                    <td><strong>Tanda Tangan dan Tanggaal</strong></td>
                                    <td><strong>{!! QrCode::size(90)->generate('Tanda Tangan'); !!} <p>Ahmad Djaelani</p></strong></td>
                                    <td><strong>{!! QrCode::size(90)->generate('Tanda Tangan'); !!} <p>Ahmad Djaelani</p></strong></strong></td>
                                </tr>
                            </table>
                           
                            
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