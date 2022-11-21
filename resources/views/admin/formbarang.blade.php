@extends('layouts.app')

@section('content')

    <div class="row pt-1 pb-1">
        <div class="col-sm-9">
            <div class="card gradient-warning rounded-0" style="margin-bottom: 0px;">
              <div class="card-body p-1">
                <div class="media align-items-center bg-white p-2">
                  <div class="media-body">
                    
                   <div class="row">
                      <div class="col-4">
                        <select class="form-control single-selectkode" name="kd_lokasi" aria-placeholder="PAPAA">
                            <option>Pilih Kategori</option>
                          
                        </select>
                      </div>
                      <div class="col-4">
                        <select class="form-control single-selectkode" name="kd_lokasi">
                            <option>Nama Barang</option>
                          
                        </select>
                      </div>
                      <div class="col-3">
                        <select class="form-control single-selectkode" name="kd_lokasi">
                            <option>Pilih Lokasi</option>
                          
                        </select>
                      </div>
                      
                   </div>
                    {{-- <h5 class="mb-0 text-dark">{{auth::user()->name}}</h5> --}}
                    
                  </div>
                  <div class="w-icon">
                    <button>
                    <i class="zmdi zmdi-search text-gradient-warning"></i></button>
                  </div>
                </div>
              </div>
            </div>
          
        </div>
        <div class="col-sm-3">
            <div class="btn-group float-sm-right">
                <button type="button" class="btn btn-light waves-effect waves-light" >
                <i class="fa fa-upload mr-1"></i> Upload Data
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
                        
                        <a href="javaScript:void();" data-toggle="modal" data-target="#upload-detail-barang" class="dropdown-item" ><i class="fa fa-file-text-o"></i> 3. Upload Excel Detail Barang</a>
                        {{-- <a href="javaScript:void();" data-toggle="modal" data-target="#upload-peserta" class="dropdown-item" ><i class="fa fa-file-text-o"></i> 3. Upload Peserta</a> --}}
                         
                         
                    </div>
            </div>
        </div>
    </div>
    <br>
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
              <div class="table-responsive">
              <table id="default-datatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Ururt Barang</th>
                        <th>kode Inventaris</th>
                    
                        <th>Kategori Barang</th>
                        <th>Nama Kelompok Barang</th>
                        <th>Jumlah Barang</th>
                        <th class="text-center">Action</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; $total = 0;?>
                    @foreach ($data as $item)  
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item->no_urut_barang}}</td>
                        <td>{{$item->kd_inventaris}}</td>
                  
                        <td>{{$item->kategori_barang}}</td>
                        <td>{{$item->nama_barang}}</td>
                        <?php
                        $jumlah = DB::table('sub_tbl_inventory')
                        ->where('kd_inventaris',$item->kd_inventaris)
                        ->where('kd_cabang',auth::user()->akses)
                        ->count(); 
                        ?>
                        <td>{{$jumlah}}</td>
                     
                        <td class="text-center"><a href="" data-toggle="modal" data-target="#lihat-detail-barang" class="btn btn-info" id="lihatdatabarang" data-url="{{ route('lihatdatabarang',['id' => $item->kd_inventaris])}}"><i class="fa fa-eye"> Lihat data</i> </a></td>
                       
                    </tr>
                    <?php $total = $total + $jumlah; ?>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4"></th>
                        
                        <th>Total Baranng</th>
                        <th>{{$total}}</th>
                        <th class="text-center"></th>
                    </tr>
                </tfoot>
            </table>
            </div>
            </div>
          </div>
        </div>
    </div>
      
    <div class="modal fade" id="modal-animation-14">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content animated fadeInUp">
            <div class="modal-header">
              <h5 class="modal-title">Upload Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ url('simpanjenisbarang', []) }}" method="POST" name="importform" enctype="multipart/form-data">
                @csrf
                <div class="rwo">
                    <div class="form-group">
                        <input type="file" name="file" id="file" class="form-control" id="">
                    </div>
                </div>
               
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
              <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Upload Excel</button>
            </div>
        </form>
          </div>
        </div>
    </div>  

    <div class="modal fade" id="upload-detail-barang">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content animated fadeInUp">
            <div class="modal-header">
              <h5 class="modal-title">Upload Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('simpandatapeserta', []) }}" method="POST" name="importform" enctype="multipart/form-data">
                    @csrf
                <div class="rwo">
                    <div class="form-group">
                        <input type="file" name="file" id="file" class="form-control">
                    </div>
                </div>
               
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
              <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Upload Excel</button>
            </div>
            </form>
          </div>
        </div>
    </div>
    <div class="modal fade" id="upload-lokasi-barang">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content animated fadeInUp">
            <div class="modal-header">
              <h5 class="modal-title">Upload Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('simpanlokasi', []) }}" method="POST" name="importform" enctype="multipart/form-data">
                    @csrf
                <div class="rwo">
                    <div class="form-group">
                        <input type="file" name="file" id="file" class="form-control">
                    </div>
                </div>
               
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
              <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Upload Excel</button>
            </div>
            </form>
          </div>
        </div>
    </div>
    <div class="modal fade" id="upload-no_urut-barang">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content animated fadeInUp">
            <div class="modal-header">
              <h5 class="modal-title">Upload Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('simpannourutbarang', []) }}" method="POST" name="importform" enctype="multipart/form-data">
                    @csrf
                <div class="rwo">
                    <div class="form-group">
                        <input type="file" name="file" id="file" class="form-control">
                    </div>
                </div>
               
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
              <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Upload Excel</button>
            </div>
            </form>
          </div>
        </div>
    </div>
    <div class="modal fade" id="upload-peserta">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content animated fadeInUp">
            <div class="modal-header">
              <h5 class="modal-title">Upload Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('simpanpeserta', []) }}" method="POST" name="importform" enctype="multipart/form-data">
                    @csrf
                <div class="rwo">
                    <div class="form-group">
                        <input type="file" name="file" id="file" class="form-control">
                    </div>
                </div>
               
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
              <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Upload Excel</button>
            </div>
            </form>
          </div>
        </div>
    </div>

    <div class="modal fade" id="lihat-detail-barang">
        <div class="modal-dialog modal-dialog-centered modal-xl" style="width: 100%;">
            <div class="modal-content">
             <div id="showdatabarang">
                <div class="modal-body">
                </div>
                </div>
            </div>
          </div>
    </div>
    
    
@endsection