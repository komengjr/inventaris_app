<div class="card mb-3 bg-primary">
    <div class="card-body py-2">
        <div class="row flex-between-center">
            <div class="col-sm-auto mb-2 mb-sm-0">
                <button type="button" class="btn btn-danger btn-sm" id="btn-delete-selected" disabled>
                    <span class="fa fa-trash"></span> Hapus Terpilih (<span id="count-selected">0</span>)
                </button>
            </div>
        </div>
    </div>
</div>

<table id="exampledatas" class="table table-striped nowrap" style="width:100%">
    <thead class="bg-200 text-700">
        <tr>
            <th class="text-center" width="10">
                <input type="checkbox" id="select-all-barang" class="form-check-input">
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
        $nama_lokasi = DB::table('tbl_lokasi')->select('tbl_lokasi.nama_lokasi')->where('kd_lokasi', $datas->kd_lokasi)->get();
        ?>
        <tr>
            <td class="text-center">
                <input type="checkbox" name="selected_barang[]" value="{{ $datas->id_inventaris }}" class="form-check-input check-item-barang">
            </td>
            <td>
                @if ($datas->gambar == '')
                <img src="{{ asset('no_img.jpg') }}" alt="lightbox" class="img-thumbnail" width="70" height="70">
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
            <td>{{ $datas->merk }} / {{ $datas->type }}</td>
            <td>@currency($datas->harga_perolehan)</td>
            <td class="text-center">
                <button class="btn btn-falcon-warning btn-sm" id="button-update-data-barang-cabang" data-code="{{ $datas->id_inventaris }}">
                    <i class="fa fa-edit"></i> Detail & Edit
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    var tableV2 = $('#exampledatas').DataTable({
        responsive: true
    });

    // Select All Checkbox
    $('#select-all-barang').on('change', function() {
        $('.check-item-barang').prop('checked', $(this).is(':checked'));
        updateDeleteButtonState();
    });

    // Checkbox Item
    $(document).on('change', '.check-item-barang', function() {
        if (!$(this).is(':checked')) {
            $('#select-all-barang').prop('checked', false);
        }
        updateDeleteButtonState();
    });

    function updateDeleteButtonState() {
        var checkedCount = $('.check-item-barang:checked').length;
        $('#count-selected').text(checkedCount);
        $('#btn-delete-selected').prop('disabled', checkedCount === 0);
    }

    // Aksi Hapus Massal V2
    $('#btn-delete-selected').on('click', function(e) {
        e.preventDefault();
        var selectedIds = [];
        $('.check-item-barang:checked').each(function() {
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
                    "version": "v02"
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
