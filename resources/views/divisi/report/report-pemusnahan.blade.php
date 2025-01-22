<!DOCTYPE html>
<html lang="en">

<head>
    <title>Report Peminjaman</title>
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
        /* border: 1px solid rgb(54, 48, 48); */

    }

    div.footer {
        position: fixed;
        width: 100%;
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
        <h5 style="padding-top: 20px; margin: 20px; left: 100px; padding-left: 155px;text-decoration: underline;">FORMULIR PEMUSNAHAN BARANG INVENTARIS</h5>
        {{-- <img style="padding-top: 11px;" src="data:image/png;base64, {!! base64_encode( QrCode::eyeColor(0, 255, 0, 0, 0, 0, 0)->style('round')->eye('circle')->format('svg')->size(107)->errorCorrection('H')->generate(123123),) !!}"> --}}

        <div class="absolute">
            <img style="padding-top: 1px; left: 10px;" src="data:image/png;base64, {!! base64_encode(
                QrCode::style('round')->eye('circle')->format('svg')->size(101)->errorCorrection('H')->generate($data->kd_pemusnahan),
            ) !!}">
        </div>
    </div>
    <div class="body">
        <br>
        <table
            style="font-size: 8px; margin: 0px; padding: 0px; width: 100%; font-size: 11px; font-family: Calibri (Body); border:0px solid rgb(255, 253, 253);border-collapse:collapse;" border="0">
            <tr>
                {{-- <td></td> --}}
                <td colspan="3" class="text-right" style="text-align: right;"><strong>SDM.33-FRM-PP-07.2/03 </strong></td>
            </tr>

        </table>
        <hr>
        <h3>1.	Dasar Pengajuan :</h3>
        <p style="padding-left: 17px;">{{$data->dasar_pengajuan}}</p>
        <h3>2.	Identitas Barang</h3>
            <table style="padding-left: 17px; width: 100%;">
                <tr>
                    <td">Nama Barang</td>
                    <td>:</td>
                    <td>{{$data->nama_barang}}</td>
                </tr>
                <tr>
                    <td style="margin: 10px;">No. Inventaris</td>
                    <td>:</td>
                    <td>{{$data->no_inventaris}}</td>
                </tr>
                <tr>
                    <td style="margin: 10px;">Merk</td>
                    <td>:</td>
                    <td>{{$data->merk}}</td>
                </tr>
                <tr>
                    <td style="margin: 10px;">Type/No.Seri</td>
                    <td>:</td>
                    <td>{{$data->type}} / {{$data->no_seri}}</td>
                </tr>
                <tr>
                    <td style="margin: 10px;">Tanggal Pembelian</td>
                    <td>:</td>
                    <td>{{$data->tgl_beli}}</td>
                </tr>
                <tr>
                    <td style="margin: 10px;">Harga Barang</td>
                    <td>:</td>
                    <td>@currency($data->harga_perolehan)</td>
                </tr>
            </table>
        <h3>3.	Verifikasi</h3>
        <p style="padding-left: 17px;">{{$data->verifikasi}}</p>
        <h3>4.	Persetujuan</h3>
        <p style="padding-left: 17px;">{{$data->persetujuan}}</p>
        <h3>5.  Eksekusi</h3>
        <p style="padding-left: 17px;">{{$data->eksekusi}}</p>

        <div class="footer">
            <table style="font-size: 8px; margin: 0px; padding: 0px; width: 100%; font-size: 11px; font-family: Calibri (Body); "
                border="1">
                <tr>

                    <td colspan="3" class="text-right"><strong>{{$entitas->nama_cabang}} , {{ date('d - m - Y ') }}</strong></td>
                </tr>
                <tr>
                    <td>Pelaksana</td>
                    <td>Wk Mng SDM & Umum</td>
                    <td>Kepala Cabang</td>
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
