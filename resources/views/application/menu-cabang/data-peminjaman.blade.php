<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Data Peminjaman {{ $cabang->nama_cabang }}</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="p-3" id="form-data-barang">
        <div id="table-data-peminjaman">
            <table id="exampledata" class="table table-striped nowrap" style="width:100%">
                <thead class="bg-200 text-700 fs--2">
                    <tr>
                        <th>No</th>
                        <th>Tiket Peminjaman</th>
                        <th>Kegiatan</th>
                        <th>Tujuan Peminjaman</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Batas Peminjaman</th>
                        {{-- <th>Penanggung Jawab</th> --}}
                        <th>Status Peminjaman</th>
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
                            <td>
                                {{ $datas->tiket_peminjaman }} <br>
                                @if ($datas->tujuan_cabang == Auth::user()->cabang)
                                    <span class="badge bg-primary">Antar Divisi</span>
                                @else
                                    <span class="badge bg-warning">Antar Cabang</span>
                                @endif
                            </td>
                            <td>{{ $datas->nama_kegiatan }}</td>
                            <td>
                                {{ $cabang->nama_cabang }} <br>
                                <span class="fas fa-arrow-circle-down text-primary"></span> <br>
                                {{ $datas->nama_cabang }}
                            </td>
                            <td>{{ $datas->tgl_pinjam }}</td>
                            <td>{{ $datas->batas_tgl_pinjam }}</td>
                            {{-- <td>{{ $datas->nama_staff }}</td> --}}
                            <td>
                                @if ($datas->status_pinjam == 0)
                                    <span class="badge bg-danger m-2">Not Verifed</span>
                                @elseif ($datas->status_pinjam == 1)
                                    <span class="badge bg-warning m-2">Verifikasi</span>
                                @elseif ($datas->status_pinjam == 2)
                                    @if ($datas->kd_cabang == $datas->tujuan_cabang)
                                        <span class="badge bg-info m-2">Proses Peminjaman</span>
                                    @else
                                        <span class="badge bg-warning m-2">Menunggu Cabang Menerima</span>
                                    @endif
                                @elseif ($datas->status_pinjam == 3)
                                    <span class="badge bg-primary m-2">Menunngu Kembali</span>
                                @elseif ($datas->status_pinjam == 4)
                                    <span class="badge bg-success m-2">Done</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-primary" id="btnGroupVerticalDrop2" type="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                            class="fas fa-align-left" data-fa-transform="shrink-3"></span>
                                        Option</button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                                        <button class="dropdown-item" id="button-report-peminjaman-cabang"
                                            data-code="{{ $datas->tiket_peminjaman }}"
                                            data-cabang="{{ $cabang->kd_cabang }}"><span
                                                class="fas fa-file-invoice"></span>
                                            Report Peminjaman</button>
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
