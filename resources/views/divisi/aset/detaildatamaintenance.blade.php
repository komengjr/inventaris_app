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
        <a href="{{ url('delete', []) }}"><button class="btn-danger"><i class="fa fa-trash-o"></i></button></a>
        <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-close"></i>
        </button>
    </div>
    {{-- <form  method="POST" action="" enctype="multipart/form-data" id="form-update"> --}}
    <form method="POST" action="{{ url('divisi/dataaset/postupdatedatamaintenance', []) }}"
        enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-6">
                    <label for="">Tanggal Maintenance</label>
                    <input type="date" class="form-control" name="tgl_maintenance" value="{{date('Y-m-d', strtotime($data->tgl_maintenance ))}}" required>
                    <input type="text" class="form-control" name="kode" value="{{ $data->kd_maintenance_aset }}" hidden>
                    <input type="text" class="form-control" name="id_inventaris" value="{{ $data->id_inventaris }}" hidden>
                </div>
                <div class="col-6">
                    <label for="">Harga Maintenance</label>
                    <input type="text" class="form-control" id="dengan-rupiah" name="hargamaintenance" value="@currency($data->harga_maintenance)" required>
                </div>
                <div class="col-6">
                    <label for="">Suplier</label>
                    <input type="text" class="form-control" name="suplier" value="{{$data->suplier_maintenance}}" required>
                </div>
                <div class="col-6">
                    <label for="">Upload File</label>
                    <label class="custom-file-upload form-control" id="upload-container">
                        <input type="file" id="browseFile" class="form-control"/>
                        <i class="fa fa-upload "></i> Upload File
                    </label>
                </div>
                <div class="col-12">
                    <label for="">Deskripsi Maintenance</label>
                    <textarea class="form-control" id="" cols="30" rows="10" name="deskripsi">{{$data->ket_maintenance}}</textarea>
                </div>
                <div class="col-12 pt-2">
                    @if ($data->file != "")
                    <iframe src="{{ asset($data->file) }}" alt="lightbox"
                        class="lightbox-thumb img-thumbnail" id="videoPreview" width="450" height="400"
                        style=" height: 500px;;"></iframe>
                    @else
                    <iframe src="data" alt="lightbox"
                        class="lightbox-thumb img-thumbnail" id="videoPreview" width="450" height="400"
                        style=" height: 500px;;"></iframe>
                    @endif




                    <div class="progress  mt-3" style="height: 20px" id="prosesloading">
                        <div class="progress-bar progress-bar-striped progress-bar-animated " role="progressbar"
                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%; height: 100%">0%
                        </div>
                    </div>
                    <input id="link" type="text" name="link" class="form-control" value="">
                </div>
            </div>
        </div>

        <div class="modal-footer" >
                <button type="submit" class="btn-success" id="" data-url=""><i class="fa fa-pencil-square"></i> Update Data</button>
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
    var id_inventaris = '{{$data->id_inventaris}}';
    var browseFile = $('#browseFile');
    var resumable = new Resumable({
        target: '../divisi/dataaset/tambahdatamaintenance/'+id_inventaris,
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
