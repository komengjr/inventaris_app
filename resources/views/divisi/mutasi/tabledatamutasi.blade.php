<table class=" styled-table align-items-center table-flush pb-2 pt-5" id="data-table96">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>No Inventaris</th>
            <th>Merk</th>
            <th>Type</th>
            <th>Harga</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
@foreach ($datamutasi as $datamutasi)
@php
    $dataintentaris = DB::table('sub_tbl_inventory')->where('id_inventaris',$datamutasi->id_inventaris)->first();
@endphp
    <tr>
            <td>{{$no++}}</td>
            <td>{{$dataintentaris->nama_barang}}</td>
            <td>{{$dataintentaris->no_inventaris}}</td>
            <td>{{$dataintentaris->merk}}</td>
            <td>{{$dataintentaris->type}}</td>
            <td>{{$dataintentaris->harga_perolehan}}</td>
            <td class="text-center">
                <button type="button" class="btn btn-dark btn-sm waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                </button>
                <div class="dropdown-menu">
                    <a href="javaScript:void();" class="dropdown-item" id="buttoneditbarangmutasi" data-url="{{ url('divisi/datamutasi/editdatamutasi', ['id'=>$datamutasi->id_sub_mutasi]) }}"><i class="fa fa-pencil-square-o"></i> Edit</a>
                    <div class="dropdown-divider"></div>
                    <a href="javaScript:void();" class="dropdown-item" id="buttonhapusdatabarangmutasi" data-id="{{$datamutasi->id_sub_mutasi}}" data-kode="{{$datamutasi->kd_mutasi}}"><i class="fa fa-trash-o"></i> Hapus</a>
                </div>
            </td>
    </tr>
@endforeach
    </tbody>
</table>
<script>
    $('#data-table96').DataTable();
</script>
