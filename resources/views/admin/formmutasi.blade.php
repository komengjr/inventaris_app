    
<style>
    input[type="file"] {
    display: none;
}

</style>

<div class="modal-content" id="showdatabarang">
    <div class="modal-header">
         <button class="btn btn-warning btn-sm" id="lihatdatabarang" data-url="{{ route('lihatdatabarang1',['id' => $data[0]->kd_lokasi])}}"><i class="fa fa-arrow-circle-o-left"></i></button>
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

                @if ($data[0]->gambar == "")
                <a href="https://via.placeholder.com/1920x1080"  data-fancybox="images" data-caption="{{$data[0]->nama_barang}}" >
                    <img src="https://via.placeholder.com/800x500" alt="lightbox" class="lightbox-thumb img-thumbnail" id="videoPreview"  width="50" height="50">
                </a>
                @else
                <a href="{{ url($data[0]->gambar, []) }}"  data-fancybox="images" data-caption="{{$data[0]->nama_barang}}">
                    <img src="{{ url($data[0]->gambar, []) }}" alt="lightbox" class="lightbox-thumb img-thumbnail" id="videoPreview" width="50" height="50">
                </a>   
                @endif

              
                {{-- <label for="inputEmail4" class="form-label">Kode Barang</label> --}}
                {{-- <input type="text" name="kd_inventaris" class="form-control" value="{{$data[0]->kd_inventaris}}"> --}}
            </div>
            {{-- <img id="output"/> --}}
           
                <div class="col-md-4">

                    <label for="inputPassword4" class="form-label">Jenis Mutasi</label>
                    <select class="form-control single-select{{$id}}" name="kd_lokasi">
                        <option value="">Pilih Jenis Mutasi</option>
                        <option value="">Penempatan</option>
                        <option value="">Penarikan</option>
                        <option value="">Mutasi Antar Bagian</option>
                        <option value="">Mutasi Antar Cabang</option>
                        
                    </select>
                    <label for="inputPassword4" class="form-label">Asal Lokasi barang</label>
                    <input type="text" name="suplier" class="form-control" value="{{$data[0]->suplier}}">
                    <label for="inputPassword4" class="form-label">Lokasi Penempatan/Penarikan*</label>
                    <input type="text" name="harga_perolehan" class="form-control" value="{{$data[0]->harga_perolehan}}">
                </div>
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Departement</label>
                    <input type="text" name="kode_kode" class="form-control"  value="{{$data[0]->id}}" hidden>
                    <input type="text" name="nama_barang" class="form-control" id="inputPassword4" value="{{$data[0]->nama_barang}}">
                    <label for="inputPassword4" class="form-label">Divisi</label>
                    <input type="text" name="kd_cabang" class="form-control" id="inputPassword4" value="{{$data[0]->kd_cabang}}" disabled>
                    <label for="inputEmail4" class="form-label">Penanggung Jawab Alat</label>
                    <input type="text" name="outlet" class="form-control" value="{{$data[0]->outlet}}">
                </div>

            </div>
        </div>
        <div class="card-body">
            <div class="row g-1">
                <div class="col-md-9">
                    <label for="inputPassword4" class="form-label">Keterangan Barang</label>
                </div>
                <div class="col-md-3 text-right">
                    <Button class="btn btn-warning btn-sm" id="mutasidatabarang" data-url="{{ route('mutasidatabarang',['id' => $data[0]->id])}}"><i class="fa fa-recycle"> Mutasi</i></Button>
                    <Button class="btn btn-danger btn-sm"><i class="fa fa-trash"> Pemusnahan</i></Button>
                </div>
                <hr>
                <div class="col-md-12">
                    
                    <table class="table table-bordered">
                        <tr>
                            
                                <td>No</td>
                                <td>Kode Log</td>
                                <td>Status Barang</td>
                                <td>Tanggal Perubahan</td>
                                <td>Formulir Pengajuan</td>
                        </tr>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    
    <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        {{-- <button type="submit" class="btn btn-primary" ><i class="fa fa-save" ></i> Update Data</button> --}}
        <button type="submit" class="btn btn-primary" id="updatedatabarang" data-url="{{ route('updatedatabarang1',['id' => $data[0]->id])}}"><i class="fa fa-save" ></i> Update Data</button>
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

