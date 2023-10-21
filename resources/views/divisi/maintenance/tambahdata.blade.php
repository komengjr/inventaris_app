<style>
    input[type="file"] {
        display: none;
    }

    .row label {
        padding-top: 10px;
    }
</style>
<div class="modal-content" id="showdatabarang">
    <div class="modal-header bg-success">
        <h6>Form Maintenance <span style="color: royalblue;"> </span> </h6>
        <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-close"></i>
        </button>
    </div>
    {{-- <form  method="POST" action="" enctype="multipart/form-data" id="form-update"> --}}
    {{-- <form  method="POST" action="{{ url('divisi/tambahdatamaintenance', []) }}" enctype="multipart/form-data" >
    @csrf --}}
    <div class="modal-body">
        <div class="row">
            <div class="col-12">
                <label for="">Cari Nama Barang</label>
                {{-- <div class="fm-search">
                    <div class="mb-0">

                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-transparent"><i class="zmdi zmdi-search"></i></span>
                            <input type="text" class="form-control" id="caridatabarang" placeholder="Search Name"
                                onkeydown="search(this)" />
                        </div>

                    </div>
                </div> --}}
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-spinner fa-spin"></i></span>
                    </div>
                    <input type="text" class="form-control" id="caridatabarang" placeholder="Search Name"
                    onkeydown="search(this)">
                </div>
            </div>
            <div class="col-12" id="menu-daftar-inevntaris">

            </div>

        </div>
    </div>

    {{-- <div class="modal-footer">
        <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        <button type="submit" class="btn-success" id="" data-url=""><i class="fa fa-save" ></i> Simpan Data</button>
    </div> --}}
    {{-- </form> --}}

</div>
<script>
    function search(ele) {
        if (event.key === 'Enter') {
            var id = document.getElementById('caridatabarang').value;
            $.ajax({
                    url: '../../divisi/maintenance/caridatabarang/' + id,
                    type: 'GET',
                    dataType: 'html'
                })
                .done(function(data) {
                    document.getElementById('caridatabarang').value = "";
                    $('#menu-daftar-inevntaris').html(data);
                })
                .fail(function() {
                    $('#menu-daftar-inevntaris').html(
                        '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                    );
                });

        }
    }
</script>
<script>
    $(document).ready(function() {
        $('.single-select').select2();

    });
</script>
