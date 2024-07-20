<!DOCTYPE html>
<html lang="en">

<head>
    <title>Report Data Inventaris</title>
</head>
<style>
    @page {
        size: 29.7cm 21cm;
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
        /* position: fixed; */
        left: 60px;
        width: 100%;
        /* height: 300px; */
        border: 0px solid #302a2a;
        font-size: 15px;
    }
    div.body-after {
        /* position: fixed; */
        left: 20px;
        width: 100%;
        height: 150px;
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
        position: absolute;
        left: 0;
        width: 100%;
        bottom: 0px;
        border: 0px solid #302a2a;
        font-size: 15px;
    }
</style>
</head>

<body style="padding-top: 25px; padding-left: 0px;">

    <div class="header">
        <div class="absolute-kiri">
            @php
                $entitas = DB::table('tbl_cabang')
                    ->where('kd_cabang', Auth::user()->cabang)
                    ->first();
            @endphp
                @if ($entitas->kd_entitas_cabang == 'PTP')
                <img style="padding-top: 0px; margin: 2px; left: 2px; ;" src="vendor/pramita.png" width="152">
                @elseif($entitas->kd_entitas_cabang == 'SIMA')
                <img style="padding-top: 0px; margin: 2px; left: 2px; ;" src="vendor/sima.jpeg" width="152">
                @endif



            <hr style="padding: 0%; margin: 0%;">
            <p style="font-size: 9px; text-align: center; margin-left: 2px;margin-right: 2px;">{{ $entitas->alamat }}
            </p>
        </div>
        <h4 style="padding-top: 1px; margin: 20px; left: 150px; padding-left: 5%;text-align: center;">DAFTAR BARANG
            INVENTARIS <br>FISIK AKTIVA TETAP
            <br>
            RUANG : {{ $dataruangan->nomor_ruangan }} ( {{ $dataruangan->nama_lokasi }} )
            <br>
            {{-- Tanggal Cetak : {{ date('d - m - Y ') }} --}}

        </h4>
        {{-- <h5 style="padding-top: 20px; margin: 20px; left: 100px; padding-left: 155px;text-decoration: underline;">DAFTAR BARANG INVENTARIS</h5> --}}
        {{-- <img style="padding-top: 11px;" src="data:image/png;base64, {!! base64_encode( QrCode::eyeColor(0, 255, 0, 0, 0, 0, 0)->style('round')->eye('circle')->format('svg')->size(107)->errorCorrection('H')->generate(123123),) !!}"> --}}

        <div class="absolute">
            @php
                // $kode = $dataruangan->nomor_ruangan .''. $dataruangan->nama_lokasi .''.;
            @endphp
            <img style="padding-top: 1px; left: 10px;" src="data:image/png;base64, {!! base64_encode(
                QrCode::style('round')->eye('circle')->format('svg')->size(101)->errorCorrection('H')->generate($dataruangan->nomor_ruangan . ' ( ' .$dataruangan->nama_lokasi.' )'),
            ) !!}">
        </div>
    </div>
    <div class="body">
        <br>
        <table style="font-size: 8px; margin: 0px; padding-left: 20px; width: 100%; font-size: 11px; font-family: Calibri (Body); border:1px solid rgb(255, 255, 255);" border="0">
            <tr>
                <td colspan="1" class="text-right"><strong>Diperiksa Oleh : </strong></td>
                <td colspan="2" class="text-right" style="text-align: right;">
                    <strong>SDM.{{ $nocabang->no_cabang }}-FRM-PP-07.2</strong></td>
            </tr>
        </table>
        <br>
        <table
            style="font-size: 8px; margin: 0px; padding-left: 20px; width: 100%; font-size: 11px; font-family: Calibri (Body);">
            <thead style="font-weight: bold; text-align: center;">
                <tr>
                    <td style="width: 2%;" rowspan="2">No</td>
                    <td style="width: 4%;" rowspan="2">Tgl Beli</td>
                    <td rowspan="2">Nomor Inventaris</td>
                    <td>Nama Barang</td>
                    <td colspan="3">Spesifikasi Teknik</td>
                    <td colspan="12">Kondisi / Keterangan Setiap Bulan</td>
                </tr>
                <tr>
                    <td>Sarana Fisik</td>
                    <td>Merek</td>
                    <td>Harga</td>
                    <td>Keterangan</td>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                    <td>7</td>
                    <td>8</td>
                    <td>9</td>
                    <td>10</td>
                    <td>11</td>
                    <td>12</td>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->th_perolehan }}</td>
                        <td>{{ $data->no_inventaris }}</td>
                        <td>{{ $data->nama_barang }}</td>
                        <td>{{ $data->merk }} / {{ $data->type }}</td>
                        <td style="text-align: right;">@currency($data->harga_perolehan)</td>
                        <td></td>

                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="body-after">
        <table style="display: none;">
            <tr>
                <td>1</td>
                <td>1</td>
                <td>1</td>
            </tr>

        </table>
    </div>
    {{-- <hr> --}}
    <div class="footer">
        <table
            style="font-size: 8px; margin: 0px; padding-left: 20px; width: 100%; font-size: 11px; font-family: Calibri (Body);"
            border="1">
            <tr>
                <td colspan="2" style="text-align: center; width: 70%;">PENANGGUNG JAWAB RUANGAN</td>
                <td colspan="1" class="text-right" style="text-align: right; width: 30%;">
                    <strong>{{ $entitas->nama_cabang }} , {{ $tgl }}</strong></td>
            </tr>
            <tr>
                <td>1.</td>
                <td>2.</td>
                <td>Mengetahui </td>
            </tr>
            <tr>
                <td>3.</td>
                <td>4.</td>
                <td rowspan="4"></td>
            </tr>
            <tr>
                <td>5.</td>
                <td>6.</td>
            </tr>
            <tr>
                <td>7.</td>
                <td>8.</td>
            </tr>
            <tr>
                <td>9.</td>
                <td>10.</td>
            </tr>
            <tr>
                <td>11.</td>
                <td>12.</td>
                <td style="text-align: center;">Manager SDM & Umum</td>
            </tr>

        </table>
    </div>
</body>

</html>
