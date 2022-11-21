    
<style>
    input[type="file"] {
    display: none;
}

</style>

<div class="modal-content" id="showdatabarang">
    <div class="modal-header">
         <button class="btn btn-warning btn-sm" id="lihatdatabarang" data-url="{{ route('lihatdatabarang',['id' => $data[0]->kd_inventaris])}}"><i class="fa fa-arrow-circle-o-left"></i></button>
         <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" aria-label="Close">
         <i class="fa fa-close"></i>
         </button>
     </div>
{{-- <form  method="POST" action="" enctype="multipart/form-data" id="form-update"> --}}
<form  method="POST" action="#" enctype="multipart/form-data" id="form-update">
    @csrf
     <div class="body" id="showdatabarang">
        <div class="card-body">
            <div class="row g-2">
            <div class="col-md-4 text-center">
                {{-- <input type="file" accept="image/*" onchange="loadFile(event)"> --}}
                <label class="custom-file-upload form-control" id="upload-container" id="browseFile{{$id}}">
                    <input type="file" id="browseFile{{$id}}" class="form-control"/>
                    <i class="fa fa-upload "> Upload Gambar</i> 
                </label>
                
                
                @if ($data[0]->gambar == "")
                <a href="https://via.placeholder.com/1920x1080"  data-fancybox="images" data-caption="{{$data[0]->nama_barang}}" >
                    <img src="https://via.placeholder.com/800x500" alt="lightbox" class="lightbox-thumb img-thumbnail" id="videoPreview"  width="50" height="50">
                </a>
                @else
                <a href="{{ url($data[0]->gambar, []) }}"  data-fancybox="images" data-caption="{{$data[0]->nama_barang}}">
                    <img src="{{ url($data[0]->gambar, []) }}" alt="lightbox" class="lightbox-thumb img-thumbnail" id="videoPreview" width="50" height="50">
                </a>   
                @endif
                
                {{-- <div id="upload-container" class="text-center">
                    <button id="browseFile" class="btn btn-primary">Pilih Video</button>
                </div> --}}
                <div class="progress{{$id}} mt-3" style="height: 25px">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%; height: 100%">0%</div>
                </div>
                {{-- <label for="inputEmail4" class="form-label">Kode Barang</label> --}}
                {{-- <input type="text" name="kd_inventaris" class="form-control" value="{{$data[0]->kd_inventaris}}"> --}}
            </div>
            {{-- <img id="output"/> --}}
           
                <div class="col-md-4">
                    <label for="inputEmail4" class="form-label">Kode Barang</label>
                     <select class="form-control single-select" name="kd_inventaris">
                          <option value="{{$data[0]->kd_inventaris}}">{{$data[0]->kd_inventaris}}</option>
                          @foreach ($kode as $kode)
                              <option value="{{$kode->kd_inventaris}}">{{$kode->kd_inventaris}} - {{$kode->nama_barang}}</option>
                          @endforeach
                         
                      </select>

                    <label for="inputEmail4" class="form-label">Lokasi</label>
                    @if (auth::user()->akses == 'admin')
                    <select class="form-control single-select{{$id}}" name="kd_lokasi">
                        <option value="{{$data[0]->kd_lokasi}}">{{$data[0]->kd_lokasi}}</option>
                        @foreach ($datalokasi as $datalokasi)
                         
                        <option value="{{$datalokasi->kd_lokasi}}">{{$datalokasi->nama_lokasi}}</option>
                            
                        @endforeach
                    </select>
                    @else
                        <a href="#" class="btn btn-warning btn-sm form-control" >Pengajuan Pindah</a>
                    @endif
                    

                      <label for="inputEmail4" class="form-label">Tahun Pembelian</label>
                      <input type="text" name="th_pembuatan" class="form-control" value="{{$data[0]->th_pembuatan}}">
                      <input id="link" type="text" name="link" class="form-control" value="" hidden>
                    {{-- <input type="text" name="kd_inventaris" class="form-control" value="{{$data[0]->kd_inventaris}}"> --}}
                </div>
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Nama Barang</label>
                    <input type="text" name="kode_kode" class="form-control"  value="{{$data[0]->id}}" hidden>
                    <input type="text" name="nama_barang" class="form-control" id="inputPassword4" value="{{$data[0]->nama_barang}}">
                    <label for="inputPassword4" class="form-label">Kode Cabang</label>
                    <input type="text" name="kd_cabang" class="form-control" id="inputPassword4" value="{{$data[0]->kd_cabang}}" disabled>
                    <input type="text" name="kd_cabang" class="form-control" id="inputPassword4" value="{{$data[0]->kd_cabang}}" hidden>
                    <label for="inputEmail4" class="form-label">Otlet</label>
                    <input type="text" name="outlet" class="form-control" value="{{$data[0]->outlet}}">
                </div>

            </div>
        </div>
        <div class="card-body">
            <div class="row g-3">
            
                
            
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Tahun Perolehan</label>
                    <input type="text" name="th_perolehan" class="form-control" value="{{$data[0]->th_perolehan}}">
                </div>
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Merek</label>
                    <input type="text" name="merk" class="form-control" value="{{$data[0]->merk}}">
                </div>
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Type Barang</label>
                    <input type="text" name="type" class="form-control" value="{{$data[0]->type}}">
                </div>
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Nomor Serial</label>
                    <input type="text" name="no_seri" class="form-control" value="{{$data[0]->no_seri}}">
                </div>
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Supplier</label>
                    <input type="text" name="suplier" class="form-control" value="{{$data[0]->suplier}}">
                </div>
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Harga Perolehan</label>
                    <input type="text" name="harga_perolehan" class="form-control" value="{{$data[0]->harga_perolehan}}">
                </div>
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Tanggal Mutasi</label>
                    <input type="date" name="tgl_mutasi" class="form-control" value="{{$data[0]->tgl_mutasi}}">
                </div>
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Tujuan Mutasi</label>
                    <input type="text" name="tujuan_mutasi" class="form-control" value="{{$data[0]->tujuan_mutasi}}">
                </div>
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Nilai Buku</label>
                    <input type="text" name="nilai_buku" class="form-control" value="{{$data[0]->nilai_buku}}">
                </div>
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Tanggal Musnah</label>
                    <input type="date" name="tgl_musnah" class="form-control" value="{{$data[0]->tgl_musnah}}">
                </div>
            
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Kondisi Barang</label>
                    <input type="text" name="kondisi_barang" class="form-control" value="{{$data[0]->kondisi_barang}}">
                </div>
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Jam Input</label>
                    <input type="time" name="jam_input" class="form-control" value="{{$data[0]->jam_input}}">
                </div>
                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Keterangan Musnah</label>
                    <textarea name="ket_musnah" class="form-control" id="" cols="10" rows="2"></textarea>
                </div>

            </div>
        </div>
    </div>

    
    <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        {{-- <button type="submit" class="btn btn-primary" ><i class="fa fa-save" ></i> Update Data</button> --}}
        <button type="submit" class="btn btn-primary" id="updatedatabarang" data-url="{{ route('updatedatabarang',['id' => $data[0]->id])}}"><i class="fa fa-save" ></i> Update Data</button>
    </div>
