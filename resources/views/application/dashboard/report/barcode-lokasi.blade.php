<!DOCTYPE html>
<html lang="en">
<head>
    <title>Print Barcode</title>
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/barcode.css') }}"> --}}
</head>
<style>
    @page {
        margin-left: 2px;
        margin-top: 0px;
        font-family: Arial, Helvetica, sans-serif;
        font-style: normal;
        font-weight: normal;
    }
</style>
<style>
    div.relative {
        position: absolute;
        top: 15px;
        left: 0px;
        width: 123px;
        height: 55px;
    }
    div.absolute {
        position: absolute;
        top: -12.8px;
        right: 0;
        width: 57px;
        height: 61px;
        border: 1px solid #000000;
    }
    table tr td p {
        border-collapse: collapse;
        padding: 0px;
        margin: 0px;
        font-weight: bold;
    }
    table {
        width: 100%;
        margin-left: 0px;
    }
    tr,
    td {
        border: 0.2px solid black;
        border-radius: 1px;
    }
</style>
</head>
@foreach ($data as $datas)
    <body style="padding-top:0px; padding-left: 0px;">
        <div class="relative">
            <img style="padding-top: 0px; width: 63px; height: 63px;"
                src="data:image/png;base64, {!! base64_encode(
                    QrCode::format('png')->backgroundColor(255, 255, 255)->size(507)->style('round')->eye('circle')->generate($datas->inventaris_data_number),
                ) !!} ">
            <div class="absolute">
                <table style="font-size: 4px; margin: 0px; padding: 0px;  color: #000000; border-width: thin;">
                    <tr>
                        <td colspan="3"><strong style="color: #000000">{{ $datas->inventaris_data_name }}</strong></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;">
                            <p style="color: #000000">Lokasi</p>
                        </td>
                        <td class="text-center" style="width: 1%;">
                            <p>:</p>
                        </td>
                        <td>
                            <p style="color: #000000; ">

                                @php
                                    $namalokasi = DB::table('tbl_lokasi')
                                        ->where('kd_lokasi', $datas->inventaris_data_location)
                                        ->first();
                                @endphp
                                {{ $namalokasi->nama_lokasi }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-center" style="font-size: 3.5px">
                            <strong style="color: #000000">{{ $datas->inventaris_data_number }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-center">
                            <strong style="color: #000000">{{ $datas->inventaris_data_type }}
                                {{ $datas->inventaris_data_merk }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <p style="color: #000000">
                                @php
                                    $cabang = DB::table('tbl_cabang')
                                        ->where('kd_cabang', $datas->inventaris_data_cabang)
                                        ->first();
                                @endphp
                                {{ $cabang->nama_cabang }}
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
@endforeach

</html>
