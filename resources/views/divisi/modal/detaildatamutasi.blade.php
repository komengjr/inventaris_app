<style>
    input[type="file"] {
        display: none;
    }
</style>

<div class="modal-content" id="showdatabarang">
    <div class="modal-header">
        <h6>Form Mutasi <span style="color: royalblue;"> Nomor tiket : </span> </h6>
        <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-close"></i>
        </button>
    </div>
    {{-- <form  method="POST" action="" enctype="multipart/form-data" id="form-update"> --}}

    <div class="modal-body">
        <div class="row pb-3">
            <div class="col-12">
                <label for="">Jenis Mutasi</label>
                @if ($data->jenis_mutasi == 1)
                <input type="text" class="form-control" value="Penempatan" disabled>
                @elseif($data->jenis_mutasi == 2)
                <input type="text" class="form-control" value="Penarikan" disabled>
                @elseif($data->jenis_mutasi == 3)
                <input type="text" class="form-control" value="Mutasi Antar Cabang" disabled>
                @endif

            </div>
            @php
                $cabangasal = DB::table('tbl_cabang')->select('nama_cabang')->where('kd_cabang',$data->jenis_mutasi)
            @endphp
            <div class="col-6">
                <label for="">Asal Lokasi Barang</label>
                <input type="text" class="form-control" >
            </div>
            <div class="col-6">
                <label for="">Lokasi Penempatan</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-6">
                <label for="">Departemen</label>
                <input type="text" class="form-control" value="{{$data->departemen}}">
            </div>
            <div class="col-6">
                <label for="">Divisi</label>
                <input type="text" class="form-control" value="{{$data->divisi}}">
            </div>
            <div class="col-6">
                <label for="">Penanggung Jawab</label>
                <input type="text" class="form-control" value="{{$data->penanggung_jawab}}">
            </div>
            <div class="col-6">
                <label for="">Tanggal Order</label>
                <input type="text" class="form-control" value="{{$data->tanggal_buat}}">
            </div>
            <hr>
            <div class="col-12 pt-5">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Masukan ID Inventaris" id="idinventarismutasi" >
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="button">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <table class="table styled-table align-items-center table-flush pb-2 pt-5" id="default-table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>No Inventaris</th>
                    <th>Merk</th>
                    <th>Type</th>
                    <th>Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>


    <div class="modal-footer">
        <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        {{-- <button type="submit" class="btn btn-primary" ><i class="fa fa-save" ></i> Update Data</button> --}}
        <button onclick="window.open('{{ url('divisi/datamutasi/print/datamutasi', ['id'=>123]) }}', '', 'width=1200, height=700');"class="btn-info"
        id="" data-url="asdasd"><i class="fa fa-print"></i> Cetak / Print</button>
    </div>


</div>
