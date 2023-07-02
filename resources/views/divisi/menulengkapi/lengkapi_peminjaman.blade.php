<style>
    input[type="file"] {
        display: none;
    }

    .row label {
        padding-top: 10px;
    }
</style>

<div class="modal-content" id="showdatabarang">
    <div class="modal-header">
        <h6>Form Peminjaman <span style="color: royalblue;"> Nomor tiket : {{ $cekdata[0]->tiket_peminjaman }}</span>
        </h6>
        <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-close"></i>
        </button>
    </div>
    {{-- <form  method="POST" action="" enctype="multipart/form-data" id="form-update"> --}}

    <div class="modal-body">
        <div class="row">
            <div class="col-12">
                <label for="">Kegiatan</label>
                <input type="text" class="form-control" name="nama_kegiatan" value="{{ $cekdata[0]->nama_kegiatan }}"
                    disabled>
            </div>
            <div class="col-6">
                <label for="">Penanggung Jawab Peminjam</label>
                <input type="text" class="form-control" name="pj_pinjam" value="{{ $cekdata[0]->pj_pinjam }}"
                    required>
            </div>
            <div class="col-6">
                <label for="">Tanggal Peminjam</label>
                <input type="date" class="form-control" name="tgl_pinjam" value="{{ $cekdata[0]->tgl_pinjam }}"
                    required>
            </div>
            <div class="col-12">
                <label for="">Deskripsi Peminjaman</label>
                <textarea class="form-control" id="" cols="10" rows="3" name="deskripsi"> {{ $cekdata[0]->deskripsi }}</textarea>
            </div>
        </div>
    </div>


    <div class="modal-body" id="buttoninputbarangpeminjaman">
        <button type="button" class="btn-success" id="buttontambahbarangpeminjaman"
            data-url="{{ url('divisi/peminjaman/inputdatabarang', ['id' => $cekdata[0]->id_pinjam]) }}"><i
                class="fa fa-keyboard-o"></i> Input Barang</button>
        <button type="button" class="btn-warning" id="buttonpengembalianbarangpeminjaman"
            data-url="{{ url('divisi/peminjaman/pengembaliandatabarang', ['id' => $cekdata[0]->id_pinjam]) }}"
            style="float: right;"><i class="fa fa-keyboard-o"></i> Pengembalian Barang</button>
    </div>

    <div class="body pb-3" id="tablepeminjaman">
        <table class=" styled-table" id="data-table99">
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

                        $data = DB::table('sub_tbl_inventory')
                            ->where('id_inventaris', $item->id_inventaris)
                            ->get();
                    @endphp
                    <tr>
                        <td data-label="No">{{ $no++ }}</td>
                        <td data-label="Nama Barang">{{ $data[0]->nama_barang }}</td>
                        <td data-label="Merek">{{ $data[0]->merk }}</td>
                        <td data-label="Type">{{ $data[0]->type }}</td>
                        <td data-label="No Seri">{{ $data[0]->no_seri }}</td>
                        <td data-label="Tanggal Pinjam">{{ $item->tgl_pinjam_barang }}</td>
                        <td data-label="Tanggal Kembali">{{ $item->tgl_kembali_barang }}</td>
                        <td data-label="Status Barang">
                            @if ($item->status_sub_peminjaman == 0)
                                <button class="btn-warning" disabled>Belum Balik</button>
                            @else
                                <button class="btn-success" disabled>Sudah Balik</button>
                            @endif
                        </td>
                        <td data-label="Action"><button class="btn-danger"><i class="fa fa-trash"></i></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
<div class="modal-footer">
    <img src="{{ url('url', []) }}" alt="">
    <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
    <button
        onclick="window.open('{{ url('divisi/verifikasi/print/verif', ['id'=>$cekdata[0]->tiket_peminjaman]) }}', '', 'width=1200, height=700');"class="btn-info"
        id="" data-url="asdasd"><i class="fa fa-print"></i> Cetak / Print</button>
    <button type="submit" class="btn-success" style="float: left;"><i class="fa fa-save"></i> Penyelesaian</button>
</div>
<script>
    $('#data-table99').DataTable();

    function myFunction() {
        var link = document.createElement("a")
        link.href = "https://example.com"
        link.target = "_blank"
        link.click()
    }
</script>
