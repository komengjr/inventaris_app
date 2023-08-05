<script src="{{ url('assets/plugins/select2/js/select2.min.js', []) }}"></script>
<style>
    input[type="file"] {
        display: none;
    }
</style>


<form method="POST" action="#" enctype="multipart/form-data" id="form-tambah-barang-aset">
    @csrf
    <div class="body" id="showdatabarang">
        <div class="card-body">
            <div class="row g-2">
                <div class="col-md-4 text-center">
                    {{-- <input type="file" accept="image/*" onchange="loadFile(event)"> --}}
                    <label class="custom-file-upload form-control" id="upload-container">
                        <input type="file" id="browseFile" class="form-control" />
                        <i class="fa fa-upload "> Upload Gambar</i>
                    </label>


                    <input id="link" type="text" name="link" class="form-control" hidden>
                    <a href="https://via.placeholder.com/1920x1080" data-fancybox="images" data-caption="">
                        <img src="https://via.placeholder.com/800x500" alt="lightbox"
                            class="lightbox-thumb img-thumbnail" id="videoPreview" width="50" height="50">
                    </a>


                    <div class="progress  mt-3" style="height: 20px; display: none;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated " role="progressbar"
                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%; height: 100%">
                            0%</div>
                    </div>

                </div>


                <div class="col-md-4 ">
                    <label for="inputPassword4" class="form-label">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" id="inputPassword4" value="{{$datainventaris->nama_barang}}" disabled>


                    <label for="inputEmail4" class="form-label">Jenis Inventaris</label>
                    <select class="form-control single-selectxx" name="kd_inventaris">
                        <option value="">Pilih Jenis Inventaris</option>
                        @foreach ($kode as $kode)
                            <option value="{{ $kode->kd_inventaris }}">{{ $kode->nama_barang }}</option>
                        @endforeach
                    </select>

                    <label for="inputEmail4" class="form-label">Pilih Lokasi</label>
                    <select class="form-control single-select" name="kd_inventaris">
                        <option value="">Pilih Jenis Inventaris</option>
                        {{-- @foreach ($kode as $kode)
                                <option value="{{ $kode->kd_inventaris }}">{{ $kode->nama_barang }}</option>
                            @endforeach --}}
                    </select>
                    <label for="inputPassword4" class="form-label">Nomor Serial</label>
                    <input type="text" name="no_seri" class="form-control" value="">
                    <label for="inputPassword4" class="form-label">Tanggal Beli</label>
                    <input type="date" name="tgl_beli" class="form-control" id="tgl_beli" value="0">
                    <input type="text" name="kondisi_barang" class="form-control" value="BAIK" hidden>
                    <label for="inputPassword4" class="form-label">Supplier</label>
                    <input type="text" name="suplier" class="form-control" value="">
                </div>
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Kode Cabang</label>
                    <input type="text" name="kd_cabang" class="form-control" id="inputPassword4"
                        value="{{ auth::user()->cabang }}" hidden>
                    <input type="text" name="kd_cabang" class="form-control" id="inputPassword4"
                        value="{{ auth::user()->cabang }}" disabled>
                    <label for="inputPassword4" class="form-label">Tahun Perolehan</label>
                    <input type="text" name="th_perolehan" class="form-control" value="">
                    <label for="inputPassword4" class="form-label">Harga Perolehan</label>
                    <input type="text" name="harga_perolehan" class="form-control" value="@currency($datainventaris->harga_perolehan)" disabled>
                    <input type="text" name="harga_perolehan" class="form-control" id="harga_perolehan" value="{{$datainventaris->harga_perolehan}}" hidden>
                    <label for="inputPassword4" class="form-label">Merek</label>
                    <input type="text" name="merk" class="form-control" value="">
                    <label for="inputPassword4" class="form-label">Type Barang</label>
                    <input type="text" name="type" class="form-control" value="">
                    <label for="inputPassword4" class="form-label">Nomor Serial</label>
                    <input type="text" name="no_seri" class="form-control" value="">
                </div>
                <div class="col-md-12 pt-2">
                    <label for="inputEmail4" class="form-label">Masa Depresiasi</label>
                    <select class="form-control single-select" name="kd_inventaris"
                        onchange="getDataOptiondepresiasi();" id="dataaset" required>
                        <option value="">Pilih Masa Depresiasi</option>
                        @foreach ($datadepresiasi as $datadepresiasi)
                            <option value="{{ $datadepresiasi->kd_depresiasi }}">
                                {{ $datadepresiasi->klasifikasi_aset }} ( {{ $datadepresiasi->harga_perolhean }} ) (
                                {{ $datadepresiasi->masa_depresiasi }} )
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>
        </div>
        <div class="card-body">
            <div class="" id="showdatadepresiasiaset">


            </div>
        </div>
    </div>


    <div class="modal-footer">
        <button type="submit" class="btn-success" style="float: left;"><i class="fa fa-save"></i>
            Update</button>

    </div>
