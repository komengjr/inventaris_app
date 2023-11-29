<style>
    input[type="file"] {
        display: none;
    }
</style>

<div class="modal-content" id="showdatabarang">
    <div class="modal-header">
        <h6><span style="color: royalblue;"> Data Lokasi Cabang : {{$id}}</span> </h6>
        <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-close"></i>
        </button>
    </div>
    {{-- <form  method="POST" action="" enctype="multipart/form-data" id="form-update"> --}}

    <div class="modal-body">
        <table class="styled-table align-items-center table-flush pb-2 " id="data-table97">
            <thead>
                <tr style="font-size: 12px;">
                    <th style="width: 1px; height: 1px;;">No</th>
                    <th>Kode Lokasi</th>
                    <th>Nama Lokasi</th>
                    <th>Nomor Ruangan</th>
                    <th>Jumlah Data</th>
                    <th>Jumlah Verifikasi</th>
                    <th>Status Lokasi</th>
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
                    <td>
                        @php
                            $noruangan = DB::table('tbl_nomor_ruangan_cabang')->where('kd_lokasi',$lokasi->kd_lokasi)->where('kd_cabang',$id)->first();
                        @endphp
                        @if ($noruangan)
                            {{$noruangan->nomor_ruangan}}
                        @endif
                    </td>
                    <td>
                        @php
                            $databarang = DB::table('sub_tbl_inventory')->where('kd_lokasi',$lokasi->kd_lokasi)->where('kd_cabang',$id)->count();
                        @endphp
                        {{$databarang}}
                    </td>
                    <td>0</td>
                    <td>
                        @php
                            $cek = DB::table('tbl_nomor_ruangan_cabang')->where('kd_cabang',Auth::user()->cabang)->where('kd_lokasi',$lokasi->kd_lokasi)->first();
                        @endphp
                        @if ($cek)
                            <span class="badge badge-success m-1">Terdaftar</span>
                        @else
                            <span class="badge badge-danger m-1">Belum Terdaftar</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal-footer pt-3">

        {{-- <button type="submit" class="btn btn-primary" ><i class="fa fa-save" ></i> Update Data</button> --}}

    </div>
</div>
<script>
    $('#data-table97').DataTable();
</script>

