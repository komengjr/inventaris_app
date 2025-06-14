<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Verifikasi Pembatalan Pemusnahan</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="p-3">
        <div class="card border border-primary" id="menu-verifikasi-data-pemusnahan">
            <div class="card-body">
                <div class="containera p-0" id="QR-Code">
                    <div class="col-12 text-center">
                        <label for="" class="text-center">Masukan Kode Verifikasi</label>
                        <input type="text" class="form-control form-control-lg text-center" name="code_name" id="code_name" onkeydown="caridatabatal(this)" required>
                        <input type="text" name="" id="tiket" value="{{$code}}" hidden>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function caridatabatal(ele) {
        if (event.key === 'Enter') {
            var code = document.getElementById('code_name').value;
            var tiket = document.getElementById('tiket').value;
            $.ajax({
                url: "{{ route('menu_pemusnahan_pilih_data_barang_verifikasi_pembatalan_code') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                    "tiket": tiket,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-verifikasi-data-pemusnahan').html(data);
                location.reload();
            }).fail(function() {
                $('#menu-verifikasi-data-pemusnahan').html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                );
            });

        }
    }
</script>
