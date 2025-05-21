<div class="p-3">
    <div class="card mb-3 border border-primary">
        <div class="card-body">
            <div class="row align-items-center m-2">
                <label for="">Scan Disini</label>
                <input type="text" class="form-control form-control-lg text-center" name="data_inventaris"
                    id="data_inventaris" autofocus placeholder="some text" onkeydown="caridata(this)">
                <input type="text" name="tiket" id="tiket" value="{{$tiket}}" hidden>
            </div>
        </div>
    </div>
    <div class="col-lg-12" id="hasil-pencarian">

    </div>
</div>
<script>
    function caridata(ele) {
        var nama = document.getElementById("data_inventaris").value;
        var tiket = document.getElementById("tiket").value;
        if (event.key === 'Enter') {
            $.ajax({
                    url: "{{route('menu_stock_opname_scan_data_with_scanner')}}",
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
