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

        <button class="btn-success" id="tambahdatabarang" data-url="{{ route('tambahdatabarang', ['id' => $id]) }}"><i
                class="fa fa-plus"> </i> Tambah Data Barang</button>
        <span>
            <button type="button" class="btn-outline-primary"  onclick="submitForm()"><i
                    class="fa fa-print"> </i> Print Barcode</button>
            <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-close"></i>
            </button>
        </span>
    </div>
    <div class="body" id="showdatabarang">
        <div class="row">
            <div class="col-lg-12">

                <div class="card-body">
                    @if (session()->has('status'))
                        <div class="alert alert-success alert-dismissible alert-sm" role="alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <div class="alert-icon contrast-alert">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="alert-message">
                                <span><strong>Success!</strong> {{ session()->get('status') }}</span>
                            </div>
                        </div>
                    @endif
                    <div class="table-responsive" style="letter-spacing: .0px;">
                        <table id="default-datatablesubbarang" class="styled-table" style="font-size: 10px">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>ID Inventaris</th>
                                    <th>Nomor Inventaris</th>
                                    <th>Nama Barang</th>
                                    <th>Lokasi</th>
                                    <th>Merek / Type</th>
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($data as $data)
                                    @if ($data->kd_jenis == 1)
                                        <style>
                                            @media only screen and (max-width: 800px) {
                                                td {
                                                    background-color: #7eb9a0;
                                                }
                                            }
                                        </style>
                                        <?php
                                        $nama_lokasi = DB::table('tbl_lokasi')
                                            ->select('tbl_lokasi.nama_lokasi')
                                            ->where('kd_lokasi', $data->kd_lokasi)
                                            ->get();
                                        ?>
                                        <tr style="background-color: #7eb9a0;">
                                            {{-- <td>{{$no++}}</td> --}}
                                            <td>
                                                @if ($data->gambar == '')
                                                    <a href="https://via.placeholder.com/1920x1080"
                                                        data-fancybox="images" data-caption="{{ $data->nama_barang }}">
                                                        <img src="https://via.placeholder.com/800x500" alt="lightbox"
                                                            class="lightbox-thumb img-thumbnail" id="videoPreview"
                                                            width="50" height="50">
                                                    </a>
                                                @else
                                                    <a href="{{ url($data->gambar, []) }}" data-fancybox="images"
                                                        data-caption="{{ $data->nama_barang }}">
                                                        <img src="{{ url($data->gambar, []) }}" alt="lightbox"
                                                            class="lightbox-thumb img-thumbnail" id="videoPreview"
                                                            width="50" height="50">
                                                    </a>
                                                @endif
                                            </td>
                                            <td>{{ $data->id_inventaris }}</td>
                                            <td>{{ $data->no_inventaris }}</td>
                                            <td>{{ $data->nama_barang }}</td>
                                            @if ($nama_lokasi->isEmpty())
                                                <td>{{ $data->kd_lokasi }}</td>
                                            @else
                                                <td>{{ $data->kd_lokasi }} ( {{ $nama_lokasi[0]->nama_lokasi }} )</td>
                                            @endif

                                            <td>
                                                {{ $data->merk }} / {{ $data->type }}
                                            </td>
                                            <td>@currency($data->harga_perolehan)</td>
                                            <td class="text-center">
                                                <button class="btn-dark" id="editdatabarang"
                                                    data-url="{{ route('editdatabarang1', ['id' => $data->id]) }}"><i
                                                        class="fa fa-eye"> </i> Detail</button><br><br>
                                                        <button class="btn-info"><i class="fa fa-print"></i> Print</button>
                                                {{-- <button type="button" class="btn btn-danger btn-sm" id="confirm-btn-hapus{{$data->id}}"><i class="fa fa-trash"> Hapus</i></button> --}}
                                                <a class="tombolhapus{{ $data->id }} btn btn-danger"
                                                    style="display: none;" id="hapusdatabarang"
                                                    data-url="{{ route('hapusdatabarang', ['kode' => $data->kd_inventaris, 'id' => $data->id]) }}"></a>
                                            </td>
                                        </tr>

                                        <script>
                                            $("#confirm-btn-hapus<?php echo $data->id; ?>").click(function() {
                                                swal({
                                                        title: "Yakin Untuk Di Hapus ?",
                                                        text: "Once deleted, you will not be able to recover this imaginary file!",
                                                        icon: "warning",
                                                        buttons: true,
                                                        dangerMode: true,
                                                    })
                                                    .then((willDelete) => {
                                                        if (willDelete) {
                                                            swal("Poof! Your imaginary file has been deleted!", {
                                                                icon: "success",
                                                            });
                                                            document.getElementsByClassName('tombolhapus<?php echo $data->id; ?>')[0].click();
                                                        } else {
                                                            swal("Your imaginary file is safe!");
                                                        }
                                                    });

                                            });
                                        </script>
                                    @else
                                        <style>
                                            @media only screen and (max-width: 800px) {
                                                td {
                                                    background-color: #cdcecd;
                                                }
                                            }
                                        </style>
                                        <?php
                                        $nama_lokasi = DB::table('tbl_lokasi')
                                            ->select('tbl_lokasi.nama_lokasi')
                                            ->where('kd_lokasi', $data->kd_lokasi)
                                            ->get();
                                        ?>
                                        <tr>
                                            {{-- <td>{{$no++}}</td> --}}
                                            <td>
                                                @if ($data->gambar == '')
                                                    <a href="https://via.placeholder.com/1920x1080"
                                                        data-fancybox="images" data-caption="{{ $data->nama_barang }}">
                                                        <img src="https://via.placeholder.com/800x500" alt="lightbox"
                                                            class="lightbox-thumb img-thumbnail" id="videoPreview"
                                                            width="50" height="50">
                                                    </a>
                                                @else
                                                    <a href="{{ url($data->gambar, []) }}" data-fancybox="images"
                                                        data-caption="{{ $data->nama_barang }}">
                                                        <img src="{{ url($data->gambar, []) }}" alt="lightbox"
                                                            class="lightbox-thumb img-thumbnail" id="videoPreview"
                                                            width="50" height="50">
                                                    </a>
                                                @endif
                                            </td>
                                            <td>{{ $data->id_inventaris }}</td>
                                            <td>{{ $data->no_inventaris }}</td>
                                            <td>{{ $data->nama_barang }}</td>
                                            @if ($nama_lokasi->isEmpty())
                                                <td>{{ $data->kd_lokasi }}</td>
                                            @else
                                                <td>{{ $data->kd_lokasi }} ( {{ $nama_lokasi[0]->nama_lokasi }} )</td>
                                            @endif


                                            <td>
                                                {{ $data->merk }} / {{ $data->type }}
                                            </td>

                                            <td>@currency($data->harga_perolehan)</td>
                                            <td class="text-center">
                                                <button class="btn-dark" id="editdatabarang"
                                                    data-url="{{ route('editdatabarang1', ['id' => $data->id]) }}"><i
                                                        class="fa fa-eye"> </i> Detail</button><br><br>
                                                        <button class="btn-info"><i class="fa fa-print"></i> Print</button>
                                                {{-- <button type="button" class="btn btn-danger btn-sm" id="confirm-btn-hapus{{$data->id}}"><i class="fa fa-trash"> Hapus</i></button> --}}
                                                <a class="tombolhapus{{ $data->id }} btn btn-danger"
                                                    style="display: none;" id="hapusdatabarang"
                                                    data-url="{{ route('hapusdatabarang', ['kode' => $data->kd_inventaris, 'id' => $data->id]) }}"></a>
                                            </td>
                                        </tr>

                                        <script>
                                            $("#confirm-btn-hapus<?php echo $data->id; ?>").click(function() {
                                                swal({
                                                        title: "Yakin Untuk Di Hapus ?",
                                                        text: "Once deleted, you will not be able to recover this imaginary file!",
                                                        icon: "warning",
                                                        buttons: true,
                                                        dangerMode: true,
                                                    })
                                                    .then((willDelete) => {
                                                        if (willDelete) {
                                                            swal("Poof! Your imaginary file has been deleted!", {
                                                                icon: "success",
                                                            });
                                                            document.getElementsByClassName('tombolhapus<?php echo $data->id; ?>')[0].click();
                                                        } else {
                                                            swal("Your imaginary file is safe!");
                                                        }
                                                    });

                                            });
                                        </script>
                                    @endif
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        {{-- <button type="button" class="btn btn-primary"><i class="fa fa-print"></i> Print Barcode</button> --}}
    </div>
