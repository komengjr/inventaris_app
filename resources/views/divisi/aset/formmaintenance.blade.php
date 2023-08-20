<style>
    input[type="file"] {
        display: none;
    }

    .row label {
        padding-top: 10px;
    }
</style>

<div class="modal-content" id="showdatabarang">
    <div class="modal-header">
        <h6>Form Maintenance <span style="color: royalblue;"></span> </h6>
        <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-close"></i>
        </button>
    </div>
    {{-- <form  method="POST" action="" enctype="multipart/form-data" id="form-update"> --}}
    <form method="POST" action="{{ url('divisi/dataaset/posttambahdatamaintenance', []) }}"
        enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-6">
                    <label for="">Tanggal Maintenance</label>
                    <input type="date" class="form-control" name="tgl_maintenance" required>
                    <input type="text" class="form-control" name="id_inventaris" value="{{ $id }}" hidden>
                </div>
                <div class="col-6">
                    <label for="">Harga Maintenance</label>
                    <input type="text" class="form-control" id="dengan-rupiah" name="hargamaintenance" required>
                </div>
                <div class="col-6">
                    <label for="">Suplier</label>
                    <input type="text" class="form-control" name="suplier" required>
                </div>
                <div class="col-6">
                    <label for="">Upload File</label>
                    <label class="custom-file-upload form-control" id="upload-container">
                        <input type="file" id="browseFile" class="form-control" />
                        <i class="fa fa-upload "></i> Upload File
                    </label>
                </div>
                <div class="col-12">
                    <label for="">Deskripsi Peminjaman</label>
                    <textarea class="form-control" id="" cols="30" rows="10" name="deskripsi"></textarea>
                </div>
                <div class="col-12 pt-2">

                    <iframe src="https://via.placeholder.com/800x500" alt="lightbox"
                        class="lightbox-thumb img-thumbnail" id="videoPreview" width="450" height="400"
                        style="display: none; height: 500px;;"></iframe>



                    <div class="progress  mt-3" style="height: 20px" id="prosesloading">
                        <div class="progress-bar progress-bar-striped progress-bar-animated " role="progressbar"
                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%; height: 100%">0%
                        </div>
                    </div>
                    <input id="link" type="text" name="link" class="form-control" hidden>
                </div>
            </div>
        </div>


        <div class="modal-footer">
            <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Clowwse</button>
            {{-- <button type="submit" class="btn btn-primary" ><i class="fa fa-save" ></i> Update Data</button> --}}
            <button type="submit" class="btn-success" id="" data-url=""><i class="fa fa-save"></i> Simpan
                Data</button>
        </div>
    </form>

</div>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script> --}}
<script src="{{ url('js/rupiah.js', []) }}"></script>
<script>
    $(document).ready(function() {
        $('.single-select').select2();

    });

</script>
<script type="text/javascript">
    var browseFile = $('#browseFile');
    var resumable = new Resumable({
        target: '{{ route('uploaddatamaintenance') }}',
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

    resumable.assignBrowse(browseFile[0]);

    resumable.on('fileAdded', function(file) { // trigger when file picked
        showProgress();
        resumable.upload() // to actually start uploading.
    });

    resumable.on('fileProgress', function(file) { // trigger when file progress update
        updateProgress(Math.floor(file.progress() * 100));
    });

    resumable.on('fileSuccess', function(file, response) { // trigger when file upload complete
        response = JSON.parse(response)
        $('#videoPreview').attr('src', response.path);
        $('#link').attr('value', response.filename);
        $('.card-footer').show();
        $('#browseFile').hide();
        $('#prosesloading').hide();
        document.getElementById("videoPreview").style.display = "block";
    });

    resumable.on('fileError', function(file, response) { // trigger when there is any error
        alert('file uploading error.')
    });


    var progress = $('.progress');

    function showProgress() {
        progress.find('.progress-bar').css('width', '0%');
        progress.find('.progress-bar').html('0%');
        progress.find('.progress-bar').removeClass('bg-info');
        progress.show();
    }

    function updateProgress(value) {
        progress.find('.progress-bar').css('width', ` ${value}%`)
        progress.find('.progress-bar').html(`${value}%`)
    }

    function hideProgress() {
        progress.hide();
    }
</script>
