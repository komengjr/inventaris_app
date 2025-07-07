<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Data Peminjaman {{ $cabang->nama_cabang }}</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="p-3">
        <div class="card border">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <a class="btn btn-falcon-default btn-sm" href="#" id="button-sinkronisasi-peminjaman-cabang"
                        data-code="{{ $cabang->kd_cabang }}" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="" data-bs-original-title="Back to inbox" aria-label="Back to inbox"><span
                            class="fas fa-sync-alt"></span></a>
                    <span class="mx-1 mx-sm-2 text-300">|</span>
                    <button class="btn btn-falcon-default btn-sm" type="button" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="" data-bs-original-title="Archive"
                        aria-label="Archive"><svg class="svg-inline--fa fa-archive fa-w-16" aria-hidden="true"
                            focusable="false" data-prefix="fas" data-icon="archive" role="img"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M32 448c0 17.7 14.3 32 32 32h384c17.7 0 32-14.3 32-32V160H32v288zm160-212c0-6.6 5.4-12 12-12h104c6.6 0 12 5.4 12 12v8c0 6.6-5.4 12-12 12H204c-6.6 0-12-5.4-12-12v-8zM480 32H32C14.3 32 0 46.3 0 64v48c0 8.8 7.2 16 16 16h480c8.8 0 16-7.2 16-16V64c0-17.7-14.3-32-32-32z">
                            </path>
                        </svg><!-- <span class="fas fa-archive"></span> Font Awesome fontawesome.com --></button>
                    <button class="btn btn-falcon-default btn-sm ms-1 ms-sm-2" type="button" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="" data-bs-original-title="Delete" aria-label="Delete"><svg
                            class="svg-inline--fa fa-trash-alt fa-w-14" aria-hidden="true" focusable="false"
                            data-prefix="fas" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512" data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z">
                            </path>
                        </svg><!-- <span class="fas fa-trash-alt"></span> Font Awesome fontawesome.com --></button>
                    <span class="mx-1 mx-sm-2 text-300">|</span>
                    <button class="btn btn-falcon-danger btn-sm"><span class="fas fa--trash"></span></button>
                </div>
                <div class="d-flex">

                </div>
            </div>
        </div>
    </div>
    <div class="p-3" id="form-data-barang">
        <div id="table-data-peminjaman">
            <table id="exampledata" class="table table-striped nowrap" style="width:100%">
                <thead class="bg-200 text-700">
                    <tr>
                        <th>No</th>
                        <th>Kode Peminjaman</th>
                        <th>Tujuan</th>
                        <th>Tanggal Peminjam</th>
                        <th>Batas Peminjam</th>
                        <th>Penanggung jawab</th>
                        <th>Tanggal Selesai</th>
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
                            <td>{{ $datas->tiket_peminjaman }}</td>
                            <td>{{ $datas->nama_kegiatan }}</td>
                            <td>{{ $datas->tgl_pinjam }}</td>
                            <td>{{ $datas->batas_tgl_pinjam }}</td>
                            <td>
                                @php
                                    $staff = DB::table('tbl_staff')->where('id_staff', $datas->pj_pinjam)->first();
                                @endphp
                                @if ($staff)
                                    {{ $staff->nama_staff }}
                                @else
                                    {{ $datas->pj_pinjam }}
                                @endif
                            </td>
                            <td>{{ $datas->tgl_selesai }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-primary dropdown-toggle" id="btnGroupVerticalDrop2"
                                        type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"><span class="fas fa-align-left me-1"
                                            data-fa-transform="shrink-3"></span>Option</button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                                        <button class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modal-cabang-lg" id="button-edit-data-cabang"
                                            data-code="{{ $datas->kd_cabang }}"><span class="far fa-edit"></span>
                                            Edit Peminjaman Cabang</button>
                                        <div class="dropdown-divider"></div>
                                        <button class="dropdown-item" id="button-preview-data-peminjaman"
                                            data-code="{{ $datas->tiket_peminjaman }}"><span
                                                class="fab fa-chromecast"></span>
                                            Preview Peminjaman Cabang</button>
                                        <button class="dropdown-item" id="button-print-data-peminjaman"
                                            data-code="{{ $datas->tiket_peminjaman }}"><span
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
