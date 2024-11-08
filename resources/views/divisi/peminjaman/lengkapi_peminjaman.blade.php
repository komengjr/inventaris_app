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


    <div class="modal-body" >
    <div class="modal-body" style="border: 2px solid rgba(0, 0, 0, 0.5)">
        <button type="button" class="btn-success" id="buttontambahbarangpeminjaman"
            data-url="{{ url('divisi/peminjaman/inputdatabarang', ['id' => $cekdata[0]->id_pinjam]) }}"><i
                class="fa fa-qrcode"></i> Scan Peminjaman Barang</button>
                <button class="btn-success" id="buttoncarinamabarang" data-url="{{ url('divisi/peminjaman/caridatabarang', ['id' => $cekdata[0]->id_pinjam]) }}"><i class="fa fa-search"></i> Cari Nama Barang</button>

                <button class="btn-info" style="float: right; margin-left: 5px;" id="refreshtablepeminjaman" data-url="{{ url('divisi/peminjaman/refreshtablepeminjaman', ['id' => $cekdata[0]->id_pinjam]) }}"><i class="fa fa-refresh"></i></button>
        <button type="button" class="btn-dark" id="buttonpengembalianbarangpeminjaman"
            data-url="{{ url('divisi/peminjaman/pengembaliandatabarang', ['id' => $cekdata[0]->id_pinjam]) }}"
            style="float: right;"><i class="fa fa-keyboard-o"></i> Scan Pengembalian Barang</button>
    </div>
    </div>
    <div class="modal-body" id="buttoninputbarangpeminjaman">

    </div>

    <div class="body pb-3" id="tablepeminjaman">
        <table class="styled-table" id="data-table99">
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

                        $data = DB::table('sub_tbl_inventory')
                            ->where('id_inventaris', $item->id_inventaris)
                            ->get();
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
                            <button type="button" class="btn-warning waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

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
    </div>

</div>
<div class="modal-footer">

    <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
    {{-- <button onclick="window.open('{{ url('divisi/verifikasi/print/peminjaman', ['id'=>$cekdata[0]->tiket_peminjaman]) }}', '', 'width=1200, height=700');"class="btn-info"
        id="" data-url="asdasd"><i class="fa fa-print"></i> Cetak / Print</button> --}}
        @if ($cekdata[0]->status_pinjam == 0 || $cekdata[0]->status_pinjam == 10)
            {{-- <a href="{{ url('divisi/verifikasi/peminjaman/pemyelesaian', ['id'=>$cekdata[0]->tiket_peminjaman]) }}"><button type="submit" class="btn-success" style="float: left;"><i class="fa fa-save"></i> Penyelesaian</button></a> --}}
        @endif
        @if ($cekdata[0]->batas_tgl_pinjam <= date('Y-m-d'))
            <a href="{{ url('divisi/verifikasi/peminjaman/pemyelesaian', ['id'=>$cekdata[0]->tiket_peminjaman]) }}"><button type="submit" class="btn-success" style="float: left;"><i class="fa fa-save"></i> Penyelesaian</button></a>
        @endif

</div>
<script>
    $('#data-table99').DataTable();
</script>

