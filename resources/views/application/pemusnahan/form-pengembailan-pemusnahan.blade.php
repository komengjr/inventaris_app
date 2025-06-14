<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Form Verifikasi Pembatalan Data Pemusnahan</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="p-3">
        <div class="card border border-primary">
            <form class="row g-3 p-4" action="{{ route('menu_pemusnahan_pilih_data_barang_pengembalian_save') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <h5><span class="badge bg-primary">1. Pengajuan</span></h5>
                <div class="col-md-4">
                    <label class="form-label" for="inputAddress">Penggagas</label>
                    <input type="text" class="form-control" name="penggagas" value="{{ $data->penggagas }}" disabled>
                    <input type="text" class="form-control" name="code_pemusnahan" value="{{ $data->kd_pemusnahan }}" hidden>
                </div>
                <div class="col-md-8">
                    <label class="form-label" for="inputAddress">Dasar Pengajuan</label>
                    <input type="text" class="form-control" name="dasar_pengajuan"
                        value="{{ $data->dasar_pengajuan }}" disabled>
                </div>
                <h5><span class="badge bg-primary">2. Identitas Barang</span></h5>
                <div class="col-md-4">
                    <label class="form-label" for="inputAddress">Nama Barang</label>
                    <input type="text" class="form-control" name="nama" value="{{ $data->inventaris_data_name }}"
                        disabled>
                    <input type="text" class="form-control" name="id_inventaris"
                        value="{{ $data->inventaris_data_code }}" hidden>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="inputAddress">No Inventaris</label>
                    <input type="text" class="form-control" name=""
                        value="{{ $data->inventaris_data_number }}" disabled>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="inputAddress">Merek / Type</label>
                    <input type="text" class="form-control" name="" value="{{ $data->inventaris_data_merk }}"
                        disabled>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="inputAddress">No Seri</label>
                    <input type="text" class="form-control" name=""
                        value="{{ $data->inventaris_data_no_seri }}" disabled>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="inputAddress">Tanggal Pembelian</label>
                    <input type="text" class="form-control" name=""
                        value="{{ $data->inventaris_data_tgl_beli }}" disabled>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="inputAddress">Harga Perolehan</label>
                    <input type="text" class="form-control" name="" value="@currency($data->inventaris_data_harga)" disabled>
                </div>

                <h5><span class="badge bg-primary">3. Verifikasi</span></h5>
                <div class="col-md-6">
                    <label class="form-label" for="inputAddress">User Verifikasi</label>
                    <input type="text" class="form-control" name="penggagas" value="{{ $data->user_verifikasi }}"
                        disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="inputAddress">Status Verifikasi</label>
                    <input type="text" class="form-control" name="penggagas" value="{{ $data->verifikasi }}"
                        disabled>
                </div>
                <h5><span class="badge bg-primary">4. Persetujuan</span></h5>
                <div class="col-md-6">
                    <label class="form-label" for="inputAddress">Persetujuan Kepala Cabang</label>
                    <input type="text" class="form-control" name="penggagas" value="{{ $data->user_persetujuan }}" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="inputAddress">Status Persetujuan</label>
                    <input type="text" class="form-control" name="penggagas" value="{{ $data->persetujuan }}" disabled>
                </div>
                <h5><span class="badge bg-danger">5. Pembatalan</span></h5>
                <div class="col-md-12">
                    <label class="form-label" for="inputAddress">Keterangan Alasan Pembatalan</label>
                    <textarea name="alasan" class="form-control" id=""></textarea>
                </div>

                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" id="gridCheck" type="checkbox" required />
                        <label class="form-check-label" for="gridCheck">Check me</label>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary float-end" type="submit"><span class="fas fa-save"></span> Simpan
                        Data</button>
                </div>
            </form>
        </div>

    </div>
</div>
<script type="text/javascript" src='{{ asset('qr_login/option2/js/filereader.js') }}'></script>
<script type="text/javascript" src="{{ asset('qr_login/option2/js/qrcodelib.js') }}"></script>
<script type="text/javascript" src="{{ asset('qr_login/option2/js/webcodecamjs.js') }}"></script>
<script>
    function caridata(ele) {
        if (event.key === 'Enter') {
            var code = document.getElementById('code_name').value;
            var tiket = document.getElementById('tiket').value;
            $.ajax({
                url: "{{ route('menu_pemusnahan_pilih_data_barang_verifikasi_code') }}",
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
                $('#menu-verifikasi-data-pemusnahan').html(data);
            }).fail(function() {
                $('#menu-verifikasi-data-pemusnahan').html(
                    '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                );
            });

        }
    }
</script>
