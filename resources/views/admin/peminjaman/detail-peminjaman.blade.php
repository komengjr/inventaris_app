<div class="row gradient-steelgray pt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-center">
                    <div><i class="bx bxs-user me-1 font-22 text-white"></i>
                    </div>
                    <h5 class="mb-0">Data Peminajamn</h5>
                </div>
                <hr>
                <form class="row g-3">
                    <div class="col-md-6">
                        <label for="inputLastName1" class="form-label">Kode Tiket</label>
                        <div class="input-group"> <span class="input-group-text"><i class="fa fa-ticket"></i></span>
                            <input type="text" class="form-control border-start-0" id="inputLastName1"
                                value="{{ $data->tiket_peminjaman }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="inputLastName2" class="form-label">Kegiatan</label>
                        <div class="input-group"> <span class="input-group-text"><i class="fa fa-bookmark"></i></span>
                            <input type="text" class="form-control border-start-0" id="inputLastName2"
                                value="{{ $data->nama_kegiatan }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="inputLastName1" class="form-label">Tanggal Pinjem</label>
                        <div class="input-group"> <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            <input type="text" class="form-control border-start-0" id="inputLastName1"
                                value="{{ $data->tgl_pinjam }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="inputLastName2" class="form-label">Batas Tanggal Peminjaman</label>
                        <div class="input-group"> <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            <input type="text" class="form-control border-start-0" id="inputLastName2"
                                value="{{ $data->batas_tgl_pinjam }}" disabled>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Asal Cabang</div>
                @php
                    $asalcabang = DB::table('tbl_cabang')
                        ->where('kd_cabang', $data->kd_cabang)
                        ->first();
                    $pjpinjam = DB::table('tbl_staff')
                        ->where('nip', $data->pj_pinjam)
                        ->first();
                @endphp
                <label for="inputLastName1" class="form-label">Cabang</label>
                <div class="input-group"> <span class="input-group-text"><i class="fa fa-flag"></i></span>
                    <input type="text" class="form-control border-start-0" id="inputLastName1"
                        value="{{ $asalcabang->nama_cabang }}" disabled>
                </div>
                <label for="inputLastName1" class="form-label">Penanggung Jawab</label>
                <div class="input-group"> <span class="input-group-text"><i class="fa fa-user-o"></i></span>
                    <input type="text" class="form-control border-start-0" id="inputLastName1"
                        value="{{ $pjpinjam->nama_staff }}" disabled>
                </div>
                <label for="inputLastName1" class="form-label">Deskripsi</label>
                <div class="input-group"> <span class="input-group-text"><i class="fa fa-tasks"></i></span>
                    <textarea name="" class="form-control" id="" cols="30" rows="2" disabled>{{ $data->deskripsi }}</textarea>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Tujuan Cabang</div>
                @php
                    $tujuancabang = DB::table('tbl_cabang')
                        ->where('kd_cabang', $data->tujuan_cabang)
                        ->first();
                    $pjpinjamcabang = DB::table('tbl_staff')
                        ->where('nip', $data->pj_pinjam_cabang)
                        ->first();
                @endphp
                <label for="inputLastName1" class="form-label">Cabang</label>
                <div class="input-group"> <span class="input-group-text"><i class="fa fa-flag"></i></span>
                    <input type="text" class="form-control border-start-0" id="inputLastName1"
                        value="{{ $tujuancabang->nama_cabang }}" disabled>
                </div>
                <label for="inputLastName1" class="form-label">Penanggung Jawab</label>
                @if ($pjpinjamcabang)
                <div class="input-group"> <span class="input-group-text"><i class="fa fa-user-o"></i></span>
                    <input type="text" class="form-control border-start-0" id="inputLastName1"
                        value="{{ $pjpinjamcabang->nama_staff }}" disabled>
                </div>
                @else
                <div class="input-group"> <span class="input-group-text"><i class="fa fa-ticket"></i></span>
                    <input type="text" class="form-control border-start-0" id="inputLastName1"
                        value="" disabled>
                </div>
                @endif

                <label for="inputLastName1" class="form-label">Deskripsi</label>
                <div class="input-group"> <span class="input-group-text"><i class="fa fa-tasks"></i></span>
                    <textarea name="" class="form-control" id="" cols="30" rows="2" disabled>{{ $data->deskripsi_tujuan }}</textarea>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-0">
                Daftar Barang Pinjam
                @php
                    $databarang = DB::table('tbl_sub_peminjaman')
                        ->join( 'sub_tbl_inventory', 'sub_tbl_inventory.id_inventaris', '=', 'tbl_sub_peminjaman.id_inventaris', )
                        ->where('id_pinjam', $data->id_pinjam)->get();
                @endphp
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>ID Barang</th>
                            <th>Nama Barang</th>
                            <th>Merek / Type / No Seri</th>
                            <th>Tanggal Barang Keluar</th>
                            <th>Kondisi Barang Keluar</th>
                            <th>Tanggal Barang Kembali</th>
                            <th>Kondisi Barang Kembali</th>
                            <th>Status Barang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($databarang as $databarang)
                            <tr>
                                <td>
                                    @if ($databarang->gambar == "")
                                    <img alt="Image placeholder" src="https://via.placeholder.com/110x110"
                                        class="product-img">
                                    @else
                                    <img alt="Image placeholder" src="{{ url($databarang->gambar, []) }}"
                                        class="product-img">
                                    @endif

                                </td>
                                <td>{{$databarang->id_inventaris}}</td>
                                <td>{{$databarang->nama_barang}}</td>
                                <td>{{$databarang->merk}}</td>
                                <td>{{$databarang->tgl_pinjam_barang}}</td>
                                <td>{{$databarang->kondisi_pinjam}}</td>
                                <td>{{$databarang->tgl_kembali_barang}}</td>
                                <td>{{$databarang->kondisi_kembali}}</td>
                                <td>
                                    @if ($databarang->tgl_kembali_barang == "")
                                        <span class="badge badge-danger">Belum Balik</span>
                                    @else
                                        <span class="badge badge-success">Kembali</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
