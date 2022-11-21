<div class="row pl-3 pt-2 pb-2">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row pl-3 pt-2 pb-2">
                    <div class="col-6 ">
                        <h5><strong>Form Peminjaman :: Cabang {{$lokasi[0]->nama_cabang}}</strong></h5>
                    </div>
                  
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive" id="showdatamutasi">
                <table id="default-datatable" class="styled-table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Ururt Barang</th>
                            <th>kode Inventaris</th>
                            <th>Kategori Barang</th>
                            <th>Nama Kelompok Barang</th>
                            <th>Jumlah Barang</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                  
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="master-lihat-detail-barang">
    <div class="modal-dialog modal-dialog-centered modal-xl" style="width: 100%;">
        <div class="modal-content">
         <div id="showdatabarangx">
            <div class="modal-body">
            </div>
            </div>
        </div>
      </div>
</div>
<script>
    $(document).ready(function() {
        //Default data table
        $('#default-datatable').DataTable();


        var table = $('#example').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
        });

        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');

    });
</script>