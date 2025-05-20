<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Data Barang {{ $cabang->nama_cabang }}</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="p-3" id="form-data-barang">
        <div class="card mb-3 bg-primary">
            <div class="card-body">
                <div class="row flex-between-center">
                    <div class="col-sm-auto mb-2 mb-sm-0 ">
                        <h6 class="mb-0 text-white">Total Barang : <span id="jumlah barang">{{ $data->count() }}</span></h6>
                    </div>
                    <div class="col-sm-auto">
                        <div class="row gx-2 align-items-center">
                            <div class="col-auto">
                                <form class="row gx-2">
                                    <div class="col-auto"><small class="text-white">Sort by: </small></div>
                                    <div class="col-auto">
                                        <select class="form-select form-select-sm" id="organizerSingle"
                                            name="organizerSingle" aria-label="Bulk actions">
                                            <option data-id="v02" data-code="{{ $cabang->kd_cabang }}">Data Version 2
                                            </option>
                                            <option data-id="v03" data-code="{{ $cabang->kd_cabang }}">Data Version 3
                                            </option>
                                        </select>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="table-data-version">
            <table id="exampledata" class="table table-striped nowrap" style="width:100%">
                <thead class="bg-200 text-700">
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Barang</th>
                        <th>ID Inventaris</th>
                        <th>Nomor Inventaris</th>
                        <th>Lokasi</th>
                        <th>Merek / Type</th>
                        <th>Tanggal Beli</th>
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
                            <td>{{$datas->tgl_beli}}</td>
                            <td>@currency($datas->harga_perolehan)</td>
                            <td class="text-center">
                                <button class="btn btn-falcon-warning" id="button-update-data-barang-cabang"
                                    data-code="{{ $datas->id_inventaris }}"><i class="fa fa-edit">
                                    </i> Detail & Edit</button><br><br>
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
