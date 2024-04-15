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
                    <label for="">Cari Klasifikasi</label>
                    <select class="form-control multiple-select" multiple="multiple" id="klasifikasi_barang">
                        @foreach ($data as $data)
                            <option data-name="{{ $data->kd_inventaris }}">{{ $data->nama_klasifikasi_barang }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
        <div class="pt-3" id="hasil-report-klasifikasi"></div>
    </div>
    <div class="modal-footer">

        <button type="button" class="btn-success" id="button-filter-klasifikasi-barang"><i class="fa fa-search"></i>
            Cari Data</button>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.multiple-select').select2();
    });
</script>
<script>
    $(document).on("click", "#button-filter-klasifikasi-barang", function(e) {
        e.preventDefault();

        var result = $("#klasifikasi_barang option:selected").map(function() {
            return $(this).data("name");
        }).get();
        $("#hasil-report-klasifikasi").html('<div style="text-align: center; padding:2%;"><div class="spinner-border" role="status" > <span class="sr-only">Loading...</span> </div></div>');
        $.ajax({
                url: '../../menu/postmasterlaporan/filterdataklasifikasi',
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf"]').attr("content"),
                },
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "total": result.length,
                    "klasifikasi":result,
                },
                dataType: "html",
            })
            .done(function(data) {
                if (data == 'null') {
                    $("#hasil-report-klasifikasi").html(
                        '<span class="badge badge-danger shadow-danger m-1">Mohon Isi Semua Element</span>'
                        );
                } else {
                    $("#hasil-report-klasifikasi").html(data);

                }

            })
            .fail(function() {
                $("#hasil-report-klasifikasi").html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                );
            });
    });
</script>
