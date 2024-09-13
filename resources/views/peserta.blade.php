<!DOCTYPE html>
<html lang="en">

<head>

    <title>Document</title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> --}}
</head>
<style>
    @page {
        margin-left: 10px;
        margin-top: 5px;
    }

    body {
        margin: 0px;
    }

    p {
        padding: 0px;
        background: rgb(255, 255, 255);
        text-align: center;
        /* height: 80px; */
        font-size: 12px;
        text-size-adjust: auto;
        font-family: "Copperplate", "Courier New", Monospace;
        width: 180px;
        margin-top: 0px;
        margin-bottom: 20px;
    }

    hr {
        width: 180px;
    }
</style>

<body>
    @foreach ($data as $data)
        <div class="row" style="width: 180px; height: 115px;">

            {{-- <img src="data:image/png;base64, {!! base64_encode(QrCode::format('svg')->size(85)->errorCorrection('H')->generate(url('view', []).'/'.substr($data->kd_inventaris,0,2).'/'.$data->kd_cabang.'/'.$data->kd_inventaris.'/'.$data->id)) !!}"> --}}
            <p></p>
            <strong>
                <p style="font-size: 13px;">{{ $data->nama_peserta }}</p>
            </strong>
            <br>
            <strong>
                <p>{{ $data->status }}</p>
            </strong>
            <hr>
        </div>
    @endforeach


</body>

</html>
