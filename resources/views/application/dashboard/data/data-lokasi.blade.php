<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Data Barang Lokasi : <span class="fw-bold text-primary">{{$lokasi->nama_lokasi}}</span> No.{{$lokasi->nomor_ruangan }} </h4>
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
                    $nama_lokasi = DB::table('tbl_lokasi')->select('tbl_lokasi.nama_lokasi')->where('kd_lokasi', $datas->inventaris_data_location)->get();
                    ?>
                    <tr>
                        <td>
                            @if ($datas->inventaris_data_file == '')
                                <img src="{{ asset('no_pict.png') }}" alt="lightbox" class="img-thumbnail"
                                    id="videoPreview" width="70" height="70">
                            @else
                                <img src="{{ asset($datas->inventaris_data_file) }}" alt="" width="80" />
                            @endif
                        </td>
                        <td>{{ $datas->inventaris_data_name }}</td>
                        <td>{{ $datas->inventaris_klasifikasi_code }}</td>
                        <td>{{ $datas->inventaris_data_number }}</td>
                        @if ($nama_lokasi->isEmpty())
                            <td>{{ $datas->inventaris_data_location }}</td>
                        @else
                            <td>{{ $datas->inventaris_data_location }} ( {{ $nama_lokasi[0]->nama_lokasi }} )</td>
                        @endif


                        <td>
                            {{ $datas->inventaris_data_merk }} / {{ $datas->inventaris_data_type }}
                        </td>

                        <td>@currency($datas->inventaris_data_harga)</td>
                        <td class="text-center">
                            <button class="btn-dark" id="editdatabarang" data-url="123"><i class="fa fa-eye">
                                </i> Detail & Edit</button><br><br>
                            <button class="btn-info"
                                onclick="window.open('../../printbarcodebyid/{{ $datas->id_inventaris_data }}', 'formpopup', 'width=400,height=400,resizeable,scrollbars'); this.target = 'formpopup';"><i
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
<script src="{{ asset('vendors/glightbox/glightbox.min.js') }}"></script>
