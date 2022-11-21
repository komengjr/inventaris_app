<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Mutasi {{$datamutasi[0]->kd_mutasi}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> --}}
   
    {{-- <link href="{{ url('assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css', []) }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css', []) }}" rel="stylesheet" type="text/css">  --}}
    <style>
  
        .styled-table {
            border-collapse: collapse;
            margin: 0px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            color: black;
            min-width: 100%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
        .styled-table thead tr {
            background-color: #ff8c00;
            color: #ffffff;
            text-align: left;
        }
        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }
        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }
    
        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }
    
        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }
    </style>
    
</head>
<body>
    <div class="continer">
        <div class="card">
            <div class="row">
                <div class="col-4"><img src="logo.png" alt="" width="250"></div>
                <div class="col-8">
                    
                </div>
            </div>
            
        </div>
        <hr>
        <table class="styled-table" style="width: 100%">
            <thead>
                <tr>
                    <td colspan="3">
                        <strong>FORMULIR MUTASI BARANG INVENTARIS</strong><br>
                        <p>Kode Mutasi : {{$datamutasi[0]->kd_mutasi}}</p>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="width: 200px">Jenis Mutasi</td>
                    <td style="width: 10px">:</td>
                    <td>
                        @if ($datamutasi[0]->jenis_mutasi == 1)
                        <strong>Penempatan</strong>
                        @elseif($datamutasi[0]->jenis_mutasi == 2)
                        <strong>Penarikan</strong>
                        @elseif($datamutasi[0]->jenis_mutasi == 3)
                        <strong>Mutasi Antar Bagian</strong>
                        @elseif($datamutasi[0]->jenis_mutasi == 4)
                        <strong>Mutasi Antar Cabang</strong>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Asal Lokasi Cabang</td>
                    <td>:</td>
                    <td>{{$datamutasi[0]->asal_mutasi}}</td>
                </tr>
                <tr>
                    <td>Lokasi Penempatan Cabang</td>
                    <td>:</td>
                    <td>{{$datamutasi[0]->target_mutasi}}</td>
                </tr>
                <tr>
                    <td>Departement</td>
                    <td>:</td>
                    <td>{{$datamutasi[0]->departemen}}</td>
                </tr>
                <tr>
                    <td>Divisi</td>
                    <td>:</td>
                    <td>{{$datamutasi[0]->divisi}}</td>
                </tr>
                <tr>
                    <td>Penanggung Jawab</td>
                    <td>:</td>
                    <td>{{$datamutasi[0]->penanggung_jawab}}</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td>{{$datamutasi[0]->tanggal_buat}}</td>
                </tr>
            </tbody>
        </table>
        <hr>
        <table class="styled-table">
            <thead>
                <tr>
                    <td>Nama barang</td>
                    <td>No Inventaris</td>
                    <td>Spesifikasi</td>
                    <td>Perolehan</td>
                    <td>Detail Tujuan</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($databrg as $item)
                <?php
                $cekdatabrg = DB::table('sub_tbl_inventory')
                ->select('sub_tbl_inventory.*')
                ->where('id',$item->id_inventaris)
                ->get();
                ?>
                <tr>
                    <td>{{$cekdatabrg[0]->nama_barang}}</td>
                    <td>{{$cekdatabrg[0]->kd_inventaris}}</td>
                    <td>
                        Merek : {{$cekdatabrg[0]->merk}} <br>
                        Type : {{$cekdatabrg[0]->type}} <br>
                        Nomor Seri : {{$cekdatabrg[0]->no_seri}} <br>
                        Tahun : {{$cekdatabrg[0]->th_pembuatan}}
                    </td>
                    <td>
                        Harga : @currency($cekdatabrg[0]->harga_perolehan) <br>
                        Tahun : {{$cekdatabrg[0]->th_perolehan}}
                       
                    </td>
                    <td >
                        <div class="card bg-info p-2">
                          
                            Asal Lokasi <br>
                            Cabang : 33 <br>
                            Ruang : 33 <br>
                            
                        </div>
                        
                        <div class="card bg-warning p-2">
                           
                            Target Lokasi : <br>
                            Cabang : 33 <br>
                            Ruang : 33
                        </div>
                    </td>
                </tr>
                @endforeach
               
            </tbody>
        </table>
        <hr>
        <div class="card-body" >
            <table  style="width: 100%;">
                <tr>
                    <td style="text-align: right;" colspan="3" >Pontianak , {{date("d - m - Y")}}</td>
                </tr>
                <tr>
                    <td class="pb-2"><span >Penerima</span></td>
                    <td class="pb-2"><span >Menyetujui</span></td>
                    <td class="pb-2" style="text-align: right;"><span >Yang menyerahkan</span></td>
                </tr>
                <tr>
                    <td><img src="data:image/png;base64, {!! base64_encode(QrCode::format('svg')->size(100)->errorCorrection('H')->generate('Agus Raharjo, S.Kom')) !!}"></td>
                    <td><img src="data:image/png;base64, {!! base64_encode(QrCode::format('svg')->size(100)->errorCorrection('H')->generate('Agus Raharjo, S.Kom')) !!}"></td>
                    <td style="text-align: right;"><img src="data:image/png;base64, {!! base64_encode(QrCode::format('svg')->size(100)->errorCorrection('H')->generate('Agus Raharjo, S.Kom')) !!}"></td>
                    
                </tr>
                <tr>
                    <td class="pt-2"><strong>Agus Raharjo, S.Kom</strong></td>
                    <td class="pt-2"><strong>Agus Raharjo, S.Kom</strong></td>
                    <td class="pt-2" style="text-align: right;"><strong>Agus Raharjo, S.Kom</strong></td>
                </tr>
            </table>
            
        </div>
    </div>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>
</html>