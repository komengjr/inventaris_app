<!DOCTYPE html>
<html lang="en">

<head>

    <title>Print Barcode</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/js/bootstrap.min.js" integrity="sha512-8qmis31OQi6hIRgvkht0s6mCOittjMa9GMqtK9hes5iEQBQE/Ca6yGE5FsW36vyipGoWQswBj/QBm2JR086Rkw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<style>
    @page {
        margin-left: 25px;
        margin-top: 5px;
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
        position: relative;
        left: 0px;
        width: 220px;
        height: 107px;
        /* border: 3px solid #000000; */
    }

    div.absolute {
        position: absolute;
        top: 0px;
        right: 0;
        width: 106px;
        height: 101px;
        border: 3px solid #000000;
    }

    table tr td p {

        padding: 0px;
        margin: 0px;
        font-weight: bold;
    }
</style>
</head>

<body style="padding-top: 7px; padding-left: 0px;">

    @foreach ($data as $data)
        @if ($data->kd_lokasi == '-')
        @else
            <div class="relative">
                {{-- <img style="padding-top: 11px;" src="data:image/png;base64, {!! base64_encode( QrCode::eyeColor(0, 255, 0, 0, 0, 0, 0)->style('round')->eye('circle')->format('svg')->size(107)->errorCorrection('H')->generate($data->id_inventaris), ) !!}"> --}}
                <img style="padding-top: 11.5px; width: 107px; height: 107px;" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')
                                                ->backgroundColor(255, 255, 255)
                                                ->size(507)
                                                ->style('round')
                                                ->eye('circle')
                                                // ->eyeColor(0, 255, 0, 0, 255, 0, 0)
                                                // ->mergeString(Storage::get('qr.png'), .3)
                                                ->generate($data->no_inventaris)) !!} ">
                <div class="absolute">
                    <table style="font-size: 8px; margin: 0px; padding: 0px; width: 107px color: #000000; " border="1" cla>
                        <tr>

                            <td colspan="3"><strong style="color: #000000">{{ $data->nama_barang }}</strong></td>
                        </tr>
                        <tr>
                            <td>
                                <p style="color: #000000">Lokasi</p>
                            </td>
                            <td class="text-center">
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
        @endif
    @endforeach

</html>
