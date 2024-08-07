<!DOCTYPE html>
<html lang="en">

<head>
    <title>Report Stok Opname</title>
</head>
<style>

    @page {
        margin-left: 25px;
        margin-top: 5px;
        font-family: Calibri (Body);
    }
</style>
<style>
    div.header {
        position: relative;
        left: 20px;
        width: 100%;
        height: 106px;
        border: 0.2px solid #000000;
    }

    div.body {
        position: relative;
        left: 20px;
        width: 100%;
        height: 500px;
        border: 0px solid #302a2a;
        font-size: 15px;
    }

    div.absolute {
        position: absolute;
        top: 0px;
        right: 0;
        width: 101px;
        height: 104px;
        border: 1px solid #252424;
    }

    div.absolute-kiri {
        position: absolute;
        top: 0px;
        left: 0;
        width: 156px;
        height: 104px;
        border: 1px solid #252424;
    }

    table {
        border-collapse: collapse;
    }

    table tr td p {

        padding: 0px;
        margin: 0px;
        font-weight: bold;
    }

    th,
    td {
        border: 1px solid black;
    }

    div.footer {
        /* position: fixed; */
        left: 0;
        bottom: 15px;
        border: 0px solid #302a2a;
        font-size: 15px;
    }
</style>
</head>

<body style="padding-top: 25px; padding-left: 0px;">

    <div class="header">
        <div class="absolute-kiri">
            @php
                $entitas = DB::table('tbl_cabang')->where('kd_cabang',Auth::user()->cabang)->first();
            @endphp
            @if ($entitas->kd_entitas_cabang == 'PTP')
            <img style="padding-top: 0px; margin: 2px; left: 2px; ;" src="vendor/pramita.png" width="152">
            @else
            <img style="padding-top: 0px; margin: 2px; left: 2px; ;" src="vendor/sima.jpeg" width="152">
            @endif

            <hr style="padding: 0%; margin: 0%;">
            <p style="font-size: 9px; text-align: center; margin-left: 2px;margin-right: 2px;">{{$entitas->alamat}}</p>
        </div>
        <h5 style="padding-top: 20px; margin: 20px; left: 100px; padding-left: 155px;text-decoration: underline;">Laporan Stok Opname</h5>
        {{-- <img style="padding-top: 11px;" src="data:image/png;base64, {!! base64_encode( QrCode::eyeColor(0, 255, 0, 0, 0, 0, 0)->style('round')->eye('circle')->format('svg')->size(107)->errorCorrection('H')->generate(123123),) !!}"> --}}

        <div class="absolute">
            <img style="padding-top: 1px; left: 10px;" src="data:image/png;base64, {!! base64_encode(
                QrCode::style('round')->eye('circle')->format('svg')->size(101)->errorCorrection('H')->generate('SDM.33-FRM-PP-07.2/02'),
            ) !!}">
        </div>
    </div>
    <div class="body">
        <br>
        <table
            style="font-size: 8px; margin: 0px; padding: 0px; width: 100%; font-size: 11px; font-family: Calibri (Body); border:1px solid black;border-collapse:collapse;">
            <tr>
                <td colspan="3" class="text-right"><strong>SDM.33-FRM-PP-07.2/02 </strong></td>
            </tr>

        </table>
        <br>
        <table style="font-size: 8px; margin: 0px; padding: 2px; width: 100%; font-size: 11px; font-family: Calibri (Body);">
            <thead style="font-weight: bold;">
                <tr>
                    <td style="width: 4%;">No</td>
                    <td>Nomor Inventaris</td>
                    <td>Nama Barang</td>
                    <td>Merek</td>
                    <td>Type</td>
                    <td style="width: 15%;">Harga Perolehan</td>
                    <td>Status Barang</td>
                </tr>
            </thead>
            <tbody>
                {{-- @php
                    $no = 1;
                @endphp
                @foreach ($data as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->no_inventaris }}</td>
                        <td>{{ $data->nama_barang }}</td>
                        <td>{{ $data->merk }}</td>
                        <td>{{ $data->type }}</td>
                        <td style="text-align: right;">@currency($data->harga_perolehan)</td>
                        <td>Baik</td>
                    </tr>
                @endforeach --}}
            </tbody>
        </table>
        <br><br><br>

        <div class="footer">
            <table
                style="font-size: 8px; margin: 0px; padding: 0px; width: 100%; font-size: 11px; font-family: Calibri (Body);"
                border="1">
                <tr>

                    <td colspan="3" class="text-right"><strong>{{$entitas->nama_cabang}} , {{ date('d - m - Y ') }}</strong></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td class="text-center" style="padding-top: 10px; padding-bottom: 10px; width: 33%;">
                        <br><br><br><br><br>


                    </td>
                    <td class="text-center" style="width: 33%;">
                        <br><br><br><br><br>


                    </td>
                    <td class="text-center" style="width: 33%;">
                        <br><br><br><br><br>

                    </td>
                </tr>

            </table>
        </div>
    </div>
</body>

</html>
