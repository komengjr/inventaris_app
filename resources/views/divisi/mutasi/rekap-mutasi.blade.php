<div class="modal-header bg-success">
    <p class="modal-title text-white">
        Data Rekap Mutasi
    </p>
    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body" id="showmenudataloginventaris">
    <div class="pb-2" style="font-size: 12px;">
        <table class="styled-table" id="default-datatablelog">
            <thead style="font-size: 12px;">
                <tr style="font-size: 12px;">
                    <th style="width: 1px; height: 1px;;">No</th>
                    <th>Tiket Order</th>
                    <th>Asal Cabang</th>
                    <th>Tujuan Cabang</th>
                    <th>Penanggung Jawabs</th>
                    <th>Tanggal Order</th>
                    <th>Penerima</th>
                    <th>Menyetujui</th>
                    <th>Yang Menyerahkan</th>
                    <th>Tanggal Terima</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $item)
                    @php
                        $tujuan = DB::table('tbl_cabang')->where('kd_cabang', $item->target_mutasi)->first();
                    @endphp
                    @if ($item->asal_mutasi == Auth::user()->cabang || $item->target_mutasi == Auth::user()->cabang)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->kd_mutasi }}</td>
                            <td>{{ $item->nama_cabang }}</td>
                            <td>
                                @if ($tujuan)
                                    {{ $tujuan->nama_cabang }}
                                @else
                                @endif
                            </td>
                            <td>{{ $item->penanggung_jawab }}</td>
                            <td>{{ $item->tanggal_buat }}</td>
                            <td>{{ $item->penerima }}</td>
                            <td>{{ $item->menyetujui }}</td>
                            <td>{{ $item->yang_menyerahkan }}</td>
                            <td>{{ $item->tgl_terima }}</td>
                            <td>
                                @if ($item->penerima == null)
                                    @if ($item->kd_cabang == Auth::user()->cabang)
                                        <span class="badge badge-warning">Menunggu Konfirmasi Penerimaan</span>
                                    @else
                                        <button class="btn-warning" id="button-lengkapi-data-mutasi"
                                            data-id='{{ $item->kd_mutasi }}'><i class="fa fa-cogs"></i> Lengkapi
                                            Data</button>
                                    @endif
                                @else
                                    <button class="btn-info m-1" id="button-print-mutasi"
                                        data-id="{{ $item->kd_mutasi }}"><i class="fa fa-print"></i> Print</button>
                                    <button class="btn-info m-1" id="button-show-data-mutasi"
                                        data-id='{{ $item->kd_mutasi }}'><i class="fa fa-eye"></i> Show</button>
                                @endif

                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

    </div>
    <div id="menu-print-mutasi"></div>
</div>
<div class="modal-footer" style="float: left;">

</div>
<script>
    $(document).ready(function() {
        //Default data table
        $('#default-datatablelog').DataTable();

    });
    $(document).on("click", "#button-print-mutasi", function(e) {
        e.preventDefault();
        var id = $(this).data("id");
        $("#menu-print-mutasi").html(
            '<div style="text-align: center; padding:2%;"><div class="spinner-border" role="status" > <span class="sr-only">Loading...</span> </div></div>'
        );
        $.ajax({
                url: "../divisi/datamutasi/print/datamutasi/" + id,
                type: "GET",
                dataType: "html",
            })
            .done(function(data) {
                $("#menu-print-mutasi").html(
                    '<iframe src="data:application/pdf;base64, ' +
                    data +
                    '" style="width:100%;; height:500px;" frameborder="0"></iframe>'
                );
            })
            .fail(function() {
                Lobibox.notify('error', {
                    pauseDelayOnHover: true,
                    icon: 'fa fa-info-circle',
                    continueDelayOnInactiveTab: false,
                    position: 'center top',
                    showClass: 'bounceIn',
                    hideClass: 'bounceOut',
                    width: 500,
                    msg: 'Hubungi Administrator Jika terjadi Eror'
                });

            });
    });
</script>
