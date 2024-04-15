<link href="{{ asset('assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css', []) }}" rel="stylesheet"
    type="text/css">
<div class="modal-header bg-success">
    <p class="modal-title text-white">
        <a href="{{ url('divisi/masterbarang/dataloginventaris/resetdataloginventory', []) }}"
            class="btn-danger btn-sm"><i class="fa fa-reset"></i> Reset</a>
        <a href="{{ url('divisi/masterbarang/dataloginventaris/fixtanggaldataloginventory', []) }}"
            class="btn-dark btn-sm"><i class="fa fa-reset"></i> Fix Tanggal</a>
    </p>
    <span>
        <button class="btn-danger" id="button-cek-datalog-eror"><i class="zmdi zmdi-alert-circle-o"></i> Eror
            Lokasi</button>
        <button class="btn-danger" id="button-cek-datalog-erorklasifikasi"><i class="zmdi zmdi-alert-circle-o"></i> Eror
            Klasifikasi</button>
        <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fa fa-x"></i></span>
        </button>
    </span>
</div>
<div class="modal-body" id="showmenudataloginventaris">
    <div class="pb-2" style="font-size: 12px;">
        <table class="styled-table" id="example1" style="width: 100%;">
            <thead style="font-size: 12px;">
                <tr style="font-size: 10px;">
                    <td>No</td>
                    <td>Nama Barang</td>
                    <td>Kode Klasifikasi</td>
                    <td>Lokasi</td>
                    <td>Merek</td>
                    <td>Type</td>
                    <td>Tanggal Pembelian</td>
                    <td>Tahun Perolehan</td>
                    <td>Harga</td>
                    <td>action</td>
                </tr>
            </thead>

        </table>
    </div>
</div>
<div class="modal-footer" style="text-align: left;">
    {{-- @if ($data->isEmpty())
@else

    @if ($erorjenis == 0 && $erorlokasi == 0)
    <a href="{{ url('divisi/masterbarang/dataloginventaris/downloaddataloginventory', []) }}" class="btn btn-dark" ><i class="fa fa-download"></i> Download Data</a>
    @else
    <span class="badge badge-danger shadow-danger m-3" style="font-size: 15px;">Ada Eror Klasifikasi : {{$erorjenis}} Kode Tidak Ditemukan</span>
    <span class="badge badge-danger shadow-danger m-3" style="font-size: 15px;">Ada Eror Lokasi : {{$erorlokasi}} Kode Tidak Ditemukan</span>

    @endif

@endif --}}
    <a href="{{ url('divisi/masterbarang/dataloginventaris/downloaddataloginventory', []) }}" class="btn-dark btn-sm"><i
            class="fa fa-download"></i> Simpan Data Master Barang</a>

</div>
<script src="{{ asset('assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js', []) }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js', []) }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example1').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('master.barang.upload.data') }}",
            columns: [{
                    data: 'id',
                    "width": "4%"
                },
                {
                    data: 'nama_barang'
                },

                {
                    data: 'kd_inventaris',

                },
                {
                    data: 'kd_lokasi',
                },
                {
                    data: 'merk',
                },
                {
                    data: 'type',
                },
                {
                    data: 'tgl_beli',
                },
                {
                    data: 'th_perolehan',
                },
                {
                    data: 'harga_perolehan',
                    className: 'text-right'
                },
                {
                    data: 'btn',
                    className: 'text-center',
                    "width": "4%"
                }
            ]

        });
        // console.log(columns);
        // new $.fn.dataTable.FixedHeader(table);
    });
</script>
