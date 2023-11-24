<div class="pb-2" style="font-size: 12px;">
    <table class="styled-table" id="example1" style="width: 100%;">
        <thead style="font-size: 12px;">
            <tr style="font-size: 10px;">
                <td>No</td>
                <td>Nama Barang</td>
                <td>No Inventaris</td>
                <td>Kode Klasifikasi</td>
                <td>Lokasi</td>
                <td>Merek / Type</td>
                <td>Tanggal Pembelian</td>
                <td>Tahun Perolehan</td>
                <td>Harga</td>
                <td>action</td>
            </tr>
        </thead>

    </table>

</div>
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
                    className: 'text-right'
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
