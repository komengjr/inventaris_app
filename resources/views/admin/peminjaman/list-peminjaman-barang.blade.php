<div class="modal-header">
    <h5 class="modal-title">Daftar List Peminjaman Barang</h5>
    <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body" id="modal-body-peminjaman">

    <div class="table-responsive" style="letter-spacing: .0px;">
        <table id="default-datatablesubbarang" class="styled-table" style="font-size: 12px">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tiket Peminjaman</th>
                    <th>Kegiatan</th>
                    <th>Asal Cabang</th>
                    <th>Tujuan Cabang</th>
                    <th>Penanggung Jawab Cabang</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($datapeminjaman as $datapeminjaman)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$datapeminjaman->tiket_peminjaman}} <br>
                        @if ($datapeminjaman->kd_cabang == $datapeminjaman->tujuan_cabang)
                            <span class="badge badge-primary p-1" style="font-size: 10px;">Antar Divisi</span>
                        @else
                            <span class="badge badge-dark p-1" style="font-size: 10px;">Antar Cabang</span>
                        @endif
                        </td>

                        <td>{{$datapeminjaman->nama_kegiatan}}</td>
                        <td>{{$datapeminjaman->nama_cabang}}</td>
                        <td>
                            @php
                                $tujuancabang = DB::table('tbl_cabang')->where('kd_cabang',$datapeminjaman->tujuan_cabang)->first();
                            @endphp
                            {{$tujuancabang->nama_cabang}}
                        </td>
                        <td>{{$datapeminjaman->nama_staff}}</td>
                        <td>{{$datapeminjaman->tgl_pinjam}}</td>


                        <td class="text-center"><button class="btn-primary" id="button-data-peminjaman-detail" data-id="{{$datapeminjaman->tiket_peminjaman}}"><i class="fa fa-pencil-square-o"></i></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
<div class="modal-footer">

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
