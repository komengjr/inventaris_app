<style>
    input[type="file"] {
        display: none;
    }
</style>
<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Form Peminjaman Barang</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <form class="row g-3 p-4" action="{{ route('aplikasi_app_peminjaman_barang_save') }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Tujuan Peminjaman</label>
            <select name="tujuan" class="form-control choices-single-peminjaman" id="">
                <option value="">Pilih Tujuan</option>
                <option value="MCU">MCU</option>
                <option value="EVENT">EVENT</option>
                <option value="OPRASIONAL PELAYANAN">OPRASIONAL PELAYANAN</option>
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Tanggal Peminjaman</label>
            <input class="form-control form-control-lg" id="inputAddress" type="date" name="tgl_pinjam" required />
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Batas Tanggal Peminjaman</label>
            <input class="form-control form-control-lg" id="inputAddress" type="date" name="batas_pinjam" required />
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Keterangan</label>
            <textarea class="form-control" id="inputAddress" type="text" name="deskripsi" required></textarea>
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" id="gridCheck" type="checkbox" required />
                <label class="form-check-label" for="gridCheck">Check me</label>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit"><span class="fas fa-save"></span> Save</button>
        </div>
    </form>
    <div class="card-body border-top p-4">
        <table id="table-peminjaman" class="table table-striped nowrap" style="width:100%">
            <thead class="bg-200 text-700 fs--2">
                <tr>
                    <th>No</th>
                    <th>Kode Peminjaman</th>
                    <th>Kebutuhan</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Selesai Peminjaman</th>
                    <th>Status Peminjaman</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="fs--2">
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $datas)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $datas->tiket_peminjaman }}</td>
                        <td>{{ $datas->nama_kegiatan }}</td>
                        <td>{{ $datas->tgl_pinjam }}</td>
                        <td>{{ $datas->batas_tgl_pinjam }}</td>
                        <td class="text-center">
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
                                <button class="btn btn-sm btn-primary dropdown-toggle" id="btnGroupVerticalDrop2"
                                    type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"><span class="fas fa-align-left me-1"
                                        data-fa-transform="shrink-3"></span>Option</button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                                    @if ($datas->status_pinjam == 0)
                                        <button class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modal-peminjaman" id="button-proses-peminjaman-cabang"
                                            data-code="{{ $datas->tiket_peminjaman }}"><span class="far fa-edit"></span>
                                            Lengkapi Data Peminjaman</button>
                                    @elseif ($datas->status_pinjam == 1)
                                        <button class="dropdown-item text-warning" data-bs-toggle="modal"
                                            data-bs-target="#modal-peminjaman" id="button-verifikasi-peminjaman-cabang"
                                            data-code="{{ $datas->tiket_peminjaman }}"><span
                                                class="fas fa-file-signature"></span>
                                            Verifikasi Data Peminjaman</button>
                                    @elseif ($datas->status_pinjam == 2)
                                        {{-- <button class="dropdown-item text-info" data-bs-toggle="modal"
                                                        data-bs-target="#modal-peminjaman"
                                                        id="button-proses-verifikasi-peminjaman-cabang"
                                                        data-code="{{ $datas->tiket_peminjaman }}"><span
                                                            class="fas fa-file-signature"></span>
                                                        Proses Data Peminjaman</button> --}}
                                    @elseif ($datas->status_pinjam == 3)
                                        <button class="dropdown-item text-info" data-bs-toggle="modal"
                                            data-bs-target="#modal-peminjaman"
                                            id="button-proses-verifikasi-peminjaman-cabang"
                                            data-code="{{ $datas->tiket_peminjaman }}"><span
                                                class="fas fa-file-signature"></span>
                                            Proses Data Peminjaman</button>
                                    @elseif ($datas->status_pinjam == 4)
                                        <button class="dropdown-item text-success" data-bs-toggle="modal"
                                            data-bs-target="#modal-peminjaman-xl"
                                            id="button-report-data-peminjaman-barang"
                                            data-code="{{ $datas->tiket_peminjaman }}"><span
                                                class="fas fa-print"></span>
                                            Print Form Peminjaman</button>
                                    @endif

                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="{{ url('js/rupiah.js', []) }}"></script>
<script>
    new window.Choices(document.querySelector(".choices-single-peminjaman"));
    new DataTable('#table-peminjaman', {
        responsive: true
    });
</script>
