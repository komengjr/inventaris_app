<div class="row">
    <div class="col-lg-12">
        <div class="card-body">
            <div class="table-responsive" style="letter-spacing: .0px;">
                <table id="default-datatable1" class="styled-table" style="font-size: 9px;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Inventaris</th>
                            <th>Nama Barang</th>
                            <th>Merek / Type</th>
                            <th>Th Perolehan</th>
                            <th>Masa Depresiasi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($dataaset as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->no_inventaris }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->merk }} / {{ $item->type }}</td>
                                <td>{{ $item->th_perolehan }} </td>
                                <td>
                                    @php
                                        $cekdepresiasi = DB::table('tbl_depresiasi_aset')
                                            ->join('tbl_depresiasi', 'tbl_depresiasi.kd_depresiasi', '=', 'tbl_depresiasi_aset.kd_depresiasi')
                                            ->where('tbl_depresiasi_aset.id_inventaris', $item->id_inventaris)
                                            ->first();
                                    @endphp
                                    @if ($cekdepresiasi)
                                        {{ $cekdepresiasi->klasifikasi_aset }} ( {{ $cekdepresiasi->harga_perolhean }} )
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button class="btn-dark" id="buttondetaildataaset"
                                        data-id="{{ $item->id_inventaris }}"> <i class="fa fa-eye"></i></button>
                                    @if (auth::user()->akses == 'keu')
                                        <button class="btn-warning"><i class="fa fa-pencil" id="buttoneditdetailaset"
                                                data-id="{{ $item->id_inventaris }}"></i></button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
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
