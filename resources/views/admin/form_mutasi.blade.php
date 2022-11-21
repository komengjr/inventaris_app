@extends('layouts.app')

@section('content')

    <div class="row pl-3 pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Data Mutasi Barang</h4>
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
                  <li class="breadcrumb-item"><a href="javaScript:void();">Master Data</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Mutasi</li>
              </ol>
        </div>
        <div class="col-sm-3">
            <div class="btn-group float-sm-right">
                <button type="button" class="btn btn-light waves-effect waves-light" >
                <i class="fa fa-upload mr-1"></i> Tambah Data
                </button>
                <button
                type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split waves-effect waves-light"  data-toggle="dropdown" >
                <span class="caret"></span>
                </button>
                    <div class="dropdown-menu">
                    @if (auth::user()->akses == 'admin')
                    <a href="javaScript:void();" data-toggle="modal" data-target="#upload-no_urut-barang" class="dropdown-item" ><i class="fa fa-file-text-o"></i> 1. Upload Excel No Urut Klasifikasi</a>  
                    <a href="javaScript:void();" data-toggle="modal" data-target="#modal-animation-14" class="dropdown-item"><i class="fa fa-file-text-o"></i> 2. Upload Excel Klasifikasi Barang</a>
                    <a href="javaScript:void();" data-toggle="modal" data-target="#upload-lokasi-barang" class="dropdown-item" ><i class="fa fa-file-text-o"></i> 4. Upload Excel Lokasi</a> 
                    @else
                        
                    @endif
                        
                        <a href="javaScript:void();" data-toggle="modal" data-target="#tambahdatabaru" class="dropdown-item" ><i class="fa fa-file-text-o"></i> Input Data Baru</a>
                        {{-- <a href="javaScript:void();" data-toggle="modal" data-target="#upload-peserta" class="dropdown-item" ><i class="fa fa-file-text-o"></i> 3. Upload Peserta</a> --}}
                        
                        
                    </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
        @if ($message = Session::get('sukses'))
            <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="card">
        
            <div class="card-body">
            <div class="table-responsive" id="showdatamutasi">
            <table id="default-datatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Mutasi</th>
                        <th>Tanggal Buat</th>                  
                        <th>Pembuat Mutasi</th>
                        <th>Jenis Mutasi</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                @foreach ($data as $data)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->kd_mutasi}}</td>
                        <td>{{$data->tanggal_buat}}</td>
                        <td>{{$data->penanggung_jawab}}</td>
                        @if ($data->jenis_mutasi == 1)
                            <td>Penempatan</td>
                        @elseif($data->jenis_mutasi == 2)
                            <td>Penarikan</td>
                        @elseif($data->jenis_mutasi == 3)
                            <td>Mutasi Antar Bagian</td>
                        @elseif($data->jenis_mutasi == 4)
                            <td>Mutasi Antar Cabang</td>  
                        @endif
                        
                        @if ($data->ket == 1)
                            <td class="text-center"><button class="btn btn-info btn-sm" disabled><i class="fa fa-spinner"> Prosess</i></button></td>
                        @elseif($data->ket == 2)
                            <td class="text-center"><button class="btn btn-info btn-sm" disabled><i class="fa fa-spinner"> Menunggu Perstujuan</i></button></td>
                        @else
                            
                        @endif
                        <td class="text-center"><button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#tambahbarangbaru" id="tambahbarangbarux" data-url="{{ route('tampilformmuitasi',['id' => $data->id_mutasi])}}"><i class="fa fa-pencil"> Lengkapi Data</i></button></td>
                    </tr>
                @endforeach
                </tbody>
        
            </table>
            </div>
            </div>
        </div>
        </div>
    </div>

    <div class="modal fade" id="tambahdatabaru">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content animated fadeInUp ">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Data Tambah</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form  method="POST" id="form-data-mutasi" name="importform" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="">No Kode Mutasi</label>
                        <input type="text" class="form-control" name="no_mutasi">
                    </div>
                    <div class="col-md-6">
                        <label for="">Jenis Mutasi</label>
                        <select class="form-control single-selectkode" name="jenis_mutasi" id="greet1x" onchange="getOption1x()">
                            <option value="">Pilih Jenis Mutasi</option>
                            <option value="1">Penempatan</option>
                            <option value="2">Penarikan</option>
                            <option value="3">Mutasi Antar Bagian</option>
                            <option value="4">Mutasi Antar Cabang</option>
                        </select>
                    </div>
                   
                    <div class="col-md-12" id="jenis_mutasi">
                              
                    </div>
                 
                   
                    <div class="col-md-6">
                        <label for="">Departemen</label>
                        <input type="text" class="form-control" name="departemen" id="departemen">
                    </div>
                    <div class="col-md-6">
                        <label for="">Divisi</label>
                        <input type="text" class="form-control" name="divisi" id="divisi">
                    </div>
                    <div class="col-md-6">
                        <label for="">Penanggung Jawab</label>
                        <input type="text" class="form-control" name="pj" id="pj">
                    </div>
                    <div class="col-md-6">
                        <label for="">Penerima</label>
                        <input type="text" class="form-control" name="penerima" id="penerima">
                    </div>
                    <div class="col-md-6">
                        <label for="">Menyetujui</label>
                        <input type="text" class="form-control" name="menyetujui" id="menyetujui">
                    </div>
                    <div class="col-md-6">
                        <label for="">Yang Menyerahkan</label>
                        <input type="text" class="form-control" name="ym" id="ym">
                    </div>
                </div>
               
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
              <button type="button" class="btn btn-success"  id="show-data-mutasi" data-url="{{ route('inputdatamutasibaru',[])}}"><i class="fa fa-check-square-o"></i> Buat Data</button>
            </div>
        </form>
          </div>
        </div>
    </div> 
    <div class="modal fade" id="tambahbarangbaru">
        <div class="modal-dialog modal-dialog-centered modal-xl">
          <div class="modal-content animated fadeInUp modal-xl">
            <div class="modal-header">
              <h5 class="modal-title"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <div id="tampildatabaru">

             </div>
              
           
          </div>
        </div>
    </div> 
@endsection