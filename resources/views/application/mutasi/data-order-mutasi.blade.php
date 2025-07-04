<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Data Order Mutasi Cabang</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="p-3" id="menu-terima-order-mutasi">
        <table id="data-table-mutasi" class="table table-striped nowrap" style="width:100%">
            <thead class="bg-200 text-700 fs--2">
                <tr>
                    <th>No</th>
                    <th>Tiket Order</th>
                    <th>Dari Cabang</th>
                    <th>Penanggung Jawab</th>
                    <th>Menyetujui</th>
                    <th>Yang Menyerahkan</th>
                    <th>Penerima</th>
                    <th>Tanggal Terima</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody class="fs--1">
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $datas)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $datas->kd_mutasi }}</td>
                        <td>{{ $datas->nama_cabang }}</td>
                        <td>{{ $datas->penanggung_jawab }}</td>
                        <td>{{ $datas->menyetujui }}</td>
                        <td>{{ $datas->yang_menyerahkan }}</td>
                        <td>{{ $datas->penerima }}</td>
                        <td>{{ $datas->tgl_terima }}</td>
                        <td>
                            @if ($datas->status_mutasi == 2)
                                <button class="btn btn-falcon-warning btn-sm" id="button-terima-order-mutasi"
                                    data-code="{{ $datas->kd_mutasi }}">Terima Order</button>
                            @elseif ($datas->status_mutasi == 3)
                                <button class="btn btn-falcon-primary btn-sm" id="button-print-rekap-order-mutasi"
                                    data-code="{{ $datas->kd_mutasi }}"><span class="fas fa-print"></span> Cetak
                                    Mutasi</button>
                            @endif
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

