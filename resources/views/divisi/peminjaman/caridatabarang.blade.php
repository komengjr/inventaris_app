<div class="row">

    <div class="col-12">
        {{-- <label for="">Kode Peminjaman Barang</label> --}}
        <input type="text" class="form-control" name="id_pinjam" id="id_pinjam" value="{{$id}}" hidden>
    </div>
    <div class="col-12">
        <label for="">Nama Barang ( <span style="color: red">KETIK NAMA BARANG</span> )</label>
        <input type="text" placeholder="Isi ID Inventaris" id="data_inventaris" class="form-control" onkeydown="caridata(this)"/>
    </div>


</div>
<div class="row" id="tablepencariandata">

</div>
<script>
      function caridata(ele) {
        if(event.key === 'Enter') {
            var nama = document.getElementById('data_inventaris').value;
            var id_pinjam = document.getElementById('id_pinjam').value;
                        $.ajax({
                                url: '../divisi/peminjaman/caribarang/'+id_pinjam+'/'+nama,
                                type: 'GET',
                                dataType: 'html'
                            })
                            .done(function(data) {
                                document.getElementById('data_inventaris').value = "";
                                $('#tablepencariandata').html(data);
                            })
                            .fail(function() {
                                $('#tablepencariandata').html(
                                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                                    );
                            });

        }
    }

</script>
