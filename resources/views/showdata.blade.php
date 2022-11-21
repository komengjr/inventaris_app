<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pramita - Data Barang</title>
    <!--favicon-->
    <link rel="icon" href="{{ url('icon.png', []) }}" type="image/x-icon">
    <!-- simplebar CSS-->
    <link href="{{ url('assets/plugins/simplebar/css/simplebar.css', []) }}" rel="stylesheet" />
    <link href="{{ url('assets/plugins/fancybox/css/jquery.fancybox.min.css', []) }}" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap core CSS-->
    <link href="{{ url('assets/css/bootstrap.min.css', []) }}" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="{{ url('assets/css/animate.css', []) }}" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="{{ url('assets/css/icons.css', []) }}" rel="stylesheet" type="text/css" />
    <!-- Horizontal menu CSS-->
    <link href="{{ url('assets/css/horizontal-menu.css', []) }}" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="{{ url('assets/css/app-style.css', []) }}" rel="stylesheet" />

    <style>
        @import url('https://fonts.google.com/specimen/Poppins');
        body{
            font-family: Poppins;
            letter-spacing: 3px;
        }
        h2{
            color: rgb(52, 36, 36);
        }
        input{
            letter-spacing: 3px;
        }

    </style>

</head>

<body>

    <!-- start loader -->
    
    <!-- end loader -->

    <!-- Start wrapper-->
    <div id="wrapper">

        <!--Start topbar header-->
      
        <!--End topbar header-->

        <!-- start horizontal Menu -->
      
        <!-- end horizontal Menu -->

        <div class="clearfix"></div>

        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumb-->
                <div class="row pt-2 pb-2">
               
                   
                </div>
                <!-- End Breadcrumb-->
                <div class="card">
                    <div class="card-body">
                        <!-- Content Header (Page header) -->
                        <section class="content-header">
                            <div class="row">
                                <div class="col-5"><img src="{{ url('logo.png', []) }}" alt="" width="300"></div>
                                {{-- <div class="col-7 text-center">
                                    <div class="card gradient-warning rounded-2 text-center" style="margin-bottom: 2px;">
                                        <div class="card-body p-1 ">
                                        <div class="media align-items-center bg-white p-2">
                                            <h2 class="">Data Barang Inventaris</h2>
                                        </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </section>

                        <!-- Main content -->
                        <section class="invoice">
                            <!-- title row -->
                            

                            <hr>
                            <div class="row">
                                
                                <div class="col-sm-2 ">
                                    
                                   
                                        @if ($data[0]->gambar == "")
                                        <a href="https://via.placeholder.com/1920x1080"  data-fancybox="images" data-caption="Kosong" >
                                            <img src="https://via.placeholder.com/800x500" alt="lightbox" class="lightbox-thumb img-thumbnail" id="videoPreview"  width="50" height="50">
                                        </a>
                                        @else
                                        <a href="{{ url($data[0]->gambar, []) }}"  data-fancybox="images" data-caption="{{$data[0]->nama_barang}} : {{$data[0]->no_urut_barang}}/{{$data[0]->kd_lokasi}}/P.{{$data[0]->kd_cabang}}/{{$data[0]->th_pembuatan}}" >
                                            <img src="{{ url($data[0]->gambar, []) }}" alt="lightbox" class="lightbox-thumb img-thumbnail" id="videoPreview"  width="50" height="50">
                                        </a>
                                        @endif
                                       
                                   
                                </div><!-- /.col -->
                                <div class="col-sm-5">
                                   <label for="">Kode Induk - Nama Kategori</label>
                                   <input type="text" class="form-control" value="{{$data[0]->no_urut_barang}} - {{$data[0]->kategori_barang}}" disabled>
                                   <label for="">Kode Klasifikasi</label>
                                   <input type="text" class="form-control" value="{{$data[0]->kd_inventaris}}" disabled>
                                   <label for="">Kode Lokasi</label>
                                   <input type="text" class="form-control" value="{{$data[0]->kd_lokasi}}" disabled>
                                   
                                </div><!-- /.col -->
                                <div class="col-sm-5">
                                    <label for="">Nama Barang</label>
                                    <input type="text" class="form-control" value="{{$data[0]->nama_barang}}" disabled>
                                    <label for="">Lokasi Barang</label>
                                    <input type="text" class="form-control" value="{{$data[0]->nama_lokasi}}" disabled>
                                    <label for="">Kode Cabang</label>
                                    <input type="text" class="form-control" value="{{$data[0]->kd_cabang}}" disabled>
                                </div><!-- /.col -->
                            </div><!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                
                                   
                                        <div class="col-md-4">
                                            <label for="inputPassword4" class="form-label">Tahun Perolehan</label>
                                            <input type="text" name="th_perolehan" class="form-control" value="{{$data[0]->th_perolehan}}" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputPassword4" class="form-label">Merek</label>
                                            <input type="text" name="merk" class="form-control" value="{{$data[0]->merk}}" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputPassword4" class="form-label">Type Barang</label>
                                            <input type="text" name="type" class="form-control"  value="{{$data[0]->type}}" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputPassword4" class="form-label">Nomor Serial</label>
                                            <input type="text" name="no_seri" class="form-control"  value="{{$data[0]->no_seri}}" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputPassword4" class="form-label">Supplier</label>
                                            <input type="text" name="suplier" class="form-control" value="{{$data[0]->suplier}}" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputPassword4" class="form-label">Harga Perolehan</label>
                                            <input type="text" name="harga_perolehan" class="form-control" value="{{$data[0]->harga_perolehan}}" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputPassword4" class="form-label">Tanggal Mutasi</label>
                                            <input type="date" name="tgl_mutasi" class="form-control" value="{{$data[0]->tgl_mutasi}}" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputPassword4" class="form-label">Tujuan Mutasi</label>
                                            <input type="text" name="tujuan_mutasi" class="form-control" value="{{$data[0]->tujuan_mutasi}}" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputPassword4" class="form-label">Nilai Buku</label>
                                            <input type="text" name="nilai_buku" class="form-control" value="{{$data[0]->nilai_buku}}" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputPassword4" class="form-label">Tanggal Musnah</label>
                                            <input type="date" name="tgl_musnah" class="form-control" value="{{$data[0]->tgl_musnah}}" disabled>
                                        </div>
                                    
                                        <div class="col-md-4">
                                            <label for="inputPassword4" class="form-label">Kondisi Barang</label>
                                            <input type="text" name="kondisi_barang" class="form-control" value="{{$data[0]->kondisi_barang}}" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inputPassword4" class="form-label">Jam Input</label>
                                            <input type="time" name="jam_input" class="form-control" value="" value="{{$data[0]->jam_input}}" disabled>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputPassword4" class="form-label">Keterangan Musnah</label>
                                            <textarea name="ket_musnah" class="form-control" id="" cols="10" rows="2" disabled>{{$data[0]->ket_musnah}}</textarea>
                                        </div>
                        
                                    
                                
                            </div><!-- /.row -->

                            <div class="row">
                                <!-- accepted payments column -->
                               
                            </div><!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <hr>
                            <div class="row no-print">
                                <div class="col-lg-3">
                                    {{-- <a href="javascript:window.print();" target="_blank" class="btn btn-dark m-1"><i
                                            class="fa fa-print"></i> Print Barcode</a> --}}
                                </div>
                                <div class="col-lg-9">
                                    <div class="float-sm-right">
                                        {{-- <button class="btn btn-success m-1"><i class="fa fa-credit-card"></i> Submit
                                            Payment</button> --}}
                                            <a href="javascript:window.print();" target="_blank" class="btn btn-dark m-1"><i
                                                class="fa fa-print"></i> Print Barcode</a>
                                    </div>
                                </div>
                            </div>
                        </section><!-- /.content -->
                    </div>
                </div>
                <!--start overlay-->
                <div class="overlay toggle-menu"></div>
                <!--end overlay-->
            </div>
            <!-- End container-fluid-->

        </div>
        <!--End content-wrapper-->
        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->

        <!--Start footer-->
 
        <!--End footer-->


    </div>
    <!--End wrapper-->


    <!-- Bootstrap core JavaScript-->
    <script src="{{ url('assets/js/jquery.min.js', []) }}"></script>
    <script src="{{ url('assets/js/popper.min.js', []) }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js', []) }}"></script>

    <!-- simplebar js -->
    <script src="{{ url('assets/plugins/simplebar/js/simplebar.js', []) }}"></script>
    <!-- horizontal-menu js -->
    <script src="{{ url('assets/js/horizontal-menu.js', []) }}"></script>

    <!-- Custom scripts -->
    <script src="{{ url('assets/js/app-script.js', []) }}"></script>
    <script src="{{ url('assets/plugins/fancybox/js/jquery.fancybox.min.js', []) }}"></script>

</body>

</html>
