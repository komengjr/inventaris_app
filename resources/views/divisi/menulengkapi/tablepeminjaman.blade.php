
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
            <th>Merek / Type / No Seri</th>
            <th>Tanggal Barang Keluar</th>
            <th>Kondisi Barang Keluar</th>
            <th>Tanggal Barang Kembali</th>
            <th>Kondisi Barang Kembali</th>
            <th>Status Peminjaman</th>
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
                        <td data-label="No">{{ $no++ }}</td>
                        <td data-label="Nama Barang">{{ $data[0]->nama_barang }} - {{ $data[0]->id_inventaris }}</td>
                        <td data-label="Merek">
                            Merek : {{ $data[0]->merk }} <br>
                            Type : {{ $data[0]->type }} <br>
                            Seri :  {{ $data[0]->no_seri }}</td>
                        <td data-label="Tanggal Barang Keluar">{{ $item->tgl_pinjam_barang }}</td>
                        <td data-label="Kondisi Barang Keluar" class="text-center">
                            <span class="badge badge-info p-2">
                                {{ $item->kondisi_pinjam }}
                            </span></td>
                        <td data-label="Tanggal Barang Kembali">{{ $item->tgl_kembali_barang }}</td>
                        <td data-label="Kondisi Barang Kembali" class="text-center">
                            <span class="badge badge-info p-2">
                                {{ $item->kondisi_kembali }}
                            </span></td>
                        </td>

                        <td data-label="Status Barang" class="text-center">
                            @if ($item->status_sub_peminjaman == 0)
                            <span class="badge badge-danger p-2">Belum Balik</span>
                            @else
                                <span class="badge badge-success p-2">Sudah Balik</span>
                            @endif
                        </td>

                        <td data-label="Action" class="text-center">
                            <button type="button" class="btn btn-dark btn-sm waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            </button>
                            <div class="dropdown-menu">
                                <a href="javaScript:void();" class="dropdown-item" id="buttonbalikbarangpeminjaman" data-url="{{ url('divisi/peminjaman/balikdatapeminjaman', ['id'=>$item->id_sub_peminjaman]) }}"><i class="fa fa-arrow-circle-o-down"></i> Balik</a>
                                <div class="dropdown-divider"></div>
                                <a href="javaScript:void();" class="dropdown-item" id="buttoneditbarangpeminjaman" data-url="{{ url('divisi/peminjaman/editdatapeminjaman', ['id'=>$item->id_sub_peminjaman]) }}"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                <div class="dropdown-divider"></div>
                                <a href="javaScript:void();" class="dropdown-item" id="hapusdatadetailpeminjaman" data-id="{{$item->id_sub_peminjaman}}" data-ids="{{$item->id_pinjam}}"><i class="fa fa-trash-o"></i> Hapus</a>
                            </div>
                        </td>

                    </tr>
                @endforeach
    </tbody>
</table>
<script>
    $('#data-table28').DataTable();
</script>