</form>
<script src="{{ asset('assets/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/plugins/alerts-boxes/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/plugins/alerts-boxes/js/sweet-alert-script.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.single-select').select2();
    });
</script>
<script>
    $().ready(function() {

        $("#create_user").validate({
            rules: {
                nama_lengkap: "required",
                akses: "required",

            },
            messages: {
                nama_lengkap: "Isikan Dengan Nama Lengkap",
                akses: "Pilih Akses Dulu",

            }
        });

    });
</script>
<script>
    function getDataOptiondepresiasi() {
        var datatiket = document.getElementById('dataaset').value;
        var tgl_beli = document.getElementById('tgl_beli').value;
        var harga_perolehan = document.getElementById('harga_perolehan').value;
        if (harga_perolehan == "" || tgl_beli == "") {
            swal("Warning!",
                "Harga Perolehan & Tanggal Beli Harus diisi terlebih dahulu",
                "warning");
        } else {
            $.ajax({

                    url: "divisi/dataaset/getdataoption/" + datatiket + "/" + tgl_beli + "/" + harga_perolehan,
                    type: 'GET',
                    dataType: 'html'
                })
                .done(function(data) {
                    $('#showdatadepresiasiaset').html(data);
                })
                .fail(function() {
                    $('#showdatadepresiasiaset').html(
                        '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                    );
                });
        }
    };
</script>

<script>
    $(document).ready(function() {
        $('.single-selectxx').select2();

        $('.multiple-select').select2();

        //multiselect start

        $('#my_multi_select1').multiSelect();
        $('#my_multi_select2').multiSelect({
            selectableOptgroup: true
        });

        $('#my_multi_select3').multiSelect({
            selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
            selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
            afterInit: function(ms) {
                var that = this,
                    $selectableSearch = that.$selectableUl.prev(),
                    $selectionSearch = that.$selectionUl.prev(),
                    selectableSearchString = '#' + that.$container.attr('id') +
                    ' .ms-elem-selectable:not(.ms-selected)',
                    selectionSearchString = '#' + that.$container.attr('id') +
                    ' .ms-elem-selection.ms-selected';

                that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                    .on('keydown', function(e) {
                        if (e.which === 40) {
                            that.$selectableUl.focus();
                            return false;
                        }
                    });

                that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                    .on('keydown', function(e) {
                        if (e.which == 40) {
                            that.$selectionUl.focus();
                            return false;
                        }
                    });
            },
            afterSelect: function() {
                this.qs1.cache();
                this.qs2.cache();
            },
            afterDeselect: function() {
                this.qs1.cache();
                this.qs2.cache();
            }
        });

        $('.custom-header').multiSelect({
            selectableHeader: "<div class='custom-header'>Selectable items</div>",
            selectionHeader: "<div class='custom-header'>Selection items</div>",
            selectableFooter: "<div class='custom-header'>Selectable footer</div>",
            selectionFooter: "<div class='custom-header'>Selection footer</div>"
        });


    });
</script>

<script>
    $(document).ready(function() {
        $('.single-select').select2();

        $('.multiple-select').select2();

        //multiselect start

        $('#my_multi_select1').multiSelect();
        $('#my_multi_select2').multiSelect({
            selectableOptgroup: true
        });

        $('#my_multi_select3').multiSelect({
            selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
            selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
            afterInit: function(ms) {
                var that = this,
                    $selectableSearch = that.$selectableUl.prev(),
                    $selectionSearch = that.$selectionUl.prev(),
                    selectableSearchString = '#' + that.$container.attr('id') +
                    ' .ms-elem-selectable:not(.ms-selected)',
                    selectionSearchString = '#' + that.$container.attr('id') +
                    ' .ms-elem-selection.ms-selected';

                that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                    .on('keydown', function(e) {
                        if (e.which === 40) {
                            that.$selectableUl.focus();
                            return false;
                        }
                    });

                that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                    .on('keydown', function(e) {
                        if (e.which == 40) {
                            that.$selectionUl.focus();
                            return false;
                        }
                    });
            },
            afterSelect: function() {
                this.qs1.cache();
                this.qs2.cache();
            },
            afterDeselect: function() {
                this.qs1.cache();
                this.qs2.cache();
            }
        });

        $('.custom-header').multiSelect({
            selectableHeader: "<div class='custom-header'>Selectable items</div>",
            selectionHeader: "<div class='custom-header'>Selection items</div>",
            selectableFooter: "<div class='custom-header'>Selectable footer</div>",
            selectionFooter: "<div class='custom-header'>Selection footer</div>"
        });


    });
</script>

<script type="text/javascript">
    var browseFile = $('#browseFile');
    var resumable = new Resumable({
        target: '{{ route('files.upload.large1') }}',
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
