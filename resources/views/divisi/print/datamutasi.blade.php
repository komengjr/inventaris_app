<!DOCTYPE html>
<html lang="en">

<head>

    <title>Cetak</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
        $cabang = DB::table('tbl_cabang')->select('nama_cabang','alamat','city')->where('kd_cabang',$datamutasi->kd_cabang)->get();
    @endphp
    <div class="header">
        <div class="absolute-kiri">
            <img style="padding-top: 0px; margin: 2px; left: 2px; ;" src="icon.png" width="152">
            <hr style="padding: 0%; margin: 0%;">
            <p style="font-size: 9px; text-align: center; margin-left: 2px;margin-right: 2px;">{{$cabang[0]->alamat}}</p>
        </div>
        <h5 style="padding-top: 20px; margin: 20px; left: 100px; padding-left: 155px;text-decoration: underline;" >FORM MUTASI BARANG INVENTARIS</h5>
        {{-- <img style="padding-top: 11px;" src="data:image/png;base64, {!! base64_encode( QrCode::eyeColor(0, 255, 0, 0, 0, 0, 0)->style('round')->eye('circle')->format('svg')->size(107)->errorCorrection('H')->generate(123123),) !!}"> --}}

        <div class="absolute">
            <img style="padding-top: 1px; left: 10px;" src="data:image/png;base64, {!! base64_encode(
                QrCode::style('round')->eye('circle')->format('svg')->size(101)->errorCorrection('H')->generate($datamutasi->kd_mutasi),
            ) !!}">
        </div>
    </div>
    <div class="body">
        <br>
        <table style="font-size: 8px; margin: 0px; padding: 0px; width: 710px; font-size: 11px; font-family: Calibri (Body);" border="0">
            <tr>
                <td colspan="3" class="text-right"><strong>SDM.33-FRM-PP-07.2/02 </strong></td>
            </tr>
            <tr>
                <td colspan="3">
                    <p style="text-decoration: underline;">FORM MUTASI BARANG INVENTARIS</p>
                </td>

            </tr>
            {{-- <tr>
                <td style="width: 150px;">Jenis Mutasi</td>
                <td style="width: 5px;">:</td>
                <td></td>
            </tr> --}}
            <tr>
                <td>Asal Lokasi Barang</td>
                <td style="width: 5px;">:</td>
                <td>

                    {{$cabang[0]->nama_cabang}}
                </td>
            </tr>
            <tr>
                <td>Lokasi Penempatan</td>
                <td>:</td>
                <td>
                    @php
                        $cabangpenempata = DB::table('tbl_cabang')->where('kd_cabang',$datamutasi->target_mutasi)->first();
                    @endphp
                    @if ($cabangpenempata)
                        {{$cabangpenempata->nama_cabang}}
                    @endif
                    {{-- ( {{$datamutasi->target_mutasi}} ) --}}
                </td>
            </tr>

            <tr>
                <td style="width: 150px;">Penanggung Jawab</td>
                <td style="width: 5px;">:</td>
                <td>{{$datamutasi->penanggung_jawab}}</td>
            </tr>
            <tr>
                <td>Tanggal Order</td>
                <td>:</td>
                <td>
                    {{$datamutasi->tanggal_buat}}
                </td>
            </tr>
            <tr>
                <td>Tanggal di terima</td>
                <td>:</td>
                <td>
                    {{$datamutasi->tgl_terima}}
                </td>
            </tr>

        </table>
        <br>
        <table style="font-size: 8px; margin: 0px; padding: 0px; width: 710px; font-size: 11px; font-family: Calibri (Body);" border="1">
           <thead style="font-weight: bold;">
                <tr>
                    <td class="text-center">No</td>
                    <td>Nama Barang</td>
                    <td>No Inventaris</td>
                    <td>Mrek / Type / No Seri</td>
                    <td>Harga</td>
                    <td>Tahun</td>
                    <td class="text-center">Nilai Buku</td>
                </tr>
           </thead>
           <tbody>
            @php
                $no = 1;
                // $databarang = DB::table('tbl_sub_mutasi')->where('kd_mutasi',$datamutasi->kd_mutasi)->get();
            @endphp
                @foreach ($databrg as $databrg)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$databrg->nama_barang}}</td>
                        <td>{{$databrg->no_inventaris}}</td>
                        <td>{{$databrg->merk}}</td>
                        <td>{{$databrg->harga_perolehan}}</td>
                        <td>{{$databrg->th_perolehan}}</td>
                        <td>123</td>
                    </tr>
                @endforeach
           </tbody>
        </table>
        <br><br><br>

    <div class="footer">
        <table
            style="font-size: 8px; margin: 0px; padding: 0px; width: 710px; font-size: 11px; font-family: Calibri (Body);"
            border="1">
            <tr>

                <td colspan="3" class="text-right"><strong>{{$cabang[0]->city}} , {{date('d - m - Y ')}}</strong></td>
            </tr>
            <tr>
                <td>Penerima ,</td>
                <td>Yang Menyerahkan ,</td>
                <td>Menyetujui ,</td>
            </tr>
            <tr >
                <td class="text-center" style="padding-top: 15px; padding-bottom: 15px; width: 33%;">
                    {{-- <img style="padding-left: 2px; left: 20px;" src=""> --}}
                    <br><br><br><br><br>
                    {{$datamutasi->penerima}}

                </td>
                <td class="text-center" style="width: 33%;">
                    <br><br><br><br><br>
                    {{$datamutasi->yang_menyerahkan}}

                </td>
                <td class="text-center" style="width: 33%;">
                    <br><br><br><br><br>
                    {{$datamutasi->menyetujui}}
                </td>
            </tr>

        </table>
    </div>
    </div>


</html>
