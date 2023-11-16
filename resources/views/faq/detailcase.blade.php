<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{$data->judul_case}}</h4>
        <h6>{{$data->keterangan_case}}</h6>
        <p>{{$data->created_at}}</p>
        <hr>
        @php
            echo $data->deskripsi_case;
        @endphp
    </div>
</div>

