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
                <label for="">Cari Ruangan</label>
                <select class="form-control single-select" name="kd_lokasi" id="ruangan">
                    <option value="">Pilih Lokasi</option>
                    @foreach ($data as $data)
                        <option value="{{$data->id_nomor_ruangan_cbaang }}">{{$data->nomor_ruangan }} - {{$data->nama_lokasi }}</option>
                    @endforeach
                </select>
            </div>
            </div>
        </form>
        <div class="pt-3" id="hasil-report-ruangan"></div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> EXCEL</button>
        <button type="button" class="btn-success" id="button-print-laporan-ruangan-pdf" data-url="{{ url('menu/postmasterlaporan/lokasi-barang-cabang-ruangan', []) }}"><i class="fa fa-print"></i> PDF</button>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.single-select').select2();
    });
</script>
