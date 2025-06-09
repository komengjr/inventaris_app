<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Form Verifikasi Data Maintenance</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="p-3">
        <div class="card border border-primary" id="menu-verifikasi-data-maintenance">
            <div class="card-body">
                <div class="containera p-0">
                    <div class="col-12 text-center">
                        <label for="" class="text-center">Masukan Kode Verifikasi</label>
                        <input type="text" class="form-control form-control-lg text-center" name="code_name" id="code_name" onkeydown="caridata(this)" required>
                        <input type="text" name="" id="tiket" value="{{$code}}" hidden>
                    </div>
                    <div class="col-md-12">
                        @if ($message = Session::get('sukses'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function caridata(ele) {
        if (event.key === 'Enter') {
            var code = document.getElementById('code_name').value;
            var tiket = document.getElementById('tiket').value;
            $.ajax({
                url: "{{ route('menu_maintenance_verifikasi_data_maintenance_applay') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                    "tiket": tiket,
                },
                dataType: 'html',
            }).done(function(data) {
                document.getElementById('code_name').value = "";
                $('#menu-verifikasi-data-maintenance').html(data);
            }).fail(function() {
                $('#menu-verifikasi-data-maintenance').html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                );
            });

        }
    }
</script>

