<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Data Stokopname {{ $cabang->nama_cabang }}</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="p-3" id="form-data-barang">

        <div id="table-data-stockopname">
            <table id="exampledata" class="table table-striped nowrap" style="width:100%">
                <thead class="bg-200 text-700 fs--2">
                    <tr>
                        <th>No</th>
                        <th>Tiket Stockopname</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Jumlah Data Cabang</th>
                        <th>Kondisi Barang</th>
                        <th>Status Stockopname</th>
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
                            <td>{{ $datas->kode_verif }}</td>
                            <td>{{ $datas->tgl_verif }}</td>
                            <td>{{ $datas->end_date_verif }}</td>
                            <td>0</td>
                            <td>0</td>
                            <td>
                                @if ($datas->status_verif == 0)
                                    <span class="badge bg-danger">Belum Selesai</span>
                                @elseif ($datas->status_verif == 1)
                                    <span class="badge bg-warning">Proses</span>
                                @elseif ($datas->status_verif == 2)
                                    <span class="badge bg-primary">Selesai</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-primary" id="btnGroupVerticalDrop2" type="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                            class="fas fa-align-left" data-fa-transform="shrink-3"></span>
                                        Option</button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                                        <button class="dropdown-item" id="button-report-stockopname-cabang"
                                            data-code="{{ $datas->kode_verif }}" data-cabang="{{$cabang->kd_cabang}}"><span
                                                class="fas fa-file-invoice"></span>
                                            Report Stockopname</button>
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
