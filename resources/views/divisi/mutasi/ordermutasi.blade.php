<div class="modal-header bg-success">
    <p class="modal-title text-white">
        Recent History Order
    </p>
    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body" id="showmenudataloginventaris">
    <div class="pb-2" style="font-size: 12px;">
        <table class="styled-table" id="default-datatablelog">
            <thead style="font-size: 12px;">
                <tr style="font-size: 12px;">
                    <th style="width: 1px; height: 1px;;">No</th>

                    <th>Nama Barang</th>
                    <th>Kode Klasifikasi</th>
                    <th>Kode Lokasi</th>
                    <th>Merek / Type</th>
                    <th>Tanggal Pembelian</th>
                    <th>Tahun Perolehan</th>
                    <th>Harga</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </div>
</div>
    <div class="modal-footer" style="float: left;">

    </div>
    <script>
        $(document).ready(function() {
            //Default data table
            $('#default-datatablelog').DataTable();

        });
    </script>
