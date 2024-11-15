<div class="">
    <div class="card-body m-5 p-5" style="background: rgb(251, 245, 245);">
        <div class="row g-2">
            <div class="col-md-2 text-center">
                {{-- <input type="file" accept="image/*" onchange="loadFile(event)"> --}}
                @if ($data->gambar == '')
                    <a href="https://via.placeholder.com/1920x1080" data-fancybox="images"
                        data-caption="{{ $data->nama_barang }}">
                        <img src="https://via.placeholder.com/800x500" alt="lightbox" class="lightbox-thumb img-thumbnail"
                            width="50" height="50">
                    </a>
                @else
                    <a href="{{ url($data->gambar, []) }}" data-fancybox="images"
                        data-caption="{{ $data->nama_barang }}">
                        <img src="{{ url($data->gambar, []) }}" alt="lightbox" class="lightbox-thumb img-thumbnail"
                            width="50" height="50">
                    </a>
                @endif


            </div>
            <div class="col-md-5">
                <label for="inputPassword4" class="form-label">Nama Barang</label>
                <input type="text" name="kode_kode" class="form-control" value="{{ $data->id_inventaris }}" hidden>
                <input type="text" name="nama_barang" class="form-control" id="inputPassword4"
                    value="{{ $data->nama_barang }}" disabled>
                <input type="text" name="kd_cabang" class="form-control" id="inputPassword4"
                    value="{{ $data->kd_cabang }}" hidden>
                <label for="inputPassword4" class="form-label">No MOU Dokumen</label>
                <input type="text" name="no_mou" class="form-control" value="{{ $data->no_mou_id }}" disabled>
                <label for="inputPassword4" class="form-label">No KSO Alat</label>
                <input type="text" name="no_kso" class="form-control" value="{{ $data->no_kso_alat }}" disabled>

            </div>
            <div class="col-md-5">

                <label for="inputPassword4" class="form-label">Merek</label>
                <input type="text" name="merk" class="form-control" value="{{ $data->merk }}" disabled>
                <label for="inputPassword4" class="form-label">Nomor Serial</label>
                <input type="text" name="no_seri" class="form-control" value="{{ $data->no_seri }}" disabled>
                <label for="inputPassword4" class="form-label">Tanggal KSO</label>
                <input type="date" name="tgl_kso" class="form-control" value="{{ $data->tgl_kso }}" disabled>
            </div>
        </div>
        <form method="POST" action="{{ route('simpandokumentbarangkso') }}" enctype="multipart/form-data">
            @csrf
            <div class="row g-5">
                <div class="col-md-6">
                    <label for="">Periode</label>
                    <input type="text" class="form-control" name="periode" id="" required>
                    <input type="text" name="id_inventaris" id="" value="{{ $data->id_inventaris }}"
                        hidden>
                    <label for="">Upload Dokumen</label>
                    <label class="custom-file-upload form-control" id="upload-container">
                        <input type="file" id="browseFile<?php echo $id; ?>" class="form-control" />
                        <i class="fa fa-upload "> </i> Upload File
                    </label>
                    <iframe src="" frameborder="0" id="videoPreview"
                        style="width: 100%; height: 400px;"></iframe>
                    <div class="progress  mt-3" style="height: 20px">
                        <div class="progress-bar progress-bar-striped progress-bar-animated loading" role="progressbar"
                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%; height: 100%">0%
                        </div>
                    </div>
                    <input id="link" type="text" name="link" class="form-control" hidden required>
                    <br>
                    <button type="submit" class="btn-success" id="" data-url=""><i class="fa fa-save"></i>
                        Simpan Data</button>
                </div>
                <div class="col-md-6 p-3">
                    <div class="table-responsive" style="letter-spacing: .0px;">
                        <h5><span class="badge badge-primary mx-3">Document KSO</span></h5>
                        <table id="default-datakso" class="styled-table" style="font-size: 10px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Periode</th>
                                    <th>Document</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($document as $document)
                                    <tr>
                                        <td style="width: 3%;">{{ $no++ }}</td>
                                        <td>{{ $document->periode_kso }}</td>
                                        <td><button class="btn-info" id="button-show-document-kso" data-id="{{$document->id_document_kso}}"><i class="fa fa-file"></i> Show
                                                Document</button></td>
                                        <td><button class="btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <div id="show-document-kso"></div>

                </div>

            </div>
            <div class="col-md-6">

            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button> --}}

            </div>
        </form>
    </div>
    <div class="card-body m-3">

    </div>
</div>
<script type="text/javascript">
    var browseFile<?php echo $id; ?> = $('#browseFile<?php echo $id; ?>');
    var resumable<?php echo $id; ?> = new Resumable({
        target: '{{ route('file-upload.uploaddatakso') }}',
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

    resumable<?php echo $id; ?>.assignBrowse(browseFile<?php echo $id; ?>);

    resumable<?php echo $id; ?>.on('fileAdded', function(file) { // trigger when file picked
        showProgress();
        resumable<?php echo $id; ?>.upload() // to actually start uploading.
    });

    resumable<?php echo $id; ?>.on('fileProgress', function(file) { // trigger when file progress update
        updateProgress(Math.floor(file.progress() * 100));
    });

    resumable<?php echo $id; ?>.on('fileSuccess', function(file, response) { // trigger when file upload complete
        response = JSON.parse(response)
        $('#videoPreview').attr('src', response.path);
        $('#link').attr('value', response.filename);
        $('.card-footer').show();
        $('#browseFile<?php echo $id; ?>').hide();
    });

    resumable<?php echo $id; ?>.on('fileError', function(file, response) { // trigger when there is any error
        alert('file uploading error.')
    });


    var progress<?php echo $id; ?> = $('.progress<?php echo $id; ?>');

    function showProgress() {
        progress<?php echo $id; ?>.find('.loading').css('width', '0%');
        progress<?php echo $id; ?>.find('.loading').html('0%');
        progress<?php echo $id; ?>.find('.loading').removeClass('bg-info');
        progress<?php echo $id; ?>.show();
    }

    function updateProgress(value) {
        progress<?php echo $id; ?>.find('.loading').css('width', ` ${value}%`)
        progress<?php echo $id; ?>.find('.loading').html(`${value}%`)
    }

    function hideProgress() {
        progress<?php echo $id; ?>.hide();
    }
</script>
<script>
    $(document).ready(function() {
        //Default data table
        $('#default-datakso').DataTable();

    });
</script>

