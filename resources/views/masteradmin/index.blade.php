@extends('layouts.app')
@section('content')


    <div class="row pl-3 pt-2 pb-2" id="menumasteradminplus">

        <div class="col-sm-9">
            <h4 class="page-title">Data Master</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('masteradmin', []) }}">Master Data</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Master</li>
            </ol>
        </div>
        <div class="col-sm-3">
            <div class="btn-group float-sm-right">
                <button type="button" class="btn btn-light waves-effect waves-light">
                    <i class="fa fa-cog mr-1"></i> Pengaturan Data
                </button>
                <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split waves-effect waves-light"
                    data-toggle="dropdown">
                    <span class="caret"></span>
                </button>
                <div class="dropdown-menu">
                    @if (Auth::user()->akses == 'admin')
                        <a href="javaScript:void();" data-toggle="modal" data-target="#formdatamaster"
                            class="dropdown-item" id="buttondatacabang" data-url="{{ url('master/datacabang', []) }}"><i class="fa fa-file-text-o"></i> 1. Data Cabang</a>
                        <a href="javaScript:void();" data-toggle="modal" data-target="#formdatamaster"
                            class="dropdown-item" id="buttondatalokasi" data-url="{{ url('master/datalokasi', []) }}"><i class="fa fa-file-text-o"></i> 2. Data Lokasi</a>
                        <a href="javaScript:void();" data-toggle="modal" data-target="#formdatamaster"
                            class="dropdown-item" id="buttondataklasifikasi" data-url="{{ url('master/dataklasifikasi', []) }}"><i class="fa fa-file-text-o"></i> 4. Data Klasifikasi</a>
                    @else
                    @endif

                </div>
            </div>
        </div>
    </div>
    <div class="body">
        @if ($message = Session::get('sukses'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <div class="alert-icon">
                <i class="fa fa-check"></i>
                </div>
                <div class="alert-message">
                <span><strong>{{ $message }}</strong> This is a success alert—check it out!</span>
                </div>
            </div>
        @endif
    </div>
    <div class="body" id="showdatamaster">
        <div class="row pl-3 pt-2 pb-2" >


                    @foreach ($data as $data)

                    <div class="col-12 col-lg-3 col-xl-3">

                        <div class="card rounded-0 gradient-smile">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <p class="mb-0 font-weight-bold text-white text-uppercase">Cabang {{$data->nama_cabang}}</p>
                                    </div>
                                    <a  class="dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert fa-2x text-white"></i>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a href="javaScript:void();" class="dropdown-item" id="userbarucabang" data-url="{{ url('master/datauser', ['id'=>$data->kd_cabang]) }}"><i class="fa fa-file-text-o"></i> Input User Baru</a>
                                        {{-- <a href="javaScript:void();" class="dropdown-item" id="lokasibarucabang" data-url="{{ url('master/datalokasi', ['id'=>$data->kd_cabang]) }}"><i class="fa fa-file-text-o"></i> Data Lokasi</a>
                                        <a href="javaScript:void();" class="dropdown-item" id="datainventarsicabang" data-url="{{ url('master/datainventaris', ['id'=>$data->kd_cabang]) }}"><i class="fa fa-file-text-o"></i> Data Inventaris</a>
                                        <a href="javaScript:void();" class="dropdown-item" id="datapeminjamancabang" data-url="{{ url('master/datapeminjaman', ['id'=>$data->kd_cabang]) }}"><i class="fa fa-file-text-o"></i> Data Peminjaman</a>
                                        <a href="javaScript:void();" class="dropdown-item" id="datamutasicabang" data-url="{{ url('master/datamutasi', ['id'=>$data->kd_cabang]) }}"><i class="fa fa-file-text-o"></i> Data Mutasi</a>
                                        <a href="javaScript:void();" class="dropdown-item" id="datapemusnahancabang" data-url="{{ url('master/datapemusnahan', ['id'=>$data->kd_cabang]) }}"><i class="fa fa-file-text-o"></i> Data Pemusnahan</a> --}}
                                    </div>
                                </div>
                                <div class="btn-toolbar mt-2" role="toolbar">

                                    <div class="btn-group mr-1">
                                        <button type="button" class="btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-folder"></i>
                                        <b class="caret"></b>
                                        </button>
                                        <div class="dropdown-menu">
                                            {{-- <a href="javaScript:void();" class="dropdown-item" id="userbarucabang" data-url="{{ url('master/datauser', ['id'=>$data->kd_cabang]) }}"><i class="fa fa-file-text-o"></i> Input User Baru</a> --}}
                                            <a href="javaScript:void();" class="dropdown-item" id="lokasibarucabang" data-url="{{ url('master/datalokasi', ['id'=>$data->kd_cabang]) }}"><i class="fa fa-file-text-o"></i> Data Lokasi</a>
                                            <a href="javaScript:void();" class="dropdown-item" id="datainventarsicabang" data-url="{{ url('master/datainventaris', ['id'=>$data->kd_cabang]) }}"><i class="fa fa-file-text-o"></i> Data Inventaris</a>
                                            <a href="javaScript:void();" class="dropdown-item" id="datapeminjamancabang" data-url="{{ url('master/datapeminjaman', ['id'=>$data->kd_cabang]) }}"><i class="fa fa-file-text-o"></i> Data Peminjaman</a>
                                            <a href="javaScript:void();" class="dropdown-item" id="datamutasicabang" data-url="{{ url('master/datamutasi', ['id'=>$data->kd_cabang]) }}"><i class="fa fa-file-text-o"></i> Data Mutasi</a>
                                            <a href="javaScript:void();" class="dropdown-item" id="datapemusnahancabang" data-url="{{ url('master/datapemusnahan', ['id'=>$data->kd_cabang]) }}"><i class="fa fa-file-text-o"></i> Data Pemusnahan</a>
                                          <div class="dropdown-divider"></div>
                                          <a href="javaScript:void();" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>
                                    <div class="btn-group mr-1">
                                        <button type="button" class="btn-success waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-upload"></i>
                                        <b class="caret"></b>
                                        </button>
                                        <div class="dropdown-menu">
                                          <a href="javaScript:void();" class="dropdown-item" data-toggle="modal" id="buttonuploaddatainventaris" data-target="#upload-data-inventaris" data-id="{{$data->kd_cabang}}"><i class="fa fa-upload"></i> Upload Data Inventaris</a>
                                          <a href="{{ url('masterinjekupdate', ['id'=>$data->kd_cabang]) }}" class="dropdown-item" >Update Data Inventaris</a>
                                          <a href="javaScript:void();" class="dropdown-item">Something else here</a>
                                          <div class="dropdown-divider"></div>
                                          <a href="javaScript:void();" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                                    <div class="btn-group">
                                        <button type="button" class="btn-danger waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                          More
                                          <span class="caret"></span>
                                        </button>
                                        <div class="dropdown-menu">
                                          <a href="javaScript:void();" class="dropdown-item">Action</a>
                                          <a href="javaScript:void();" class="dropdown-item">Another action</a>
                                          <a href="javaScript:void();" class="dropdown-item">Something else here</a>
                                          <div class="dropdown-divider"></div>
                                          <a href="#" class="dropdown-item" data-toggle="modal" id="master-data-cabang" data-target="#hapusdatacabang" data-cabang="{{$data->kd_cabang}}"><i class="fa fa-trash"></i> Hapus Permanent</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="media align-items-center mt-2">
                                    <i class="zmdi zmdi-long-arrow-up mr-2 fa-2x text-white"></i>
                                    <div class="media-body">
                                        @php
                                            $jumlahbarang = DB::table('sub_tbl_inventory')
                                            ->where('kd_cabang',$data->kd_cabang)
                                            ->count();
                                        @endphp
                                        <h5 class="mb-0 text-white">{{$jumlahbarang}}</h5>
                                    </div>
                                    <small class="extra-small-font text-white">77%</small>
                                </div>
                                <div class="progress-wrapper mt-2">
                                    <p class="mb-0 font-weight-bold text-white text-uppercase">City : {{$data->city}}<br> Alamat : {{$data->alamat}}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach
                {{-- </div> --}}

        </div>
    </div>

    <div class="modal fade" id="upload-data-inventaris">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content animated fadeInUp">
            <div class="modal-header">
              <h5 class="modal-title">Upload Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

                <form action="{{ url('master/datainventaris/simpandetailbarang', []) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <input type="file" name="file" id="file" class="form-control" required>
                <input type="text" name="kdcabang" id="kdcabang"  hidden>


            <div class="modal-footer">
                <button type="button" class="btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                <button type="submit" class="btn-success"><i class="fa fa-check-square-o"></i> Upload Excel1</button>
            </div>
        </form>

          </div>
        </div>
    </div>

    <div class="modal fade" id="tambahdatauser">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content border-success">
            <div class="modal-header bg-success">
              <h5 class="modal-title text-white">Add Account</h5>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST" id="formuserbaru">
                @csrf
            <div class="modal-body">

                    <div class="row">
                        <div class="col-12">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="name" autocomplete="name" autofocus>
                            <input type="text" id="id" name="id" class="form-control" autocomplete="id" autofocus hidden>
                        </div>
                        <div class="col-12">
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="username" autocomplete="username" autofocus>
                        </div>
                        <div class="col-12">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email" autocomplete="email" autofocus>
                        </div>
                        <div class="col-12">
                            <label for="">Akses</label>
                            <select name="akses" class="form-control">
                                <option value="">Pilih Akses</option>
                                <option value="sdm">SDM</option>
                                <option value="keu">Keuangan</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" autocomplete="password" autofocus>
                        </div>
                        {{-- <div class="col-12">
                            <label for="">Confrim Password</label>
                            <input type="password" class="form-control" name="confrimpassword">
                        </div> --}}
                    </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
              <button type="button" class="btn btn-success" data-dismiss="modal" id="simpanbaruuser" data-url="{{ url('master/datauser/proses/tambah', ['id'=>123]) }}" ><i class="fa fa-check-square-o"></i> Simpan</button>
            </div>
        </form>
          </div>
        </div>
    </div>

    <div class="modal fade" id="editdatauser">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content border-success">
            <div class="modal-header bg-success">
              <h5 class="modal-title text-white">Edit User</h5>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST" id="formueditserbaru">
                @csrf
            <div class="modal-body">

                    <div class="row">
                        <div class="col-12">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="name" id="name" autocomplete="name" autofocus>
                            <input type="text" id="kd_cabang" name="kd_cabang" class="form-control" autocomplete="kd_cabang" autofocus hidden>
                            <input type="text" id="id_user" name="id_user" class="form-control" autocomplete="id_user" autofocus hidden>
                        </div>
                        <div class="col-12">
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="username" id="username" autocomplete="username" autofocus>
                        </div>
                        <div class="col-12">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" id="email_" autocomplete="email" autofocus>
                        </div>
                        <div class="col-12">
                            <label for="">Akses</label>
                            <select name="akses" class="form-control" id="akses">
                                <option value="">Pilih Akses</option>
                                <option value="sdm">SDM</option>
                                <option value="keu">Keuangan</option>
                            </select>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                <button type="button" class="btn btn-success" data-dismiss="modal" id="simpanedituser" data-url="{{ url('master/datauser/proses/edit', []) }}"><i class="fa fa-check-square-o"></i> Simpan</button>
            </div>
        </form>
          </div>
        </div>
    </div>

    <div class="modal fade" id="resetpassworddatauserx">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content border-warning">
            <div class="modal-header bg-warning">
              <h5 class="modal-title text-white">Reset password User</h5>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST" id="formresetuserbaru">
                @csrf
            <div class="modal-body">

                    <div class="row">
                        <div class="col-12">

                            <input type="text" id="kd_cabang1" name="kd_cabang1" class="form-control" autocomplete="kd_cabang1" autofocus hidden>
                            <input type="text" id="id_user1" name="id_user1" class="form-control" autocomplete="id_user1" autofocus hidden>
                        </div>
                        <div class="col-12">
                            <label for="">Keterangan</label>
                            <textarea name="keterangan" id="" cols="30" rows="10" class="form-control" autocomplete="username" autofocus></textarea>
                        </div>

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal" id="simpanresetpassworduser" data-url="{{ url('master/datauser/proses/reset', []) }}"><i class="fa fa-key"></i> Reset Password</button>
            </div>
        </form>
          </div>
        </div>
    </div>

    <div class="modal fade" id="hapusdatauserx">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content border-danger">
            <div class="modal-header bg-danger">
              <h5 class="modal-title text-white">Hapus Data User</h5>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST" id="formhapususer">
                @csrf
            <div class="modal-body">

                    <div class="row">
                        <div class="col-12">
                            <input type="text" id="kd_cabang2" name="kd_cabang2" class="form-control" autocomplete="kd_cabang2" autofocus hidden>
                            <input type="text" id="id_user2" name="id_user2" class="form-control" autocomplete="id_user2" autofocus hidden>
                        </div>
                        <div class="col-12">
                            <label for="">Yakin Untuk Menghapus Data User</label>
                        </div>

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="simpanhapusdatauser" data-url="{{ url('master/datauser/proses/hapus', []) }}"><i class="fa fa-trash"></i> Hapus Data</button>
            </div>
        </form>
          </div>
        </div>
    </div>

    <div class="modal fade" id="hapusdatacabang">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content border-danger">
            <div class="modal-header bg-danger">
              <h5 class="modal-title text-white">Hapus Data Cabang</h5>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ url('master/datacabang/deletedatacabang', []) }}" method="POST" >
                @csrf
            <div class="modal-body">

                    <div class="row">
                        <div class="col-12">
                            <input type="text" id="kd_cabang3" name="kd_cabang3" class="form-control" autocomplete="kd_cabang3" autofocus hidden>
                        </div>
                        <div class="col-12">
                            <label for="">Yakin Untuk Menghapus Data User</label>
                        </div>

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                <button type="submit" class="btn btn-danger" ><i class="fa fa-trash"></i> Hapus Data</button>
            </div>
        </form>
          </div>
        </div>
    </div>

    <div class="modal fade" id="formdatamaster">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content border-danger" id="bodyformdatamaster">



          </div>
        </div>
    </div>

@endsection
