<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Report Mutasi Antar Cabang</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div id="hasil-print-preview-mutasi"></div>
</div>
<script>
    $('#hasil-print-preview-mutasi').html(
        '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
    );
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('menu_mutasi_proses_print_data_mutasi') }}",
            type: "POST",
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "code": '{{ $code }}',
            },
            dataType: 'html',
        }).done(function(data) {
            $('#hasil-print-preview-mutasi').html(
                '<iframe src="data:application/pdf;base64, ' +
                data +
                '" style="width:100%; height:533px;" frameborder="0"></iframe>');
        }).fail(function() {
            $('#hasil-print-preview-mutasi').html('eror');
        });
    });
</script>
