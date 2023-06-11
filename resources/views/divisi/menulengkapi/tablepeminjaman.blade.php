
@if ($notif == 0)
<div class="p-3">
    <div class="alert alert-icon-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <div class="alert-icon icon-part-danger">
            <i class="fa fa-times"></i>
        </div>
        <div class="alert-message">
            <span><strong>Eror!</strong> ---- <a href="javascript:void();" class="alert-link">Data tidak ditemukan</a></span>
        </div>
    </div>
</div>
@elseif($notif == 1)
<div class="p-3">
    <div class="alert alert-icon-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <div class="alert-icon icon-part-success">
            <i class="fa fa-check"></i>
        </div>
        <div class="alert-message">
            <span><strong>Berhasil!</strong>  <a href="javascript:void();" class="alert-link">Data telah ditambahkan</a></span>
        </div>
    </div>
</div>
@elseif($notif == 2)
<div class="p-3">
    <div class="alert alert-icon-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <div class="alert-icon icon-part-warning">
            <i class="fa fa-exclamation-triangle"></i>
        </div>
        <div class="alert-message">
            <span><strong>Warning!</strong> ---- <a href="javascript:void();" class="alert-link">Data sudah ada</a></span>
        </div>
    </div>
</div>
@endif
<table class="styled-table" id="data-table28">
    <thead>
        <tr>
            <th>no</th>
            <th>Nama Barang</th>
            <th>Merek</th>
            <th>Type</th>
            <th>No Seri</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status barang</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php
                    $no = 1;
                @endphp
                @foreach ($databarang as $item)
                @php

                    $data = DB::table('sub_tbl_inventory')->where('id_inventaris',$item->id_inventaris)->get();
                @endphp
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data[0]->nama_barang}}</td>
                        <td>{{$data[0]->merk}}</td>
                        <td>{{$data[0]->type}}</td>
                        <td>{{$data[0]->no_seri}}</td>
                        <td>{{$item->tgl_pinjam_barang}}</td>
                        <td>{{$item->tgl_kembali_barang}}</td>
                        <td>
                            @if ($item->status_sub_peminjaman == 0)
                                <button class="btn-warning" disabled>Belum Balik</button>
                            @else
                                <button class="btn-success" disabled>Sudah Balik</button>
                            @endif
                        </td>
                        <td><button class="btn-danger"><i class="fa fa-trash"></i></button></td>
                    </tr>
                @endforeach
    </tbody>
</table>
<script>
    $('#data-table28').DataTable();
</script>
