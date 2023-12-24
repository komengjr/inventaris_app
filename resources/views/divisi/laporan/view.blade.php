<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Report</h5>
        <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body" id="show-data-laporan">
        <img src="https://via.placeholder.com/800x500" class="img-fluid rounded shadow" alt="Card image cap">
    </div>
    <div class="modal-footer">
        <a href="{{ url('menureport/masterlaporan/cetak-all-barang-cabang/', []) }}" class="btn-dark"><i class="fa fa-times"></i> Download PDF</a>
        <button type="button" class="btn-success" id="button-print-laporan" data-url="{{ url('menureport/masterlaporan/cetak-all-barang-cabang/', []) }}"><i class="fa fa-print"></i> PDF</button>
    </div>
</div>
<script>
    $(document).on("click", "#button-print-laporan", function(e) {
        e.preventDefault();
        var url = $(this).data("url");
        $("#show-data-laporan").html(
            '<div class="spinner-border" role="status"> <span class="sr-only">Loading...</span> </div>');
        $.ajax({
                url: url,
                type: "GET",
                dataType: "html",
            })
            .done(function(data) {
                // $("#show-data-laporan").html(data);
                // $("#show-data-laporan").html('<iframe src="data:application/pdf;base64, ' + data +
                //     '" style="width:100%;; height:500px;" frameborder="0"></iframe>');
            })
            .fail(function() {
                $("#show-data-laporan").html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                );
            });

    });
</script>
