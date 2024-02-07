<!DOCTYPE html>
<html lang="en">

<head>

    <title>Print Barcode</title>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> --}}
</head>
@php
    echo "<style>@page { margin-left: 2px; margin-top: 15px; size: ".($lebar+0.4)."cm ".$panjang."cm landscape; } </style>"
@endphp

<style>
    div.relative {
        position: relative;
        /* top: -8px; */
        /* left: 0px; */
        width: {{$lebar}}cm;
        height: {{$lebar-2}}cm;
        /* border: 2px solid #ff0000; */
    }

    div.absolute {
        position: absolute;
        /* top: -1px; */
        right: 0px;
        width: 0cm;
        height: 0cm;
        /* border: 1px solid #ff0404; */
    }

    table tr td p {

        padding: 0px;
        margin: 0px;
        /* font-weight: bold; */
    }

    body {
        font-family: 'MAIAN';
        /* position: relative; */
        /* left: 20px; */
        /* width: 490px; */
        /* height: 200px; */
        border: 0px solid #f5f5f5;
        font-size: 15px;
        /* font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; */
    }
    img{
        position: fixed;
    }
    table {
        border-collapse: collapse;
        height: 105px;
    }
</style>
</head>
<body>

    @foreach ($data as $data)
        @if ($data->kd_lokasi == '-')
        @else
            <div class="relative">

                <img style="width: {{$lebar-0.2}}cm; height: {{$lebar-0.2}}cm;" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')
                                                ->backgroundColor(255, 255, 255)
                                                ->size(507)
                                                ->style('round')
                                                // ->eye('circle')
                                                // ->eyeColor(0, 255, 0, 0, 255, 0, 0)
                                                ->mergeString(Storage::get('qr.png'), .2)
                                                ->generate($data->no_inventaris)) !!} ">
                <div class="absolute table-responsive">
                    <table style="font-size: 0.2cm; margin: 0px; padding: 0px; width: {{$lebar-2}}cm; height: {{$lebar-2}}cm;" border="1">
                        <tr>

                            <td colspan="3"><strong>{{ $data->nama_barang }}</strong></td>
                        </tr>
                        <tr>
                            <td>
                                <p>Lokasi</p>
                            </td>
                            <td class="text-center">
                                <p>:</p>
                            </td>
                            <td>
                                <p>
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
                            <td colspan="3" class="text-center" style="font-size: 5px; justify-content: center;">
                                <strong>{{ $data->no_inventaris }}</strong>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-center">
                                <strong>{{ $data->merk }} / {{ $data->type }}</strong>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p>
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
        @endif
    @endforeach

</body>
</html>
