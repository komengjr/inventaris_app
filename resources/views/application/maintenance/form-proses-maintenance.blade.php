<div class="card border border-primary">
    <form class="row g-3 p-4" action="{{ route('menu_maintenance_save') }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <h5><span class="badge bg-primary">1. Pengajuan</span></h5>
        <div class="col-md-3">
            <label class="form-label" for="inputAddress">Pelapor</label>
            <input type="text" class="form-control" name="pelapor" required>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="inputAddress">Dasar Pengajuan</label>
            <input type="text" class="form-control" name="dasar_pengajuan" required>
        </div>
        <div class="col-md-3">
            <label class="form-label" for="inputAddress">Mengetahui</label>
            <select name="mengetahui" class="form-control" required>
                <option value="">Pilih User</option>
                @foreach ($user as $users)
                    <option value="{{$users->wa_number_code}}">{{$users->wa_number_name}}</option>
                @endforeach
            </select>
        </div>
        <h5><span class="badge bg-primary">2. Identitas Barang</span></h5>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Nama Barang</label>
            <input type="text" class="form-control" name="nama" value="{{ $data->inventaris_data_name }}"
                disabled>
            <input type="text" class="form-control" name="id_inventaris" value="{{ $data->inventaris_data_code }}"
                hidden>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">No Inventaris</label>
            <input type="text" class="form-control" name="" value="{{ $data->inventaris_data_number }}"
                disabled>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Merek / Type</label>
            <input type="text" class="form-control" name="" value="{{ $data->inventaris_data_merk }}"
                disabled>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">No Seri</label>
            <input type="text" class="form-control" name="" value="{{ $data->inventaris_data_no_seri }}"
                disabled>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Tanggal Pembelian</label>
            <input type="text" class="form-control" name="" value="{{ $data->inventaris_data_tgl_beli }}"
                disabled>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Harga Perolehan</label>
            <input type="text" class="form-control" name="" value="@currency($data->inventaris_data_harga)" disabled>
        </div>

        <h5><span class="badge bg-primary">3. Keterangan Maintenance</span></h5>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Tanggal Maintenance</label>
            <input type="date" class="form-control" name="tanggal_buat" id="">
        </div>
        <div class="col-md-8">
            <label class="form-label" for="inputAddress">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id=""></textarea>
        </div>

        <h5><span class="badge bg-primary">4. Upload Document</span></h5>
        <div class="col-md-4">
            <label class="form-label" for="inputAddress">Pilih Berkas</label>
            <input type="file" id="browseFile<?php echo $data->inventaris_data_code; ?>" class="form-control" />
        </div>
        <div class="col-md-8">
            <label class="form-label" for="inputAddress">file Name</label>
            <input type="text" class="form-control" id="link" name="link" style="display: none;">
        </div>
        <div class="col-md-12">
            <div class="progress  mt-3" style="height: 20px">
                <div class="progress-bar progress-bar-striped progress-bar-animated loading" role="progressbar"
                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%; height: 100%">0%
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <iframe src="" frameborder="0" id="videoPreview" style="width: 100%; height: 400px; display: none;"></iframe>
        </div>

        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" id="gridCheck" type="checkbox" required />
                <label class="form-check-label" for="gridCheck">Check me</label>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary float-end" type="submit"><span class="fas fa-save"></span> Simpan
                Data</button>
        </div>
    </form>
</div>

<script type="text/javascript">
    var browseFile<?php echo $data->inventaris_data_code; ?> = $('#browseFile<?php echo $data->inventaris_data_code; ?>');
    var resumable<?php echo $data->inventaris_data_code; ?> = new Resumable({
        target: '{{ route('file-upload.fileuploaduploaddatamaintenance') }}',
        query: {
            _token: '{{ csrf_token() }}'
        }, // CSRF token
        fileType: ['pdf'],
        headers: {
            'Accept': 'application/json'
        },
        testChunks: false,
        throttleProgressCallbacks: 1,
    });

    resumable<?php echo $data->inventaris_data_code; ?>.assignBrowse(browseFile<?php echo $data->inventaris_data_code; ?>);

    resumable<?php echo $data->inventaris_data_code; ?>.on('fileAdded', function(file) { // trigger when file picked
        showProgress();
        resumable<?php echo $data->inventaris_data_code; ?>.upload() // to actually start uploading.
    });

    resumable<?php echo $data->inventaris_data_code; ?>.on('fileProgress', function(file) { // trigger when file progress update
        updateProgress(Math.floor(file.progress() * 100));
    });

    resumable<?php echo $data->inventaris_data_code; ?>.on('fileSuccess', function(file, response) { // trigger when file upload complete
        response = JSON.parse(response)
        $('#videoPreview').show();
        $('#videoPreview').attr('src', response.path);
        $('#link').attr('value', response.filename);
        $('#link').show();
        $('.card-footer').show();
        $('.progress').hide();
        // $('#browseFile<?php echo $data->inventaris_data_code; ?>').hide();
    });

    resumable<?php echo $data->inventaris_data_code; ?>.on('fileError', function(file, response) { // trigger when there is any error
        alert('file uploading error.');
    });


    var progress<?php echo $data->inventaris_data_code; ?> = $('.progress<?php echo $data->inventaris_data_code; ?>');

    function showProgress() {
        progress<?php echo $data->inventaris_data_code; ?>.find('.loading').css('width', '0%');
        progress<?php echo $data->inventaris_data_code; ?>.find('.loading').html('0%');
        progress<?php echo $data->inventaris_data_code; ?>.find('.loading').removeClass('bg-info');
        progress<?php echo $data->inventaris_data_code; ?>.show();
    };

    function updateProgress(value) {
        progress<?php echo $data->inventaris_data_code; ?>.find('.loading').css('width', ` ${value}%`);
        progress<?php echo $data->inventaris_data_code; ?>.find('.loading').html(`${value}%`);
    };

    function hideProgress() {
        progress<?php echo $data->inventaris_data_code; ?>.hide();
    };
</script>
