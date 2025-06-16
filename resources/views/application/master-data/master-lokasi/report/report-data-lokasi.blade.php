<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DOcument Peminjaman</title>
    <link rel="stylesheet" href="style.css" media="all" />
</head>
<style>
    @font-face {
        font-family: SourceSansPro;
        src: url(SourceSansPro-Regular.ttf);
    }

    .clearfix:after {
        content: "";
        display: table;
        clear: both;
    }

    a {
        color: #0087C3;
        text-decoration: none;
    }

    body {
        position: relative;
        width: 100%;
        height: 100%;
        margin: 0 auto;
        color: #555555;
        background: #FFFFFF;
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-family: SourceSansPro;
    }

    header {
        padding: 10px 0;
        margin-bottom: 20px;
        border-bottom: 1px solid #0b0909;
    }

    #logo {
        float: left;
        margin-top: 8px;
    }

    #logo img {
        height: 70px;
    }

    #company {
        float: right;
        text-align: right;
    }


    #details {
        padding: 10px;
        border: 2px solid #0b0909;
        border-style: solid solid dashed double;
    }

    #client {
        padding-left: 6px;
        border-left: 6px solid #db3311;
        float: left;
    }

    #client .to {
        color: #777777;
    }

    h2.name {
        font-size: 1.4em;
        font-weight: normal;
        margin: 0;
    }

    #invoice {
        padding-top: 0;
        float: right;
        text-align: right;
    }

    #invoice span {
        font-size: 1.2rem;
    }

    #invoice h1 {
        color: #db3311;
        font-size: 2.4em;
        /* line-height: 1em; */
        font-weight: normal;
        margin: 0 0 10px 0;
    }

    #invoice .date {
        font-size: 1.1em;
        color: #777777;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        /* margin-bottom: 20px; */
    }

    table th,
    table td {
        padding: 5px;
        /* background: #EEEEEE; */
        text-align: center;
        /* border-bottom: 1px solid #000000; */
    }

    table th {
        white-space: nowrap;
        font-weight: normal;
        background: #373332;
        color: white;
    }

    table td {
        text-align: left;
    }

    table td h3 {
        color: #db3311;
        font-size: 1.2em;
        font-weight: normal;
        margin: 0 0 0.2em 0;
    }

    table .no {
        color: #FFFFFF;
        font-size: 1.6em;
        text-align: center;
        background: #db3311;
    }

    table .desc {
        text-align: left;
    }

    table .unit {
        background: #DDDDDD;
    }

    table .qty {
        text-align: center;
    }

    table .total {
        background: #eaebe3;
        color: #ff0404;
    }

    table td.unit,
    table td.qty,
    table td.total {
        font-size: 1.2em;
    }

    /* table tbody tr:last-child td {
        border: none;
    } */

    table tfoot td {
        padding: 10px 20px;
        background: #FFFFFF;
        /* border-bottom: none; */
        font-size: 1.2em;
        white-space: nowrap;
        /* border-top: 1px solid #AAAAAA; */
    }

    /* table tfoot tr:first-child td {
        border-top: none;
    } */

    table tfoot tr:last-child td {
        color: #db3311;
        font-size: 1.4em;
        border-top: 1px solid #db3311;

    }

    /* table tfoot tr td:first-child {
        border: none;
    } */

    #thanks {
        font-size: 2em;
        margin-bottom: 50px;
    }

    #notices {
        position: absolute;
        bottom: 0;
        padding-left: 6px;
        border-left: 6px solid #db3311;
    }

    #notices .notice {
        font-size: 1.2em;
    }

    footer {
        color: #777777;
        width: 100%;
        height: 30px;
        position: absolute;
        bottom: 0;
        border-top: 1px solid #AAAAAA;
        padding: 8px 0;
        text-align: center;
    }
</style>
@php
    $no_doc = DB::table('master_doocument_cab')
        ->where('master_document_code', '=', 'RPTLKS')
        ->where('kd_cabang', Auth::user()->cabang)
        ->first();
