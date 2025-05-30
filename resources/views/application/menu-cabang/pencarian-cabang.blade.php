 @foreach ($data as $datas)
     <div class="mb-4 col-md-6 col-lg-4 ">
         <div class="border border-primary rounded-1 h-100 d-flex flex-column justify-content-between pb-3">
             <div class="overflow-hidden">
                 {{-- <div class="position-relative rounded-top overflow-hidden">
                                    <a class="d-block" href="../../../app/e-commerce/product/product-details.html"><img
                                            class="img-fluid rounded-top" src="{{ asset('asset/img/products/7.jpg') }}"
                                            alt="" /></a>
                                </div> --}}
                 <div class="p-3">
                     <h5 class="fs-0">
                         <a class="text-dark" href="#l">{{ $datas->nama_cabang }}</a>
                     </h5>
                     <p class="fs--1 mb-1">
                         <a class="text-500" href="#!">{{ $datas->alamat }}</a>
                     </p>
                 </div>
             </div>
             <div class="d-flex flex-between-center px-3">
                 <div>
                     <p class="fs--1 mb-1">
                         Phone : <strong>{{ $datas->phone }}</strong>
                     </p>
                     <p class="fs--1 mb-1">
                         Entitas : <strong class="text-success">{{ $datas->nama_entitas_cabang }}</strong>
                     </p>
                 </div>
                 <div>
                     <div class="btn-group" role="group">
                         <button class="btn btn-sm btn-warning" id="btnGroupVerticalDrop2" type="button"
                             data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                 class="fas fa-align-left" data-fa-transform="shrink-3"></span>
                             Option</button>
                         <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                             <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-menu-cabang"
                                 id="button-data-barang-cabang" data-code="{{ $datas->kd_cabang }}"><span
                                     class="fas fa-swatchbook"></span>
                                 Data Barang Cabang</button>
                             <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-menu-cabang"
                                 id="button-data-peminjaman-cabang" data-code="{{ $datas->kd_cabang }}"><span
                                     class="far fa-address-card"></span>
                                 Data Peminjaman Cabang</button>
                             <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-menu-cabang"
                                 id="button-data-mutasi-cabang" data-code="{{ $datas->kd_cabang }}"><span
                                     class="fab fa-expeditedssl"></span>
                                 Data Mutasi Cabang</button>
                             <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-menu-cabang"
                                 id="button-data-srockopname-cabang" data-code="{{ $datas->kd_cabang }}"><span
                                     class="fab fa-elementor"></span>
                                 Data Stockopname Cabang</button>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 @endforeach
