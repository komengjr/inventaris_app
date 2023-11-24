<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cetak</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
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
        border-style: solid;
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
    @php
        $cabang = DB::table('tbl_cabang')->select('nama_cabang','alamat')->where('kd_cabang',$dataverif[0]->kd_cabang)->get();
    @endphp
    <div class="header">
        <div class="absolute-kiri">
            <img style="padding-top: 0px; margin: 2px; left: 2px; ;" src="data:image/png;base64, {{$image}}" width="152">
            <hr style="padding: 0%; margin: 0%;">
            <p style="font-size: 9px; text-align: center; margin-left: 2px;margin-right: 2px;">{{$cabang[0]->alamat}}</p>
        </div>
        <h5 style="padding-top: 20px; margin: 20px; left: 100px; padding-left: 155px;text-decoration: underline;" >STOCK OPNAME BARANG INVENTARIS</h5>
        {{-- <img style="padding-top: 11px;" src="data:image/png;base64, {!! base64_encode( QrCode::eyeColor(0, 255, 0, 0, 0, 0, 0)->style('round')->eye('circle')->format('svg')->size(107)->errorCorrection('H')->generate(123123),) !!}"> --}}

        <div class="absolute">
            <img style="padding-top: 1px; left: 10px;" src="data:image/png;base64, {!! base64_encode(
                QrCode::eyeColor(0, 0, 111, 115, 255, 114, 232)->style('dot')->eye('circle')->format('svg')->size(101)->errorCorrection('H')->generate(123123),
            ) !!}">
        </div>
    </div>
    <div class="body">
        <br>
        <table style="font-size: 8px; margin: 0px; padding: 0px; width: 710px; font-size: 11px; font-family: Calibri (Body);" border="0">
            <tr>
                <td colspan="3" class="text-right"><strong>SDM/323/P-33/123 </strong></td>
            </tr>
            <tr>
                <td colspan="3">
                    <p style="text-decoration: underline;">FORM STOCK OPNAME INVENTARIS DAN ASET</p>
                </td>

            </tr>
            <tr>
                <td style="width: 150px;">Kode </td>
                <td style="width: 5px;">:</td>
                <td>{{$dataverif[0]->kode_verif}}</td>
            </tr>

        </table>
        <br>
        <table style="font-size: 8px; margin: 0px; padding: 0px; width: 710px; font-size: 11px; font-family: Calibri (Body);" border="1">
           <thead style="font-weight: bold;">
                <tr>
                    <td class="text-center">No</td>
                    <td>No Inventaris</td>
                    <td>Nama Barang</td>
                    <td>Merek</td>
                    <td>Type</td>
                    <td>No Seri</td>
                    <td>Keterangan</td>
                </tr>
           </thead>
           <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($databrg as $item)

                <tr>
                    <td class="text-center">{{$no++}}</td>
                    <td>{{$item->id}}/{{$item->kd_inventaris}}/{{$item->kd_cabang}}/{{$item->th_perolehan}}</td>
                    <td>{{$item->nama_barang}}</td>
                    <td>{{$item->merk}} </td>
                    <td>{{$item->type}}</td>
                    <td>{{$item->no_seri}}</td>
                    <td class="text-center">
                        @if ($item->status_data_inventaris == 0)
                            Baik
                        @elseif($item->status_data_inventaris == 1)
                            Maintenance
                        @elseif($item->status_data_inventaris == 2)
                            Rusak
                        @endif
                    </td>
                </tr>

            @endforeach
           </tbody>
        </table>
        <hr>
        <h3>Data Belum Di Verif</h3>
        <table style="font-size: 8px; margin: 0px; padding: 0px; width: 710px; font-size: 11px; font-family: Calibri (Body);" border="1">
            <thead style="font-weight: bold;">
                 <tr>
                     <td class="text-center">No</td>
                     <td>No Inventaris</td>
                     <td>Nama Barang</td>
                     <td>Merek</td>
                     <td>Type</td>
                     <td>No Seri</td>
                     {{-- <td>Keterangan</td> --}}
                 </tr>
            </thead>
            <tbody>
             @php
                 $no = 1;
             @endphp
             @foreach ($data as $data)
                @php
                    $cekdata = DB::table('tbl_sub_verifdatainventaris')
                    ->where('id_inventaris',$data->id_inventaris)->where('kode_verif',$dataverif[0]->kode_verif)->first();
                @endphp
                @if ($cekdata)

                @else
                <tr>
                    <td class="text-center">{{$no++}}</td>
                    <td>{{$data->no_inventaris}}</td>
                    <td>{{$data->nama_barang}}</td>
                    <td>{{$data->merk}} </td>
                    <td>{{$data->no_seri}}</td>
                    <td class="text-center">

                    </td>
                </tr>
                @endif

             @endforeach
            </tbody>
         </table>
    <div class="footer">
        <table
            style="font-size: 8px; margin: 0px; padding: 0px; width: 710px; font-size: 11px; font-family: Calibri (Body);"
            border="1">
            <tr>
                <td colspan="2" style="border-right: 1px solid #ffffff;">Mengetahui :</td>
                <td colspan="1" class="text-right"><strong>Pontianak , {{date('Y-m-d H:i:s')}}</strong></td>
            </tr>
            <tr >
                <td class="text-center" style="padding-top: 15px; padding-bottom: 15px; width: 33%;">
                    {{-- <img style="padding-left: 2px; left: 20px;" src=""> --}}
                    <br><br><br><br><br>
                    -
                    <br>
                    {{-- (..........................) --}}
                </td>
                <td class="text-center" style="width: 33%;">
                    <br><br><br><br><br>
                     {{-- Manager SDM & UMUM --}}
                     <br>
                     {{-- (..........................) --}}
                </td>
                <td class="text-center" style="width: 33%;">
                    <br><br><br><br><br>
                     {{-- Kepala Cabang ( Yang Bersangkutan ) --}}
                     <br>
                     {{-- (..........................) --}}
                </td>
            </tr>

        </table>
    </div>
    </div>


</html>
