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
        {{-- <h5>Data List Barang</h5> --}}
        <div class="row">
            <div class="col-md-12">
                <div class="input-group">
                    <select class="custom-select" name="page" id="page" style="width:100px;height:30px;font-size: 12px;">
                        <option value="-">Pilih Option Print</option>
                        @php
                            $cetak = $data->count();
                        @endphp
                        @for ($i = 1; $i < 10; $i++)
                            @if ($cetak < 0)
                            @else
                                <option value="{{ $i }}">Page {{ $i }}</option>
                            @endif
                            @php
                                $cetak = $cetak - 50;
                            @endphp
                        @endfor
                        <option value="all">All</option>
                    </select>
                    <div class="input-group-append">
                        <button class="btn-dark" type="button" id="button-print-all" data-id="{{ $id }}">
                            <i class="fa fa-print"> </i> Print</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- <button type="button" class="btn-outline-dark" id="button-print-all" data-id="{{ $id }}"><i
                class="fa fa-print"> </i> Print All</button> --}}

        {{-- <button class="btn-success" id="tambahdatabarang" data-url="{{ route('tambahdatabarang', ['id' => $id]) }}"><i
                class="fa fa-plus"> </i> Tambah Data Barang</button> --}}
        <span>
            {{-- <button type="button" class="btn-outline-primary"  onclick="submitForm()"><i
                    class="fa fa-print"> </i> Print Barcode</button> --}}

            <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-close"></i>
            </button>
        </span>
    </div>
    <div class="body" id="show-menu-data-lokasi-barang">
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
                                        <td>
                                            @if ($data->gambar == '')
                                                <a href="https://via.placeholder.com/1020x780" data-fancybox="images"
                                                    data-caption="{{ $data->nama_barang }}">
                                                    <img src="https://via.placeholder.com/50x30" alt="lightbox"
                                                        class="lightbox-thumb img-thumbnail" id="videoPreview"
                                                        width="50" height="50">
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
                                            <button class="btn-info"
                                                onclick="window.open('printbarcodebyid/{{ $data->id }}', 'formpopup', 'width=400,height=400,resizeable,scrollbars'); this.target = 'formpopup';"><i
                                                    class="fa fa-print"></i> Print</button>

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
            <form name="form1" action="{{ url('printbarcodelokasi', ['id' => $id]) }}" method="post"
                id="print-barcode-form">
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
                <div class="modal-footer bg-primary" style="justify-content: center;">
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
