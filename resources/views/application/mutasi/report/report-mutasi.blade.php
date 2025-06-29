<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Document Mutasi</title>
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

    #no_surat {
        margin-top: -20px;
    }
</style>
@php
    $no_doc = DB::table('master_doocument_cab')
        ->where('master_document_code', '=', 'MT')
        ->where('kd_cabang', $cabang->kd_cabang)
        ->first();
    $asal = DB::table('tbl_cabang')->select('nama_cabang')->where('kd_cabang', $mutasi->asal_mutasi)->first();
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
            <div id="no_surat">{{ $no }}</div><br>
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
                        <td>Asal Lokasi Barang</td>
                        <td>:</td>
                        <td>{{ $asal->nama_cabang }}</td>
                    </tr>
                    <tr>
                        <td>Lokasi Penempatan</td>
                        <td>:</td>
                        <td>
                            {{ $mutasi->nama_cabang }}
                        </td>
                    </tr>
                    <tr>
                        <td>PJ Asal Cabang</td>
                        <td>:</td>
                        <td>
                            @php
                                $nama = DB::table('tbl_staff')->where('id_staff',$mutasi->penanggung_jawab)->first();
                            @endphp
                            @if ($nama)
                                {{$nama->nama_staff}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>PJ Tujuan Cabang</td>
                        <td>:</td>
                        <td>
                            {{ $mutasi->penerima }}
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Order</td>
                        <td>:</td>
                        <td>
                            {{ $mutasi->tanggal_buat }}
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Terima Barang</td>
                        <td>:</td>
                        <td>
                            {{ $mutasi->tgl_terima }}
                        </td>
                    </tr>
                </table>
            </div>
            <div id="invoice">
                <span>Form Mutasi Barang</span>
                <div class="date" style="color: red; font-size: 12px;">Print date : {{ date('d-m-Y H-i-s') }}</div>

                <span><img src="data:image/png;base64, {!! base64_encode(
                    QrCode::style('round')->format('svg')->size(100)->errorCorrection('H')->generate($mutasi->kd_mutasi),
                ) !!}"></span> <br>
                <span>{{ $mutasi->kd_mutasi }}</span>
            </div>
        </div>
        <h3 style="margin-bottom: 0px;">DATA INVENTARIS {{ $asal->nama_cabang }}</h3>
        <hr>
        <table border="1" cellspacing="0" cellpadding="0">
            <thead style="font-size: 11px;">
                <tr>
                    <th class="no">#</th>
                    <th>NAMA BARANG</th>
                    <th>NO INVENTARIS</th>
                    <th>MERK / TYPE</th>
                    <th>HARGA PEROLEHAN</th>
                    <th>TANGGAL PEMBELIAN</th>
                    <th>STATUS</th>
                </tr>

            </thead>
            <tbody id="invoiceItems" style="font-size: 10px;">
                @php
                    $no = 1;
                    $hasil = 0;
                @endphp
                @foreach ($brg as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->inventaris_data_name }}</td>
                        <td>{{ $item->inventaris_data_number }}</td>
                        <td>{{ $item->inventaris_data_merk }} / {{ $item->inventaris_data_type }}</td>
                        <td style="text-align: right;">
                            @if ($item->inventaris_data_jenis == 0)
                                @currency($item->inventaris_data_harga)
                            @else
                                @php
                                    $cek = DB::table('depresiasi_penyusutan_log')
                                        ->orderBy('id_penyusutan_log', 'DESC')
                                        ->where('inventaris_data_code', $item->inventaris_data_code)
                                        ->first();
                                @endphp
                                @if ($cek)
                                    @currency($cek->penyusutan_log_harga)
                                @else
                                    @currency($item->inventaris_data_harga)
                                @endif
                            @endif
                        </td>
                        <td>{{ $item->inventaris_data_tgl_beli }}</td>
                        <td><strong style="color: rgb(239, 9, 9);">Telah dimutasi</strong></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if (!$brg_new->isEmpty())
            <h3 style="margin-bottom: 0px;">DATA INVENTARIS {{ $mutasi->nama_cabang }}</h3>
            <hr>
            <table border="1" cellspacing="0" cellpadding="0">
                <thead style="font-size: 11px;">
                    <tr>
                        <th class="no">#</th>
                        <th>NAMA BARANG</th>
                        <th>NO INVENTARIS</th>
                        <th>MERK / TYPE</th>
                        <th>HARGA PEROLEHAN</th>
                        <th>TANGGAL PEMBELIAN</th>
                        <th>STATUS</th>
                    </tr>

                </thead>
                <tbody id="invoiceItems" style="font-size: 10px;">
                    @php
                        $no = 1;
                        $hasil = 0;
                    @endphp
                    @foreach ($brg_new as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->inventaris_data_name }}</td>
                            <td>{{ $item->inventaris_data_number }}</td>
                            <td>{{ $item->inventaris_data_merk }} / {{ $item->inventaris_data_type }}</td>
                            <td style="text-align: right;">
                                @if ($item->inventaris_data_jenis == 0)
                                    @currency($item->inventaris_data_harga)
                                @else
                                    @php
                                        $cek = DB::table('depresiasi_penyusutan_log')
                                            ->orderBy('id_penyusutan_log', 'DESC')
                                            ->where('inventaris_data_code', $item->inventaris_data_code)
                                            ->first();
                                    @endphp
                                    @if ($cek)
                                        @currency($cek->penyusutan_log_harga)
                                    @else
                                        @currency($item->inventaris_data_harga)
                                    @endif
                                @endif
                            </td>
                            <td>{{ $item->inventaris_data_tgl_beli }}</td>
                            <td><strong style="color: rgb(9, 239, 93);">Telah dibuat</strong></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        {{-- <div id="thanks">Thank you!</div> --}}
        <div id="notices">
            <img style="padding-top: 1px; left: 10px;" src="data:image/png;base64, {!! base64_encode(
                QrCode::style('round')->format('svg')->size(70)->errorCorrection('H')->generate($mutasi->menyetujui),
            ) !!}">
            @php
                $ttd = DB::table('wa_number_cabang')->where('wa_number_code', $mutasi->menyetujui)->first();
            @endphp
            @if ($ttd)
                <div class="notice">{{ $ttd->wa_number_name }}</div>
            @else
                <div class="notice">{{ $mutasi->menyetujui }}</div>
            @endif
        </div>
    </main>
</body>

</html>
