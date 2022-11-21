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
        <div class="table-responsive" id="showdatamusnah">
            <table id="default-datatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Surat</th>
                        <th>Tanggal Buat</th>                  
                        <th>Penggagas</th>
                        <th>Verifikasi</th>
                        <th>Persetujuan</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($data as $data)
                    <tr>
                        <td>1</td>
                        <td>{{$data->no_surat}}</td>
                        <td>{{$data->tgl_buat}}</td>
                        <td>{{$data->penggagas}}</td>
                        <td>{{$data->user_verifikasi}}</td>
                        <td>{{$data->user_persetujuan}}</td>
                        <td class="text-center"><button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#showdatamusnahxx" id="showdatamusnah123" data-url="{{ route('xxshowdatamusnah',['id' => $data->id_musnah])}}"><i class="fa fa-pencil"> Input Barang</i></button></td>
                    </tr>
                @endforeach
                </tbody>
        
            </table>
        </div>
        </div>
    </div>
    </div>
</div>

<div class="modal fade" id="tambahdatamusnah">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content animated fadeInUp ">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form  method="POST" id="form-data-musnah" name="importform" enctype="multipart/form-data">
            @csrf
            <div class="row">
                {{-- <div class="col-md-6">
                    <label for="">No Surat Pemusnahaan</label>
                    <input type="text" class="form-control" name="no_musnah">
                </div> --}}
                <div class="col-md-6">
                    <label for="">Dasar Pengajuan</label>
                    <input type="text" class="form-control" name="dasar_pengajuan">
                </div>
              
                <div class="col-md-6">
                    <label for="">Penggagas</label>
                    <input type="text" class="form-control" name="penggagas">
                </div>
                <div class="col-md-6">
                    <label for="">User Verifikasi</label>
                    <input type="text" class="form-control" name="user_verifikasi">
                </div>
                <div class="col-md-6">
                    <label for="">User Persetujuan</label>
                    <input type="text" class="form-control" name="user_persetujuan">
                </div>
                <div class="col-md-6">
                    <label for="">Pelaksana Eksekusi</label>
                    <input type="text" class="form-control" name="user_eksekusi">
                </div>
                <div class="col-md-6">
                    <label for="">Tanggal</label>
                    <input type="date" class="form-control" name="tgl_buat">
                </div>
               
            </div>
           
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
          <button type="button" class="btn btn-success" data-dismiss="modal" id="show-data-musnah" data-url="{{ route('inputdatamusnahbaru',[])}}"><i class="fa fa-check-square-o"></i> Buat Data</button>
        </div>
    </form>
      </div>
    </div>
</div> 
<div class="modal fade" id="showdatamusnahxx">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content animated fadeInUp modal-xl">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <div id="tampilformmusnahxx">

         </div>
          
       
      </div>
    </div>
</div> 
<script>
    $(document).ready(function() {
        //Default data table
        $('#default-datatable').DataTable();


        var table = $('#example').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
        });

        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');

    });
</script>