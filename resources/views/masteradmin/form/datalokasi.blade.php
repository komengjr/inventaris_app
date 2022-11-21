
<div class="row">

    @foreach ($data as $data)
        <?php
        $ceklokasix = DB::table('sub_tbl_inventory')
            ->select('sub_tbl_inventory.*')
            ->where('kd_cabang', $id)
            ->where('kd_lokasi', $data->kd_lokasi)
            ->count();
        ?>
        @if ($ceklokasix == 0)
        @else
            <div class="col-6 col-lg-2 col-xl-2">
                <div class="card gradient-success rounded-0">
                    <div class="card-body p-1" style="cursor: pointer" data-toggle="modal" data-target="#lihat-detail-data" id="lihatdatabarang" data-url="{{ route('lihatdatabarang1', ['id' => 1]) }}">
                        <div class="media align-items-center bg-white p-3">
                            <div class="media-body">
                                <p class="text-dark text-uppercase extra-small-font font-weight-bold">
                                    <strong>{{$data->nama_lokasi}}</strong>
                                </p>
                                <h6 class="mb-0 text-dark">{{$ceklokasix}} Item</h6>
                            </div>
            
                            <div class="w-icon" id="iconruangan">
                                <i class="zmdi zmdi-desktop-mac text-gradient-danger"></i>
                            </div>
            
                        </div>
                    </div>
                </div>
            </div> 

        @endif
    @endforeach

</div>