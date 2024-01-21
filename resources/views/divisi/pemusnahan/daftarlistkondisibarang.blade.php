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
                        <th>Nama Barang</th>
                        <th>Merek / Type</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($databarang as $item)
                        <tr>
                            <td>1</td>
                            <td>{{$item->nama_barang}}</td>
                            <td>{{$item->merk}} / {{$item->type}}</td>
                            <td>{{$item->keterangan_data_inventaris}}</td>
                            <td><button class="btn-danger"><i class="fa fa-trash"></i></button></td>
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
