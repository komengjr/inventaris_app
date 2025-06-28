<div class="p-3">
    <div class="card mb-3 border border-primary">
        <div class="card-body">
            <div class="row">
                <label for="">Cari Lokasi</label>
                {{-- <input type="text" class="form-control form-control-lg text-center" name="data_inventaris"
                    id="data_inventaris" autofocus placeholder="some text" onkeydown="caridata(this)" hidden> --}}
                <select name="" class="form-select form-select-lg choices-single-cabang" id="pilih_lokasi" size="1" name="pilih_lokasi"
                        data-options='{"removeItemButton":true,"placeholder":true}'>
                    <option value="">Pilih Ruangan</option>
                    @foreach ($data as $datas)
                        <option value="{{ $datas->id_nomor_ruangan_cbaang }}">
                            {{ $datas->nomor_ruangan }}-{{ $datas->master_lokasi_name }}</option>
                    @endforeach
                </select>
                <input type="text" name="tiket" id="tiket" value="{{ $code }}" hidden>
            </div>
        </div>
    </div>
    <div class="col-lg-12" id="hasil-pencarian">

    </div>
</div>
<script>
    // function caridata(ele) {
    //     var nama = document.getElementById("data_inventaris").value;
    //     var tiket = document.getElementById("tiket").value;
    //     if (event.key === 'Enter') {
    //         $.ajax({
    //                 url: "{{ route('menu_stock_opname_scan_data_with_scanner') }}",
    //                 type: "POST",
    //                 cache: false,
    //                 data: {
    //                     "_token": "{{ csrf_token() }}",
    //                     "nama": nama,
    //                     "tiket": tiket,
    //                 },
    //                 dataType: 'html',
    //             })
    //             .done(function(data) {
    //                 document.getElementById('data_inventaris').value = "";
    //                 $('#hasil-pencarian').html(data);
    //             })
    //             .fail(function() {
    //                 $('#hasil-pencarian').html(
    //                     '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
    //                 );
    //             });
    //     }
    // }
</script>
<script>
    new window.Choices(document.querySelector(".choices-single-cabang"));
</script>
<script>
    $('#pilih_lokasi').on("change", function() {
        var code = document.getElementById("pilih_lokasi").value;
        if (code == null) {
            location.reload();
        } else {
            $.ajax({
                url: "{{ route('menu_stock_opname_proses_data_with_checklist_lokasi') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                    "tiket": "{{$code}}"
                },
                dataType: 'html',
            }).done(function(data) {
                $("#hasil-pencarian").html(data);
            }).fail(function() {
                console.log('eror');
            });
        }
    });

</script>
