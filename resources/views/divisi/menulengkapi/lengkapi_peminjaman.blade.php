
<style>
    input[type="file"] {
    display: none;
}
.row label{
    padding-top: 10px;
}


</style>

<div class="modal-content" id="showdatabarang">
    <div class="modal-header">
         <h6>Form Peminjaman <span style="color: royalblue;"> Nomor tiket : {{$cekdata[0]->tiket_peminjaman}}</span> </h6>
         <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
         <i class="fa fa-close"></i>
         </button>
     </div>
{{-- <form  method="POST" action="" enctype="multipart/form-data" id="form-update"> --}}

    <div class="modal-body">
        <div class="row">
            <div class="col-12">
                <label for="">Kegiatan</label>
                <input type="text" class="form-control" name="nama_kegiatan" value="{{$cekdata[0]->nama_kegiatan}}" disabled>
            </div>
            <div class="col-6">
                <label for="">Penanggung Jawab Peminjam</label>
                <input type="text" class="form-control" name="pj_pinjam" value="{{$cekdata[0]->pj_pinjam}}" required>
            </div>
            <div class="col-6">
                <label for="">Tanggal Peminjam</label>
                <input type="date" class="form-control" name="tgl_pinjam" value="{{$cekdata[0]->tgl_pinjam}}" required>
            </div>
            <div class="col-12">
                <label for="">Deskripsi Peminjaman</label>
                <textarea class="form-control" id="" cols="10" rows="3" name="deskripsi"> {{$cekdata[0]->deskripsi}}</textarea>
            </div>
        </div>
    </div>


    <div class="modal-body" id="buttoninputbarangpeminjaman">
        <button type="button" class="btn-success" id="buttontambahbarangpeminjaman" data-url="{{ url('divisi/peminjaman/inputdatabarang', ['id'=>$cekdata[0]->id_pinjam]) }}"><i class="fa fa-keyboard-o" ></i> Input Barang</button>
        <button type="button" class="btn-warning" id="buttonpengembalianbarangpeminjaman" data-url="{{ url('divisi/peminjaman/pengembaliandatabarang', ['id'=>$cekdata[0]->id_pinjam]) }}" style="float: right;"><i class="fa fa-keyboard-o" ></i> Pengembalian Barang</button>
    </div>

    <div class="body" id="tablepeminjaman">
        <table class="styled-table" id="data-table99">
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
    </div>

</div>

<script>
    $('#data-table99').DataTable();
</script>
