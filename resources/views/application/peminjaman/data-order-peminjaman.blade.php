<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Data Order Peminjaman Cabang</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="p-3" id="menu-terima-order-peminjaman">
        <table id="data-table-mutasi" class="table table-striped nowrap" style="width:100%">
            <thead class="bg-200 text-700 fs--2">
                <tr>
                    <th>No</th>
                    <th>Tiket Peminjaman</th>
                    <th>Kegiatan</th>
                    <th>Dari Cabang</th>
                    <th>Penanggung Jawab Alat</th>
                    <th>Menyetujui</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody class="fs--1">
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $datas)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$datas->tiket_peminjaman}}</td>
                        <td>{{$datas->nama_kegiatan}}</td>
                        <td>{{$datas->nama_cabang}}</td>
                        <td>{{$datas->pj_pinjam}}</td>
                        <td>{{$datas->pj_cabang}}</td>
                        <td>
                            <button class="btn btn-falcon-success btn-sm" id="button-terima-barang-peminjaman" data-code="{{$datas->id_pinjam}}"><span class="fas fa-check-square"></span> Terima Barang</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div id="menu-print-rekap-mutasi"></div>
</div>
<script>
    new DataTable('#data-table-mutasi', {
        responsive: true
    });
</script>

