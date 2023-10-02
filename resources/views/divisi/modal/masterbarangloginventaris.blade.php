<div class="modal-header bg-success">
    <p class="modal-title text-white">
        <a href="{{ url('divisi/masterbarang/dataloginventaris/resetdataloginventory', []) }}" class="btn-danger btn-sm" target="_blank" rel="noopener noreferrer"><i class="fa fa-reset"></i> Reset</a>
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
                    <th>Nama Barang</th>
                    <th>Kode Klasifikasi</th>
                    <th>Kode Lokasi</th>
                    <th>Merek / Type</th>
                    <th>Tanggal Pembelian</th>
                    <th>Tahun Perolehan</th>
                    <th>Harga</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                    $erorjenis = 0;
                    $erorlokasi = 0;
                @endphp
                @foreach ($data as $item)
                    <tr>
                        <td data-label="No">{{ $no++ }} </td>
                        <td data-label="Nama Barang">{{ $item->nama_barang }}</td>
                        <td>
                            @php
                                $cekklasifikasi = DB::table('tbl_inventory')
                                    ->where('kd_inventaris', $item->kd_inventaris)
                                    ->first();
                            @endphp
                            @if ($cekklasifikasi)
                                {{ $item->kd_inventaris }} : {{ $cekklasifikasi->nama_barang }}
                            @else
                                {{ $item->kd_inventaris }} : <p style="color: red;">Tidak Ditemukan</p>
                                @php
                                    $erorjenis = $erorjenis + 1;
                                @endphp
                            @endif
                        </td>
                        <td data-label="Kode Lokasi">
                            @php
                                $ceklokasi = DB::table('tbl_lokasi')
                                    ->where('kd_lokasi', $item->kd_lokasi)
                                    ->first();
                            @endphp
                            @if ($ceklokasi)
                                {{ $item->kd_lokasi }} : {{ $ceklokasi->nama_lokasi }}
                            @else
                                {{ $item->kd_lokasi }} : <p style="color: red;">Tidak Ditemukan</p>
                                @php
                                    $erorlokasi = $erorlokasi + 1;
                                @endphp
                            @endif
                        </td>
                        <td data-label="Merek & Type">{{ $item->merk }} / {{ $item->type }}</td>
                        <td data-label="Tanggal Pembelian">{{ $item->tgl_beli }}</td>
                        <td data-label="Tahun Perolehan">{{ $item->th_perolehan }}</td>
                        <td data-label="Harga Perolehan">
                            @if ($item->harga_perolehan == "")
                            @currency('1')
                            @else
                            @currency($item->harga_perolehan)
                            @endif
                            {{-- {{$item->harga_perolehan}} --}}
                        </td>
                        <td class="text-center">

                            <button class="btn-warning" id="buttoneditloginventaris"
                                data-id="{{ $item->id_sub_tbl_inventory_log }}"><i class="fa fa-pencil"></i></button>
                            <button class="btn-danger"><i class="fa fa-trash"></i></button>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="modal-footer" style="float: left;">
@if ($data->isEmpty())
@else

    @if ($erorjenis == 0 && $erorlokasi == 0)
    <a href="{{ url('divisi/masterbarang/dataloginventaris/downloaddataloginventory', []) }}" class="btn btn-dark" ><i class="fa fa-download"></i> Download Data</a>
    @else
    <span class="badge badge-danger shadow-danger m-3" style="font-size: 15px;">Ada Eror Klasifikasi : {{$erorjenis}} Kode Tidak Ditemukan</span>
    <span class="badge badge-danger shadow-danger m-3" style="font-size: 15px;">Ada Eror Lokasi : {{$erorlokasi}} Kode Tidak Ditemukan</span>

    @endif

@endif

</div>
    <script>
        $(document).ready(function() {
            //Default data table
            $('#default-datatablelog').DataTable();

        });
    </script>
