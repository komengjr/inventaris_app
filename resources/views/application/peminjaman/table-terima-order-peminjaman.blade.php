 <table id="data-table-pinjam" class="table table-striped nowrap" style="width:100%">
     <thead class="bg-200 text-700 fs--2">
         <tr>
             <th>No</th>
             <th>Nama Barang</th>
             <th>Id Inventaris</th>
             <th>No Inventaris</th>
             <th>Merek / Type</th>
             <th>Tanggal Pembelian</th>
             <th>Harga Perolehan</th>
             <th>status</th>
         </tr>
     </thead>
     <tbody class="fs--1">
         @php
             $no = 1;
         @endphp
         @foreach ($brg as $item)
             <tr>
                 <td>{{ $no++ }}</td>
                 <td>{{ $item->inventaris_data_name }}</td>
                 <td>{{ $item->inventaris_data_code }}</td>
                 <td>{{ $item->inventaris_data_number }}</td>
                 <td>{{ $item->inventaris_data_merk }}</td>
                 <td>{{ $item->inventaris_data_tgl_beli }}</td>
                 <td>{{ $item->inventaris_data_harga }}</td>
                 <td>
                     @if ($item->status_sub_peminjaman == 0)
                         <button class="btn btn-falcon-warning btn-sm" id="button-terima-barang-satuan-peminjaman"
                             data-code="{{ $item->id_sub_peminjaman }}">Terima</button>
                     @else
                         <span class="badge bg-success">Terima</span>
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
