<style>
    @media only screen and (max-width: 800px) {

        td,
        tr {
            display: block;
        }

        /* Hide table headers (but not display: none;, for accessibility) */
        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        tr {
            border: 1px solid #000000;
        }

        tr+tr {
            margin-top: 1.5em;
        }

        td {
            /* make like a "row" */
            border: 5px;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 10%;
            padding-right: 10%;
            padding-top: 10px;
            padding-bottom: 10px;
            /* background-color: #dcede4; */
            text-align: left;
        }

        td:before {
            content: attr(data-label);
            display: inline-block;
            font-family: 'Orbitron', sans-serif;
            padding-left: 4px;
            line-height: 2.5;
            margin-left: -100%;
            width: 100%;
            white-space: nowrap;
        }
    }

    .styled-table {
        /* position: static; */
        border-collapse: collapse;
        margin: 0px 0;
        font-size: 0.9em;
        color: #000000;
        width: 100%;
        /* min-width: 400px; */
        box-shadow: 0 0 20px rgba(217, 211, 211, 0.15);

    }

    .styled-table thead tr {
        background-color: #f58506;
        color: #ffffff;
        text-align: left;
    }

    @media only screen and (min-width: 760px) {

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }
    }

    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #030303;
    }

    .styled-table tbody tr.active-row {
        font-weight: bold;
        color: #020202;
    }
</style>
<script src="assets/plugins/alerts-boxes/js/sweetalert.min.js"></script>
<script src="assets/plugins/alerts-boxes/js/sweet-alert-script.js"></script>
<script type="text/javascript">
    function submitForm() {
        document.form1.target = "myActionWin";
        window.open("", "myActionWin", "width=1000,height=700,toolbar=0");
        document.form1.submit();
    }
</script>
<div class="modal-content" id="showdatabarang">
    <div class="modal-header">
        <span>

        </span>
        <span>
            <button type="button" class="btn-outline-primary" id="button-tambah-barang-kso"
                data-url="{{ url('kso/tambah-data-barang') }}"><i class="fa fa-plus"> </i> Tambah Barang KSO</button>
            <button type="button" class="btn-danger " data-dismiss="modal" aria-label="Close">
                <i class="fa fa-close"></i>
            </button>
        </span>
    </div>
    <div class="body" id="menu-modal-kso">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-body">
                    <div class="table-responsive" style="letter-spacing: .0px;">
                        <table id="default-datatable1" class="styled-table" style="font-size: 9px;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>No Inventaris</th>
                                    <th>Nama Barang</th>

                                    <th>No MOU </th>
                                    <th>No KSO Alat</th>
                                    <th>Merek / Type</th>
                                    <th>Document</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $data)
                                    <tr>
                                        <td style="width: 2%;">{{ $no++ }}</td>
                                        <td style="width: 5%;">
                                            @if ($data->gambar == '')
                                                <a href="{{ asset('no_pict.png') }}" data-fancybox="images"
                                                    data-caption="{{ $data->nama_barang }}">
                                                    <img src="{{ asset('no_pict.png') }}" alt="lightbox"
                                                        class="img-thumbnail" id="videoPreview"
                                                        width="100" height="100">
                                                </a>
                                            @else
                                                <a href="{{ url($data->gambar, []) }}" data-fancybox="images"
                                                    data-caption="{{ $data->nama_barang }}" style="width: 50px;">
                                                    <img src="{{ url($data->gambar, []) }}" alt="lightbox"
                                                        class="lightbox-thumb img-thumbnail" id="videoPreview"
                                                        width="50" height="50" style="width: 100px;">
                                                </a>
                                            @endif
                                        </td>
                                        <td>{{ $data->no_inventaris }}</td>
                                        <td>{{ $data->nama_barang }}</td>
                                        <td>{{ $data->no_mou_id }}</td>
                                        <td>{{ $data->no_kso_alat }}</td>
                                        <td>{{ $data->merk }}</td>
                                        <td class="text-center">
                                            @php
                                                $doc = DB::table('document_kso')->where('id_inventaris',$data->id_inventaris)->get();
                                            @endphp
                                            @foreach ($doc as $doc)
                                                    <h6>- <span class="badge badge-dark">{{$doc->periode_kso}}</span></h6>
                                            @endforeach
                                            <button class="btn-info" id="button-upload-dokumen-kso" data-id="{{ $data->id_inventaris }}"><i class="fa fa-file"></i> Document KSO</button>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn-primary" id="button-detail-barang-kso"
                                                data-id="{{ $data->id_inventaris }}"><i class="fa fa-pencil"></i>
                                                Detail</button><br><br>
                                                <button class="btn-dark" onclick="window.open('printbarcodeksobyid/{{ $data->id }}', 'formpopup', 'width=400,height=400,resizeable,scrollbars'); this.target = 'formpopup';"><i class="fa fa-print"></i> Print Barcode</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="modal-footer">
        <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>

    </div> --}}
</div>

<script>
    $(document).ready(function() {
        //Default data table
        $('#default-datatable1').DataTable();


        var table = $('#example').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
        });

        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');

    });
</script>
<script>
    $(document).on("click", "#button-detail-barang-kso", function(e) {
        e.preventDefault();
        var id = $(this).data("id");
        $.ajax({
                url: "{{ route('detailbarangkso') }}",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf"]').attr("content"),
                },
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                dataType: "html",
            })
            .done(function(data) {
                $("#menu-modal-kso").html(data);
            })
            .fail(function() {
                Lobibox.notify("error", {
                    pauseDelayOnHover: true,
                    continueDelayOnInactiveTab: false,
                    position: "top right",
                    icon: "fa fa-x",
                    msg: "Silahkan Hubungi Admin",
                });
            });
    });
    $(document).on("click", "#button-upload-dokumen-kso", function(e) {
        e.preventDefault();
        var id = $(this).data("id");
        $.ajax({
                url: "{{ route('uploaddokumentbarangkso') }}",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf"]').attr("content"),
                },
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                dataType: "html",
            })
            .done(function(data) {
                $("#menu-modal-kso").html(data);
            })
            .fail(function() {
                Lobibox.notify("error", {
                    pauseDelayOnHover: true,
                    continueDelayOnInactiveTab: false,
                    position: "top right",
                    icon: "fa fa-x",
                    msg: "Silahkan Hubungi Admin",
                });
            });

    });
    $(document).on("click", "#button-show-document-kso", function(e) {
        e.preventDefault();
        var id = $(this).data("id");
        $.ajax({
                url: "{{ route('showdokumentbarangkso') }}",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf"]').attr("content"),
                },
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                dataType: "html",
            })
            .done(function(data) {
                $("#show-document-kso").html(data);
            })
            .fail(function() {
                Lobibox.notify("error", {
                    pauseDelayOnHover: true,
                    continueDelayOnInactiveTab: false,
                    position: "top right",
                    icon: "fa fa-x",
                    msg: "Silahkan Hubungi Admin",
                });
            });

    });
</script>
