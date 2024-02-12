<div class="modal-header">
    <h5 class="modal-title">Notifikasi Order</h5>
    <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><i class="fa fa-close"></i></span>
    </button>
</div>
<div class="modal-body" id="menu-navbar-user">
    <div class="pb-2" style="font-size: 12px;">
        <table class="styled-table" id="default-datatableuser">
            <thead style="font-size: 12px;">
                <tr style="font-size: 12px;">
                    <th style="width: 1px; height: 1px;;">No</th>
                    <th>Order Tiket</th>
                    <th>Kategori</th>
                    <th>Order Cabang</th>
                    <th>Tanggal Order</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->tiket_req }}</td>
                        <td>{{ $data->kategori_req }}</td>
                        <td>{{ $data->nama_cabang }}</td>
                        <td>{{ $data->tgl_req }}</td>
                        <td class="text-center">
                            @if ($data->status_req == 0)
                            <button class="btn-dark" id="button-tindakan-order"
                            data-id="{{ $data->tiket_req }}"><i class="fa fa-cog"></i> Lakukan Tindakan</button></td>
                            @else
                            <span class="badge badge-success p-2">Terima Order</span>
                            @endif

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
<div class="modal-footer">
    {{-- <button type="button" class="btn btn-dark" data-dismiss="modal"><i class="fa fa-times"></i>
        Close</button>
    <button type="button" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Save
        changes</button> --}}
</div>
<script>
    $(document).ready(function() {
        //Default data table
        $('#default-datatableuser').DataTable();

    });
</script>
<script>
    $(document).on("click", "#button-tindakan-order", function(e) {
        e.preventDefault();
        var id = $(this).data("id");
        $("#menu-navbar-user").html(
            '<div style="text-align: center; padding:2%;"><div class="spinner-border" role="status" > <span class="sr-only">Loading...</span> </div></div>'
        );
        $.ajax({
                url: '../../nav/user-order/detail/'+id,
                type: "GET",
                dataType: "html",
            })
            .done(function(data) {
                $("#menu-navbar-user").html(data);
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
