<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Data Lokasi {{ $cabang->nama_cabang }}</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>
    <div class="p-3" id="form-data-lokasi">
        <table id="exampledata-lokasi" class="table table-striped nowrap" style="width:100%">
            <thead class="bg-200 text-700">
                <tr>
                    <th>No</th>
                    <th>Nomor Lokasi</th>
                    <th>Nama Lokasi</th>
                    <th>Total Barang</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $datas)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $datas->nomor_ruangan }}</td>
                        <td>{{ $datas->nama_lokasi }}</td>
                        <td>
                            @php
                                $barang = DB::table('sub_tbl_inventory')
                                    ->where('id_nomor_ruangan_cbaang', $datas->id_nomor_ruangan_cbaang)
                                    ->count();
                            @endphp
                            {{ $barang }}
                        </td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <button class="btn btn-sm btn-primary dropdown-toggle" id="btnGroupVerticalDrop2"
                                    type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"><span class="fas fa-align-left me-1"
                                        data-fa-transform="shrink-3"></span>Option</button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                                    <button class="dropdown-item" id="button-edit-data-lokasi"
                                        data-code="{{ $datas->id_nomor_ruangan_cbaang }}"><span
                                            class="far fa-edit"></span>
                                        Edit Lokasi</button>
                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-cabang"
                                        id="button-data-barang-lokasi" data-code="{{ $datas->id_nomor_ruangan_cbaang }}"><span
                                            class="far fa-folder-open"></span> Data Barang Ruangan</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        new DataTable('#exampledata-lokasi', {
            responsive: true
        });
    </script>
</div>
