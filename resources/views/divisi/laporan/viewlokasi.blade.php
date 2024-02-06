<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Report</h5>
        <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body" id="show-data-laporan">
        <form method="post" id="form-report-pilihan-ruangan">
            @csrf
            <div class="row">
            <div class="col-12">
                <label for="">Cari Ruangan</label>
                <select class="form-control single-select" name="kd_lokasi" id="ruangan">
                    <option value="">Pilih Lokasi</option>
                    @foreach ($data as $data)
                        <option value="{{$data->id_nomor_ruangan_cbaang }}" data-id="{{$data->id_nomor_ruangan_cbaang }}">{{$data->nomor_ruangan }} - {{$data->nama_lokasi }}</option>
                    @endforeach
                </select>
            </div>
            </div>
        </form>
        <div class="pt-3" id="hasil-report-ruangan"></div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn-dark" id="button-cetak-barcode-ruangan" data-url="{{ url('menu/postmasterlaporan/lokasi-barcode-barang-cabang-ruangan', []) }}"><i class="fa fa-download"></i> Print Barcode</button>
        <button type="button" class="btn-primary" id="button-cetak-excel-ruangan"><i class="fa fa-download"></i> Export Excel</button>
        <button type="button" class="btn-success" id="button-print-laporan-ruangan-pdf" data-url="{{ url('menu/postmasterlaporan/lokasi-barang-cabang-ruangan', []) }}"><i class="fa fa-print"></i> Export PDF</button>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.single-select').select2();
    });
</script>
<script>
    $(document).on("click", "#button-cetak-excel-ruangan", function(e) {
        e.preventDefault();
        $("#hasil-report-ruangan").html('<div style="text-align: center; padding:2%;"><div class="spinner-border" role="status" > <span class="sr-only">Loading...</span> </div></div>');
        var id = document.getElementById("ruangan").value;
        // log
        $.ajax({
                url: '../../export-data-ruangan/'+id,
                type: "GET",
                dataType: "html",
            })
            .done(function(data) {
                location.href = '../../export-data-ruangan/'+id;
                Lobibox.notify('success', {
                    pauseDelayOnHover: true,
                    icon: 'fa fa-info-circle',
                    continueDelayOnInactiveTab: false,
                    position: 'center top',
                    showClass: 'bounceIn',
                    hideClass: 'bounceOut',
                    sound: false,
                    width: 400,
                    msg: 'Berhasil Download'
                });
                $("#hasil-report-ruangan").html('<span class="badge badge-success shadow-success m-1">Downloaded</span>');
            })
            .fail(function() {
                Lobibox.notify('error', {
                    pauseDelayOnHover: true,
                    icon: 'fa fa-info-circle',
                    continueDelayOnInactiveTab: false,
                    position: 'center top',
                    showClass: 'bounceIn',
                    hideClass: 'bounceOut',
                    sound: false,
                    width: 400,
                    msg: 'Hubungi Administrator Jika terjadi Eror'
                });
            });
    });

    $(document).on("click", "#button-cetak-barcode-ruangan", function (e) {
    e.preventDefault();
    var url = $(this).data("url");
    var data = $("#form-report-pilihan-ruangan").serialize();
    $("#hasil-report-ruangan").html(
        '<div style="text-align: center; padding:2%;"><div class="spinner-border" role="status" > <span class="sr-only">Loading...</span> </div></div>'
    );
    $.ajax({
        url: url,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf"]').attr("content"),
        },
        type: "POST",
        data: data,
        dataType: "html",
    })
        .done(function (data) {
            $("#hasil-report-ruangan").html(
                '<iframe src="data:application/pdf;base64, ' +
                    data +
                    '" style="width:100%;; height:500px;" frameborder="0"></iframe>'
            );
        })
        .fail(function () {
            $("#hasil-report-ruangan").html(
                '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
            );
        });
});
</script>
