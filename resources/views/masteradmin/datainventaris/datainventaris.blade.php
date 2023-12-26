<style>
    input[type="file"] {
        display: none;
    }
</style>

<div class="modal-content" id="showdatabarang">
    <div class="modal-header">
        <h6>Form Mutasi <span style="color: royalblue;"> Data Master Cabang</span> </h6>

        <form action="{{ url('master/datainventaris/createnomorinventariscabang', []) }}" method="post">
            @csrf
            <input type="text" name="kd_cabang" value="{{$id}}" id="" hidden>
            <button type="submit" class="btn-dark"><i class="fa fa-cog"></i> Set Up Nomor Inventaris</button>
        </form>
        <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-close"></i>
        </button>
    </div>
    {{-- <form  method="POST" action="" enctype="multipart/form-data" id="form-update"> --}}

    <div class="modal-body" id="master-menu-inventaris">
        <table class="styled-table align-items-center table-flush pb-2 " id="data-table97">
            <thead>
                <tr>
                    <th style="widows: 2px;">No</th>
                    <th>Nama Barang</th>
                    <th>No Inventaris</th>
                    <th>Kode Klasifikasi</th>
                    <th>Kode Lokasi</th>
                    <th>Tanggal Pembelian</th>
                    <th>Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $data)
                    <tr>
                        <td data-label="No">{{$no++}}</td>

                        <td data-label="Nama Barang">{{$data->nama_barang}}</td>
                        <td data-label="No Inventaris">{{$data->no_inventaris}}</td>
                        <td data-label="Kode Klasifikasi">{{$data->kd_inventaris}}</td>
                        <td data-label="Kode Lokasi">{{$data->kd_lokasi}}</td>
                        <td data-label="Tanggal Beli">{{$data->tgl_beli}}</td>
                        <td data-label="Harga Perolehan">{{$data->harga_perolehan}}</td>
                        <td><button class="btn-warning" id="button-master-edit" data-id="{{$data->id}}"><i class="fa fa-pencil"></i></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal-footer pt-3">

        {{-- <button type="submit" class="btn btn-primary" ><i class="fa fa-save" ></i> Update Data</button> --}}

    </div>
</div>
<script>
    $('#data-table97').DataTable();
</script>

<script>
    $(document).on("click", "#button-master-edit", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $("#master-menu-inventaris").html(
        '<span class="badge badge-warning m-1">Loading..</span>'
    );
    $.ajax({
        url: "../master/data-inventaris/detail/" + id,
        type: "GET",
        dataType: "html",
    })
        .done(function (data) {
            $("#master-menu-inventaris").html(data);
        })
        .fail(function () {
            $("#show-menu-report-stockopname").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
</script>
