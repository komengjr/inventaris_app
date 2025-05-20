<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Detail Data Stock Opname </h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="p-3" id="form-data-barang">
        <div id="table-data-peminjaman">
            <table id="exampledata" class="table table-striped nowrap" style="width:100%">
                <thead class="bg-200 text-700">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Nomor Inventaris</th>
                        <th>Status Barang</th>
                        <th>Keterangan Verifikasi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody style="font-size: 13px;">
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $datas)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $datas->nama_barang }}</td>
                            <td>{{ $datas->no_inventaris }}</td>
                            <td>
                                @if ($datas->status_data_inventaris == 0)
                                    <span class="badge bg-success">Baik</span>
                                @elseif($datas->status_data_inventaris == 1)
                                    <span class="badge bg-warning">Maintenance</span>
                                @elseif($datas->status_data_inventaris == 2)
                                    <span class="badge bg-danger">Rusak</span>
                                @endif
                            </td>
                            <td>{{ $datas->keterangan_data_inventaris }}</td>
                            <td>
                                <button class="btn btn-falcon-danger btn-sm" id="button-remove-data-stock-opname" data-code="{{$datas->id_sub_verifdatainventaris }}"><span class="fa fa-trash"></span></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        new DataTable('#exampledata', {
            responsive: true
        });
    </script>
</div>
