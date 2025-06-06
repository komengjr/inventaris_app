<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Data Barang </h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="p-3" id="form-data-barang">
        <div id="table-data-version">
            <table id="exampledata" class="table table-striped nowrap" style="width:100%">
                <thead class="bg-200 text-700 fs--2">
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Barang</th>
                        <th>ID Inventaris</th>
                        <th>Nomor Inventaris</th>
                        <th>Lokasi</th>
                        <th>Merek / Type</th>
                        <th>Tanggal Beli</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody style="font-size: 11px;">
                    @foreach ($data as $datas)
                        <?php
                        $nama_lokasi = DB::table('master_lokasi')->select('master_lokasi.master_lokasi_name')->where('master_lokasi_code', $datas->inventaris_data_location)->first();
                        ?>
                        <tr>
                            <td>
                                @if ($datas->inventaris_data_file == '')
                                    <img src="{{ asset('no_img.jpg') }}" alt="lightbox" class="img-thumbnail"
                                        id="videoPreview" width="70" height="70">
                                @else
                                    <img src="{{ asset($datas->inventaris_data_file) }}" alt="" width="80" />
                                @endif
                            </td>
                            <td>{{ $datas->inventaris_data_name }}</td>
                            <td>{{ $datas->inventaris_data_code }}</td>
                            <td>{{ $datas->inventaris_data_number }}</td>
                            @if (!$nama_lokasi)
                                <td>{{ $datas->inventaris_data_location }}</td>
                            @else
                                <td>{{ $datas->inventaris_data_location }} ( {{ $nama_lokasi->master_lokasi_name }} )</td>
                            @endif
                            <td>
                                {{ $datas->inventaris_data_merk }} / {{ $datas->inventaris_data_type }}
                            </td>
                            <td>{{$datas->inventaris_data_tgl_beli}}</td>
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
<script>
    $('#organizerSingle').on("change", function() {
        var dataid = $("#organizerSingle option:selected").attr('data-id');
        var datacode = $("#organizerSingle option:selected").attr('data-code');
        $('#table-data-version').html(
            '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
        );
        if (dataid == "") {
            location.reload();
        } else {
            $.ajax({
                url: "{{ route('masteradmin_cabang_option_data_barang') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": datacode,
                    "id": dataid,
                },
                dataType: 'html',
            }).done(function(data) {
                $("#table-data-version").html(data);
            }).fail(function() {
                console.log('eror');
            });
        }

    });
</script>
