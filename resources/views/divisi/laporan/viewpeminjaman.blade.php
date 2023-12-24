<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Report Peminjaman</h5>
        <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body" id="show-data-laporan">
        <form method="post" id="form-report-peminjaman">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="">Start Date</label>
                    <input type="date" class="form-control" name="startdate" id="startdate">
                </div>
                <div class="col-md-6">
                    <label for="">Start Date</label>
                    <input type="date" class="form-control" name="enddate" id="enddate">
                </div>
            </div>
        </form>
        <div class="pt-3" id="hasil-report-peminjaman"></div>
    </div>
    <div class="modal-footer">
        {{-- <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> EXCEL</button> --}}
        <button type="button" class="btn-success" id="button-print-laporan-peminjaman"
            data-url="{{ url('menu/postmasterlaporan/laporanpeminjaman', []) }}"><i class="fa fa-print"></i>
            Cetak</button>
    </div>
</div>

