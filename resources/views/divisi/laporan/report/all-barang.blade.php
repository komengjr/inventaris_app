<!DOCTYPE html>
<html lang="en">

<head>

    <title>Report Data Inventaris</title>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> --}}
    {{-- <link href="{{ asset('online/bootstrap.min.css', []) }}" rel="stylesheet" />
    <link href="{{ asset('online/all.min.css', []) }}" rel="stylesheet" /> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
</head>
<style>
    /* @import url('https://fonts.googleapis.com/css2?family=Russo+One&display=swap'); */

    /* General */


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
        width: 710px;
        height: 106px;
        border: 0.2px solid #000000;
    }

    div.body {
        position: relative;
        left: 20px;
        width: 710px;
        height: 920px;
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
        position: fixed;
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
            <img style="padding-top: 0px; margin: 2px; left: 2px; ;" src="icon.png" width="152">
            <hr style="padding: 0%; margin: 0%;">
            <p style="font-size: 9px; text-align: center; margin-left: 2px;margin-right: 2px;">123</p>
        </div>
        <h5 style="padding-top: 20px; margin: 20px; left: 100px; padding-left: 155px;text-decoration: underline;">DAFTAR
            LIST BARANG INVENTARIS</h5>
        {{-- <img style="padding-top: 11px;" src="data:image/png;base64, {!! base64_encode( QrCode::eyeColor(0, 255, 0, 0, 0, 0, 0)->style('round')->eye('circle')->format('svg')->size(107)->errorCorrection('H')->generate(123123),) !!}"> --}}

        <div class="absolute">
            <img style="padding-top: 1px; left: 10px;" src="data:image/png;base64, {!! base64_encode(
                QrCode::eyeColor(0, 0, 111, 115, 255, 114, 232)->style('dot')->eye('circle')->format('svg')->size(101)->errorCorrection('H')->generate(123),
            ) !!}">
        </div>
    </div>
    <div class="body">
        <br>
        <table
            style="font-size: 8px; margin: 0px; padding: 0px; width: 710px; font-size: 11px; font-family: Calibri (Body); border:1px solid black;border-collapse:collapse;">
            <tr>
                <td colspan="3" class="text-right"><strong>SDM.33-FRM-PP-07.2/02 </strong></td>
            </tr>

            {{-- <tr>
                <td style="width: 150px;">Tujuan Peminjaman</td>
                <td style="width: 5px;">:</td>
                <td></td>
            </tr>
            <tr>
                <td style="width: 150px;">Penanggung Jawab</td>
                <td style="width: 5px;">:</td>

                <td></td>
            </tr>
            <tr>
                <td>Asal Cabang</td>
                <td style="width: 5px;">:</td>
                <td>


                </td>
            </tr>
            <tr>
                <td>Tujuan Cabang</td>
                <td>:</td>
                <td>

                </td>
            </tr> --}}
        </table>
        <br>
        <table
            style="font-size: 8px; margin: 0px; padding: 2px; width: 710px; font-size: 11px; font-family: Calibri (Body);">
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
                style="font-size: 8px; margin: 0px; padding: 0px; width: 710px; font-size: 11px; font-family: Calibri (Body);"
                border="1">
                <tr>

                    <td colspan="3" class="text-right"><strong>asd , {{ date('d - m - Y ') }}</strong></td>
                </tr>
                <tr>
                    <td>Penanggung Jawab ,</td>
                    <td>Yang Menyerahkan ,</td>
                    <td>Yang Mengetahui ,</td>
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


</html>
