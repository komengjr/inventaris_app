<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Data Barang {{$cabang->nama_cabang}}</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Resto</a></p>
    </div>
    <div class="p-3" id="form-data-barang">
        <table id="exampledata" class="table table-striped nowrap" style="width:100%">
            <thead class="bg-200 text-700">
                <tr>
                    <th>Gambar</th>
                    <th>Nama Barang</th>
                    <th>ID Inventaris</th>
                    <th>Nomor Inventaris</th>
                    <th>Lokasi</th>
                    <th>Merek / Type</th>
                    <th>Harga</th>
                    <th>Action</th>
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
                                <img src="{{ asset('no_img.jpg') }}" alt="lightbox" class="img-thumbnail"
                                    id="videoPreview" width="70" height="70">
                            @else
                                <img src="{{ asset($datas->gambar) }}" alt="" width="80" />
                            @endif
                        </td>
                        <td>{{ $datas->nama_barang }}</td>
                        <td>{{ $datas->id_inventaris }}</td>
                        <td>{{ $datas->no_inventaris }}</td>
                        @if ($nama_lokasi->isEmpty())
                            <td>{{ $datas->kd_lokasi }}</td>
                        @else
                            <td>{{ $datas->kd_lokasi }} ( {{ $nama_lokasi[0]->nama_lokasi }} )</td>
                        @endif


                        <td>
                            {{ $datas->merk }} / {{ $datas->type }}
                        </td>

                        <td>@currency($datas->harga_perolehan)</td>
                        <td class="text-center">
                            <button class="btn btn-falcon-warning" id="button-update-data-barang-cabang" data-code="{{$datas->id_inventaris}}"><i class="fa fa-edit">
                                </i> Detail & Edit</button><br><br>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        new DataTable('#exampledata', {
            responsive: true
        });
    </script>
</div>