</form>

</div>

    <script>
        $(document).ready(function() {
            $('.single-select<?php echo $id ?>').select2();
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
                afterInit: function (ms) {
                    var that = this,
                        $selectableSearch = that.$selectableUl.prev(),
                        $selectionSearch = that.$selectionUl.prev(),
                        selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                        selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                    that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                        .on('keydown', function (e) {
                            if (e.which === 40) {
                                that.$selectableUl.focus();
                                return false;
                            }
                        });

                    that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                        .on('keydown', function (e) {
                            if (e.which == 40) {
                                that.$selectionUl.focus();
                                return false;
                            }
                        });
                },
                afterSelect: function () {
                    this.qs1.cache();
                    this.qs2.cache();
                },
                afterDeselect: function () {
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

    // delete window.browseFile;
    // delete window.resumable;

    var browseFile<?php echo $id ?> = $('#browseFile<?php echo $id ?>');
    var resumable<?php echo $id ?> = new Resumable({
        target: '{{ route('files.upload.large',['id'=>$id]) }}',
        query:{_token:'{{ csrf_token() }}'} ,// CSRF token
        fileType: ['jpg','jpeg','png'],
        headers: {
            'Accept' : 'application/json'
        },
        testChunks: false,
        throttleProgressCallbacks: 1,
    });

    resumable<?php echo $id ?>.assignBrowse(browseFile<?php echo $id ?>[0]);

    resumable<?php echo $id ?>.on('fileAdded', function (file) { // trigger when file picked
        showProgress();
        resumable<?php echo $id ?>.upload() // to actually start uploading.
    });

    resumable<?php echo $id ?>.on('fileProgress', function (file) { // trigger when file progress update
        updateProgress(Math.floor(file.progress() * 100));
    });

    resumable<?php echo $id ?>.on('fileSuccess', function (file, response) { // trigger when file upload complete
        response = JSON.parse(response)
        $('#videoPreview').attr('src', response.path);
        $('#link').attr('value', response.filename);
        $('.card-footer').show();
        $('#browseFile<?php echo $id ?>').hide();
    });

    resumable<?php echo $id ?>.on('fileError', function (file, response) { // trigger when there is any error
        alert('file uploading error.')
    });


    var progress<?php echo $id ?> = $('.progress<?php echo $id ?>');

    function showProgress() {
        progress<?php echo $id ?>.find('.progress-bar').css('width', '0%');
        progress<?php echo $id ?>.find('.progress-bar').html('0%');
        progress<?php echo $id ?>.find('.progress-bar').removeClass('bg-info');
        progress<?php echo $id ?>.show();
    }

    function updateProgress(value) {
        progress<?php echo $id ?>.find('.progress-bar').css('width', ` ${value}%`)
        progress<?php echo $id ?>.find('.progress-bar').html(`${value}%`)
    }

    function hideProgress() {
        // progress<?php echo $id ?>.hide();
    }
    // let browseFile<?php echo $id ?> = "";
    // let resumable<?php echo $id ?> = "";
    // let progress<?php echo $id ?> = "";
</script>