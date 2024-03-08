<div class="modal-header">
    <h5 class="modal-title">Daftar List Pemusnahan Barang</h5>
    <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">

    <div class="table-responsive" style="letter-spacing: .0px;">
        <table id="default-datatablesubbarang" class="styled-table" style="font-size: 10px">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Inventaris</th>
                    <th>Nomor Inventaris</th>
                    <th>Nama Barang</th>
                    {{-- <th>Lokasi</th> --}}
                    <th>Merek / Type</th>
                    <th>Harga</th>
                    <th>Cabang</th>
                    <th>Dasar Pengajuan</th>
                    <th>Eksekusi</th>
                    <th>Tanggal Pemusnahan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($datapemusnahan as $datapemusnahan)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$datapemusnahan->id_inventaris}}</td>
                        <td>{{$datapemusnahan->no_inventaris}}</td>
                        <td>{{$datapemusnahan->nama_barang}}</td>
                        <td>{{$datapemusnahan->merk}} / {{$datapemusnahan->type}}</td>
                        <td>{{$datapemusnahan->harga_perolehan}}</td>
                        <td>{{$datapemusnahan->nama_cabang}}</td>
                        <td>{{$datapemusnahan->dasar_pengajuan}}</td>
                        <td>{{$datapemusnahan->eksekusi}}</td>
                        <td>{{$datapemusnahan->tgl_pemusnahan}}</td>
                        <td><button class="btn-warning"><i class="fa fa-pencil"></i></button></td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-dark" data-dismiss="modal" ><i class="fa fa-times"></i>
        Close</button>
        <form action="{{ url('data-pemusnahan-inventaris/send', []) }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Kirim</button>
        </form>

</div>
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
