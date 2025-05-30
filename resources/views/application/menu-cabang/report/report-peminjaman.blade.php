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
        ->where('master_document_code', '=', 'DOC00920')
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
                        <td>Tujuan Peminjaman</td>
                        <td>:</td>
                        <td>{{ $peminjaman->nama_kegiatan }}</td>
                    </tr>
                    <tr>
                        <td>Penanggung Jawab</td>
                        <td>:</td>
                        <td>
                            @php
                                $staff = DB::table('tbl_staff')->where('nip', $peminjaman->pj_pinjam)->first();
                            @endphp
                            @if ($staff)
                                {{ $staff->nama_staff }}
                            @else
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Asal Cabang</td>
                        <td>:</td>
                        <td>
                            @php
                                $cabang = DB::table('tbl_cabang')->where('kd_cabang', $peminjaman->kd_cabang)->first();
                            @endphp
                            {{ $cabang->nama_cabang }}
                        </td>
                    </tr>
                    <tr>
                        <td>Tujuan Cabang</td>
                        <td>:</td>
                        <td>
                            @php
                                $cabang = DB::table('tbl_cabang')
                                    ->where('kd_cabang', $peminjaman->tujuan_cabang)
                                    ->first();
                            @endphp
                            {{ $cabang->nama_cabang }}
                        </td>
                    </tr>
                </table>
            </div>
            <div id="invoice">
                <span>Form Peminjaman Barang</span>
                <div class="date" style="color: red; font-size: 12px;">Print By : {{ Auth::user()->name }}</div>
                {{-- <div class="date">{{ date('d-m-Y') }}</div> --}}
            </div>
        </div>
        <table border="1" cellspacing="0" cellpadding="0">
            <thead style="font-size: 11px;">
                <tr>
                    <th class="no" rowspan="2">#</th>
                    <th class="qty" colspan="2">TANGGAL</th>
                    <th rowspan="2">NAMA BARANG</th>
                    <th rowspan="2">DETAIL</th>
                    <th colspan="2">KONDISI BARANG</th>
                    <th rowspan="2">KETERANGAN</th>
                </tr>
                <tr>
                    <th>PEMINJAMAN</th>
                    <th>PENGEMBALIAN</th>
                    <th>KELUAR</th>
                    <th>KEMBALI</th>
                </tr>
            </thead>
            <tbody id="invoiceItems" style="font-size: 10px;">
                @php
                    $no = 1;
                    $hasil = 0;
                @endphp
                @foreach ($data as $datas)
                    <tr>
                        <td class="no">{{ $no++ }}</td>
                        <td class="desc">{{ $datas->tgl_pinjam_barang }}</td>
                        <td class="desc">{{ $datas->tgl_kembali_barang }}</td>
                        <td class="desc">{{ $datas->inventaris_data_name }}</td>
                        <td class="desc">{{ $datas->inventaris_data_merk }}</td>
                        <td class="desc">{{ $datas->kondisi_pinjam }}</td>
                        <td class="desc">{{ $datas->kondisi_kembali }}</td>
                        <td>
                            @if ($datas->status_sub_peminjaman == 0)
                                <strong style="color: red;">Belum diverifikasi</strong>
                            @else
                                <strong style="color: rgb(2, 63, 3);">Sudah diverifikasi</strong>
                            @endif
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{-- <div id="thanks">Thank you!</div> --}}
        <div id="notices">
            <img style="padding-top: 1px; left: 10px;" src="data:image/png;base64, {!! base64_encode(
                QrCode::style('round')->eye('circle')->format('svg')->size(70)->errorCorrection('H')->generate($peminjaman->tiket_peminjaman),
            ) !!}">
            <div class="notice">Dokumen Ini Sah tanpa Tanda Tangan.</div>
        </div>
    </main>
</body>

</html>
