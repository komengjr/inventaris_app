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

                                <td class="text-center">
                                    @if ($item->kd_jenis == 1)
                                    <div class="icheck-material-success icheck-inline">
                                        <input type="checkbox" id="inline-success{{$item->no_inventaris}}" checked />
                                        <label for="inline-success{{$item->no_inventaris}}"></label>
                                    </div>
                                    @else
                                    <div class="icheck-material-success icheck-inline">
                                        <input type="checkbox" id="inline-success{{$item->no_inventaris}}"/>
                                        <label for="inline-success{{$item->no_inventaris}}"></label>
                                    </div>
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
