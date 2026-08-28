<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Rekapitulasi Inventaris</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 9pt;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }

        .header h2 {
            margin: 0;
            text-transform: uppercase;
        }

        .header p {
            margin: 3px 0 0;
            font-size: 8pt;
            color: #666;
        }

        .meta-info {
            margin-bottom: 12px;
            width: 100%;
        }

        .table-data {
            width: 100%;
            border-collapse: collapse;
        }

        .table-data th,
        .table-data td {
            border: 1px solid #777;
            padding: 5px 6px;
            vertical-align: middle;
        }

        .table-data th {
            background-color: #f2f2f2;
            text-align: center;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 8pt;
        }

        .text-center {
            text-align: center;
        }

        .text-end {
            text-align: right;
        }
    </style>
</head>

<body>

    <div class="header">
        <h2>Laporan Rekapitulasi Data Inventaris</h2>
        <p>Sistem Manajemen Inventaris - Cabang {{ $cabang }}</p>
    </div>

    <table class="meta-info">
        <tr>
            <td><strong>Cabang:</strong> {{ $cabang }}</td>
            <td style="text-align: right;"><strong>Tanggal Cetak:</strong> {{ $tgl_cetak }}</td>
        </tr>
    </table>

    <table class="table-data">
        <thead>
            <tr>
                <th width="3%">NO</th>
                <th width="11%">KODE</th>
                <th width="18%">NAMA BARANG</th>
                <th width="8%">JENIS</th>
                <th width="12%">MERK / TYPE</th>
                <th width="10%">NO. SERI</th>
                <th width="12%">LOKASI</th>
                <th width="10%">SUPLIER</th>
                <th width="9%">HARGA</th>
                <th width="7%">KONDISI</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($inventaris as $index => $row)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td class="text-center">{{ $row->inventaris_data_code ?? '-' }}</td>
                <td>{{ $row->inventaris_data_name ?? '-' }}</td>
                <td class="text-center">
                    {{ $row->inventaris_data_jenis == 1 ? 'Aset' : 'Non Aset' }}
                </td>
                <td>{{ trim(($row->inventaris_data_merk ?? '') . ' ' . ($row->inventaris_data_type ?? '')) ?: '-' }}</td>
                <td>{{ $row->inventaris_data_no_seri ?? '-' }}</td>
                <td>{{ $row->inventaris_data_location ?? '-' }}</td>
                <td>{{ $row->inventaris_data_suplier ?? '-' }}</td>
                <td class="text-end">Rp {{ number_format($row->inventaris_data_harga ?? 0, 0, ',', '.') }}</td>
                <td class="text-center">{{ ucfirst($row->inventaris_data_kondisi ?? '-') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="10" class="text-center" style="padding: 15px;">Tidak ada data inventaris yang ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>
