<form  method="POST" action="{{ url('divisi/tambahdatamaintenance', []) }}" enctype="multipart/form-data" >
    @csrf
    <div class="row">
        <div class="col-6">
            <label for="">Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang" value="{{$data->nama_barang}}" disabled>

        </div>
        <div class="col-6">
            <label for="">No Inventaris</label>
            <input type="text" class="form-control" name="no_inventaris" value="{{$data->no_inventaris}}" disabled>
            <input type="text" class="form-control" name="id_inventaris" value="{{$data->id_inventaris}}" hidden>

        </div>
        <div class="col-6">
            <label for="">Pelapor</label>
            <input type="text" class="form-control" name="pelapor" required>

        </div>
        <div class="col-6">
            <label for="">Tanggal Maintenance</label>
            <input type="date" class="form-control" name="tgl_mulai" required>
        </div>

        <div class="col-12">
            <label for="">Bukti Maintenance</label>
            <label class="custom-file-upload form-control" id="upload-container" >
                <input type="file" id="browseFile" class="form-control"/>
                <i class="fa fa-upload "> </i> Upload File
            </label>

            <iframe src="" frameborder="0" id="videoPreview" style="width: 100%; height: 400px;"></iframe>
            <div class="progress  mt-3" style="height: 20px">
                <div class="progress-bar progress-bar-striped progress-bar-animated loading" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%; height: 100%">0%</div>
            </div>
            <input id="link" type="text" name="link" class="form-control">
        </div>

        <div class="col-12">
            <label for="">Deskripsi Maintenance</label>
            <textarea class="form-control" id="" cols="30" rows="10" name="ket_maintenance"></textarea>
        </div>
        <div class="col-12">
            {{-- <button type="submit" class="btn-info"><i class="zmdi zmdi-save"></i></button> --}}
        </div>
    </div>
    <div class="modal-footer">
        {{-- <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button> --}}
        <button type="submit" class="btn-success" id="" data-url=""><i class="fa fa-save" ></i> Simpan Data</button>
    </div>
</form>
<script type="text/javascript">

    var browseFile = $('#browseFile');
    var resumable = new Resumable({
        target: '{{ route('file-upload.uploaddatamaintenance') }}',
        query:{_token:'{{ csrf_token() }}'} ,// CSRF token
        fileType: ['pdf'],
        headers: {
            'Accept' : 'application/json'
        },
        testChunks: false,
        throttleProgressCallbacks: 1,
    });

    resumable.assignBrowse(browseFile[0]);

    resumable.on('fileAdded', function (file) { // trigger when file picked
        showProgress();
        resumable.upload() // to actually start uploading.
    });

    resumable.on('fileProgress', function (file) { // trigger when file progress update
        updateProgress(Math.floor(file.progress() * 100));
    });

    resumable.on('fileSuccess', function (file, response) { // trigger when file upload complete
        response = JSON.parse(response)
        $('#videoPreview').attr('src', response.path);
        $('#link').attr('value', response.filename);
        $('.card-footer').show();
        $('#browseFile').hide();
    });

    resumable.on('fileError', function (file, response) { // trigger when there is any error
        alert('file uploading error.')
    });


    var progress = $('.progress');

    function showProgress() {
        progress.find('.loading').css('width', '0%');
        progress.find('.loading').html('0%');
        progress.find('.loading').removeClass('bg-info');
        progress.show();
    }

    function updateProgress(value) {
        progress.find('.loading').css('width', ` ${value}%`)
        progress.find('.loading').html(`${value}%`)
    }

    function hideProgress() {
        progress.hide();
    }

</script>
