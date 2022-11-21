<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/script.js/2.1.1/script.min.js"
    integrity="sha512-oM6Bv767uUJZcy+SqCTP2rkHtKlivWNQ5+PPhhDwkY8FtNj4bq1xvNCB9NB3WkBa1KiY7P5a7/yfSONl5TYSPQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<style>
    input[type="file"] {
        display: none;
    }
</style>

<div class="modal-content" id="showdatabarang">
    <div class="modal-header">
        {{-- <button class="btn btn-warning btn-sm" id="lihatdatabarang" data-url="{{ route('lihatdatabarang',['id' => $data[0]->kd_inventaris])}}"><i class="fa fa-arrow-circle-o-left"></i></button> --}}
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-close"></i>
        </button>
    </div>
    {{-- <form  method="POST" action="" enctype="multipart/form-data" id="form-update"> --}}
    <form method="POST" action="#" enctype="multipart/form-data" id="form-tambah">
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



                        <a href="https://via.placeholder.com/1920x1080" data-fancybox="images" data-caption="">
                            <img src="https://via.placeholder.com/800x500" alt="lightbox"
                                class="lightbox-thumb img-thumbnail" id="videoPreview" width="50" height="50">
                        </a>


                        <div class="progress  mt-3" style="height: 20px">
                            <div class="progress-bar progress-bar-striped progress-bar-animated " role="progressbar"
                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%; height: 100%">
                                0%</div>
                        </div>

                    </div>


                    <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">Kode Barang</label>
                        <input type="text" name="kd_inventaris" class="form-control" value="{{ $kd }}" disabled>
                        <input type="text" name="kd_inventaris" class="form-control" value="{{ $kd }}" hidden>

                        <label for="inputEmail4" class="form-label">Lokasi</label>
                        <select class="form-control single-selectxx" name="kd_lokasi">
                            <option>Pilih Lokasi</option>
                            @foreach ($datalokasi as $datalokasi)
                                <option value="{{ $datalokasi->kd_lokasi }}">{{ $datalokasi->nama_lokasi }}</option>
                            @endforeach
                        </select>

                        <label for="inputEmail4" class="form-label">Tahun Pembelian</label>
                        <input type="text" name="th_pembuatan" class="form-control" value="">
                        <input id="link" type="text" name="link" class="form-control" value="" hidden>

                    </div>
                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Nama Barang</label>
                        <input type="text" name="kode_kode" class="form-control" value="" hidden>
                        <input type="text" name="nama_barang" class="form-control" id="inputPassword4"
                            value="">
                        <label for="inputPassword4" class="form-label">Kode Cabang</label>
                        <input type="text" name="kd_cabang" class="form-control" id="inputPassword4"
                            value="{{ $id }}" hidden>
                        <input type="text" name="kd_cabang" class="form-control" id="inputPassword4"
                            value="{{ $id }}" disabled>
                        <label for="inputEmail4" class="form-label">Otlet</label>
                        <input type="text" name="outlet" class="form-control" value="">
                    </div>

                </div>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Tahun Perolehan</label>
                        <input type="text" name="th_perolehan" class="form-control" value="">
                    </div>
                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Merek</label>
                        <input type="text" name="merk" class="form-control" value="">
                    </div>
                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Type Barang</label>
                        <input type="text" name="type" class="form-control" value="">
                    </div>
                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Nomor Serial</label>
                        <input type="text" name="no_seri" class="form-control" value="">
                    </div>
                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Supplier</label>
                        <input type="text" name="suplier" class="form-control" value="">
                    </div>
                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Harga Perolehan</label>
                        <input type="text" name="harga_perolehan" class="form-control" value="">
                    </div>
                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Tanggal Mutasi</label>
                        <input type="date" name="tgl_mutasi" class="form-control" value="">
                    </div>
                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Tujuan Mutasi</label>
                        <input type="text" name="tujuan_mutasi" class="form-control" value="">
                    </div>
                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Nilai Buku</label>
                        <input type="text" name="nilai_buku" class="form-control" value="">
                    </div>
                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Tanggal Musnah</label>
                        <input type="date" name="tgl_musnah" class="form-control" value="">
                    </div>

                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Kondisi Barang</label>
                        <input type="text" name="kondisi_barang" class="form-control" value="">
                    </div>
                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Jam Input</label>
                        <input type="time" name="jam_input" class="form-control" value="">
                    </div>
                    <div class="col-md-12">
                        <label for="inputPassword4" class="form-label">Keterangan Musnah</label>
                        <textarea name="ket_musnah" class="form-control" id="" cols="10" rows="2"></textarea>
                    </div>

                </div>
            </div>
        </div>


        <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times"></i>
                Close</button>
            {{-- <button type="submit" class="btn btn-primary" ><i class="fa fa-save" ></i> Update Data</button> --}}
            <button type="submit" class="btn btn-primary" id="tambahsubdatabarang"
                data-url="{{ route('simpandatasubbarang', ['id' => $kd]) }}"><i class="fa fa-save"></i> Simpan
                Data</button>
        </div>
    </form>

</div>

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
