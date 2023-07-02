<!DOCTYPE html>
<html lang="en">

<head>

    <title>Cetak</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" /> --}}
    {{-- <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> --}}
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
        width: 106px;
        height: 101px;
        border: 2px solid #252424;
    }
    div.absolute-kiri {
        position: absolute;
        top: 0px;
        left: 0;
        width: 106px;
        height: 101px;
        border: 2px solid #252424;
    }

    table tr td p {

        padding: 0px;
        margin: 0px;
        font-weight: bold;
    }
    div.footer {
        position: fixed;
        left: 0;
        bottom: 20px;
        border: 0px solid #302a2a;
        font-size: 15px;
    }
</style>
</head>

<body style="padding-top: 25px; padding-left: 0px;">

    <div class="header">
        <div class="absolute-kiri">
            <img style="padding-left: 2px; left: 20px;" src="data:image/png;base64, {!! base64_encode(
                QrCode::eyeColor(0, 255, 111, 115, 255, 114, 0)->style('round')->eye('circle')->format('svg')->size(101)->errorCorrection('H')->generate(123123),
            ) !!}">
        </div>
        <img style="padding-top: 11px; margin: 20px; left: 100px; padding-left: 112px;" src="logo.png" width="280">
        {{-- <img style="padding-top: 11px;" src="data:image/png;base64, {!! base64_encode( QrCode::eyeColor(0, 255, 0, 0, 0, 0, 0)->style('round')->eye('circle')->format('svg')->size(107)->errorCorrection('H')->generate(123123),) !!}"> --}}

        <div class="absolute">
            <img style="padding-left: 2px; left: 20px;" src="data:image/png;base64, {!! base64_encode(
                QrCode::eyeColor(0, 255, 111, 115, 255, 114, 0)->style('round')->eye('circle')->format('svg')->size(101)->errorCorrection('H')->generate(123123),
            ) !!}">
        </div>
    </div>
    <div class="body">
        <br>
        <table style="font-size: 8px; margin: 0px; padding: 0px; width: 710px; font-size: 11px; font-family: Calibri (Body);" border="1">
            <tr>

                <td colspan="3" class="text-right"><strong>SDM/323/P-33/123 </strong></td>
            </tr>
            <tr>
                <td colspan="3">
                    <p>FORM PEMAKAIAN BARANG INVENTARIS</p>
                </td>

            </tr>
            <tr>
                <td>Inventaris Cabang</td>
                <td style="width: 10px;">:</td>
                <td>PRAMITA PONTIANAK</td>
            </tr>
            <tr>
                <td>Tujuan Cabang</td>
                <td>:</td>
                <td>PRAMITA PONTIANAK</td>
            </tr>
        </table>
        <br>
        <table style="font-size: 8px; margin: 0px; padding: 0px; width: 710px; font-size: 11px; font-family: Calibri (Body);" border="1">
           <thead style="font-weight: bold;">
                <tr>
                    <td class="text-center">No</td>
                    <td>Tgl Pinjam</td>
                    <td>Tgl Kembali</td>
                    <td>Nama Barang</td>
                    <td>Merek / Type</td>
                    <td>Keterangan</td>
                </tr>
           </thead>
           <tbody>
            {{-- @php
                $no = 1;
            @endphp
            @foreach ($databrg as $item)

                <tr>
                    <td class="text-center">{{$no++}}</td>
                    <td>12-05-2023</td>
                    <td>21-05-2023</td>
                    <td>{{$item->nama_barang}}</td>
                    <td>{{$item->merk}} {{$item->type}}</td>
                    <td>Untuk Belajar</td>
                </tr>

            @endforeach --}}
           </tbody>
        </table>
        <br><br><br>

    <div class="footer">
        <table
            style="font-size: 8px; margin: 0px; padding: 0px; width: 710px; font-size: 11px; font-family: Calibri (Body);"
            border="0.1" cla>
            <tr>

                <td colspan="3" class="text-right"><strong>PONTIANAK , {{date('Y-m-d H:i:s')}}</strong></td>
            </tr>
            <tr >
                <td class="text-center" style="padding-top: 15px; padding-bottom: 15px; width: 33%;">
                    {{-- <img style="padding-left: 2px; left: 20px;" src=""> --}}
                    <br><br><br><br><br>
                    Pembuat Laporan
                    <br>
                    (..........................)
                </td>
                <td class="text-center" style="width: 33%;">
                    <br><br><br><br><br>
                     Manager SDM & UMUM
                     <br>
                     (..........................)
                </td>
                <td class="text-center" style="width: 33%;">
                    <br><br><br><br><br>
                     Kepala Cabang ( Yang Bersangkutan )
                     <br>
                     (..........................)
                </td>
            </tr>

        </table>
    </div>
    </div>


</html>