</div>

<div class="modal fade" id="printdata">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-primary ">
            <div class="modal-header bg-primary ">
                <h5 class="modal-title text-white">From Print Data</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="form1" action="{{ url('printbarcodelokasi', ['id' => $id]) }}" method="post" id="print-barcode-form">
                @csrf
                <div class="modal-body">
                    <input type="text" name="kd_lokasi" value="{{ $id }}" id="" hidden>
                    <div class="row">
                        <div class="col-6">
                            <label for="input-1">Ukuran</label>
                            <select name="ukuran" id="" class="form-control" required>
                                <option value="">Pilih Ukuran</option>
                                <option value="A4">A4</option>
                                <option value="A5">A5</option>
                                <option value="A6">A6</option>
                                <option value="A7">A7</option>
                                <option value="A8">A8</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="input-1">Layout</label>
                            <select name="layout" id="" class="form-control" required>

                                <option value="Portrait">Portrait</option>
                                <option value="landscape">Landscape</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer bg-primary">
                    {{-- <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times"> Close</i></button> --}}
                    {{-- <input type="button" name="btnSubmit" value="Submit" onclick="submitForm()" /> --}}
                    <a type="submit" class="btn btn-success" onclick="submitForm()"> Cetak</i></a>
                    {{-- <INPUT TYPE="button" NAME="preview" VALUE="preview" ONCLICK="javascript:window.open('previewpage.html');"> --}}
                </div>
            </form>
        </div>
    </div>
</div>
<!--End Modal -->

<script>
    $(document).ready(function() {
        $('#myform').submit(function() {
            window.open('', 'formpopup', 'width=400,height=400,resizeable,scrollbars');
            this.target = 'formpopup';
        });
    });
</script>
<script src="{{ url('assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js', []) }}"></script>
<script src="{{ url('assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js', []) }}"></script>
    <script src="{{ url('assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js', []) }}"></script>
<script>
    $(document).ready(function() {
        //Default data table
        $('#default-datatablesubbarang').DataTable();


        var table = $('#example').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
        });

        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');

    });
</script>
