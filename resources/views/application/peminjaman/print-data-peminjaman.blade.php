<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Report Data Pmeinjaman </h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div id="menu-print-data-peminjaman"></div>
</div>

<script>
    $('#menu-print-data-peminjaman').html(
        '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
    );
    $.ajax({
        url: "{{ route('print_report_data_peminjaman_show') }}",
        type: "POST",
        cache: false,
        data: {
            "_token": "{{ csrf_token() }}",
            "code": '{{$code}}'
        },
        dataType: 'html',
    }).done(function(data) {
        $('#menu-print-data-peminjaman').html(
            '<iframe src="data:application/pdf;base64, ' +
            data +
            '" style="width:100%; height:533px;" frameborder="0"></iframe>');
    }).fail(function() {
        $('#menu-print-data-peminjaman').html('eror');
    });
</script>
