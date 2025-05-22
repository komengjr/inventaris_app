<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Data Barang KSO</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="p-3">
        <div id="menu-data-lokasi-barang">
            <table id="exampledata" class="table table-striped nowrap" style="width:100%" border="1">
                <thead class="bg-200 text-700">
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Barang</th>
                        <th>ID Inventaris</th>
                        <th>Nomor Inventaris</th>
                        <th>Merek / Type</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody style="font-size: 13px;">
                    @foreach ($data as $datas)
                        <?php
                        $nama_lokasi = DB::table('tbl_lokasi')->select('tbl_lokasi.nama_lokasi')->where('kd_lokasi', $datas->kd_lokasi)->get();
                        ?>
                        <tr>
                            <td>
                                @if ($datas->gambar == '')
                                    <img src="{{ asset('no_pict.png') }}" alt="lightbox" class="img-thumbnail"
                                        id="videoPreview" width="70" height="70">
                                @else
                                    <img src="{{ asset($datas->gambar) }}" alt=""
                                        width="80" />
                                @endif
                            </td>
                            <td>{{ $datas->nama_barang }}</td>
                            <td>{{ $datas->kd_inventaris  }}</td>
                            <td>{{ $datas->no_inventaris }}</td>
                            <td>
                                {{ $datas->merk }} / {{ $datas->type }}
                            </td>

                            <td>@currency($datas->harga_perolehan)</td>
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
