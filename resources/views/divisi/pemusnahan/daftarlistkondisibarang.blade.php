<div class="modal-content" id="showdatabarang">
    <div class="modal-header bg-success">
        <h6>Kondisi Barang <span style="color: royalblue;"> </span> </h6>
        <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-close"></i>
        </button>
    </div>
    <div class="modal-body">
        <div class="table-responsive pb-5">
            <table class="table styled-table align-items-center table-flush pb-2" id="default-datatable-kondisi">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Inventaris</th>
                        <th>Nama Barang</th>
                        <th>Merek / Type</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($databarang as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->no_inventaris}}</td>
                            <td>{{$item->nama_barang}}</td>
                            <td>{{$item->merk}} / {{$item->type}}</td>
                            <td>{{$item->keterangan_data_inventaris}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        $('#default-datatable-kondisi').DataTable();

    });
</script>
