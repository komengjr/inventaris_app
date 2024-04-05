<div class="modal-header">
    <h5 class="modal-title">Daftar List Peminjaman Barang</h5>
    <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body" id="modal-body-peminjaman">

    <div class="table-responsive" style="letter-spacing: .0px;">
        <table id="example" class="styled-table" style="font-size: 12px">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Inventaris</th>
                    <th>Nama Barang</th>
                    <th>Klasifikasi</th>
                    <th>Kategori Klasifikasi</th>
                    <th>Cabang</th>
                    <th>Merek</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $data)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->no_inventaris}}</td>
                        <td>{{$data->nama_barang}}</td>
                        <td>{{$data->kd_inventaris}}</td>
                        <td>
                            @php
                                $cat = DB::table('tbl_inventory')->where('kd_inventaris',$data->kd_inventaris)->first();
                            @endphp
                                @if ($cat)
                                    {{$cat->nama_barang}}
                                @else
                                    NULL
                                @endif
                        </td>
                        <td>{{$data->nama_cabang}}</td>
                        <td>{{$data->merk}}</td>
                        <td>{{$data->type}}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
<div class="modal-footer">

</div>
<script src="{{ asset('https://code.jquery.com/jquery-3.7.0.js') }}"></script>
<script src="{{ asset('https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js') }}"></script>
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js') }}"></script>
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js') }}"></script>
<script src="{{ asset('https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js') }}"></script>
<script>
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
