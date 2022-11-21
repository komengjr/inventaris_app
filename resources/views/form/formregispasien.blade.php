<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register Data Pasien</title>
    <!--favicon-->
    <link rel="icon" href="icon.png" type="image/x-icon">
    <!-- simplebar CSS-->
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="assets/css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <!-- Horizontal menu CSS-->
    <link href="assets/css/horizontal-menu.css" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="assets/css/app-style.css" rel="stylesheet" />
    <style>
        .form-control {
            border: 2px solid #ff8800;
            
        }
        .styled-table {
            /* position: static; */
            border-collapse: collapse;
            margin: 0px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            /* min-width: 400px; */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
        .styled-table thead tr {
            background-color: #ff8c00;
            color: #ffffff;
            text-align: left;
        }
        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }
        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }
    
        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }
    
        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }
    </style>


</head>

<body>

    <!-- start loader -->
    <div id="pageloader-overlay" class="visible incoming">
        <div class="loader-wrapper-outer">
            <div class="loader-wrapper-inner">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <!-- end loader -->

    <!-- Start wrapper-->
    <div id="wrapper">

  
        <div class="clearfix"></div>

        <div class="content-wrapper">
            <div class="container-fluid" id="showdataregisterpasien">
            <form action="" id="formregister" method="POST"> 
                @csrf
                <!-- Breadcrumb-->
                <div class="row pt-2 pb-2">
                    <div class="col-sm-9">
                        <h4 class="page-title">FORM RIWAYAT KESEHATAN</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javaScript:void();">Data</a></li>
                            <li class="breadcrumb-item"><a href="javaScript:void();">Pasien</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Registrasi</li>
                        </ol>
                    </div>
                   
                </div>
                <!-- End Breadcrumb-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                               
                                    <h4 class="form-header text-uppercase">
                                        <i class="fa fa-user-circle-o"></i>
                                        Personal Info
                                    </h4>
                                    <div class="form-group row">
                                        <label for="input-1" class="col-sm-2 col-form-label">No. Register</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="input-1" name="no_registrasi" value="REG-XXXXX-XXX-XX" disabled>
                                        </div>
                                        <label for="input-2" class="col-sm-2 col-form-label">Job Title/Dept.</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="job" name="job" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="input-2" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" required>
                                        </div>
                                        <label for="input-2" class="col-sm-2 col-form-label">Divisi</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="divisi" name="divisi" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="input-1" class="col-sm-2 col-form-label">NIK/Employee ID </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="nik" name="nik" required>
                                        </div>
                                        <label for="input-2" class="col-sm-2 col-form-label">Lokasi</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="lokasi" name="lokasi"  required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="input-2" class="col-sm-2 col-form-label">Umur </label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="umur" name="umur" required>
                                        </div>
                                        <label for="input-2" class="col-sm-2 col-form-label">Tgl Pemeriksaan</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" id="tgl" name="tgl" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="input-2" class="col-sm-2 col-form-label">Jenis Kelamin </label>
                                        <div class="col-sm-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="icheck-material-success">
                                                        <input type="radio" id="jeniskelamin" name="jk" value="Laki - Laki" />
                                                        <label for="jeniskelamin">Laki - Laki</label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="icheck-material-success">
                                                        <input type="radio" id="jeniskelamin1" name="jk" value="Perempuan"/>
                                                        <label for="jeniskelamin1"> Perempuan</label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            {{-- <input type="text" class="form-control" id="input-2" name="jk" required> --}}
                                        </div>
                                        <label for="input-2" class="col-sm-2 col-form-label">Dokter Pemeriksa</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="dokter_pemeriksaan" name="dokter_pemeriksaan" required>
                                        </div>
                                    </div>
                                   <hr>
                                 
                             
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Row-->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                  Beri tanda pada data <input type="checkbox" name="" id="" checked> yang sesuai
                                  <div class="row">
                                    <div class="col-8">
                                        <h4 class="form-header text-uppercase">
                                            <i class="fa fa-file-o"></i>
                                            A. KELUHAN SAAT INI 
                                        </h4>
                                    </div>
                                    
                                  </div>
                                    
                                    
                                    <div class="form-group row" id="autoUpdate">
                                        <table  id="default-datatable" style="width: 100%;" class="styled-table">
                                            <thead> 
                                                <tr>
                                                    <td><strong>Jika Ada :</strong></td>
                                                    <td>Ya</td>
                                                    <td>Tidak</td>
                                                    {{-- <td>Keterangan</td> --}}
                                                </tr>
                                            </thead> 
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        Demam : <input type="text" class="form-control" name="ket_kel_1" value="" id="ket_kel_1" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="Demam" name="kel_1" onclick="$('#ket_kel_1').fadeIn('slow');"/>
                                                            <label for="Demam"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="Demam1" name="kel_1" onclick="$('#ket_kel_1').fadeOut('slow');"/>
                                                            <label for="Demam1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Nyeri Kepala :<input type="text" class="form-control" name="ket_kel_2" value="" id="ket_kel_2" style="display: none;" placeholder="Isi Keterangan"> 
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="nyerikepala" name="kel_2"  onclick="$('#ket_kel_2').fadeIn('slow');"/>
                                                            <label for="nyerikepala"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="nyerikepala1" name="kel_2" onclick="$('#ket_kel_2').fadeOut('slow');"/>
                                                            <label for="nyerikepala1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Batuk dan influensa : <input type="text" class="form-control" name="ket_kel_3" value="" id="ket_kel_3" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="bdi" name="kel_3" onclick="$('#ket_kel_3').fadeIn('slow');"/>
                                                            <label for="bdi"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="bdi1" name="kel_3"  onclick="$('#ket_kel_3').fadeOut('slow');"/>
                                                            <label for="bdi1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Batuk lebih dari 1 bulan :<input type="text" class="form-control" name="ket_kel_4" value="" id="ket_kel_4" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="bldb" name="bldb" onclick="$('#ket_kel_4').fadeIn('slow');"/>
                                                            <label for="bldb"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="bldb1" name="bldb"  onclick="$('#ket_kel_4').fadeOut('slow');"/>
                                                            <label for="bldb1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Pusing atau rasa berputar (vertigo) :<input type="text" class="form-control" name="ket_kel_5" value="" id="ket_kel_5" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="vertigo" name="vertigo" onclick="$('#ket_kel_5').fadeIn('slow');"/>
                                                            <label for="vertigo"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="vertigo1" name="vertigo" onclick="$('#ket_kel_5').fadeOut('slow');"/>
                                                            <label for="vertigo1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Lemas :<input type="text" class="form-control" name="ket_kel_6" value="" id="ket_kel_6" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="lemas" name="lemas" onclick="$('#ket_kel_6').fadeIn('slow');"/>
                                                            <label for="lemas"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="lemas1" name="lemas" onclick="$('#ket_kel_6').fadeOut('slow');"/>
                                                            <label for="lemas1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Gangguan mata atau penglihatan : <input type="text"  class="form-control" name="ket_kel_7" value="" id="ket_kel_7" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="gmap" name="gmap" onclick="$('#ket_kel_7').fadeIn('slow');"/>
                                                            <label for="gmap"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="gmap1" name="gmap" onclick="$('#ket_kel_7').fadeOut('slow');"/>
                                                            <label for="gmap1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Mata berkunang-kunang :<input type="text" class="form-control" name="ket_kel_8" value="" id="ket_kel_8" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="kunang" name="kunang" onclick="$('#ket_kel_8').fadeIn('slow');"/>
                                                            <label for="kunang"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="kunang1" name="kunang" onclick="$('#ket_kel_8').fadeOut('slow');"/>
                                                            <label for="kunang1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Gangguan pendengaran :<input type="text" class="form-control" name="ket_kel_9" value="" id="ket_kel_9" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="ganggu_dengar" name="ganggu_dengar" onclick="$('#ket_kel_9').fadeIn('slow');"/>
                                                            <label for="ganggu_dengar"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="ganggu_dengar1" name="ganggu_dengar" onclick="$('#ket_kel_9').fadeOut('slow');"/>
                                                            <label for="ganggu_dengar1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Nyeri dada :<input type="text" class="form-control" name="ket_kel_10" value="" id="ket_kel_10" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="nyeri_dada" name="nyeri_dada" onclick="$('#ket_kel_10').fadeIn('slow');"/>
                                                            <label for="nyeri_dada"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="nyeri_dada1" name="nyeri_dada" onclick="$('#ket_kel_10').fadeOut('slow');"/>
                                                            <label for="nyeri_dada1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Sesak Napas :<input type="text" class="form-control" name="ket_kel_11" value="" id="ket_kel_11" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="sesak_nafas" name="sesak_nafas" onclick="$('#ket_kel_11').fadeIn('slow');"/>
                                                            <label for="sesak_nafas"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="sesak_nafas1" name="sesak_nafas" onclick="$('#ket_kel_11').fadeOut('slow');"/>
                                                            <label for="sesak_nafas1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Sakit Jantung :<input type="text" class="form-control" name="ket_kel_12" value="" id="ket_kel_12" style="display: none;">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="sakit_jantung" name="sakit_jantung" onclick="$('#ket_kel_12').fadeIn('slow');"/>
                                                            <label for="sakit_jantung"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="sakit_jantung1" name="sakit_jantung" onclick="$('#ket_kel_12').fadeOut('slow');"/>
                                                            <label for="sakit_jantung1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Hipertensi / tekanan darah tinggi :<input type="text" class="form-control" name="ket_kel_13" value="" id="ket_kel_13" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="hipertensi" name="hipertensi" onclick="$('#ket_kel_13').fadeIn('slow');"/>
                                                            <label for="hipertensi"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="hipertensi1" name="hipertensi" onclick="$('#ket_kel_13').fadeOut('slow');"/>
                                                            <label for="hipertensi1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Tidak nafsu makan lebih dari 1 bulan : <input type="text" class="form-control" name="ket_kel_14" value="" id="ket_kel_14" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="tnml" name="tnml" onclick="$('#ket_kel_14').fadeIn('slow');"/>
                                                            <label for="tnml"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="tnml1" name="tnml" onclick="$('#ket_kel_14').fadeOut('slow');"/>
                                                            <label for="tnml1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Gastritis (maag) : <input type="text" class="form-control" name="ket_kel_15" value="" id="ket_kel_15" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="Gastritis" name="Gastritis" onclick="$('#ket_kel_15').fadeIn('slow');"/>
                                                            <label for="Gastritis"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="Gastritis1" name="Gastritis" onclick="$('#ket_kel_15').fadeOut('slow');"/>
                                                            <label for="Gastritis1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Nyeri perut atau gangguan pencernaan lainnya</p> <input type="text" class="form-control" name="ket_kel_16" value="" id="ket_kel_16" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="gangguan_pencernaan" name="gangguan_pencernaan" onclick="$('#ket_kel_16').fadeIn('slow');"/>
                                                            <label for="gangguan_pencernaan"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="gangguan_pencernaan1" name="gangguan_pencernaan" onclick="$('#ket_kel_16').fadeOut('slow');"/>
                                                            <label for="gangguan_pencernaan1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Haemorrhoid (wasir/ambeien) :<input type="text" class="form-control" name="ket_kel_17" value="" id="ket_kel_17" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="Haemorrhoid" name="Haemorrhoid" onclick="$('#ket_kel_17').fadeIn('slow');"/>
                                                            <label for="Haemorrhoid"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="Haemorrhoid1" name="Haemorrhoid" onclick="$('#ket_kel_17').fadeOut('slow');"/>
                                                            <label for="Haemorrhoid1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Diare berulang / lama (kronis) :<input type="text" class="form-control" name="ket_kel_18" value="" id="ket_kel_18" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="Diare" name="Diare" onclick="$('#ket_kel_18').fadeIn('slow');"/>
                                                            <label for="Diare"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="Diare1" name="Diare" onclick="$('#ket_kel_18').fadeOut('slow');"/>
                                                            <label for="Diare1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Sakit pinggang :<input type="text" class="form-control" name="ket_kel_19" value="" id="ket_kel_19" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="sakit_pinggang" name="sakit_pinggang" onclick="$('#ket_kel_19').fadeIn('slow');"/>
                                                            <label for="sakit_pinggang"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="sakit_pinggang1" name="sakit_pinggang" onclick="$('#ket_kel_19').fadeOut('slow');"/>
                                                            <label for="sakit_pinggang1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Gangguan berkemih : <input type="text" class="form-control" name="ket_kel_20" value="" id="ket_kel_20" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="gangguan_berkemih" name="gangguan_berkemih" onclick="$('#ket_kel_20').fadeIn('slow');"/>
                                                            <label for="gangguan_berkemih"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="gangguan_berkemih1" name="gangguan_berkemih" onclick="$('#ket_kel_20').fadeOut('slow');"/>
                                                            <label for="gangguan_berkemih1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Gangguan ginjal :<input type="text" class="form-control" name="ket_kel_21" value="" id="ket_kel_21" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="gangguan_ginjal" name="gangguan_ginjal" onclick="$('#ket_kel_21').fadeIn('slow');"/>
                                                            <label for="gangguan_ginjal"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="gangguan_ginjal1" name="gangguan_ginjal" onclick="$('#ket_kel_21').fadeOut('slow');"/>
                                                            <label for="gangguan_ginjal1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Gangguan pada alat reproduks :<input type="text" class="form-control" name="ket_kel_22" value="" id="ket_kel_22" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="gpar" name="gpar" onclick="$('#ket_kel_22').fadeIn('slow');"/>
                                                            <label for="gpar"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="gpar1" name="gpar" onclick="$('#ket_kel_22').fadeOut('slow');"/>
                                                            <label for="gpar1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Nyeri otot dan sendi :<input type="text" class="form-control" name="ket_kel_23" value="" id="ket_kel_23" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="nods" name="nods" onclick="$('#ket_kel_23').fadeIn('slow');"/>
                                                            <label for="nods"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="nods1" name="nods" onclick="$('#ket_kel_23').fadeOut('slow');"/>
                                                            <label for="nods1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Kesemutan :<input type="text" class="form-control" name="ket_kel_24" value="" id="ket_kel_24" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="Kesemutan" name="Kesemutan"  onclick="$('#ket_kel_24').fadeIn('slow');"/>
                                                            <label for="Kesemutan"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="Kesemutan1" name="Kesemutan" onclick="$('#ket_kel_24').fadeOut('slow');"/>
                                                            <label for="Kesemutan1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Bengkak pada kaki atau anggota badan lainnya :<input type="text" class="form-control" name="ket_kel_25" value="" id="ket_kel_25" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="bpkaabl" name="bpkaabl" onclick="$('#ket_kel_25').fadeIn('slow');"/>
                                                            <label for="bpkaabl"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="bpkaabl1" name="bpkaabl" onclick="$('#ket_kel_25').fadeOut('slow');"/>
                                                            <label for="bpkaabl1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Gatal atau gangguan kulit lainnya :<input type="text" class="form-control" name="ket_kel_26" value="" id="ket_kel_26" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="gagkl" name="gagkl" onclick="$('#ket_kel_26').fadeIn('slow');"/>
                                                            <label for="gagkl"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="gagkl1" name="gagkl" onclick="$('#ket_kel_26').fadeOut('slow');"/>
                                                            <label for="gagkl1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Benjolan abnormal pada bagian tubuh :<input type="text" class="form-control" name="ket_kel_27" value="" id="ket_kel_27" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="bapbt" name="bapbt" onclick="$('#ket_kel_27').fadeIn('slow');"/>
                                                            <label for="bapbt"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="bapbt1" name="bapbt" onclick="$('#ket_kel_27').fadeOut('slow');"/>
                                                            <label for="bapbt1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Keluhan lain-lain :<input type="text" class="form-control" name="ket_kel_28" value="" id="ket_kel_28" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="kel_lainlain" name="kel_lainlain" onclick="$('#ket_kel_28').fadeIn('slow');"/>
                                                            <label for="kel_lainlain"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="kel_lainlain1" name="kel_lainlain" onclick="$('#ket_kel_28').fadeOut('slow');"/>
                                                            <label for="kel_lainlain1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group">
                                        <div class="icheck-material-success">
                                            <input type="checkbox" id="checkbox1" name="form1"/>
                                            <label for="checkbox1"> Centang Untuk Menyetujui</label>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                
                                  Beri tanda pada data <input type="checkbox" name="" id="" checked> yang sesuai
                                
                                    <div class="row">
                                        <div class="col-8">
                                            <h4 class="form-header text-uppercase">
                                                <i class="fa fa-file-o"></i>
                                                C. RIWAYAT PENYAKIT
                                            </h4>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row" id="form2">
                                        <table  id="default-datatable" style="width: 100%;" class="styled-table">
                                            <thead> 
                                                <tr>
                                                    <td><strong>Jika Ada :</strong></td>
                                                    <td>Ya</td>
                                                    <td>Tidak</td>
                                                    {{-- <td>Keterangan</td> --}}
                                                </tr>
                                            </thead> 
                                            <tbody>
                                                <tr>
                                                    <td><strong><h6>System Pencernaan :</h6></strong></td>
                                                    <td></td>
                                                    <td></td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Gastritis (maag) :<input type="text" class="form-control" name="gastritis" value="" id="gastritis" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="maag" name="maag" onclick="$('#gastritis').fadeIn('slow');"/>
                                                            <label for="maag"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="maag1" name="maag" onclick="$('#gastritis').fadeOut('slow');"/>
                                                            <label for="maag1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Hepatitis (penyakit hati/kuning) :<input type="text" class="form-control" name="hepatitis" value="" id="hepatitis" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="hepatitisx" name="hepatitisx" onclick="$('#hepatitis').fadeIn('slow');"/>
                                                            <label for="hepatitisx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="hepatitis1" name="hepatitisx" onclick="$('#hepatitis').fadeOut('slow');"/>
                                                            <label for="hepatitis1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Batu empedu : <input type="text" class="form-control" name="batu_empedu" value="" id="batu_empedu" style="display: none;">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="batu_empedux" name="batu_empedux" onclick="$('#batu_empedu').fadeIn('slow');"/>
                                                            <label for="batu_empedux"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="batu_empedux1" name="batu_empedux" onclick="$('#batu_empedu').fadeOut('slow');"/>
                                                            <label for="batu_empedux1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Demam typoid :<input type="text" class="form-control" name="demam_typoid" value="" id="demam_typoid" style="display: none;">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="demam_typoidx" name="demam_typoidx" onclick="$('#demam_typoid').fadeIn('slow');"/>
                                                            <label for="demam_typoidx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="demam_typoidx1" name="demam_typoidx" onclick="$('#demam_typoid').fadeOut('slow');"/>
                                                            <label for="demam_typoidx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Haemorrhoid (wasir/ambeien) :<input type="text" class="form-control" name="haemorrid" value="" id="haemorrid" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="haemorridx" name="haemorridx" onclick="$('#haemorrid').fadeIn('slow');"/>
                                                            <label for="haemorridx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="haemorrid1" name="haemorridx" onclick="$('#haemorrid').fadeOut('slow');"/>
                                                            <label for="haemorrid1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Operasi saluran pencernaan :<input type="text" class="form-control" name="osp" value="" id="osp" style="display: none;" placeholder="Isi Keterangan"> 
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="ospx" name="ospx" onclick="$('#osp').fadeIn('slow');"/>
                                                            <label for="ospx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="ospx1" name="ospx" onclick="$('#osp').fadeOut('slow');"/>
                                                            <label for="ospx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td><strong><h6>System Pernafasan :</h6></strong></td>
                                                    <td></td>
                                                    <td></td>
                                                  
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Asma :<input type="text" class="form-control" name="asma" value="" id="asma" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="asmax" name="asmax" onclick="$('#asma').fadeIn('slow');"/>
                                                            <label for="asmax"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="asmax1" name="asmax" onclick="$('#asma').fadeOut('slow');"/>
                                                            <label for="asmax1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Tuberculosa (TBC) <input type="text" class="form-control" name="tbc" value="" id="tbc" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="tbcx" name="tbcx" onclick="$('#tbc').fadeIn('slow');"/>
                                                            <label for="tbcx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="tbcx1" name="tbcx" onclick="$('#tbc').fadeOut('slow');"/>
                                                            <label for="tbcx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Batuk lebih dari 1 bulan :<input type="text" class="form-control" name="batuk_lebih" value="" id="batuk_lebih" style="display: none;">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="batuk_lebihx" name="batuk_lebihx" onclick="$('#batuk_lebih').fadeIn('slow');"/>
                                                            <label for="batuk_lebihx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="batuk_lebihx1" name="batuk_lebihx" onclick="$('#batuk_lebih').fadeOut('slow');"/>
                                                            <label for="batuk_lebihx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Pneumonia :<input type="text" class="form-control" name="pneumonia"  value="" id="pneumonia" style="display: none;">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pneumoniax" name="pneumoniax" onclick="$('#pneumonia').fadeIn('slow');"/>
                                                            <label for="pneumoniax"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pneumoniax1" name="pneumoniax" onclick="$('#pneumonia').fadeOut('slow');"/>
                                                            <label for="pneumoniax1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td><strong><h6>System cardiovaskuler</h6></strong></td>
                                                    <td></td>
                                                    <td></td>
                                               
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Penyakit jantung :<input type="text" class="form-control" name="jantung" value="" id="jantung" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="jantungx" name="jantungx" onclick="$('#jantung').fadeIn('slow');"/>
                                                            <label for="jantungx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="jantungx1" name="jantungx" onclick="$('#jantung').fadeOut('slow');"/>
                                                            <label for="jantungx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Hipertensi :<input type="text" class="form-control" name="hipertensi" value="" id="hipertensi" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="hipertensix" name="hipertensix" onclick="$('#hipertensi').fadeIn('slow');"/>
                                                            <label for="hipertensix"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="hipertensix1" name="hipertensix" onclick="$('#hipertensi').fadeOut('slow');"/>
                                                            <label for="hipertensix1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Stroke :<input type="text" class="form-control" name="stroke" value="" id="stroke" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="strokex" name="strokex" onclick="$('#stroke').fadeIn('slow');"/>
                                                            <label for="strokex"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="strokex1" name="strokex" onclick="$('#stroke').fadeOut('slow');"/>
                                                            <label for="strokex1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Pasang pen atau ring :<input type="text" class="form-control" name="pen" value="" id="pen" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="penx" name="penx" onclick="$('#pen').fadeIn('slow');"/>
                                                            <label for="penx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="penx1" name="penx" onclick="$('#pen').fadeOut('slow');"/>
                                                            <label for="penx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Anemia :<input type="text" class="form-control" name="anemia" value="" id="anemia" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="anemiax" name="anemiax" onclick="$('#anemia').fadeIn('slow');"/>
                                                            <label for="anemiax"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="anemiax1" name="anemiax" onclick="$('#anemia').fadeOut('slow');"/>
                                                            <label for="anemiax1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td><strong><h6>Sistem Saraf</h6></strong></td>
                                                    <td></td>
                                                    <td></td>
                                                 
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Vertigo (pusing memutar) :<input type="text" class="form-control" name="vertigo" value="" id="vertigo" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="vertigox" name="vertigox" onclick="$('#vertigo').fadeIn('slow');"/>
                                                            <label for="vertigox"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="vertigox1" name="vertigox" onclick="$('#vertigo').fadeOut('slow');"/>
                                                            <label for="vertigox1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Epilepsi (ayan), kejang, pingsan :<input type="text" class="form-control" name="epilepsi" value="" id="epilepsi" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="epilepsix" name="epilepsix" onclick="$('#epilepsi').fadeIn('slow');"/>
                                                            <label for="epilepsix"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="epilepsix1" name="epilepsix" onclick="$('#epilepsi').fadeOut('slow');"/>
                                                            <label for="epilepsix1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Polio :<input type="text" class="form-control" name="polio" value="" id="polio" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="poliox" name="poliox" onclick="$('#polio').fadeIn('slow');"/>
                                                            <label for="poliox"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="poliox1" name="poliox" onclick="$('#polio').fadeOut('slow');"/>
                                                            <label for="poliox1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Gangguan mental / kejiwaan :<input type="text" class="form-control" name="kejiwaan" value="" id="kejiwaan" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="kejiwaanx" name="kejiwaanx" onclick="$('#kejiwaan').fadeIn('slow');"/>
                                                            <label for="kejiwaanx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="kejiwaanx1" name="kejiwaanx" onclick="$('#kejiwaan').fadeOut('slow');"/>
                                                            <label for="kejiwaanx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td> 
                                                        Mengalami cidera kepala :<input type="text" class="form-control" name="cidera_kepala" value="" id="cidera_kepala" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="cidera_kepalax" name="cidera_kepalax" onclick="$('#cidera_kepala').fadeIn('slow');"/>
                                                            <label for="cidera_kepalax"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="cidera_kepalax1" name="cidera_kepalax" onclick="$('#cidera_kepala').fadeOut('slow');"/>
                                                            <label for="cidera_kepalax1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td><strong><h6>Sistem Penglihatan</h6></strong></td>
                                                    <td></td>
                                                    <td></td>
                                                 
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Kacamata Minus :<input type="text" class="form-control" name="mata_minus" value="" id="mata_minus" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="mata_minusx" name="mata_minusx"  onclick="$('#mata_minus').fadeIn('slow');"/>
                                                            <label for="mata_minusx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="mata_minusx1" name="mata_minusx" onclick="$('#mata_minus').fadeOut('slow');"/>
                                                            <label for="mata_minusx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Kacamata (+) :<input type="text" class="form-control" name="mata_plus" value="" id="mata_plus" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="mata_plusx" name="mata_plusx" onclick="$('#mata_plus').fadeIn('slow');"/>
                                                            <label for="mata_plusx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="mata_plusx1" name="mata_plusx" onclick="$('#mata_plus').fadeOut('slow');"/>
                                                            <label for="mata_plusx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Kacamata Silender :<input type="text" class="form-control" name="mata_slinder" value="" id="mata_slinder" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="mata_slinderx" name="mata_slinderx" onclick="$('#mata_slinder').fadeIn('slow');"/>
                                                            <label for="mata_slinderx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="mata_slinderx1" name="mata_slinderx" onclick="$('#mata_slinder').fadeOut('slow');"/>
                                                            <label for="mata_slinderx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Trauma :<input type="text" class="form-control" name="trauma_pengelihatanx" value="" id="trauma_pengelihatan" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="trauma_pengelihatanx" name="trauma_pengelihatanx" onclick="$('#trauma_pengelihatan').fadeIn('slow');"/>
                                                            <label for="trauma_pengelihatanx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="trauma_pengelihatanx1" name="trauma_pengelihatanx" onclick="$('#trauma_pengelihatan').fadeOut('slow');"/>
                                                            <label for="trauma_pengelihatanx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Fotopobia : <input type="text" class="form-control" name="fotopobia" value="" id="fotopobia" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="fotopobiax" name="fotopobiax" onclick="$('#fotopobia').fadeIn('slow');"/>
                                                            <label for="fotopobiax"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="fotopobiax1" name="fotopobiax" onclick="$('#fotopobia').fadeOut('slow');"/>
                                                            <label for="fotopobiax1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td><strong><h6>Sistem Pendengaran/THT</h6></strong> </td>
                                                    <td></td>
                                                    <td></td>
                                                  
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Gangguan Pendengaran :<input type="text" class="form-control" name="pendengaran" value="" id="pendengaran" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pendengaranx" name="pendengaranx" onclick="$('#pendengaran').fadeIn('slow');"/>
                                                            <label for="pendengaranx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pendengaranx1" name="pendengaranx" onclick="$('#pendengaran').fadeOut('slow');"/>
                                                            <label for="pendengaranx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Sinusitis : <input type="text" class="form-control" name="sinusitis" value="" id="sinusitis" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="sinusitisx" name="sinusitisx" onclick="$('#sinusitis').fadeIn('slow');"/>
                                                            <label for="sinusitisx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="sinusitisx1" name="sinusitisx" onclick="$('#sinusitis').fadeOut('slow');"/>
                                                            <label for="sinusitisx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Rhinitis Allergika :<input type="text" class="form-control" name="rhinitis" value="" id="rhinitis" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="rhinitisx" name="rhinitisx" onclick="$('#rhinitis').fadeIn('slow');"/>
                                                            <label for="rhinitisx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="rhinitisx1" name="rhinitisx" onclick="$('#rhinitis').fadeOut('slow');"/>
                                                            <label for="rhinitisx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Amandel/tonsilitis :<input type="text" class="form-control" name="amandel" value="" id="amandel" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="amandelx" name="amandelx" onclick="$('#amandel').fadeIn('slow');"/>
                                                            <label for="amandelx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="amandelx1" name="amandelx" onclick="$('#amandel').fadeOut('slow');"/>
                                                            <label for="amandelx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Otitis :<input type="text" class="form-control" name="otitis" value="" id="otitis" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="otitisx" name="otitisx" onclick="$('#otitis').fadeIn('slow');"/>
                                                            <label for="otitisx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="otitisx1" name="otitisx" onclick="$('#otitis').fadeOut('slow');"/>
                                                            <label for="otitisx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Trauma :<input type="text" class="form-control" name="trauma_pendengaran" value="" id="trauma_pendengaran" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="trauma_pendengaranx" name="trauma_pendengaranx" onclick="$('#trauma_pendengaran').fadeIn('slow');"/>
                                                            <label for="trauma_pendengaranx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="trauma_pendengaranx1" name="trauma_pendengaranx" onclick="$('#trauma_pendengaran').fadeOut('slow');"/>
                                                            <label for="trauma_pendengaranx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td><strong><h6>Ginjal & Saluran Kemih</h6></strong></td>
                                                    <td></td>
                                                    <td></td>
                                                
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Batu ginjal : <input type="text" class="form-control" name="batu_ginjal" value="" id="batu_ginjal" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="batu_ginjalx" name="batu_ginjalx" onclick="$('#batu_ginjal').fadeIn('slow');"/>
                                                            <label for="batu_ginjalx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="batu_ginjalx1" name="batu_ginjalx" onclick="$('#batu_ginjal').fadeOut('slow');"/>
                                                            <label for="batu_ginjalx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Penyakit ginjal (akut/kronis) : <input type="text" class="form-control" name="penyakit_ginjal" value="" id="penyakit_ginjal" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="penyakit_ginjalx" name="penyakit_ginjalx" onclick="$('#penyakit_ginjal').fadeIn('slow');"/>
                                                            <label for="penyakit_ginjalx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="penyakit_ginjalx1" name="penyakit_ginjalx" onclick="$('#penyakit_ginjal').fadeOut('slow');"/>
                                                            <label for="penyakit_ginjalx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Infeksi saluran kemih :<input type="text" class="form-control" name="isk" value="" id="isk" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="iskx" name="iskx" onclick="$('#isk').fadeIn('slow');"/>
                                                            <label for="iskx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="iskx1" name="iskx" onclick="$('#isk').fadeOut('slow');"/>
                                                            <label for="iskx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Operasi saluran kemih :<input type="text" class="form-control" name="osk" value="" id="osk" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="oskx" name="oskx" onclick="$('#osk').fadeIn('slow');"/>
                                                            <label for="oskx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="oskx1" name="oskx" onclick="$('#osk').fadeOut('slow');"/>
                                                            <label for="oskx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td><strong><h6>Tulang, Sendi & Otot</h6></strong></td>
                                                    <td></td>
                                                    <td></td>
                                             
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Patah tulang :<input type="text" class="form-control" name="patah_tulang" value="" id="patah_tulang" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="patah_tulangx" name="patah_tulangx" onclick="$('#patah_tulang').fadeIn('slow');"/>
                                                            <label for="patah_tulangx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="patah_tulangx1" name="patah_tulangx" onclick="$('#patah_tulang').fadeOut('slow');"/>
                                                            <label for="patah_tulangx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Radang sendi (arthritis) :<input type="text" class="form-control" name="radang_sendi" value="" id="radang_sendi" style="display: none;" placeholder="Isi Keterangan">
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="radang_sendix" name="radang_sendix" onclick="$('#radang_sendi').fadeIn('slow');"/>
                                                            <label for="radang_sendix"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="radang_sendix1" name="radang_sendix" onclick="$('#radang_sendi').fadeOut('slow');"/>
                                                            <label for="radang_sendix1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Rheumatik :<input type="text" class="form-control" name="rheumatik" value="" id="rheumatik" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="rheumatikx" name="rheumatikx" onclick="$('#rheumatik').fadeIn('slow');"/>
                                                            <label for="rheumatikx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="rheumatikx1" name="rheumatikx" onclick="$('#rheumatik').fadeOut('slow');"/>
                                                            <label for="rheumatikx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Kecelakaan / cidera / trauma /luka parah :<input type="text" class="form-control" name="cidera" value="" id="cidera" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="ciderax" name="ciderax" onclick="$('#cidera').fadeIn('slow');"/>
                                                            <label for="ciderax"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="ciderax1" name="ciderax" onclick="$('#cidera').fadeOut('slow');"/>
                                                            <label for="ciderax1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Nyeri otot lebih dari 1 bulan :<input type="text" class="form-control" name="nyeri_otot" value="" id="nyeri_otot" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="nyeri_ototx" name="nyeri_ototx" onclick="$('#nyeri_otot').fadeIn('slow');"/>
                                                            <label for="nyeri_ototx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="nyeri_ototx1" name="nyeri_ototx" onclick="$('#nyeri_otot').fadeOut('slow');"/>
                                                            <label for="nyeri_ototx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Nyeri punggung/back pain :<input type="text" class="form-control" name="nyeri_punggung" value="" id="nyeri_punggung" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="nyeri_punggungx" name="nyeri_punggungx" onclick="$('#nyeri_punggung').fadeIn('slow');"/>
                                                            <label for="nyeri_punggungx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="nyeri_punggungx1" name="nyeri_punggungx" onclick="$('#nyeri_punggung').fadeOut('slow');"/>
                                                            <label for="nyeri_punggungx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td><strong><h6>Kulit & system reproduksi</h6></strong></td>
                                                    <td></td>
                                                    <td></td>
                                               
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Gangguan alat reproduksi :<input type="text" class="form-control" name="gar" value="" id="gar" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="garx" name="garx" onclick="$('#gar').fadeIn('slow');"/>
                                                            <label for="garx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="garx1" name="garx" onclick="$('#gar').fadeOut('slow');"/>
                                                            <label for="garx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Kista/tumor/kanker alat reproduksi :<input type="text" class="form-control" name="kista" value="" id="kista" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="kistax" name="kistax" onclick="$('#kista').fadeIn('slow');"/>
                                                            <label for="kistax"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="kistax1" name="kistax" onclick="$('#kista').fadeOut('slow');"/>
                                                            <label for="kistax1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Penyakit Akibat Hubungan Sex :<input type="text" class="form-control" name="pahs" value="" id="pahs" style="display: none;" placeholder="Isi Keteranagn">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pahsx" name="pahsx" onclick="$('#pahs').fadeIn('slow');"/>
                                                            <label for="pahsx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pahsx1" name="pahsx" onclick="$('#pahs').fadeOut('slow');"/>
                                                            <label for="pahsx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        HIV :<input type="text" class="form-control" name="hiv" value="" id="hiv" style="display: none;" placeholder="Isi Keterangan">
                                                     </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="hivx" name="hivx" onclick="$('#hiv').fadeIn('slow');"/>
                                                            <label for="hivx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="hivx1" name="hivx" onclick="$('#hiv').fadeOut('slow');"/>
                                                            <label for="hivx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Lepra :<input type="text" class="form-control" name="lepra" value="" id="lepra" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="leprax" name="leprax" onclick="$('#lepra').fadeIn('slow');"/>
                                                            <label for="leprax"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="leprax1" name="leprax" onclick="$('#lepra').fadeOut('slow');"/>
                                                            <label for="leprax1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Penyakit kulit yang lama / kronis :<input type="text" class="form-control" name="pkyl" value="" id="pkyl" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pkylx" name="pkylx" onclick="$('#pkyl').fadeIn('slow');"/>
                                                            <label for="pkylx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pkylx1" name="pkylx" onclick="$('#pkyl').fadeOut('slow');"/>
                                                            <label for="pkylx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>System Endokrin</td>
                                                    <td></td>
                                                    <td></td>
                                                 
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Diabetes Militus (Kencing manis) :<input type="text" class="form-control" name="diabetes" value="" id="diabetes" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="diabetesx" name="diabetesx" onclick="$('#diabetes').fadeIn('slow');"/>
                                                            <label for="diabetesx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="diabetesx1" name="diabetesx" onclick="$('#diabetes').fadeOut('slow');"/>
                                                            <label for="diabetesx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Gangguan tiroid (gondok, hipo/hipertiroid) :<input type="text" class="form-control" name="gondok" value="" id="gondok" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="gondokx" name="gondokx" onclick="$('#gondok').fadeIn('slow');"/>
                                                            <label for="gondokx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="gondokx1" name="gondokx" onclick="$('#gondok').fadeOut('slow');"/>
                                                            <label for="gondokx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td><strong><h6>Allergi</h6></strong></td>
                                                    <td></td>
                                                    <td></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Allergi Obat :<input type="text" class="form-control" name="alergi_obat" value="" id="alergi_obat" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="alergi_obatx" name="alergi_obatx" onclick="$('#alergi_obat').fadeIn('slow');"/>
                                                            <label for="alergi_obatx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="alergi_obatx1" name="alergi_obatx" onclick="$('#alergi_obat').fadeOut('slow');"/>
                                                            <label for="alergi_obatx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Allergi Makanan : <input type="text" class="form-control" name="alergi_makanan" value="" id="alergi_makanan" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="alergi_makananx" name="alergi_makananx" onclick="$('#alergi_makanan').fadeIn('slow');"/>
                                                            <label for="alergi_makananx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="alergi_makananx1" name="alergi_makananx" onclick="$('#alergi_makanan').fadeOut('slow');"/>
                                                            <label for="alergi_makananx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Allergi Hirupan :<input type="text" class="form-control" name="alergi_hirupan" value="" id="alergi_hirupan" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="alergi_hirupanx" name="alergi_hirupanx" onclick="$('#alergi_hirupan').fadeIn('slow');"/>
                                                            <label for="alergi_hirupanx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="alergi_hirupanx1" name="alergi_hirupanx" onclick="$('#alergi_hirupan').fadeOut('slow');"/>
                                                            <label for="alergi_hirupanx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Allergi Kontak :<input type="text" class="form-control" name="alergi_kontak" value="" id="alergi_kontak" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="alergi_kontakx" name="alergi_kontakx" onclick="$('#alergi_kontak').fadeIn('slow');"/>
                                                            <label for="alergi_kontakx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="alergi_kontakx1" name="alergi_kontakx" onclick="$('#alergi_kontak').fadeOut('slow');"/>
                                                            <label for="alergi_kontakx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Allergi Lain-lain :<input type="text" class="form-control" name="alergi_lain" value="" id="alergi_lain" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="alergi_lainx" name="alergi_lainx" onclick="$('#alergi_lain').fadeIn('slow');"/>
                                                            <label for="alergi_lainx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="alergi_lainx1" name="alergi_lainx" onclick="$('#alergi_lain').fadeOut('slow');"/>
                                                            <label for="alergi_lainx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td><strong><h6>Penyakit daerah tropis</h6></strong></td>
                                                    <td></td>
                                                    <td></td>
                                                   
                                                </tr>
                                                <tr>
                                                    <td>
                                                        DHF/Demam berdarah :<input type="text" class="form-control" name="dhf" value="" id="dhf" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="dhfx" name="dhfx" onclick="$('#dhf').fadeIn('slow');"/>
                                                            <label for="dhfx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="dhfx1" name="dhfx" onclick="$('#dhf').fadeOut('slow');"/>
                                                            <label for="dhfx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Malaria :<input type="text" class="form-control" name="malaria" value="" id="malaria" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="malariax" name="malariax" onclick="$('#malaria').fadeIn('slow');"/>
                                                            <label for="malariax"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="malariax1" name="malariax" onclick="$('#malaria').fadeOut('slow');"/>
                                                            <label for="malariax1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Typoid :<input type="text" class="form-control" name="typoid" value="" id="typoid" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="typoidx" name="typoidx" onclick="$('#typoid').fadeIn('slow');"/>
                                                            <label for="typoidx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="typoidx1" name="typoidx" onclick="$('#typoid').fadeOut('slow');"/>
                                                            <label for="typoidx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td> 
                                                        Lain-lain (tropical diseases) :<input type="text" class="form-control" name="tropis_lain" value="" id="tropis_lain" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="tropis_lainx" name="tropis_lainx" onclick="$('#tropis_lain').fadeIn('slow');"/>
                                                            <label for="tropis_lainx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="tropis_lainx1" name="tropis_lainx" onclick="$('#tropis_lain').fadeOut('slow');"/>
                                                            <label for="tropis_lainx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td><strong><h6>Penyakit lainnya</h6></strong></td>
                                                    <td></td>
                                                    <td></td>
                                                  
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Tumor / kanker : <input type="text" class="form-control" name="kanker" value="" id="kanker" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="kankerx" name="kankerx" onclick="$('#kanker').fadeIn('slow');"/>
                                                            <label for="kankerx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="kankerx1" name="kankerx" onclick="$('#kanker').fadeOut('slow');"/>
                                                            <label for="kankerx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Leukimia :<input type="text" class="form-control" name="leukimia" value="" id="leukimia" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="leukimiax" name="leukimiax" onclick="$('#leukimia').fadeIn('slow');"/>
                                                            <label for="leukimiax"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="leukimiax1" name="leukimiax" onclick="$('#leukimia').fadeOut('slow');"/>
                                                            <label for="leukimiax1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Pernah operasi :<input type="text" class="form-control" name="pernah_oprasi" value="" id="pernah_oprasi" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pernah_oprasix" name="pernah_oprasix" onclick="$('#pernah_oprasi').fadeIn('slow');"/>
                                                            <label for="pernah_oprasix"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pernah_oprasix1" name="pernah_oprasix" onclick="$('#pernah_oprasi').fadeOut('slow');"/>
                                                            <label for="pernah_oprasix1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Lain-lain (Penyakit lainnya) : <input type="text" class="form-control" name="penyakit_lain" value="" id="penyakit_lain" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="penyakit_lainx" name="penyakit_lainx" onclick="$('#penyakit_lain').fadeIn('slow');"/>
                                                            <label for="penyakit_lainx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="penyakit_lainx1" name="penyakit_lainx" onclick="$('#penyakit_lain').fadeOut('slow');"/>
                                                            <label for="penyakit_lainx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group">
                                        <div class="icheck-material-success">
                                            <input type="checkbox" id="checkbox2" name="form2"/>
                                            <label for="checkbox2"> Centang Untuk Menyetujui</label>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                
                                  Beri tanda pada data <input type="checkbox" name="" id="" checked> yang sesuai
                                   
                                    <div class="row">
                                        <div class="col-8">
                                            <h4 class="form-header text-uppercase">
                                                <i class="fa fa-file-o"></i>
                                                D. RIWAYAT PENYAKIT KELUARGA 
                                            </h4>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row" id="form3">
                                        <table  id="default-datatable" style="width: 100%;" class="styled-table">
                                            <thead> 
                                                <tr>
                                                    <td><strong>Jika Ada :</strong></td>
                                                    <td>Ya</td>
                                                    <td>Tidak</td>
                                                    
                                                </tr>
                                            </thead> 
                                            <tbody>
                                                
                                                <tr>
                                                    <td>
                                                        Diabetes Millitus :<input type="text" class="form-control" name="pk_diabetes" value="" id="pk_diabetes" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pk_diabetesx" name="pk_diabetesx" onclick="$('#pk_diabetes').fadeIn('slow');"/>
                                                            <label for="pk_diabetesx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pk_diabetesx1" name="pk_diabetesx" onclick="$('#pk_diabetes').fadeOut('slow');"/>
                                                            <label for="pk_diabetesx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Hypertensi :<input type="text" class="form-control" name="pk_hypertensi" value="" id="pk_hypertensi" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pk_hypertensix" name="pk_hypertensix" onclick="$('#pk_hypertensi').fadeIn('slow');"/>
                                                            <label for="pk_hypertensix"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pk_hypertensix1" name="pk_hypertensix" onclick="$('#pk_hypertensi').fadeOut('slow');"/>
                                                            <label for="pk_hypertensix1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Stroke :<input type="text" class="form-control" name="pk_stroke" value="" id="pk_stroke" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pk_strokex" name="pk_strokex" onclick="$('#pk_stroke').fadeIn('slow');"/>
                                                            <label for="pk_strokex"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pk_strokex1" name="pk_strokex" onclick="$('#pk_stroke').fadeOut('slow');"/>
                                                            <label for="pk_strokex1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Penyakit Jantung :<input type="text" class="form-control" name="pk_jantung" value="" id="pk_jantung" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pk_jantungx" name="pk_jantungx" onclick="$('#pk_jantung').fadeIn('slow');"/>
                                                            <label for="pk_jantungx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pk_jantungx1" name="pk_jantungx" onclick="$('#pk_jantung').fadeOut('slow');"/>
                                                            <label for="pk_jantungx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Penyakit Ginjal :<input type="text" class="form-control" name="pk_ginjal" value="" id="pk_ginjal" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pk_ginjalx" name="pk_ginjalx" onclick="$('#pk_ginjal').fadeIn('slow');"/>
                                                            <label for="pk_ginjalx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pk_ginjalx1" name="pk_ginjalx" onclick="$('#pk_ginjal').fadeOut('slow');"/>
                                                            <label for="pk_ginjalx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        TBC :<input type="text" class="form-control" name="pk_tbc" value="" id="pk_tbc" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pk_tbcx" name="pk_tbcx" onclick="$('#pk_tbc').fadeIn('slow');"/>
                                                            <label for="pk_tbcx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pk_tbcx1" name="pk_tbcx" onclick="$('#pk_tbc').fadeOut('slow');"/>
                                                            <label for="pk_tbcx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Lepra : <input type="text" class="form-control" name="pk_lepra" value="" id="pk_lepra" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pk_leprax" name="pk_leprax" onclick="$('#pk_lepra').fadeIn('slow');"/>
                                                            <label for="pk_leprax"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pk_leprax1" name="pk_leprax" onclick="$('#pk_lepra').fadeOut('slow');"/>
                                                            <label for="pk_leprax1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Penyakit hati/hepatitis :<input type="text" class="form-control" name="pk_hepatitis" value="" id="pk_hepatitis" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pk_hepatitisx" name="pk_hepatitisx" onclick="$('#pk_hepatitis').fadeIn('slow');"/>
                                                            <label for="pk_hepatitisx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pk_hepatitisx1" name="pk_hepatitisx" onclick="$('#pk_hepatitis').fadeOut('slow');"/>
                                                            <label for="pk_hepatitisx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Epilepsi (ayan) :<input type="text" class="form-control" name="pk_epilepsi" value="" id="pk_epilepsi" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pk_epilepsix" name="pk_epilepsix" onclick="$('#pk_epilepsi').fadeIn('slow');"/>
                                                            <label for="pk_epilepsix"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pk_epilepsix1" name="pk_epilepsix" onclick="$('#pk_epilepsi').fadeOut('slow');"/>
                                                            <label for="pk_epilepsix1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Gangguan jiwa :<input type="text" class="form-control" name="pk_kejiwaan" value="" id="pk_kejiwaan" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pk_kejiwaanx" name="pk_kejiwaanx" onclick="$('#pk_kejiwaan').fadeIn('slow');"/>
                                                            <label for="pk_kejiwaanx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pk_kejiwaanx1" name="pk_kejiwaanx" onclick="$('#pk_kejiwaan').fadeOut('slow');"/>
                                                            <label for="pk_kejiwaanx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Kanker/tumor ganas : <input type="text" class="form-control" name="pk_kanker" value="" id="pk_kanker" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pk_kankerx" name="pk_kankerx" onclick="$('#pk_kanker').fadeIn('slow');"/>
                                                            <label for="pk_kankerx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pk_kankerx1" name="pk_kankerx" onclick="$('#pk_kanker').fadeOut('slow');"/>
                                                            <label for="pk_kankerx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Autoimmum/Rheumatik/Lupus :<input type="text" class="form-control" name="pk_lupus" value="" id="pk_lupus" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pk_lupusx" name="pk_lupusx" onclick="$('#pk_lupus').fadeIn('slow');"/>
                                                            <label for="pk_lupusx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pk_lupusx1" name="pk_lupusx" onclick="$('#pk_lupus').fadeOut('slow');"/>
                                                            <label for="pk_lupusx1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Asma :<input type="text" class="form-control" name="pk_asma" value="" id="pk_asma" style="display: none;" placeholder="Isi Keterangan">
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pk_asmax" name="pk_asmax" onclick="$('#pk_asma').fadeIn('slow');"/>
                                                            <label for="pk_asmax"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="pk_asmax1" name="pk_asmax" onclick="$('#pk_asma').fadeOut('slow');"/>
                                                            <label for="pk_asmax1"></label>
                                                        </div>
                                                    </td>
                                                    {{-- <td></td> --}}
                                                </tr>
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group">
                                        <div class="icheck-material-success">
                                            <input type="checkbox" id="checkbox3" name="form2"/>
                                            <label for="checkbox3"> Centang Untuk Menyetujui</label>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                              
                                  Beri tanda pada data <input type="checkbox" name="" id="" checked> yang sesuai
                                    <h4 class="form-header text-uppercase">
                                        <i class="fa fa-file-o"></i>
                                        E. RIWAYAT KEBIASAAN HIDUP
                                    </h4>
                                    <div class="form-group row" id="form4">
                                        <table  id="default-datatable" style="width: 100%;" class="styled-table">
                                            <thead> 
                                                <tr>
                                                    <td><strong>Jika Ada :</strong></td>
                                                    <td colspan="3">Keterangan</td>
                                                </tr>
                                            </thead> 
                                            <tbody>
                                                <tr>
                                                    <td><strong><h6>Minum alkohol </h6></strong></td>  
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="minum_alkohol" name="minum_alkoholx" value="" onclick="$('#minum_alkoholv').fadeOut('slow');$('#minum_alkoholl').fadeOut('slow');"/>
                                                            <label for="minum_alkohol">Tidak</label>
                                                        </div>
                                                    </td>
                                                    {{-- <td><input type="text" class="form-control"></td>   --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="minum_alkohol1" name="minum_alkoholx" value="1" onclick="$('#minum_alkoholv').fadeIn('slow');$('#minum_alkoholl').fadeOut('slow');"/>
                                                            <label for="minum_alkohol1">Kadang - Kadang</label>
                                                        </div>
                                                    </td>
                                                    <td colspan="3" rowspan="2"><textarea class="form-control" name="minum_alkohol"  id="minum_alkoholv" style="display: none;" cols="30" rows="3" value=""></textarea></td>  
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="minum_alkohol2" name="minum_alkoholx" value="2" onclick="$('#minum_alkoholv').fadeIn('slow');$('#minum_alkoholl').fadeOut('slow');"/>
                                                            <label for="minum_alkohol2">Rutin</label>
                                                        </div>
                                                    </td>
                                                    {{-- <td colspan="2"><input type="text" class="form-control" name="minum_alkohol" id="minum_alkoholl" style="display: none;"></td>   --}}
                                                </tr>
                                                <tr>
                                                    <td><strong><h6>Olahraga</h6></strong></td>  
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="olahraga" name="olahraga" value="" onclick="$('#demo3_22x').fadeOut('slow');$('#demo3_22x').fadeOut('slow');"/>
                                                            <label for="olahraga">Tidak</label>
                                                        </div>
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="oleharag1" name="olahraga" value="1" onclick="$('#demo3_22x').fadeOut('slow');$('#demo3_22x').fadeIn('slow');"/>
                                                            <label for="oleharag1">Kadang - Kadang</label>
                                                        </div>
                                                    </td>
                                                    {{-- <td colspan="2" rowspan="2"><textarea class="form-control" name="olahraga-1" id="olahraga-1" style="display: none;" cols="30" rows="3" value=""></textarea></td> --}}
                                                    <td colspan="3" id="demo3_22x"  style="display: none;"><input id="demo3_22" type="text" value="0" name="demo3_22"  style="display: none;"></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="oleharag2" name="olahraga" value="2" onclick="$('#demo3_22x').fadeOut('slow');$('#demo3_22x').fadeIn('slow');"/>
                                                            <label for="oleharag2">Rutin</label>
                                                        </div>
                                                    </td>
                                                    {{-- <td><input type="text" class="form-control" name="olahraga" id="olahraga-2" style="display: none;"></td>  
                                                    <td>kali/minggu</td> --}}
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-right">kali/minggu</td>
                                                </tr>
                                                <tr>
                                                    <td><strong><h6>Merokok </h6></strong></td>  
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="merokok1" name="merokok" value="" onclick="$('#merokok-2').fadeOut('slow');$('#merokok-1').fadeOut('slow');"/>
                                                            <label for="merokok1">Tidak</label>
                                                        </div>
                                                    </td>
                                                    {{-- <td><input type="text" class="form-control"></td>   --}}
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="merokok2" name="merokok" value="1" onclick="$('#demo3_22x1').fadeOut('slow');$('#demo3_22x1').fadeIn('slow');"/>
                                                            <label for="merokok2">Kada - Kadang</label>
                                                        </div>
                                                    </td>
                                                    <td colspan="3" id="demo3_22x1"  style="display: none;"><input id="demo3_22" type="text" value="0" name="demo3_22"  style="display: none;"></td>  
                                                    
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="merokok3" name="merokok" value="2" onclick="$('#demo3_22x1').fadeOut('slow');$('#demo3_22x1').fadeIn('slow');"/>
                                                            <label for="merokok3">Rutin</label>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-right">kali/minggu</td>
                                                    {{-- <td><input type="text" class="form-control" name="merokok" id="merokok-2" style="display: none;"></td>  
                                                    <td>kali/minggu</td> --}}
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group">
                                        <div class="icheck-material-success">
                                            <input type="checkbox" id="checkbox4" name="form4"/>
                                            <label for="checkbox4"> Centang Untuk Menyetujui</label>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                              
                                  Beri tanda pada data <input type="checkbox" name="" id="" checked> yang sesuai
                                    <h4 class="form-header text-uppercase">
                                        <i class="fa fa-file-o"></i>
                                        F. RIWAYAT KONSUMSI OBAT TERATUR
                                    </h4>
                                    <div class="form-group row" id="form5">
                                        <table  id="default-datatable" style="width: 100%;" class="styled-table">
                                            <thead> 
                                                <tr>
                                                    <td><strong>Jika Ada :</strong></td>
                                                    <td colspan="">Ya</td>
                                                    <td colspan="">Tidak</td>
                                                    <td colspan="">Keterangan</td>
                                                </tr>
                                            </thead> 
                                            <tbody>
                                                
                                                <tr>
                                                    <td>Obat anti Diabetes Millitus</td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="anti_diabetetsx" name="anti_diabetetsx" onclick="$('#anti_diabetets').fadeIn('slow');"/>
                                                            <label for="anti_diabetetsx"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="anti_diabetetsx1" name="anti_diabetetsx" onclick="$('#anti_diabetets').fadeOut('slow');"/>
                                                            <label for="anti_diabetetsx1"></label>
                                                        </div>
                                                    </td>
                                                    <td><input type="text" class="form-control" name="anti_diabetets" value="" id="anti_diabetets" style="display: none;"></td>
                                                </tr>
                                                <tr>
                                                    <td>Obat anti hypertensi</td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="anti_hypertensix" name="anti_hypertensix" onclick="$('#anti_hypertensi').fadeIn('slow');"/>
                                                            <label for="anti_hypertensix"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="anti_hypertensix1" name="anti_hypertensix" onclick="$('#anti_hypertensi').fadeOut('slow');"/>
                                                            <label for="anti_hypertensix1"></label>
                                                        </div>
                                                    </td>
                                                    <td><input type="text" class="form-control" name="anti_hypertensi" value="" id="anti_hypertensi" style="display: none;"></td>
                                                </tr>
                                                <tr>
                                                    <td>Obat lainnya</td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="obat_lainnyax" name="obat_lainnyax" onclick="$('#obat_lainnya').fadeIn('slow');"/>
                                                            <label for="obat_lainnyax"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="icheck-material-success">
                                                            <input type="radio" id="obat_lainnyax1" name="obat_lainnyax" onclick="$('#obat_lainnya').fadeOut('slow');"/>
                                                            <label for="obat_lainnyax1"></label>
                                                        </div>
                                                    </td>
                                                    <td><input type="text" class="form-control" name="obat_lainnya" value="" id="obat_lainnya" style="display: none;"></td>
                                                </tr>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group">
                                        <div class="icheck-material-success">
                                            <input type="checkbox" id="checkbox5" name="form5"/>
                                            <label for="checkbox5"> Centang Untuk Menyetujui</label>
                                        </div>
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-times"></i>
                                            CANCEL</button>
                                        <button type="button" class="btn btn-success" id="simpandataregsiter" data-url="{{ route('simpandataregsiter',[])}}"><i class="fa fa-check-square-o"></i> SAVE</button>
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Row-->
                <!--start overlay-->
                <div class="overlay toggle-menu"></div>
                <!--end overlay-->
            </form>
            </div>
            <!-- End container-fluid-->

        </div>
        <!--End content-wrapper-->
        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->

        <!--Start footer-->
        {{-- <footer class="footer">
            <div class="container">
                <div class="text-center">
                    Copyright © 2022
                </div>
            </div>
        </footer> --}}
        <!--End footer-->


    </div>
    <!--End wrapper-->


    <!-- Bootstrap core JavaScript-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- simplebar js -->
    <script src="assets/plugins/simplebar/js/simplebar.js"></script>
    <!-- horizontal-menu js -->
    <script src="assets/js/horizontal-menu.js"></script>

    <!-- Custom scripts -->
    <script src="assets/js/app-script.js"></script>

    <!--Form Validatin Script-->
    <script src="assets/plugins/jquery-validation/js/jquery.validate.min.js"></script>
    <script src="assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js"></script>
    <script src="assets/plugins/bootstrap-touchspin/js/bootstrap-touchspin-script.js"></script>
    <script>
        $().ready(function() {

            $("#personal-info").validate();

            // validate signup form on keyup and submit
            $("#signupForm").validate({
                rules: {
                    firstname: "required",
                    lastname: "required",
                    username: {
                        required: true,
                        minlength: 2
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    confirm_password: {
                        required: true,
                        minlength: 5,
                        equalTo: "#password"
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    contactnumber: {
                        required: true,
                        minlength: 10
                    },
                    topic: {
                        required: "#newsletter:checked",
                        minlength: 2
                    },
                    agree: "required"
                },
                messages: {
                    firstname: "Please enter your firstname",
                    lastname: "Please enter your lastname",
                    username: {
                        required: "Please enter a username",
                        minlength: "Your username must consist of at least 2 characters"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    confirm_password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long",
                        equalTo: "Please enter the same password as above"
                    },
                    email: "Please enter a valid email address",
                    contactnumber: "Please enter your 10 digit number",
                    agree: "Please accept our policy",
                    topic: "Please select at least 2 topics"
                }
            });

        });
    </script>

    <script>
        $(document).ready(function() {
            // let nextBtn = document.getElementById('next-btn');
            $(document).on('click', '#simpandataregsiter', function(e) {
                var data = $('#formregister').serialize();
                e.preventDefault();
                var url = $(this).data('url');

                var nama_pasien = $('#nama_pasien').val();
                var divisi = $('#divisi').val();
                var job = $('#job').val();
                var nik = $('#nik').val();
                var lokasi = $('#lokasi').val();
                var umur = $('#umur').val();
                var tgl = $('#tgl').val();
                var jeniskelamin = $('#jeniskelamin').val();
                var dokter_pemeriksaan = $('#dokter_pemeriksaan').val();
                
                $(".error").remove();
                if (nama_pasien.length < 1) {
                    $('#nama_pasien').after('<span style="color:red;" class="error">Harus Mengisi Nama Lengkap Terlebih dahulu.</span>');
                    alert('Isi Data Nama Lengkap ');
                }
                if (divisi.length < 1) {
                    $('#divisi').after('<span style="color:red;" class="error">Lengkapi Data Divisi Terlebih dahulu..</span>');
                    alert('Isi Data Divisi ');
                }
                if (job.length < 1) {
                    $('#job').after('<span style="color:red;" class="error">Lengkapi Data JOB Terlebih dahulu.</span>');
                    alert('Isi Data JOB ');
                }
                if (nik.length < 1) {
                    $('#nik').after('<span style="color:red;" class="error">Lengkapi Data Nomor Induk Terlebih dahulu.</span>');
                    alert('Isi Data Nomor Induk ');
                }
                if (lokasi.length < 1) {
                    $('#lokasi').after('<span style="color:red;" class="error">Lengkapi Data Lokasi Terlebih dahulu.</span>');
                    alert('Isi Data Lokasi ');
                }
                if (umur.length < 1) {
                    $('#umur').after('<span style="color:red;" class="error">Lengkapi Data Umur Terlebih dahulu.</span>');
                    alert('Isi Data Umur ');
                }
                if (tgl.length < 1) {
                    $('#tgl').after('<span style="color:red;" class="error">Lengkapi Data Tanggal Lahir Terlebih dahulu.</span>');
                    alert('Isi Data Tanggal Lahir ');
                }
                if (jeniskelamin.length < 1) {
                    $('#jeniskelamin').after('<span style="color:red;" class="error">Lengkapi Data Jenis Kelamin Terlebih dahulu.</span>');
                    alert('Isi Data Jenis Kelamin ');
                }
                if (dokter_pemeriksaan.length < 1) {
                    $('#dokter_pemeriksaan').after('<span style="color:red;" class="error">Lengkapi Data Dokter Pemeriksaan Terlebih dahulu.</span>');
                    alert('Isi Data Dokter Pemeriksaan ');
                }else{
                    $('#showdataregisterpasien').html("<img src='gif.gif'  style='display: block;border-radius: 50%;margin: auto;font-size: 10px;position: relative;text-indent: -9999em;transform: translateZ(0);'>");   
                    setTimeout(() => 
                    {

                        $.ajax({
                                url: url,
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')},
                                type: 'POST',
                                data: data,
                                dataType: 'html'
                            })
                            .done(function(data) {
                                $('#showdataregisterpasien').html(data);
                            })
                            .fail(function() {
                                $('#showdataregisterpasien').html(
                                    '<i class="fa fa-info-sign"></i> Ada Kesalahan Jaringan Mohon Ulang Halaman ini'
                                    );
                            });
                    
                    }, 2000);
                }
                // if ($('#radio:checked').length) {
                   
                // } else {
                //     console.log('belum cek');
                // }
               
            });
        });
    </script>

    <script>



        $(document).ready(function () {
        
            $('#checkbox1').change(function () {
                if (!this.checked) 
                //  ^
                $('#autoUpdate').fadeIn('slow');
                else 
                    $('#autoUpdate').fadeOut('slow');
            });
            $('#checkbox2').change(function () {
                if (!this.checked) 
                //  ^
                $('#form2').fadeIn('slow');
                else 
                    $('#form2').fadeOut('slow');
            });
            $('#checkbox3').change(function () {
                if (!this.checked) 
                //  ^
                $('#form3').fadeIn('slow');
                else 
                    $('#form3').fadeOut('slow');
            });
            $('#checkbox4').change(function () {
                if (!this.checked) 
                //  ^
                $('#form4').fadeIn('slow');
                else 
                    $('#form4').fadeOut('slow');
            });
            $('#checkbox5').change(function () {
                if (!this.checked) 
                //  ^
                $('#form5').fadeIn('slow');
                else 
                    $('#form5').fadeOut('slow');
            });
        });
    </script>
</body>

</html>
