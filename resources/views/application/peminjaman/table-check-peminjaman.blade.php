 <table id="data-table-pinjam" class="table table-striped nowrap" style="width:100%">
     <thead class="bg-200 text-700 fs--2">
         <tr>
             <th>No</th>
             <th>Nama Barang</th>
             <th>No Inventaris</th>
             <th>Merek / Type</th>
             <th>Tanggal Peminjaman</th>
             <th>Kondisi Peminjaman</th>
             <th>Tanggal Pengembalian</th>
             <th>Kondisi Pengembalian</th>
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
                 <td>{{ $brgs->inventaris_data_number }}</td>
                 <td>{{ $brgs->inventaris_data_merk }}</td>
                 <td>{{ $brgs->tgl_pinjam_barang }}</td>
                 <td>{{ $brgs->kondisi_pinjam }}</td>
                 <td>{{ $brgs->tgl_kembali_barang }}</td>
                 <td>{{ $brgs->kondisi_kembali }}</td>
                 <td>
                     <div class="btn-group" role="group">
                         <button class="btn btn-sm btn-primary dropdown-toggle" id="btnGroupVerticalDrop2" type="button"
                             data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                 class="fas fa-align-left me-1" data-fa-transform="shrink-3"></span>Option</button>
                         <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                             <button class="dropdown-item"id="button-proses-check-barang-peminjaman"
                                 data-code="{{ $brgs->id_sub_peminjaman }}">
                                 <span class="fas fa-swatchbook"></span>
                                 Pengembalian Barang</button>
                             <div class="dropdown-divider"></div>

                         </div>
                     </div>
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