@endphp
@if ($no_doc)
    @php
        $no = $no_doc->master_document_no;
    @endphp
@else
    @php
        $no = 'Nomor Dokumen Belum Di isi';
    @endphp
@endif

<body>
    <header class="clearfix">
        <div id="logo">
            <img src="data:image/png;base64, {{ $image }}">
        </div>
        <div id="company">
            <div style="margin-top: -20px;">{{ $no }}</div>
            <br>
            <h2 class="name">{{ $cabang->nama_cabang }}</h2>
            <div>{{ $cabang->alamat }}</div>
            <div>{{ $cabang->phone }}</div>

        </div>
        </div>
    </header>
    <main>
        <div id="details" class="clearfix">
            <div id="client">
                <table style="margin: 0px; padding: 0px;">
                    <tr>
                        <td>Ruangan</td>
                        <td>:</td>
                        <td>{{ $ruangan->master_lokasi_name }}</td>
                    </tr>
                    <tr>
                        <td>No Ruangan</td>
                        <td>:</td>
                        <td>{{ $ruangan->nomor_ruangan }}</td>
                    </tr>
                </table>
            </div>
            <div id="invoice">
                <span><strong>DAFTAR BARANG INVENTARIS FISIK AKTIVA TETAP</strong></span>
                <div class="date" style="color: red; font-size: 12px;">Print By : {{ Auth::user()->name }}</div>
                {{-- <div class="date">{{ date('d-m-Y') }}</div> --}}
            </div>
        </div>
        <br>
        <table border="1" cellspacing="0" cellpadding="0">
            <thead style="font-size: 11px;">
                <tr>
                    <th class="no" style="width: 2%;" rowspan="2">No</th>
                    <th style="width: 4%;" rowspan="2">Th Beli</th>
                    <th rowspan="2">Nomor Inventaris</th>
                    <th>Nama Barang</th>
                    <th colspan="2">Spesifikasi Teknik</th>
                    <th colspan="12">Kondisi / Keterangan Setiap Bulan</th>
                </tr>
                <tr>
                    <th>Sarana Fisik</th>
                    <th>Merek</th>
                    <th>Keterangan</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                    <th>9</th>
                    <th>10</th>
                    <th>11</th>
                    <th>12</th>
                </tr>

            </thead>
            <tbody id="invoiceItems" style="font-size: 10px;">
                @php
                    $no = 1;
                    $hasil = 0;
                @endphp
                @foreach ($data as $datas)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td class="desc">{{ date('Y', strtotime($datas->inventaris_data_tgl_beli)) }}</td>
                        <td class="desc">{{ $datas->inventaris_data_number }}</td>
                        <td class="desc">{{ $datas->inventaris_data_name }}</td>
                        <td class="desc">{{ $datas->inventaris_data_merk }}</td>
                        <td class="desc">{{ $datas->inventaris_data_type }}</td>
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
        <br> <br>
        <div class="footer" style="padding-bottom: 25%;">
            <table style="font-size: 8px; margin: 0px;  width: 100%; font-size: 11px; font-family: Calibri (Body);"
                border="1">
                <tr>
                    <td colspan="2" style="text-align: center; width: 70%;">PENANGGUNG JAWAB RUANGAN</td>
                    <td colspan="1" class="text-right" style="text-align: right; width: 30%;">
                        <strong>{{ $cabang->nama_cabang }} , ......................................</strong>
                    </td>
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
        {{-- <div id="thanks">Thank you!</div> --}}
        <div id="notices">
            <img style="padding-top: 1px; left: 10px;" src="data:image/png;base64, {!! base64_encode(QrCode::style('round')->format('svg')->size(60)->errorCorrection('H')->generate($ruangan->id_nomor_ruangan_cbaang.'-'.$ruangan->nomor_ruangan)) !!}">
            {{-- <div>NOTICE:</div> --}}
            <div class="notice">Dokumen Ini diterbitkan Secara Digital.</div>
        </div>
    </main>
</body>

</html>
