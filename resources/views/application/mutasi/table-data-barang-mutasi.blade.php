 <table id="data-table-pinjam" class="table table-striped nowrap" style="width:100%">
     <thead class="bg-200 text-700 fs--2">
         <tr>
             <th>No</th>
             <th>Nama Barang</th>
             <th>No Inventaris</th>
             <th>Merek / Type</th>
             <th>Tanggal Pembelian</th>
             <th class="text-end">Harga Perolehan</th>
             <th>Lokasi Awal</th>
             <th>Lokasi Tujuan</th>
         </tr>
     </thead>
     <tbody class="fs--1">
         @php
             $no = 1;
         @endphp
         @foreach ($data as $brgs)
             <tr>
                 <td>{{ $no++ }}</td>
                 <td>{{ $brgs->inventaris_data_name }}</td>
                 <td>{{ $brgs->inventaris_data_code }}</td>
                 <td>{{ $brgs->inventaris_data_merk }}</td>
                 <td>{{ $brgs->inventaris_data_tgl_beli }}</td>
                 <td class="text-end">@currency($brgs->inventaris_data_harga)</td>
                 <td>{{ $brgs->inventaris_data_location }}</td>
                 <td>
                     @if ($brgs->kd_lokasi_tujuan == null)
                         <button class="btn btn-falcon-primary btn-sm" id="button-pilih-lokasi-barang-mutasi"
                             data-code="{{ $brgs->id_sub_mutasi }}"><span class="fas fa-download"></span> Pilih
                             Lokasi</button>
                     @else
                        @php
                            $lokasi = DB::table('tbl_nomor_ruangan_cabang')->join('master_lokasi','master_lokasi.master_lokasi_code','=','tbl_nomor_ruangan_cabang.kd_lokasi')
                            ->where('tbl_nomor_ruangan_cabang.id_nomor_ruangan_cbaang',$brgs->kd_lokasi_tujuan)->first();
                        @endphp
                        @if ($lokasi)
                            {{$lokasi->master_lokasi_name}}
                        @endif
                     @endif
                 </td>

             </tr>
         @endforeach
     </tbody>
 </table>
 <script>
     new DataTable('#data-table-pinjam', {
         responsive: true
     });
 </script>
