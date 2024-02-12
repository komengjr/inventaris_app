<form action="{{ url('nav/user-order/post-pindah-cabang', []) }}" method="post">
    @csrf
    <div class="col-12">
        <label for="">Pilih Cabang Tujuan</label>
        <select name="cabang" id="" class="form-control single-select-cabang" required>
            <option value="">Pilih Cabang</option>
            @foreach ($data as $data)
                <option value="{{ $data->kd_cabang }}">{{ $data->nama_cabang }}</option>
            @endforeach
        </select>
        <input type="text" name="tiket" value="{{$id}}" hidden>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn-success" id="button-terima-order-peminjaman" data-url=""><i
                class="fa fa-save"></i> Kirim Order</button>
    </div>
</form>
<script>
    $(document).ready(function() {
        $('.single-select-cabang').select2();

    });
</script>
