 <div class="row g-3">
     <div class="col-md-6">
         <div class="card border border-warning">
             <div class="card-header pb-0">
                 <div class="row flex-between-center">
                     <div class="col-sm-auto mb-2 mb-sm-0 ">
                         <h5 class="mb-0" data-anchor="data-anchor">
                             Form Input Data Document KSO
                         </h5>
                     </div>
                     <div class="col-sm-auto">
                         <div class="btn-group" role="group">
                             <button class="btn btn-sm btn-primary dropdown-toggle" id="btnGroupVerticalDrop2"
                                 type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                 aria-expanded="false"><span class="fas fa-align-left me-1"
                                     data-fa-transform="shrink-3"></span>Option</button>
                             <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                                 <button class="dropdown-item" data-bs-toggle="modal"
                                     data-bs-target="#modal-klasifikasi" id="button-add-data-klasifikasi-v2"><span
                                         class="far fa-edit"></span>
                                     Tambah Klasifikasi</button>
                             </div>
                         </div>
                     </div>
                 </div>
                 <hr>
             </div>
             <div class="card-body pt-0 mt-0">
                 <form class="row g-3">
                     <div class="col-md-6">
                         <label class="form-label" for="inputAddress2">Periode</label>
                         <input class="form-control" id="inputAddress2" type="text"
                             placeholder="2012 - 2017" />
                     </div>
                     <div class="col-md-6">
                         <label class="form-label" for="inputCity">File</label>
                         <input class="form-control" id="inputCity" type="file" />
                     </div>

                     <div class="col-12">
                         <div class="form-check">
                             <input class="form-check-input" id="gridCheck" type="checkbox" />
                             <label class="form-check-label" for="gridCheck">Check me out</label>
                         </div>
                     </div>
                     <div class="col-12">
                         <button class="btn btn-primary" type="submit">Sign in</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
     <div class="col-md-6">
         <div class="card border border-primary">
             <div class="card-header pb-0">
                 <div class="row flex-between-center">
                     <div class="col-sm-auto mb-sm-0 mb-2">
                         <h5 class="mb-0" data-anchor="data-anchor">
                             Data Document KSO
                         </h5>
                     </div>
                     <div class="col-sm-auto">
                         <div class="btn-group" role="group">
                             <button class="btn btn-sm btn-primary dropdown-toggle" id="btnGroupVerticalDrop2"
                                 type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                 aria-expanded="false"><span class="fas fa-align-left me-1"
                                     data-fa-transform="shrink-3"></span>Option</button>
                             <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                                 <button class="dropdown-item" id="#"><span class="far fa-folder-open"></span>
                                     Clone Data</button>
                             </div>
                         </div>
                     </div>
                 </div>
                 <hr>
             </div>
             <div class="card-body pt-0" id="menu-data-v3">
                 <div class="tab-content">
                     <table id="data-v3" class="table table-striped nowrap" style="width:100%">
                         <thead class="bg-200 text-700">
                             <tr>
                                 <th>No</th>
                                 <th>Periode</th>
                                 <th>Lihat Document</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @php
                                 $no = 1;
                             @endphp
                             @foreach ($data as $datas)
                                 <tr>
                                     <td>{{ $no++ }}</td>
                                     <td>{{ $datas->periode_kso }}</td>
                                     <td><button class="btn btn-falcon-primary btn-sm"><span
                                                 class="fas fa-cog"></span>Show</button></td>
                                     <td></td>
                                 </tr>
                             @endforeach
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <script>
     new DataTable('#data-v3', {
         responsive: true
     });
 </script>
