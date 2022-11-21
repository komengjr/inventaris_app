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

<table class="styled-table">
    
        <tr>
            <td class="text-center" rowspan="2" colspan="2">
                <h5><strong>FORMULIR PEMUSNAHAN BARANG INVENTARIS</strong></h5>
                <h6><strong>Laboratorium Klinik Pramita</strong></h6>
            </td>
            <td style="background: #ffffff;">
                <label for="">No Surat</label>
                <input type="text" class="form-control" value="{{$data[0]->no_surat}}" disabled>
            </td>
        </tr>
    
   
        <tr>
            <td>
                <label for="">Tanggal</label>
                <input type="text" class="form-control" value="{{$data[0]->tgl_buat}}" disabled>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="text-center"><h6><strong>PENGAJUAN</strong></h6></td>
        </tr>
        <tr>
            <td><label for="">1. Dasar Pengajuan</label></td>
            <td><input type="text" class="form-control" value="{{$data[0]->dasar_pengajuan}}" disabled></td>
            <td></td>
        </tr>
        <hr>
        <tr>
            <td><label for="">2. Identitas Barang</label></td>
        </tr>   
</table>
<table class="styled-table" id="record-pemusnahan-barang">
    <thead>
        <tr>
            <td>Nama Barang</td>
            <td>No Inventaris</td>
            <td>Spesifikasi</td>
            <td>Perolehan</td>
            <td>Jumlah</td>
            <td><button class="btn btn-success btn-sm" id="addpemusnahanbarang" data-url="{{ route('addpemusnahanbarang',['id'=>$data[0]->id_musnah])}}"><i class="fa fa-plus"></i></button></td>
        </tr>
    </thead>
    <tbody>
        @foreach ($databrg as $databrg)
        <tr>
            <td>
                @if ($databrg->gambar == "")
                <img src="{{ url('1.png', []) }}" alt="" width="50">
                @else
                <img src="{{ url('/'.$databrg->gambar, []) }}" alt="" width="50">
                @endif
              
            </td>
            <td>{{$databrg->nama_barang}}</td>
            <td>{{$databrg->kd_inventaris}}</td>
            <td>
                Merek : {{$databrg->merk}} <br>
                Type : {{$databrg->type}} <br>
                Nomor Seri : {{$databrg->no_seri}} <br>
                Tahun : {{$databrg->th_pembuatan}}
            </td>
            <td>
                Harga : {{$databrg->harga_perolehan}} <br>
                Tahun : {{$databrg->th_perolehan}} 
               
            </td>
            <td><button class="btn btn-danger btn-sm" id="hapussubtablemusnah" data-url="{{ route('hapussubtablemusnah',['id'=>$databrg->id,'no'=>$data[0]->id_musnah])}}"><i class="fa fa-trash"></i></button></td>
        </tr>
        @endforeach
    </tbody>

</table>
<div  id="table-pemusnahan-barang"></div>
<hr>
<table class="styled-table">
        <td></td>
        <td class="text-center"> <h6><strong>Penggagas</strong></h6>
            {!! QrCode::size(100)->generate(url($data[0]->penggagas)); !!} <p>{{$data[0]->penggagas}}</p>
        </td>
    <tr>
        <td><label for="">3. Verifikasi</label><p>Telah melakukan verfikasi pada keadaan barang</p></td>
        <td><input type="text" class="form-control"></td>
    </tr>
    <tr>
        <td></td>
        <td class="text-center"><h6><strong>Spv SDM & Umum</strong></h6>
            {!! QrCode::size(100)->generate(url($data[0]->user_verifikasi)); !!} <p>{{$data[0]->user_verifikasi}}</p>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="text-center"><h6><strong>PERSETUJUAN</strong></h6></td>
    </tr>
    <tr>
        <td><label for="">4. Setuju/tidak setuju dimusnahkan/dimutasi/dihibahkan*)</label></td>
        <td><input type="text" class="form-control"></td>
    </tr>
    <tr>
        <td>User Persetujuan</td>
        <td class="text-center"><h6><strong>Kepala Cabang</strong></h6>
            {!! QrCode::size(100)->generate(url($data[0]->user_persetujuan)); !!} <p>{{$data[0]->user_persetujuan}}</p>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="text-center"><h6><strong>EKSEKUSI</strong></h6></td>
    </tr>
    <tr>
        <td>5.	Telah dilakukan pemusnahan/hibah*</p></td>
        <td><input type="text" class="form-control"></td>
    </tr>
    <tr>
        <td></td>
        <td class="text-center"><h6><strong>Pelaksana</strong></h6>
            {!! QrCode::size(100)->generate(url($data[0]->user_eksekusi)); !!} <p>{{$data[0]->user_eksekusi}}</p>
        </td>
    </tr>
</table>