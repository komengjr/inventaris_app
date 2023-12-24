<div class="modal-body bg-danger">
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-uppercase">Pencarian Data</div>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" name="tiket" id="tiket" value="{{$tiket}}" hidden>
                        <input type="text" class="form-control" name="data_inventaris" id="data_inventaris"
                            placeholder="some text" onkeydown="caridata(this)">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-refresh fa-spin"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12" id="hasil-pencarian">

        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.single-select').select2();

    });

    function caridata(ele) {
        var nama = document.getElementById("data_inventaris").value;
        var tiket = document.getElementById("tiket").value;
        if (event.key === 'Enter') {
            $.ajax({
                    url: "../divisi/postverifikasi/scanner",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf"]').attr("content"),
                    },
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "nama": nama,
                        "tiket": tiket,
                    },
                    dataType: 'html',
                })
                .done(function(data) {
                    document.getElementById('data_inventaris').value = "";
                    $('#hasil-pencarian').html(data);
                })
                .fail(function() {
                    $('#hasil-pencarian').html(
                        '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                    );
                });
        }
    }
</script>
