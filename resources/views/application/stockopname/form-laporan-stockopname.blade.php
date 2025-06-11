<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-4">
        <h4 class="mb-1" id="staticBackdropLabel">Form Stockopname Cabang</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="row p-3">

        <div class="col-md-6">
            <div class="card border border-primary mb-3">
                <div class="card-header pb-0">
                    <div class="row flex-between-center">
                        <div class="col-sm-auto mb-sm-0 mb-2">
                            <h5 class="mb-0" data-anchor="data-anchor">
                                <span class="badge bg-primary">Laporan Berita Acara Stockopname</span>

                            </h5>
                        </div>
                        <div class="col-auto">

                        </div>
                    </div>
                    <hr>
                </div>
                <div class="card-body pt-0">
                    <span id="laporan-berita-acara"></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border border-primary mb-3">
                <div class="card-header pb-0">
                    <div class="row flex-between-center">
                        <div class="col-sm-auto mb-sm-0 mb-2">
                            <h5 class="mb-0" data-anchor="data-anchor">
                                <span class="badge bg-primary">Report Stockopname</span>

                            </h5>
                        </div>
                        <div class="col-auto">

                        </div>
                    </div>
                    <hr>
                </div>
                <div class="card-body pt-0">
                    <span id="laporan-stockopname"></span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#laporan-berita-acara').html(
        '<div class="spinner-border spinner-border-sm" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span> </div>'
    );
    $.ajax({
        url: "{{ route('menu_stock_opname_print_berita_acara') }}",
        type: "POST",
        cache: false,
        data: {
            "_token": "{{ csrf_token() }}",
            "code": "{{ $code }}"
        },
        dataType: 'html',
    }).done(function(data) {
        $('#laporan-berita-acara').html(
            '<iframe src="data:application/pdf;base64, ' +
            data +
            '" style="width:100%; height:533px;" frameborder="0"></iframe>');
    }).fail(function() {
        $('#laporan-berita-acara').html('eror');
    });
</script>
<script>
    $('#laporan-stockopname').html(
        '<div class="spinner-border spinner-border-sm" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span> </div>'
    );
    $.ajax({
        url: "{{ route('menu_stock_opname_print_data') }}",
        type: "POST",
        cache: false,
        data: {
            "_token": "{{ csrf_token() }}",
            "code": "{{ $code }}"
        },
        dataType: 'html',
    }).done(function(data) {
        $('#laporan-stockopname').html(
            '<iframe src="data:application/pdf;base64, ' +
            data +
            '" style="width:100%; height:533px;" frameborder="0"></iframe>');
    }).fail(function() {
        $('#laporan-stockopname').html('eror');
    });
</script>
