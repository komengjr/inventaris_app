<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Data Stock Opname </h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="p-3" id="form-data-barang">
        <div id="table-data-peminjaman">
            <table id="exampledata" class="table table-striped nowrap" style="width:100%">
                <thead class="bg-200 text-700">
                    <tr>
                        <th>No</th>
                        <th>Kode Stock Opname</th>
                        <th>Tanggal Mulai </th>
                        <th>Tanggal Selesai </th>
                        <th>Status Barang</th>
                        <th>Status Verifikasi</th>
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
                            <td>{{ $datas->end_date_verif }}</td>
                            <td>
                                @if ($datas->status_verif == 0)
                                    <span class="badge bg-danger">Belum Selesai</span>
                                @else
                                    <span class="badge bg-success">Selesai</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-primary dropdown-toggle" id="btnGroupVerticalDrop2"
                                        type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"><span class="fas fa-align-left me-1"
                                            data-fa-transform="shrink-3"></span>Option</button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                                        <button class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modal-cabang-lg" id="button-edit-data-stock-opname"
                                            data-code="{{ $datas->kode_verif }}"><span class="far fa-edit"></span>
                                            Edit Stock Opname</button>
                                        <div class="dropdown-divider"></div>
                                        <button class="dropdown-item" id="button-preview-data-peminjaman"
                                            data-code="{{ $datas->kode_verif }}"><span
                                                class="fab fa-chromecast"></span>
                                            Preview Peminjaman Cabang</button>
                                        <button class="dropdown-item" id="button-print-data-peminjaman"
                                            data-code="{{ $datas->kode_verif }}"><span
                                                class="fas fa-print"></span>
                                            Print Peminjaman Cabang</button>
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
<script>
    $(document).on("click", "#button-preview-data-peminjaman", function(e) {
        e.preventDefault();
        var code = $(this).data("code");
        $('#table-data-peminjaman').html(
            '<div class="spinner-border" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
        );
        $.ajax({
            url: "{{ route('masteradmin_cabang_preview_data_peminjaman') }}",
            type: "POST",
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "code": code
            },
            dataType: 'html',
        }).done(function(data) {
            $('#table-data-peminjaman').html(data);
        }).fail(function() {
            $('#table-data-peminjaman').html('eror');
        });
    });
</script>
