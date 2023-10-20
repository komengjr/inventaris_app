<!DOCTYPE html>
<html lang="en">

<head>

    <title>Print Barcode</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" /> --}}
    {{-- <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> --}}
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
        border: 3px solid #73AD21;
    }

    div.absolute {
        position: absolute;
        top: 0px;
        right: 0;
        width: 106px;
        height: 101px;
        border: 3px solid #f90505;
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
                                                ->eyeColor(0, 255, 0, 0, 255, 0, 0)
                                                ->mergeString(Storage::get('qr.png'), .3)
                                                ->generate($data->no_inventaris)) !!} ">
                <div class="absolute">
                    <table style="font-size: 8px; margin: 0px; padding: 0px; width: 107px;" border="1" cla>
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
                            <td colspan="3" class="text-center" style="font-size: 7px">
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
    {{-- <body> --}}


    {{-- <div class="container text-center">
    @foreach ($data as $data)

    @if ($data->kd_lokasi == '-')

    @else

      <div class="row" style="border: dotted;width: 105px; height: 50px;">
        <div class="col">
          <img src="data:image/png;base64, {!! base64_encode(QrCode::format('svg')->size(75)->errorCorrection('H')->generate($data->id_inventaris)) !!}">
        </div>
        <div class="col">
          <strong>{{$data->nama_barang}}</strong>
        </div>
      </div>
    @endif

    @endforeach

  </div> --}}
    {{-- </body> --}}

</html>
