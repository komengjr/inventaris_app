<table  style="table-layout: auto;">
    @foreach ($data as $data)
        <tr >
            <td style="padding-right:6px; padding-top: 0%; padding-left: 0%; ">{!! QrCode::size(90)->generate($data->kd_inventaris.'/'.$data->kd_lokasi.'/'.$data->kd_cabang.'/'.$data->th_pembuatan); !!} </td>
            {{-- <img src="data:image/png;base64, {!! $qrcode !!}"> --}}
        </tr>
        <tr style="">
            <td ><strong><p style="font-size: 9px; text-align: center; ">  {{$data->nama_barang}}</p></strong></td>
           <p></p>
        </tr>
       
        @endforeach
</table>