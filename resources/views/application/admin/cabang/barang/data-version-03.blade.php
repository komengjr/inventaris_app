<div class="card mb-3 bg-primary">
    <div class="card-body py-2">
        <div class="row flex-between-center">
            <div class="col-sm-auto mb-2 mb-sm-0">
                <button type="button" class="btn btn-danger btn-sm" id="btn-delete-selected-v3" disabled>
                    <span class="fa fa-trash"></span> Hapus Terpilih (<span id="count-selected-v3">0</span>)
                </button>
            </div>
        </div>
    </div>
</div>

<table id="exampledatas" class="table table-striped nowrap" style="width:100%">
    <thead class="bg-200 text-700">
        <tr>
            <th class="text-center" width="10">
                <input type="checkbox" id="select-all-barang-v3" class="form-check-input">
            </th>
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
            <td class="text-center">
                <!-- Menggunakan primary key/kode unik v3 -->
                <input type="checkbox" name="selected_barang[]" value="{{ $datas->inventaris_data_code }}" class="form-check-input check-item-barang-v3">
            </td>
            <td>
                @if ($datas->inventaris_data_file == '')
                <img src="{{ asset('no_img.jpg') }}" alt="lightbox" class="img-thumbnail" width="70" height="70">
                @else
                <img src="{{ asset($datas->inventaris_data_file) }}" alt="" width="80" />
                @endif
            </td>
            <td>{{ $datas->inventaris_data_name }}</td>
            <td>{{ $datas->inventaris_data_code }}</td>
            <td>{{ $datas->inventaris_data_number }}</td>
            @if ($nama_lokasi->isEmpty())
            <td>{{ $datas->inventaris_data_location }}</td>
            @else
            <td>{{ $datas->inventaris_data_location }} ( {{ $nama_lokasi[0]->nama_lokasi }} )</td>
            @endif
            <td>{{ $datas->inventaris_data_merk }} / {{ $datas->inventaris_data_type }}</td>
            <td>@currency($datas->inventaris_data_harga)</td>
            <td class="text-center">
                <button class="btn btn-falcon-warning btn-sm" id="button-update-data-barang-cabang" data-code="{{ $datas->inventaris_data_number }}">
                    <i class="fa fa-edit"></i> Detail & Edit
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    var tableV3 = $('#exampledatas').DataTable({
        responsive: true
    });

    $('#select-all-barang-v3').on('change', function() {
        $('.check-item-barang-v3').prop('checked', $(this).is(':checked'));
        updateDeleteButtonStateV3();
    });

    $(document).on('change', '.check-item-barang-v3', function() {
        if (!$(this).is(':checked')) {
            $('#select-all-barang-v3').prop('checked', false);
        }
        updateDeleteButtonStateV3();
    });

    function updateDeleteButtonStateV3() {
        var checkedCount = $('.check-item-barang-v3:checked').length;
        $('#count-selected-v3').text(checkedCount);
        $('#btn-delete-selected-v3').prop('disabled', checkedCount === 0);
    }

    // Aksi Hapus Massal V3
    $('#btn-delete-selected-v3').on('click', function(e) {
        e.preventDefault();
        var selectedIds = [];
        $('.check-item-barang-v3:checked').each(function() {
            selectedIds.push($(this).val());
        });

        if (selectedIds.length === 0) return;

        if (confirm('Apakah Anda yakin ingin menghapus ' + selectedIds.length + ' data terpilih?')) {
            $('#table-data-version').html('<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');

            $.ajax({
                url: "{{ route('masteradmin_cabang_delete_multiple_barang') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "ids": selectedIds,
                    "code": "{{ $cabang->kd_cabang ?? '' }}",
                    "version": "v03"
                },
                dataType: 'html',
            }).done(function(data) {
                $('#table-data-version').html(data);
            }).fail(function() {
                alert('Terjadi kesalahan saat menghapus data.');
                location.reload();
            });
        }
    });
</script>
