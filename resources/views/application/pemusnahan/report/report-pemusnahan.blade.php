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
        ->where('master_document_code', '=', 'DOC00002')
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
            <h2 class="name">{{ $cabang->nama_cabang }}</h2>
            <div>{{ $cabang->alamat }}</div>
            <div>{{ $cabang->phone }}</div>
            <div>{{ $no }}</div>
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
                        <td>No Pemusnahan</td>
                        <td>:</td>
                        <td>{{$data->kd_pemusnahan}}</td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td>{{date("d-m-Y", strtotime($data->tgl_pemusnahan))}}</td>
                    </tr>

                </table>
            </div>
            <div id="invoice">
                <span>Form Pemusnahan Barang</span>
                <div class="date" style="color: red; font-size: 12px;">Print By : {{ Auth::user()->name }}</div>
                {{-- <div class="date">{{ date('d-m-Y') }}</div> --}}
            </div>
        </div>

        <h3>1. Dasar Pengajuan :</h3>
        <p style="padding-left: 17px;">{{ $data->dasar_pengajuan }}</p>
        <h3>2. Identitas Barang</h3>
        <table style="padding-left: 17px; width: 100%;">
            <tr>
                <td">Nama Barang</td>
                    <td>:</td>
                    <td>{{ $data->inventaris_data_name }}</td>
            </tr>
            <tr>
                <td style="margin: 10px;">No. Inventaris</td>
                <td>:</td>
                <td>{{ $data->inventaris_data_code }}</td>
            </tr>
            <tr>
                <td style="margin: 10px;">Merk</td>
                <td>:</td>
                <td>{{ $data->inventaris_data_merk }}</td>
            </tr>
            <tr>
                <td style="margin: 10px;">Type/No.Seri</td>
                <td>:</td>
                <td>{{ $data->inventaris_data_type }} / {{ $data->inventaris_data_merk }}</td>
            </tr>
            <tr>
                <td style="margin: 10px;">Tanggal Pembelian</td>
                <td>:</td>
                <td>{{ $data->inventaris_data_tgl_beli }}</td>
            </tr>
            <tr>
                <td style="margin: 10px;">Harga Barang</td>
                <td>:</td>
                <td>@currency($data->inventaris_data_harga)</td>
            </tr>
        </table>
        <h3>3. Verifikasi</h3>
        <p style="padding-left: 17px;">{{ $data->verifikasi }}</p>
        <h3>4. Persetujuan</h3>
        <p style="padding-left: 17px;">{{ $data->persetujuan }}</p>
        <h3>5. Eksekusi</h3>
        <p style="padding-left: 17px;">{{ $data->eksekusi }}</p>
        <h3>6. Penanggung Jawab</h3>
        <p style="padding-left: 17px;">
            @php
                $nama = DB::table('wa_number_cabang')->where('id_wa_number',$data->pj_pemusnahan)->first();
            @endphp
            @if ($nama)
             {{$nama->wa_number_name}}
            @else

            @endif
        </p>

        {{-- <div id="thanks">Thank you!</div> --}}
        <div id="notices">
            <img style="padding-top: 1px; left: 10px;" src="data:image/png;base64, {!! base64_encode(
                QrCode::style('round')->format('svg')->size(70)->errorCorrection('H')->generate($data->kd_pemusnahan),
            ) !!}">
            {{-- <div>NOTICE:</div> --}}
            <div class="notice">Dokumen Ini Sah tanpa Tanda Tangan.</div>
        </div>
    </main>
</body>

</html>
