<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Document Stockopname</title>
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
        margin-bottom: 10px;
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
        ->where('master_document_code', '=', 'MC')
        ->where('kd_cabang', $cabang->kd_cabang)
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
            <div style="margin-top: -20px;">{{ $no }}</div><br>
            <h2 class="name">{{ $cabang->nama_cabang }}</h2>
            <div>{{ $cabang->alamat }}</div>
            <div>{{ $cabang->phone }}</div>
        </div>
        </div>
    </header>
    <main>
        <div id="details" class="clearfix">
            <div id="client">
                {{-- <h2 class="name">
                </h2>
                <div class="address"></div> --}}

                <table style="margin: 0px; padding: 0px;">
                    <tr>
                        <td>Kode Stockopname</td>
                        <td>:</td>
                        <td>123</td>
                    </tr>
                    <tr>
                        <td>Tanggal Mulai</td>
                        <td>:</td>
                        <td>
                            123
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Selesai</td>
                        <td>:</td>
                        <td>
                            123
                        </td>
                    </tr>

                </table>
            </div>
            <div id="invoice">
                <span>Form Maintenance Barang Inventaris</span>
                <div class="date" style="color: red; font-size: 12px;">Print By : {{ Auth::user()->name }}</div>
                {{-- <div class="date">{{ date('d-m-Y') }}</div> --}}
            </div>
        </div>
        <br>
        <table style="width: 100%;" border="1">
            <tr>
                <td style="text-align: center;"><strong>PENGAJUAN</strong></td>
            </tr>
            <tr>
                <td style="margin: 5px; padding: 10px;">
                    <div><strong>1. Dasar Pengajuan :</strong></div>
                    <p style="padding-left: 17px;">123</p>
                </td>
            </tr>
            <tr>
                <td style="margin: 5px; padding: 10px; padding-bottom: 40px;">
                    <div><strong>2. Identitas Barang :</strong></div>

                    <table style="padding-left: 17px; width: 100%;" border="0">
                        <tr>
                            <td>Nama Barang </td>
                            <td>:</td>
                            <td>123</td>
                        </tr>
                        <tr>
                            <td style="margin: 10px;">No. Inventaris</td>
                            <td>:</td>
                            <td>123</td>
                        </tr>
                        <tr>
                            <td style="margin: 10px;">Merk</td>
                            <td>:</td>
                            <td>123</td>
                        </tr>
                        <tr>
                            <td style="margin: 10px;">Type/No.Seri</td>
                            <td>:</td>
                            <td>123</td>
                        </tr>
                        <tr>
                            <td style="margin: 10px;">Tanggal Pembelian</td>
                            <td>:</td>
                            <td>123</td>
                        </tr>
                        <tr>
                            <td style="margin: 10px;">Harga Barang</td>
                            <td>:</td>
                            <td>@currency(123123123)</td>
                        </tr>
                    </table>
                    <p style="float: right; text-align: right;margin-top: -20px;">
                        <strong style="">Pengagags</strong><br>
                        {{-- <img style="margin-top: 2%;"
                            src="data:image/png;base64, {!! base64_encode(
                                QrCode::style('round')->format('svg')->size(50)->errorCorrection('H')->generate($data->penggagas),
                            ) !!}"> --}}
                        <br>123
                    </p>
                </td>
            </tr>
            <tr>

                <td style="margin: 5px; padding: 10px; padding-bottom: 40px;">
                    <div><strong>3. Verifikasi</strong></div>
                    <p style="padding-left: 17px;">123</p>
                    <p style="float: right; text-align: right; margin-top: -50px;">
                        <strong style="">Wk Mng SDM & Umum</strong><br>
                       123
                    </p>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;"><strong>PERSETUJUAN</strong></td>
            </tr>
            <tr>

                <td style="margin: 5px; padding: 10px; padding-bottom: 40px;">
                    <div><strong>4. Persetujuan</strong></div>
                    <p style="padding-left: 17px;">123</p>
                    <p style="float: right; text-align: right; margin-top: -50px;">
                        <strong style="">Kepala Cabang</strong><br>
                        123
                    </p>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;"><strong>EKSEKUSI</strong></td>
            </tr>
            <tr>

                <td style="margin: 5px; padding: 10px; padding-bottom: 10px;">
                    <div>5. Telah dilakukan 123 Pada Tanggal
                        {{ date('d-m-Y') }}</div>
                    <p style="padding-left: 17px;">-</p>
                    <p style="float: right; text-align: right; margin-top: -50px;">
                        <strong style="">Ekseskusi</strong><br><br>
                        123
                    </p>
                </td>
            </tr>
        </table>
        {{-- <div id="thanks">Thank you!</div> --}}
        <div id="notices">
            <img style="padding-top: 1px; left: 10px;" src="data:image/png;base64, {!! base64_encode(
                QrCode::style('round')->eye('circle')->format('svg')->size(70)->errorCorrection('H')->generate(123),
            ) !!}">
            <div class="notice">Dokumen Ini terbit secara digital.</div>
        </div>
    </main>
</body>

</html>
