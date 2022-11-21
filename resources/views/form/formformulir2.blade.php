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
                   

                    <h3>Step 1</h3>
                    <section>
                        <h4>FR.IA.09.	PERTANYAAN WAWANCARA</h4>
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
                    <h3>Step 2</h3>
                    <section>
                       <strong>Setiap pertanyaan harus terkait dengan Elemen</strong>
                       <p>Tuliskan bukti-bukti yang terdapat pada Ceklis Verifikasi Portofolio yang memerlukan wawancara</p>
                        <div class="form-group">
                            <table id="" class="table table-bordered">
                                <tr>
                                    <td>no</td>
                                    <td><strong>Bukti - Bukti Kompetensi </strong></td>
                                    <td>File Upload</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Dokumen Kebijakan dan/atau peraturan organisasi tentang kepegawaian</td>
                                    <td><input type="file" name="" id=""></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Dokumen administrasi kepegawaian</td>
                                    <td><input type="file" name="" id=""></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Database kepegawaian</td>
                                    <td><input type="file" name="" id=""></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Dokumen aktivitas administrasi kepegawaian</td>
                                    <td><input type="file" name="" id=""></td>
                                </tr>
                            </table><br>
                            
                        </div>
                    </section>
                    <h3>Step 2</h3>
                    <section>
                       <strong>Setiap pertanyaan harus terkait dengan Elemen</strong>
                       <p>Tuliskan bukti-bukti yang terdapat pada Ceklis Verifikasi Portofolio yang memerlukan wawancara</p>
                        <div class="form-group">
                            <table id="" class="table table-bordered">
                                <tr>
                                    <td rowspan="2" colspan="2"><strong>Daftar Pertanyaan Wawancara</strong></td>
                                    <td rowspan="2"><strong>Kesimpulan Jawaban Asesi</strong></td>
                                    <td colspan="2"><strong>Rekomendasi</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>K</strong></td>
                                    <td><strong>BK</strong></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Sesuai dengan bukti : Nomer … yang Anda ajukan, ceritakan pengalaman Anda tentang </td>
                                    <td></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <td><input type="checkbox" name="" id=""></td>
                                </tr>
                              
                            </table><br>
                            
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