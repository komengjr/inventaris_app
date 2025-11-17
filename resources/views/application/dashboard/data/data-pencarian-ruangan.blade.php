 @foreach ($ruangan as $ruangans)
 <div class="col-6 col-md-3 col-lg-2 mb-1">
     <div class="card-body border h-100 " id="button-view-data-lokasi"
         data-code="{{ $ruangans->id_nomor_ruangan_cbaang }}" data-bs-toggle="modal"
         data-bs-target="#modal-dashboard">

         <div class="bg-white dark__bg-1100 border p-3 h-100 border-primary"><a href="#"><img
                     class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm"
                     src="{{ asset('ruangan.png') }}" alt="" width="100" /></a>
             <h6 class="mb-1"><a href="#">{{ $ruangans->master_lokasi_name }}</a>
             </h6>
             <p class="fs--2 mb-0">Nomor Ruangan : <span
                     class="badge bg-primary m-1">{{ $ruangans->nomor_ruangan }}</span></p>
             @php
             $total = DB::table('inventaris_data')
             ->where('id_nomor_ruangan_cbaang', $ruangans->id_nomor_ruangan_cbaang)
             ->where('inventaris_data_status', '<', '4' )
                 ->count();
                 @endphp
                 <p class="fs--2 mb-0">Total Barang : {{ $total }}</p>

         </div>

     </div>
 </div>
 @endforeach
