<div class="modal-header bg-success">
    <p class="modal-title text-white">

    </p>
    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body" id="showmenudatalokasibarang">

    <div class="pb-2" style="font-size: 12px;">
        <table class="styled-table" id="default-datatablelog">
            <thead style="font-size: 12px;">
                <tr style="font-size: 12px;">
                    <th style="width: 1px; height: 1px;;">No</th>

                    <th>Kode Lokasi</th>
                    <th>Nama Lokasi</th>

                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($lokasi as $lokasi)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{ $lokasi->kd_lokasi }}</td>
                        <td>{{ $lokasi->nama_lokasi }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
<div class="modal-footer" style="float: left;">
</div>
<script>
    $(document).ready(function() {
        //Default data table
        $('#default-datatablelog').DataTable();
        $('#default-datatablelog1').DataTable();

    });
</script>
