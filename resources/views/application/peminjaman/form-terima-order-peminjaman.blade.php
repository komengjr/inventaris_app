 <div class="col-md-12 pb-3">
     <div class="card border border-warning">
         <div class="card-header pb-0">
             <div class="row flex-between-center">
                 <div class="col-sm-auto mb-2 mb-sm-0 ">
                     <h5 class="mb-0" data-anchor="data-anchor">
                         Form Peminjaman Barang
                     </h5>
                 </div>
                 <div class="col-sm-auto">

                 </div>
             </div>
             <hr>
         </div>
         <div class="card-body pt-0 mt-0">
             <form class="row g-3" method="post" enctype="multipart/form-data">
                 @csrf
                 <div class="col-md-6">
                     <label class="form-label" for="inputAddress">Tiket Peminjaman</label>
                     <input class="form-control" type="text" value="{{ $data->tiket_peminjaman }}" disabled />
                     <input class="form-control" type="text" id="code" value="123" hidden />
                 </div>
                 {{-- <div class="col-md-6">
                     <label class="form-label" for="inputAddress">Tujuan Cabang</label>
                     <input class="form-control" type="text" value="{{ $data->tujuan_cabang }}" disabled />
                 </div> --}}
                 <div class="col-md-6">
                     <label class="form-label" for="inputAddress">Tanggal Order</label>
                     <input class="form-control" type="text" value="{{ $data->tgl_pinjam }}" disabled />
                 </div>
                 <div class="col-md-6">
                     <label class="form-label" for="inputAddress">Penanggung Jawab Peminjaman</label>
                     <input class="form-control" type="text" value="{{ $data->pj_pinjam }}" disabled />
                 </div>
                 <div class="col-md-6">
                     <label class="form-label" for="inputAddress">Deskripsi Peminjaman</label>
                     <textarea name="" class="form-control" id="" disabled>{{ $data->deskripsi }}</textarea>
                 </div>
                 <div class="col-md-6">
                     <label class="form-label" for="inputAddress">Penerima</label>
                     <input class="form-control" type="text" id="penerima" />
                 </div>
                 <div class="col-md-6">
                     <label class="form-label" for="inputAddress">Deskripsi Cabang</label>
                     <textarea name="" class="form-control" id="deskripsi"></textarea>
                 </div>
             </form>
         </div>
     </div>
 </div>
 <div class="col-md-12">
     <div class="card border border-primary">
         <div class="card-header pb-0">
             <div class="row flex-between-center">
                 <div class="col-sm-auto mb-sm-0 mb-2">
                     <h5 class="mb-0" data-anchor="data-anchor">
                         Data Barang Pinjaman
                     </h5>
                 </div>
                 <div class="col-auto">

                 </div>
             </div>
             <hr>
         </div>
         <div class="card-body pt-0" id="menu-data-v3">
             <div class="tab-content" id="menu-table-pilih-peminjaman">
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
                                         <button class="btn btn-falcon-warning btn-sm"
                                             id="button-terima-barang-satuan-peminjaman"
                                             data-code="{{ $item->id_sub_peminjaman }}">Terima</button>
                                     @else
                                     <span class="badge bg-success">Terima</span>
                                     @endif
                                 </td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>
 <div id="menu-verifikasi-data-peminjaman" class="pt-3">
     <button class="btn btn-primary btn-sm float-end mb-3" type="button" id="button-verifikasi-penerimaan-barang-pinjaman"
         data-code="{{ $data->tiket_peminjaman }}">Verifikasi Penerimaan Pinjaman</button>
 </div>
 <script>
     new DataTable('#data-table-pinjam', {
         responsive: true
     });
 </script>
