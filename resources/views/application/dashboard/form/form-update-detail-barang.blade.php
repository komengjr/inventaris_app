<style>
    input[type="file"] {
        display: none;
    }
</style>
<div class="card mb-3">
    <div class="card-header bg-primary ">
        <h5 class="mb-0 text-white" data-anchor="data-anchor" id="custom-styles">Detail & Update Data Barang :
            {{ $data->inventaris_data_number }}<a class="anchorjs-link " aria-label="Anchor" data-anchorjs-icon="#"
                href="#custom-styles" style="padding-left: 0.375em;"></a></h5>
    </div>
    <div class="card-body border border-primary">
        <form method="POST" action="#" enctype="multipart/form-data" id="form-update-data-inventaris">
            @csrf
            <div class="body" id="showdatabarang">
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-4 text-center">
                            {{-- <input type="file" accept="image/*" onchange="loadFile(event)"> --}}
                            <label class="custom-file-upload form-control" id="upload-container">
                                <input type="file" id="browseFile" class="form-control" />
                                <span class="fas fa-cloud-upload-alt"></span> Upload Gambar
                            </label>
                            @if ($data->inventaris_data_file == '')
                                <a href="#" data-fancybox="images" data-caption="">
                                    <img src="{{ asset('no_img.jpg') }}" alt="lightbox"
                                        class="lightbox-thumb img-thumbnail" id="videoPreview" width="350"
                                        height="350">
                                </a>
                            @else
                                <a href="#" data-fancybox="images" data-caption="">
                                    <img src="{{ asset($data->inventaris_data_file) }}" alt="lightbox"
                                        class="lightbox-thumb img-thumbnail" id="videoPreview" width="350"
                                        height="350">
                                </a>
                            @endif
                            <div class="progress  mt-3" style="height: 20px">
                                <div class="progress-bar progress-bar-striped progress-bar-animated loading"
                                    role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 0%; height: 100%">0%
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="inputPassword4" class="form-label">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control form-control-lg"
                                id="nama_barang" value="{{ $data->inventaris_data_name }}" required>

                            <label for="inputEmail4" class="form-label">Klasifikasi Inventaris</label>
                            <select class="form-control choices-single-klasifikasi" name="klasifikasi" id="klasifikasi"
                                required>
                                <option value="{{ $data->inventaris_klasifikasi_code }}">
                                    {{ $data->inventaris_klasifikasi_code }}</option>
                                @foreach ($klasifikasi as $klasifikasis)
                                    <option value="{{ $klasifikasis->inventaris_klasifikasi_code }}">{{ $klasifikasis->inventaris_klasifikasi_code }}-{{ $klasifikasis->inventaris_klasifikasi_name }}</option>
                                @endforeach
                            </select>

                            <label for="inputPassword4" class="form-label">Kategori</label>
                            <select class="form-control form-control-lg kategori_barang" name="jenis" required>
                                @if ($data->inventaris_data_jenis == 0)
                                    <option value="0">Barang Non Aset</option>
                                    <option value="1">Barang Aset</option>
                                @else
                                    <option value="1">Barang Aset</option>
                                    <option value="0">Barang Non Aset</option>
                                @endif
                            </select>

                            <label for="inputEmail4" class="form-label">Tanggal Pembelian</label>
                            <input type="date" name="tgl_beli" class="form-control form-control-lg" id="tgl_beli"
                                value="{{ $data->inventaris_data_tgl_beli }}" required>

                            <label for="inputPassword4" class="form-label">Harga Perolehan</label>
                            <input type="text" name="harga_perolehan" class="form-control form-control-lg"
                                value="@currency($data->inventaris_data_harga)" id="dengan-rupiah" required>
                            <input id="link" type="text" name="link" class="form-control"
                                value="{{ $data->inventaris_data_file }}" hidden>
                        </div>
                        <div class="col-md-4">
                            <label for="inputPassword4" class="form-label">Supplier</label>
                            <input type="text" name="suplier" class="form-control form-control-lg" id="suplier"
                                value="{{ $data->inventaris_data_suplier }}" required>

                            <label for="inputEmail4" class="form-label">Lokasi</label>
                            <select class="form-control choices-single-lokasi" name="lokasi" id="lokasi"
                                required>
                                <option value="{{ $data->id_nomor_ruangan_cbaang }}">
                                    {{ $data->inventaris_data_location }}</option>
                                @foreach ($lokasi as $lokasis)
                                    <option value="{{ $lokasis->id_nomor_ruangan_cbaang }}">
                                        {{ $lokasis->master_lokasi_name }}
                                    </option>
                                @endforeach
                            </select>

                            <label for="inputPassword4" class="form-label">Merek</label>
                            <input type="text" name="merk" class="form-control form-control-lg" id="merk"
                                value="{{ $data->inventaris_data_merk }}">

                            <label for="inputPassword4" class="form-label">Type Barang</label>
                            <input type="text" name="type" class="form-control form-control-lg" id="type"
                                value="{{ $data->inventaris_data_type }}">

                            <label for="inputPassword4" class="form-label">Nomor Serial</label>
                            <input type="text" name="seri" class="form-control form-control-lg"
                                value="{{ $data->inventaris_data_no_seri }}" id="seri">
                            <input type="text" name="inventaris_code" value="{{ $data->inventaris_data_code }}"
                                hidden>
                        </div>

                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <div id="menu-simpan-data-inventaris">
                    <button type="submit" class="btn btn-primary"
                        id="button-simpan-update-data-inventaris"><i class="fa fa-save"></i> Update Data</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row g-3">
    <div class="col-md-6">
        <div class="card mb-3 border border-warning">
            <div class="card-header">
                <h5 class="mb-0" data-anchor="data-anchor" id="custom-styles">History Pindah Barang<a
                        class="anchorjs-link " aria-label="Anchor" data-anchorjs-icon="#" href="#custom-styles"
                        style="padding-left: 0.375em;"></a></h5>
            </div>
            <div class="card-body bg-light">
                <table id="exampledatakso" class="table table-striped nowrap" style="width:100%" border="1">
                    <thead class="bg-200 text-700 fs--2">
                        <tr>
                            <th>No</th>
                            <th>No Log</th>
                            <th>Lokasi Awal</th>
                            <th>Lokasi Tujuan</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 13px;">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($log_pindah as $log_pindahs)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $log_pindahs->no_log }}</td>
                                <td>
                                    @php
                                        $n_lokasi = DB::table('master_lokasi')->where('master_lokasi_code','=',$log_pindahs->before_history)->first();
                                    @endphp
                                    @if ($n_lokasi)
                                        {{$n_lokasi->master_lokasi_name}}
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $n_lokasi1 = DB::table('master_lokasi')->where('master_lokasi_code','=',$log_pindahs->after_history)->first();
                                    @endphp
                                    @if ($n_lokasi1)
                                        {{$n_lokasi1->master_lokasi_name}}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-3 border border-warning">
            <div class="card-header">
                <h5 class="mb-0" data-anchor="data-anchor" id="custom-styles">History Peminjaman Barang<a
                        class="anchorjs-link " aria-label="Anchor" data-anchorjs-icon="#" href="#custom-styles"
                        style="padding-left: 0.375em;"></a></h5>
            </div>
            <div class="card-body bg-light">
                <table id="exampledatapinjam" class="table table-striped nowrap" style="width:100%" border="1">
                    <thead class="bg-200 text-700 fs--2">
                        <tr>
                            <th>No</th>
                            <th>No Peminjaman</th>
                            <th>Kegiatan</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Selesi Peminjaman</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 13px;">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($log_pinjam as $log_pinjams)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$log_pinjams->tiket_peminjaman}}</td>
                                <td>{{$log_pinjams->nama_kegiatan}}</td>
                                <td>{{$log_pinjams->tgl_pinjam}}</td>
                                <td>{{$log_pinjams->batas_tgl_pinjam}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    new DataTable('#exampledatakso', {
        responsive: true
    });
    new DataTable('#exampledatapinjam', {
        responsive: true
    });
</script>
<script src="{{ url('js/rupiah.js', []) }}"></script>
<script>
    new window.Choices(document.querySelector(".choices-single-klasifikasi"));
    new window.Choices(document.querySelector(".choices-single-lokasi"));
</script>
<script type="text/javascript">
    var browseFile = $('#browseFile');
    var resumable = new Resumable({
        target: '{{ route('file-upload.uploadgambarbarang') }}',
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
