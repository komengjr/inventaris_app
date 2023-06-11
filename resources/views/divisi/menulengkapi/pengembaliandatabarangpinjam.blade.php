{{-- <form  method="get"> --}}
    <div class="row">

        <div class="col-12">
            {{-- <label for="">Kode Peminjaman Barang</label> --}}
            <input type="text" class="form-control" name="id_pinjam" id="id_pinjam" value="{{$id}}" hidden>
        </div>
        <div class="col-12">
            <label for="">Kode / Nama Barang ( <span style="color: red">SCAN PENGEMBALIAN BARANG</span> )</label>
            <input type="text" placeholder="Scan Disini" id="id_inventaris" class="form-control" onkeydown="search(this)"/>
            {{-- <select class="form-control single-select">
                @foreach ($databrg as $databrg)
                    <option value="">{{$databrg->kd_inventaris}} - {{$databrg->nama_barang}} - <p style="color: red;">{{$databrg->nama_lokasi}}</p></option>
                @endforeach

            </select> --}}
        </div>
        {{-- <div class="col-6">
            <label for="">Tanggal Input</label>
            <input type="text" class="form-control" name="tgl_pinjam" >
        </div> --}}
        {{-- <div class="col-12 pt-3 text-right">
        <button class="btn-danger" id="buttontablepcloseeminjaman" data-url="{{ url('divisi/peminjaman/tableclosepeminjaman', ['id'=>123]) }}"><i class="fa fa-close" ></i> tutup</button> --}}
        {{-- <button type="submit" class="btn-info" id="buttontablepeminjaman" data-url="{{ url('divisi/peminjaman/tablepeminjaman', ['id'=>123]) }}"><i class="fa fa-plus" ></i> Tambah</button> --}}
        {{-- </div> --}}

    </div>

<script>
    $(document).ready(function() {
        $('.single-select').select2();

      });
      function search(ele) {
        if(event.key === 'Enter') {
            var id = document.getElementById('id_inventaris').value;
            var id_pinjam = document.getElementById('id_pinjam').value;
                        $.ajax({
                                url: '../divisi/peminjaman/pengembaliantablepeminjaman/'+id+'/'+id_pinjam,
                                type: 'GET',
                                dataType: 'html'
                            })
                            .done(function(data) {
                                document.getElementById('id_inventaris').value = "";
                                $('#tablepeminjaman').html(data);
                            })
                            .fail(function() {
                                $('#tablepeminjaman').html(
                                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                                    );
                            });

        }
    }

</script>
