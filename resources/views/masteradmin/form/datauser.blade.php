<div class="row pl-3 pt-2 pb-2">
    <div class="col-lg-12">
    @if ($message = Session::get('sukses'))
        <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="card" >
    
        <div class="card-body">
       
           
        <div class="table-responsive" >
        <table id="default-datatable" class="styled-table table-bordered">
            <thead>
                <tr>
                    <th style="width: 5px;">No</th>
                    <th>Nama Cabang</th>
                    <th>Username</th>                  
                    <th>email</th>                  
                    <th>Akses</th>
                    <th class="text-center" style="width: 20px;">
                        <button class="btn-success" data-toggle="modal" data-target="#tambahdatauser" data-id="{{$id}}" id="adduseraccount"><i class="fa fa-plus"></i> Tambah Data</button>
                    </th>
                </tr>
            </thead>
            <tbody>
                @php $no=1; @endphp
                @foreach ($data as $data)
                @if ($data->akses == 'admin')
                    
                @else
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->email_}}</td>
                    <td>{{$data->akses}}</td>
                    <td>
                        <div><button class="btn-warning m-1" data-toggle="modal" id="resetpassworddatauser" data-target="#resetpassworddatauserx" data-id="{{$id}}" data-id_user="{{$data->id}}"><i class="fa fa-key"></i> Reset Password</button></div>
                        <div><button class="btn-info m-1" data-toggle="modal" id="editdatauserbaru" data-target="#editdatauser" data-id="{{$id}}" data-id_user="{{$data->id}}" data-name="{{$data->name}}" data-email="{{$data->email}}" data-email_="{{$data->email_}}" data-akses="{{$data->akses}}"><i class="fa fa-pencil"></i> Edit Data</button></div>
                        <div><button class="btn-danger m-1" data-toggle="modal" id="hapusdatauser" data-target="#hapusdatauserx" data-id="{{$id}}" data-id_user="{{$data->id}}"><i class="fa fa-trash"></i> Hapus Akun</button></div>
                    </td>
                </tr> 
                @endif
                
                    
                @endforeach
            </tbody>
    
        </table>
        </div>
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
