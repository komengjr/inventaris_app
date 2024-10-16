<style>
    table tr td {

        padding: 5px;
        margin: 2px;
        font-weight: bold;
    }
    table {
        border-collapse: collapse;
    }
</style>
<h4>{{$log->nama_log_sdm}} - {{$nama}}</h4>
<table border="1" style="font-size: 8px; margin: 0px; padding: 0px; width:100%;  font-family: Calibri (Body);">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Log</th>
            @foreach ($header as $header1)
                <th>{{$header1->nama_s_log_sdm_form}}</th>
            @endforeach

        </tr>
    </thead>
    <tbody>
        @php
            $no =1;
        @endphp
        @foreach ($data as $data)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$data->created_at}}</td>
            @foreach ($header as $header2)
            @php
                $ceklog = DB::table('s_log_sdm_answer_sub')->where('kd_log_sdm_answer',$data->kd_log_sdm_answer)->where('kd_s_log_sdm_form',$header2->kd_s_log_sdm_form)->first();
            @endphp
                <td>
                    @if ($ceklog)
                        {{$ceklog->log_sdm_answer}}
                    @endif
                </td>
            @endforeach
        </tr>
        @endforeach


    </tbody>
</table>
