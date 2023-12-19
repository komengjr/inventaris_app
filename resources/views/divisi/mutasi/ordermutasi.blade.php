<div class="modal-header bg-success">
    <p class="modal-title text-white">
        Recent History Order
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
                    <th>Penanggung Jawab</th>
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
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item->kd_mutasi}}</td>
                        <td>{{$item->penanggung_jawab}}</td>
                        <td>{{$item->tanggal_buat}}</td>
                        <td>{{$item->penerima}}</td>
                        <td>{{$item->menyetujui}}</td>
                        <td>{{$item->yang_menyerahkan}}</td>
                        <td>{{$item->tgl_terima}}</td>
                        <td><button class="btn-warning" id="button-lengkapi-data-mutasi" data-id='{{$item->kd_mutasi}}'><i class="fa fa-cogs" ></i> Lengkapi Data</button></td>
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

        });
    </script>
