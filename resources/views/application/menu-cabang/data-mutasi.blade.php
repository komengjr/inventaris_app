<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Data Mutasi {{ $cabang->nama_cabang }}</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="p-3" id="form-data-barang">

        <div id="table-data-version">
            <table id="exampledata" class="table table-striped nowrap" style="width:100%">
                <thead class="bg-200 text-700 fs--2">
                    <tr>
                        <th>No</th>
                        <th>Tiket Mutasi</th>
                        <th>Mutasi Cabang</th>
                        <th>Tanggl Order Mutasi</th>
                        <th>Penanggung Jawab Alat</th>
                        <th>Menyetujui</th>
                        <th>Yang Menyerahkan</th>
                        <th>Penerima</th>
                        <th>Tanggal Terima</th>
                        <th>Status Mutasi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody style="font-size: 13px;">
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $datas)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $datas->kd_mutasi }}</td>
                            <td>{{ $datas->target_mutasi }}</td>
                            <td>{{ $datas->tanggal_buat }}</td>
                            <td>{{ $datas->penanggung_jawab }}</td>
                            <td>{{ $datas->menyetujui }}</td>
                            <td>{{ $datas->yang_menyerahkan }}</td>
                            <td>{{ $datas->penerima }}</td>
                            <td>{{ $datas->tgl_terima }}</td>
                            <td>{{ $datas->status_mutasi }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-primary" id="btnGroupVerticalDrop2" type="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                            class="fas fa-align-left" data-fa-transform="shrink-3"></span>
                                        Option</button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">

                                        <button class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modal-menu-cabang" id="button-data-barang-cabang"
                                            data-code="{{ $datas->kd_mutasi }}"><span class="fas fa-file-invoice"></span>
                                            Report Mutasi</button>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        new DataTable('#exampledata', {
            responsive: true
        });
    </script>
</div>
