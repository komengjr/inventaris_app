<div class="modal-body p-0">
    <div class="bg-youtube rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1 text-white" id="staticBackdropLabel">Setup Data Aset</h4>
        <p class="fs--2 mb-0 text-white">Support by <a class="link-200 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="p-3">
        <div class="card p-3 mb-3 border border-youtube">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="">Nama Inventaris</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $data->inventaris_data_name }}"
                        disabled>
                    <input type="text" name="id_inventaris" id="id_inventaris"
                        value="{{ $data->inventaris_data_code }}" hidden>
                </div>
                <div class="col-md-6">
                    <label for="">Nomor Inventaris</label>
                    <input type="text" class="form-control form-control-lg"
                        value="{{ $data->inventaris_data_number }}" disabled>
                </div>
                <div class="col-md-4">
                    <label for="">Merek</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $data->inventaris_data_merk }}"
                        disabled>
                </div>
                <div class="col-md-4">
                    <label for="">Type</label>
                    <input type="text" class="form-control form-control-lg" value="{{ $data->inventaris_data_type }}"
                        disabled>
                </div>
                <div class="col-md-4">
                    <label for="">No Seri</label>
                    <input type="text" class="form-control form-control-lg"
                        value="{{ $data->inventaris_data_no_seri }}" disabled>
                </div>
                <div class="col-md-4">
                    <label for="">Suplier</label>
                    <input type="text" class="form-control form-control-lg"
                        value="{{ $data->inventaris_data_suplier }}" disabled>
                </div>
                <div class="col-md-4">
                    <label for="">Tanggal Pembelian</label>
                    <input type="text" class="form-control form-control-lg"
                        value="{{ $data->inventaris_data_tgl_beli }}" disabled>
                </div>
                <div class="col-md-4">
                    <label for="">Nilai Buku</label>
                    <input type="text" class="form-control form-control-lg"value="@currency($data->inventaris_data_harga)"
                        disabled>
                </div>
            </div>
        </div>
        <div class="card p-3 mb-3 border border-youtube">
            <div class="row">
                <div class="col-12">
                    <label for="">Pilih Setup Depresiasi</label>
                    <select class="form-select choices-single-depresiasi" name="pilih_depresiasi" id="pilih_depresiasi">
                        <option value="">Pilih Depresiasi</option>
                        @foreach ($depresiasi as $item)
                            <option value="{{ $item->depresiasi_sub_code }}">{{ $item->depresiasi_sub_name }} ( @currency($item->depresiasi_sub_start) Sampai @currency($item->depresiasi_sub_end) ) Masa : {{ $item->depresiasi_sub_masa }} Tahun</option>
                        @endforeach
                    </select>
                </div>

            </div>
        </div>
        <div class="card p-3 border border-youtube" id="hasil-pencarian">

        </div>
    </div>
</div>
<script>
    new window.Choices(document.querySelector(".choices-single-depresiasi"));
</script>
<script>
    $('#pilih_depresiasi').on("change", function() {
        var code = document.getElementById("pilih_depresiasi").value;
        var id = document.getElementById("id_inventaris").value;
        if (code == null) {
            location.reload();
        } else {
            $.ajax({
                url: "{{ route('menu_aset_setup_pilih_depresiasi') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                    "id": id,
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
