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
    /* div.header {
        position: relative;
        left: 20px;
        width: 710px;
        height: 106px;
        border: 0.2px solid #000000;
    } */
    body{
        width: 100%;
        height: 500px;
    }
    div.body {
        position: relative;
        left: 20px;
        width: 100%;
        height: 800px;
        /* border: 0px solid #302a2a; */
        font-size: 15px;
    }
    /* div.body-after {

        left: 25px;
        width: 100%;
        height: 30px;
        border: 0px solid #302a2a;
        font-size: 15px;
    } */
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

    /* table {
        border-style: solid;
    } */
    table {
        border-collapse: collapse;
        height: auto;
    }

    table tr td p {
        padding: 0px;
        margin: 0px;
        font-weight: bold;
    }

    div.footer {
        position: absolute;
        left: 20px;
        margin-top: 60px;
        width: 100%;
        bottom: 0px;
        border: 1px solid #302a2a;
        font-size: 15px;
    }
</style>
</head>

<body style="padding-top: 25px; padding-left: 0px;">
    @php
        $cabang = DB::table('tbl_cabang')
            ->select('nama_cabang', 'alamat', 'city')
            ->where('kd_cabang', $dataverif[0]->kd_cabang)
            ->first();
    @endphp

    <div class="body">
        <br>
        <table
            style="font-size: 8px; margin: 0px; padding: 0px; width: 100%; font-size: 11px; font-family: Calibri (Body);"
            border="0">
            <tr>
                <td colspan="3" class="text-right"><strong> </strong></td>
            </tr>
            <tr>
                <td colspan="3">
                    <p style="text-decoration: underline;">FORM STOCK OPNAME INVENTARIS DAN ASET</p>
                </td>

            </tr>
            <tr>
                <td style="width: 150px;">Kode </td>
                <td style="width: 5px;">:</td>
                <td>{{ $dataverif[0]->kode_verif }}</td>
            </tr>
            <tr>
                <td>Kode Ruangan</td>
                <td>:</td>
                <td>{{$lokasi->kd_lokasi}}</td>
            </tr>
            <tr>
                <td>Nama Ruangan</td>
                <td>:</td>
                <td>{{$lokasi->nama_lokasi}}</td>
            </tr>

        </table>
        <br>
        <table style="font-size: 8px; margin: 0px; padding: 0px; width: 100%; font-size: 11px; font-family: Calibri (Body);"
            border="1">
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
                @foreach ($databrg as $databrg)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>{{ $databrg->no_inventaris }}
                        </td>
                        <td>{{ $databrg->nama_barang }}</td>
                        <td>{{ $databrg->merk }} </td>
                        <td>{{ $databrg->type }}</td>
                        <td>{{ $databrg->no_seri }}</td>
                        <td class="text-center">
                            @if ($databrg->status_data_inventaris == 0)
                                Baik
                            @elseif($databrg->status_data_inventaris == 1)
                                Maintenance
                            @elseif($databrg->status_data_inventaris == 2)
                                Rusak
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <hr> --}}
        @if ($data->isEmpty())
            <h5>Data Belum Di Verif : Tidak Ada</h5>
        @else
            <h5>Data Belum Di Verif</h5>
            <table
                style="font-size: 8px; margin: 0px; padding: 0px; width: 710px; font-size: 11px; font-family: Calibri (Body);"
                border="1">
                <thead style="font-weight: bold;">
                    <tr>
                        <td class="text-center">No</td>
                        <td>No Inventaris</td>
                        <td>Nama Barang</td>
                        <td>Merek</td>
                        <td>Type</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $data)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td>{{ $data->no_inventaris }}</td>
                            <td>{{ $data->nama_barang }}</td>
                            <td>{{ $data->merk }}</td>
                            <td>{{ $data->type }}</td>
                            <td>
                                @if ($data->status_barang == 5)
                                    Musnah
                                @elseif ($data->status_barang == 4)
                                    Mutasi
                                @else
                                    Belum Verifikasi
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br><br><br><br>
        @endif

    </div>
    {{-- <div class="body-after">
        <table style="display: none;">
            <tr>
                <td>1</td>
                <td>1</td>
                <td>1</td>
            </tr>

        </table>
    </div> --}}
    <div class="footer">
        <table style="font-size: 8px;  width: 100%; font-size: 11px; font-family: Calibri (Body);" border="1">
            <tr>
                <td colspan="2" style="border-right: 1px solid #ffffff;">Mengetahui :</td>
                <td colspan="1" class="text-right" style="text-align: right;"><strong>{{ $cabang->city }} ,
                        {{ date('Y-m-d H:i:s') }}</strong></td>
            </tr>
            <tr>
                <td class="text-center" style="padding-top: 15px; padding-bottom: 15px; width: 33%;">
                    {{-- <img style="padding-left: 2px; left: 20px;" src=""> --}}
                    <br><br><br>


                    {{-- (..........................) --}}
                </td>
                <td class="text-center" style="width: 33%;">
                    <br><br><br>
                    {{-- Manager SDM & UMUM --}}

                    {{-- (..........................) --}}
                </td>
                <td class="text-center" style="width: 33%;">
                    <br><br><br>
                    {{-- Kepala Cabang ( Yang Bersangkutan ) --}}

                    {{-- (..........................) --}}
                </td>
            </tr>

        </table>
    </div>
</body>
</html>
