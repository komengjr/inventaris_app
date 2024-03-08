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
                    <th>Gambar</th>
                    <th>ID Inventaris</th>
                    <th>Nomor Inventaris</th>
                    <th>Nama Barang</th>
                    {{-- <th>Lokasi</th>
                    <th>Merek / Type</th>
                    <th>Harga</th>
                    <th>Action</th> --}}
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($datapemusnahan as $datapemusnahan)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$datapemusnahan->id_inventaris}}</td>
                        <td>{{$datapemusnahan->id_inventaris}}</td>
                        <td>{{$datapemusnahan->id_inventaris}}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times"></i>
        Close</button>
        <form action="{{ url('data-pemusnahan-inventaris/send', []) }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Kirim</button>
        </form>

</div>
