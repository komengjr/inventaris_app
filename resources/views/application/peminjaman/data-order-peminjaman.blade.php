<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Data Order Peminjaman Cabang</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>

    <div class="row p-3" id="menu-terima-order-peminjaman">
        <div class="col-md-8 mb-3">
            <div class="card border border-primary">
                <div class="card-body">
                    <table id="data-table-mutasi" class="table table-striped nowrap" style="width:100%">
                        <thead class="bg-200 text-700 fs--2">
                            <tr>
                                <th>No</th>
                                <th>Tiket Peminjaman</th>
                                <th>Kegiatan</th>
                                <th>Dari Cabang</th>
                                <th>User Terkait</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="fs--2">
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $datas)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $datas->tiket_peminjaman }}</td>
                                    <td>{{ $datas->nama_kegiatan }} <br> {{ $datas->tgl_pinjam }} </td>
                                    <td>{{ $datas->nama_cabang }}</td>
                                    <td>
                                        @php
                                            $staff = DB::table('tbl_staff')
                                                ->where('id_staff', $datas->pj_pinjam)
                                                ->first();
                                            $staff1 = DB::table('tbl_staff')
                                                ->where('id_staff', $datas->pj_pinjam_cabang)
                                                ->first();
                                            $user = DB::table('wa_number_cabang')
                                                ->where('wa_number_code', $datas->pj_cabang)
                                                ->first();
                                        @endphp
                                        @if ($staff)
                                            Penanggung Jawab Alat : {{ $staff->nama_staff }} <br>
                                        @endif

                                        @if ($staff1)
                                            Penerima Barang :{{ $staff->nama_staff }}<br>
                                        @endif
                                        @if ($user)
                                            Menyetujui: {{ $user->wa_number_name }}
                                        @endif
                                    </td>

                                    <td>
                                        @if ($datas->status_pinjam == 2)
                                            <button class="btn btn-falcon-success btn-sm"
                                                id="button-terima-barang-peminjaman"
                                                data-code="{{ $datas->id_pinjam }}"><span
                                                    class="fas fa-check-square"></span> Terima
                                                Barang</button>
                                        @else
                                            <button class="btn btn-outline-success btn-sm"
                                                id="button-cetak-rekap-barang-peminjaman"
                                                data-code="{{ $datas->tiket_peminjaman }}"><span
                                                    class="fas fa-print"></span> Print</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border border-primary">
                <div class="card-body">
                    <div id="menu-print-rekap-peminjaman"></div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    new DataTable('#data-table-mutasi', {
        responsive: true
    });
</script>
