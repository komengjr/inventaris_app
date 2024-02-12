<div id="menu-order-user-cabang">
    <form action="{{ url('nav/user-order/post-terima-order', []) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="">Tujuan Peminjaman</label>
                <input type="text" class="form-control" name="kategori" value="{{ $data->kategori_req }}" disabled>
                <input type="text" class="form-control" name="tiket_peminjaman" value="{{ $data->tiket_req }}"
                    hidden>
            </div>
            <div class="col-md-6">
                <label for="">Tujuan Cabang</label>
                <input type="text" class="form-control" name="cabang" value="{{ $data->nama_cabang }}" disabled>
            </div>
            <div class="col-md-12">
                <label for="">Deskripsi Peminjaman</label>
                <textarea class="form-control" id="" cols="10" rows="5" name="deskripsi_cabang" disabled>{{ $data->deskripsi_req }}</textarea>
            </div>
            <div class="col-md-12">
                <label for="">Penanggung Jawab Cabang</label>
                <select name="pj_pinjam" id="" class="form-control single-select-staff" required>
                    <option value="">Pilih Staff</option>
                    @foreach ($staff as $staff)
                        <option value="{{ $staff->nip }}">{{ $staff->nama_staff }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="">Tanggal Peminjam</label>
                <input type="date" class="form-control" name="tgl_pinjam" required>
            </div>
            <div class="col-md-6">
                <label for="">Batas Tanggal Peminjam</label>
                <input type="date" class="form-control" name="batas_tgl_pinjam" required>
            </div>
            <div class="col-md-12">
                <label for="">Deskripsi Peminjaman</label>
                <textarea class="form-control" id="" cols="30" rows="10" name="deskripsi"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-secoundary" id="button-pindah-order-cabang"
                    data-id="{{ $data->tiket_req }}"><i class="fa fa-send"></i> Pindah Order Cabang</button>
                {{-- <button type="submit" class="btn btn-primary" ><i class="fa fa-save" ></i> Update Data</button> --}}
                <button type="submit" class="btn-success" id="button-terima-order-peminjaman" data-url=""><i
                        class="fa fa-send-o"></i> Terima Order</button>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('.single-select-staff').select2();

    });
</script>
<script>
    $(document).on("click", "#button-pindah-order-cabang", function(e) {
        e.preventDefault();
        var id = $(this).data("id");
        $("#menu-order-user-cabang").html(
            '<div style="text-align: center; padding:2%;"><div class="spinner-border" role="status" > <span class="sr-only">Loading...</span> </div></div>'
        );
        $.ajax({
                url: '../../nav/user-order/pindah-cabang/' + id,
                type: "GET",
                dataType: "html",
            })
            .done(function(data) {
                $("#menu-order-user-cabang").html(data);
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
</script>
