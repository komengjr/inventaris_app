<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-2">
        <h4 class="mb-1" id="staticBackdropLabel">Data Pengaturan Depresiasi</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="p-3">
        <div id="menu-data-lokasi-barang">
            <table id="exampledata" class="table table-striped nowrap" style="width:100%" border="1">
                <thead class="bg-200 text-700">
                    <tr>
                        <th>No</th>
                        <th>Kode Depresiasi</th>
                        <th>Klasifikasi Aset</th>
                        <th>Harga Perolehan</th>
                        <th>Masa Depresiasi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $datas)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$datas->kd_depresiasi }}</td>
                        <td>{{$datas->klasifikasi_aset}}</td>
                        <td>{{$datas->harga_perolhean}}</td>
                        <td>{{$datas->masa_depresiasi}}</td>
                        <td>

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
<script src="{{ asset('vendors/glightbox/glightbox.min.js') }}"></script>
