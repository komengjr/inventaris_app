<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Data Barang Sesuai Klasifikasi</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="p-3">
        <div id="menu-data-lokasi-barang">
            <table id="exampledata" class="table table-striped nowrap" style="width:100%" border="1">
                <thead class="bg-200 text-700 fs--2">
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Barang</th>
                        <th>Klasifikasi</th>
                        <th>Nomor Inventaris</th>
                        <th>Lokasi Barang</th>
                        <th>Tanggal Pembelian</th>
                        <th>Merek / Type</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody style="font-size: 13px;">
                    @foreach ($data as $datas)
                        <tr>
                            <td>
                                @if ($datas->inventaris_data_file == '')
                                    <img src="{{ asset('no_pict.png') }}" alt="lightbox" class="img-thumbnail"
                                        id="videoPreview" width="70" height="70">
                                @else
                                    <img src="{{ asset($datas->inventaris_data_file) }}" alt=""
                                        width="80" />
                                @endif
                            </td>
                            <td>{{ $datas->inventaris_data_name }}</td>
                            <td>{{ $datas->inventaris_klasifikasi_code }}</td>
                            <td>{{ $datas->inventaris_data_number }}</td>
                            <td>
                                @php
                                    $lokasi = DB::table('master_lokasi')->where('master_lokasi_code',$datas->inventaris_data_location)->first();
                                @endphp
                                @if ($lokasi)
                                    {{$lokasi->master_lokasi_name}}
                                @endif
                            </td>
                            <td>{{ date('d-m-Y', strtotime($datas->inventaris_data_tgl_beli)) }}</td>

                            <td>
                                {{ $datas->inventaris_data_merk }} / {{ $datas->inventaris_data_type }}
                            </td>

                            <td>@currency($datas->inventaris_data_harga)</td>
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
