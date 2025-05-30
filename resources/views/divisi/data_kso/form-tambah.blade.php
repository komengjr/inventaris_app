<script src="{{ url('assets/plugins/select2/js/select2.min.js', []) }}"></script>
<style>
    input[type="file"] {
        display: none;
    }
</style>

<div class="modal-content" id="showdatabarang">
    {{-- <form  method="POST" action="" enctype="multipart/form-data" id="form-update"> --}}
    <form method="POST" action="{{ url('kso/simpan-data-barang', []) }}" enctype="multipart/form-data"
        id="form-tambah-barang">
        @csrf
        <div class="body" id="showdatabarang">
            <div class="card-body">
                <div class="row g-2">
                    <div class="col-md-2 text-center">
                        {{-- <input type="file" accept="image/*" onchange="loadFile(event)"> --}}
                        <label class="custom-file-upload form-control" id="upload-container">
                            <input type="file" id="browseFile" class="form-control" />
                            <i class="fa fa-upload "> Upload Gambar</i>
                        </label>
                        <a href="{{ asset('no_img.jpg') }}" data-fancybox="images" data-caption="">
                            <img src="{{ asset('no_img.jpg') }}" alt="lightbox"
                                class="lightbox-thumb img-thumbnail" id="videoPreview" width="50" height="50">
                        </a>
                        <div class="progress  mt-3" style="height: 20px">
                            <div class="progress-bar progress-bar-striped progress-bar-animated loading"
                                role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                style="width: 0%; height: 100%">0%</div>
                        </div>

                    </div>
                    <div class="col-md-5">
                        <label for="inputPassword4" class="form-label">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" id="inputPassword4" required>

                        <label for="inputEmail4" class="form-label">No MOU Dokumen </label>
                        <input type="text" name="no_mou" class="form-control" id="inputPassword4" required>

                        <label for="inputEmail4" class="form-label">No KSO Alat</label>
                        <input type="text" name="no_kso" class="form-control" id="inputPassword4" >

                        <label for="inputEmail4" class="form-label">Tanggal KSO</label>
                        <input type="date" name="tgl_kso" class="form-control" required>

                        <input id="link" type="text" name="link" class="form-control" hidden>

                    </div>
                    <div class="col-md-5">
                        <label for="inputEmail4" class="form-label">Klasifikasi</label>

                        <select class="form-control lokasi_barang" name="kd_inventaris" required>
                            <option value="">Pilih Klasifikasi</option>
                            @foreach ($kode as $kode)
                                @if (strlen($kode->kd_inventaris) <= 5)
                                    <option class="bg-info" value="{{ $kode->kd_inventaris }}" disabled>
                                        {{ $kode->nama_klasifikasi_barang }} ( {{ $kode->kd_inventaris }} )</option>
                                @else
                                    <option value="{{ $kode->kd_inventaris }}">{{ $kode->nama_klasifikasi_barang }} (
                                        {{ $kode->kd_inventaris }} )</option>
                                @endif
                            @endforeach
                        </select>
                        {{-- <input type="text" name="kd_lokasi" class="form-control" value="{{$id}}" disabled>
                    <input type="text" name="kd_lokasi" class="form-control" value="{{$id}}" hidden> --}}
                        <label for="inputPassword4" class="form-label">Lokasi</label>
                        <select class="form-control kategori_barang" name="no_ruangan" required>
                            <option value="">Pilih Ruangan</option>
                            @foreach ($ruangan as $ruangan)
                                <option value="{{ $ruangan->id_nomor_ruangan_cbaang }}">{{ $ruangan->nomor_ruangan }} -
                                    {{ $ruangan->nama_lokasi }}</option>
                            @endforeach
                        </select>
                        <label for="inputPassword4" class="form-label">Merek</label>
                        <input type="text" name="merk" class="form-control" value="">

                        <label for="inputPassword4" class="form-label">Nomor Serial</label>
                        <input type="text" name="no_seri" class="form-control" value="">
                    </div>

                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            <button type="submit" class="btn-success"><i class="fa fa-save"></i> Simpan Data</button>
            {{-- <button type="submit" class="btn btn-primary" id="tambahsubdatabarang" data-url="{{ route('simpandatasubbarang1',['id' => $id])}}"><i class="fa fa-save" ></i> Simpan Data</button> --}}
        </div>
    </form>

</div>
<script src="{{ url('js/rupiah.js', []) }}"></script>
<script>
    $(document).ready(function() {
        $('.jenis_inventaris').select2();
        $('.lokasi_barang').select2();
        $('.kategori_barang').select2();
    });
</script>

<script type="text/javascript">
    var browseFile = $('#browseFile');
    var resumable = new Resumable({
        target: '{{ route('file-upload.uploadgambarbarangkso') }}',
        query: {
            _token: '{{ csrf_token() }}'
        }, // CSRF token
        fileType: ['jpg', 'jpeg', 'png'],
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
    });

    resumable.on('fileError', function(file, response) { // trigger when there is any error
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
