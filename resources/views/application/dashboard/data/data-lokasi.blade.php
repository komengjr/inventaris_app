<style>
    input[type="file"] {
        display: none;
    }
</style>
<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Data Barang Lokasi</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="p-2">
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
                                <a href="{{ asset('no_pict.png') }}" data-fancybox="images"
                                    data-caption="{{ $datas->nama_barang }}">
                                    <img src="{{ asset('no_pict.png') }}" alt="lightbox" class="img-thumbnail"
                                        id="videoPreview" width="50" height="50">
                                </a>
                            @else
                                <a href="{{ url($datas->gambar, []) }}" data-fancybox="images"
                                    data-caption="{{ $datas->nama_barang }}" style="width: 50px;">
                                    <img src="{{ url($datas->gambar, []) }}" alt="lightbox"
                                        class="lightbox-thumb img-thumbnail" id="videoPreview" width="50"
                                        height="50" style="width: 100px;">
                                </a>
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
                            <button class="btn-dark" id="editdatabarang"
                                data-url="123"><i class="fa fa-eye">
                                </i> Detail & Edit</button><br><br>
                            <button class="btn-info"
                                onclick="window.open('printbarcodebyid/{{ $datas->id }}', 'formpopup', 'width=400,height=400,resizeable,scrollbars'); this.target = 'formpopup';"><i
                                    class="fa fa-print"></i> Print barcode</button>

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
<script src="{{ url('js/rupiah.js', []) }}"></script>
<script>
    new window.Choices(document.querySelector(".choices-single-jenis"));
    new window.Choices(document.querySelector(".choices-single-lokasi"));
</script>
