 <table id="data-table-mutasi" class="table table-striped nowrap" style="width:100%">
     <thead class="bg-200 text-700 fs--2">
         <tr>
             <th>No</th>
             <th>Nama Barang</th>
             <th>No Inventaris</th>
             <th>Merek / Type</th>
             <th>Tanggal Pembelian</th>
             <th>Action</th>
         </tr>
     </thead>
     <tbody class="fs--1">
         @php
             $no = 1;
         @endphp
         @foreach ($brg as $brgs)
             <tr>
                 <td>{{ $no++ }}</td>
                 <td>{{ $brgs->inventaris_data_name }}</td>
                 <td>{{ $brgs->inventaris_data_code }}</td>
                 <td>{{ $brgs->inventaris_data_merk }}</td>
                 <td>{{ $brgs->inventaris_data_tgl_beli }}</td>
                 <td>
                     <button class="btn btn-falcon-primary"><span class="fas fa-trash"></span></button>
                 </td>
             </tr>
         @endforeach
     </tbody>
 </table>
 <script>
     new DataTable('#data-table-mutasi', {
         responsive: true
     });
 </script>
