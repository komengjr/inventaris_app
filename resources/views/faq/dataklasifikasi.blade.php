<div class="row">
    @foreach ($data as $item)
    <div class="col-lg-6">
        <div class="card">
          <div class="card-header text-uppercase">{{ $item->kategori_barang}}</div>
           <div class="card-body">
              <div class="list-group">
                @php
                    $kategori = DB::table('tbl_inventory')->where('no_urut_barang',$item->no_urut_barang)->orderBy('kd_inventaris', 'ASC')->get();
                @endphp
                @foreach ($kategori as $itemkategori)
                <a href="javaScript:void();" class="list-group-item list-group-item-action">{{$itemkategori->kd_inventaris}} : {{$itemkategori->nama_barang}}</a>
                @endforeach
              </div>
           </div>
        </div>
      </div>
    @endforeach
 </div>
