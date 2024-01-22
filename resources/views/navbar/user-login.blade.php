<div class="modal-header">
    <h5 class="modal-title">User Login</h5>
    <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><i class="fa fa-close"></i></span>
    </button>
</div>
<div class="modal-body">
    <div class="pb-2" style="font-size: 12px;">
        <table class="styled-table" id="default-datatableuser">
            <thead style="font-size: 12px;">
                <tr style="font-size: 12px;">
                    <th style="width: 1px; height: 1px;;">No</th>
                    <th>IP User</th>
                    <th>Aplikasi</th>
                    <th>Sistem Oprasi</th>
                    <th>Tanggal Login</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $data)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->ip_addres}}</td>
                        <td>{{$data->browser}}</td>
                        <td>{{$data->os}}</td>
                        <td>{{$data->created_at}}</td>
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
