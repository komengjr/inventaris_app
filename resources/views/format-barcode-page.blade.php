<!DOCTYPE html>
<html lang="en">

<head>

    <title>Print Barcode</title>
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/barcode.css') }}"> --}}
</head>
<style>
    @page {
        margin-left: 8px;
        margin-top: 0px;
    }

    /* @media print {
        @page {
            size: 86mm 54mm;
            margin: 0;
        }
    } */
</style>
<style>
    div.relative {
        position: absolute;
        top: 30px;
        left: 0px;
        width: 220px;
        height: 95px;
        /* border: 3px solid #000000; */
    }

    div.absolute {
        position: absolute;
        top: -21px;
        right: 0;
        width: 106px;
        height: 100px;
        border: 3px solid #000000;
    }

    table tr td p {
        border-collapse: collapse;
        padding: 0px;
        margin: 0px;
        font-weight: bold;
    }
    table {
        border-collapse: collapse;
        /* border: 1px solid; */
        width: 100%;
    }
</style>
</head>

<body style="padding-top:0px; padding-left: 0px;">

    <div class="relative">
        {{-- <img style="padding-top: 11px;" src="data:image/png;base64, {!! base64_encode( QrCode::eyeColor(0, 255, 0, 0, 0, 0, 0)->style('round')->eye('circle')->format('svg')->size(107)->errorCorrection('H')->generate($data->id_inventaris), ) !!}"> --}}
        <img style="padding-top: 0px; width: 107px; height: 107px;"
            src="data:image/png;base64, {!! base64_encode( QrCode::format('png')->backgroundColor(255, 255, 255)->size(507)->style('round')->eye('circle')
                    ->generate($data->no_inventaris),
            ) !!} ">
        <div class="absolute">
            <table style="font-size: 8px; margin: 0px; padding: 0px;  color: #000000; " border="1" >
                <tr>

                    <td colspan="3"><strong style="color: #000000">{{ $data->nama_barang }}</strong></td>
                </tr>
                <tr>
                    <td style="width: 20%;">
                        <p style="color: #000000">Lokasi</p>
                    </td>
                    <td class="text-center" style="width: 1%;">
                        <p>:</p>
                    </td>
                    <td>
                        <p style="color: #000000">
                            @php
                                $namalokasi = DB::table('tbl_lokasi')
                                    ->where('kd_lokasi', $data->kd_lokasi)
                                    ->get();
                            @endphp
                            {{ $namalokasi[0]->nama_lokasi }}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center" style="font-size: 7px">
                        <strong style="color: #000000">{{ $data->no_inventaris }}</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="text-center">
                        <strong style="color: #000000">{{ $data->merk }} / {{ $data->type }}</strong>
                    </td>
                </tr>

                <tr>

                    <td colspan="3">
                        <p style="color: #000000">
                            @php
                                $namacabang = DB::table('tbl_cabang')
                                    ->where('kd_cabang', $data->kd_cabang)
                                    ->get();
                            @endphp
                            {{ $namacabang[0]->nama_cabang }}
                        </p>
                    </td>
                </tr>
            </table>
        </div>
    </div>


</html>
