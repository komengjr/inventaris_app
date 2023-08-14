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
        bottom: 15px;
        border: 0px solid #302a2a;
        font-size: 15px;
    }
</style>
</head>

<body style="padding-top: 25px; padding-left: 0px;">
    @php
        $cabang = DB::table('tbl_cabang')->select('nama_cabang','alamat','city')->where('kd_cabang',$datapinjam[0]->kd_cabang)->get();
    @endphp
    <div class="header">
        <div class="absolute-kiri">
            <img style="padding-top: 0px; margin: 2px; left: 2px; ;" src="icon.png" width="152">
            <hr style="padding: 0%; margin: 0%;">
            <p style="font-size: 9px; text-align: center; margin-left: 2px;margin-right: 2px;">{{$cabang[0]->alamat}}</p>
        </div>
        <h5 style="padding-top: 20px; margin: 20px; left: 100px; padding-left: 155px;text-decoration: underline;" >FORM PEMAKAIAN BARANG INVENTARIS</h5>
        {{-- <img style="padding-top: 11px;" src="data:image/png;base64, {!! base64_encode( QrCode::eyeColor(0, 255, 0, 0, 0, 0, 0)->style('round')->eye('circle')->format('svg')->size(107)->errorCorrection('H')->generate(123123),) !!}"> --}}

        <div class="absolute">
            <img style="padding-top: 1px; left: 10px;" src="data:image/png;base64, {!! base64_encode(
                QrCode::eyeColor(0, 0, 111, 115, 255, 114, 232)->style('dot')->eye('circle')->format('svg')->size(101)->errorCorrection('H')->generate($datapinjam[0]->tiket_peminjaman),
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
                    <p style="text-decoration: underline;">FORM PEMAKAIAN BARANG INVENTARIS</p>
                </td>

            </tr>
            <tr>
                <td style="width: 150px;">Tujuan Peminjaman</td>
                <td style="width: 5px;">:</td>
                <td>{{$datapinjam[0]->nama_kegiatan}}</td>
            </tr>
            <tr>
                <td style="width: 150px;">Penanggung Jawab</td>
                <td style="width: 5px;">:</td>
                <td>{{$datapinjam[0]->pj_pinjam}}</td>
            </tr>
            <tr>
                <td>Asal Cabang</td>
                <td style="width: 5px;">:</td>
                <td>

                    {{$cabang[0]->nama_cabang}}
                </td>
            </tr>
            <tr>
                <td>Tujuan Cabang</td>
                <td>:</td>
                <td>
                    @php
                        $cabang1 = DB::table('tbl_cabang')->select('nama_cabang')->where('kd_cabang',$datapinjam[0]->tujuan_cabang)->get();
                    @endphp
                    {{$cabang1[0]->nama_cabang}}
                </td>
            </tr>
        </table>
        <br>
        <table style="font-size: 8px; margin: 0px; padding: 2px; width: 710px; font-size: 11px; font-family: Calibri (Body);" border="1">
           <thead style="font-weight: bold;">
                <tr>
                    <td class="text-center" rowspan="2">No</td>
                    <td class="text-center" colspan="2">Tanggal</td>

                    <td class="text-center" rowspan="2">Nama Barang</td>
                    <td class="text-center" rowspan="2">Detail</td>
                    <td class="text-center" colspan="2">Kondisi Barang</td>

                    <td class="text-center" rowspan="2">Keterangan</td>
                </tr>
                <tr>
                    <td class="text-center">Peminjaman</td>
                    <td class="text-center">Pengembalian</td>
                    <td class="text-center">Keluar</td>
                    <td class="text-center">Kembali</td>

                </tr>
           </thead>
           <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($databrg as $item)

                <tr>
                    <td class="text-center">{{$no++}}</td>
                    <td>{{$item->tgl_pinjam_barang}}</td>
                    <td>{{$item->tgl_kembali_barang}}</td>
                    <td>{{$item->nama_barang}}</td>
                    <td>
                        <table border="0" style="font-size: 9px;">
                            <tr>
                                <td>Merek</td>
                                <td>:</td>
                                <td>{{$item->merk}}</td>
                            </tr>
                            <tr>
                                <td>Type</td>
                                <td>:</td>
                                <td>{{$item->type}}</td>
                            </tr>
                            <tr>
                                <td>Seri</td>
                                <td>:</td>
                                <td>{{$item->no_seri}}</td>
                            </tr>
                        </table>

                    </td>
                    <td>{{ $item->kondisi_pinjam }}</td>
                    <td>{{ $item->kondisi_kembali }}</td>
                    <td class="text-center">
                        @if ($item->status_sub_peminjaman == 0)
                            {{-- <img style="padding-top: 0px; margin: 2px; left: 2px; ;" src="silang.png" width="15"> --}}
                            Barang Keluar
                        @else
                            <img style="padding-top: 0px; margin: 2px; left: 2px; ;" src="ceklist.png" width="15">
                        @endif
                    </td>
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
                <td>Penanggung Jawab ,</td>
                <td>Yang Menyerahkan ,</td>
                <td>Yang Mengetahui ,</td>
            </tr>
            <tr >
                <td class="text-center" style="padding-top: 10px; padding-bottom: 10px; width: 33%;">
                    {{-- <img style="padding-left: 2px; left: 20px;" src=""> --}}
                    <br><br><br><br><br>
                    {{$datapinjam[0]->pj_pinjam}}

                </td>
                <td class="text-center" style="width: 33%;">
                    <br><br><br><br><br>
                     {{$ttd[0]->ttd_1}}

                </td>
                <td class="text-center" style="width: 33%;">
                    <br><br><br><br><br>
                    {{$ttd[0]->ttd_2}}
                </td>
            </tr>

        </table>
    </div>
    </div>


</html>
