<div class="row">
    <div class="col-lg-12">
        <div class="card">
          <div class="card-header text-uppercase">Data Lokasi Ruangan</div>
           <div class="card-body">
              <div class="list-group">
                @foreach ($data as $item)
                <a href="javaScript:void();" class="list-group-item list-group-item-action">{{$item->kd_lokasi}} : {{$item->nama_lokasi}}</a>
                @endforeach
              </div>
           </div>
        </div>
      </div>
 </div>
