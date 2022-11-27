<style>
    input[type="file"] {
        display: none;
    }

    .styled-table {
        border-collapse: collapse;
        margin: 0px 0;
        font-size: 0.9em;
        font-family: 'Russo One', sans-serif;
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
    <thead>
        <tr style="margin: 0px;">
            <td class="text-center" colspan="3" style="margin: 0px;">
                <h5 style="margin: 0px; color: white; box-shadow: #ff8c00 2px;"> FORMULIR MUTASI BARANG INVENTARIS</h5>
                <p> Kode Mutasi : <strong>{{ $data[0]->kd_mutasi }}</strong></p>
            </td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="width: 300px;">Jenis Mutasi</td>
            <td>:</td>
            <td>
                @if ($data[0]->jenis_mutasi == 1)
                    <strong>Penempatan</strong>
                @elseif($data[0]->jenis_mutasi == 2)
                    <strong>Penarikan</strong>
                @elseif($data[0]->jenis_mutasi == 3)
                    <strong>Mutasi Antar Bagian</strong>
                @elseif($data[0]->jenis_mutasi == 4)
                    <strong>Mutasi Antar Cabang</strong>
                @endif
            </td>
        </tr>

        <tr>
            <td>Asal Lokasi Cabang </td>
            <td>:</td>
            <td><?php $asallokasi =  DB::table('tbl_cabang')
            ->where('kd_cabang',$data[0]->asal_mutasi)
            ->get();
             ?>
                {{ $asallokasi[0]->nama_cabang }}
            </td>
        </tr>
        <tr>
            <td>Lokasi Penempatan Cabang </td>
            <td>:</td>
            <td><?php $asallokasi1 =  DB::table('tbl_cabang')
                ->where('kd_cabang', $data[0]->target_mutasi)
                ->get();
                ?>
                {{ $asallokasi1[0]->nama_cabang }}
            </td>
        </tr>
        <tr>
            <td>Departement </td>
            <td>:</td>
            <td>{{ $data[0]->departemen }}</td>
        </tr>
        <tr>
            <td>Divisi </td>
            <td>:</td>
            <td>{{ $data[0]->divisi }}</td>
        </tr>
        <tr>
            <td>Penanggung Jawab </td>
            <td>:</td>
            <td>{{ $data[0]->penanggung_jawab }}</td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td>{{ $data[0]->tanggal_buat }}</td>
        </tr>
    </tbody>
</table>
<br><br>
<div id="tambahsubdatamutasibarang" class="p-2">
    <button class="btn-info" onclick="window.open('printdokumenmutasi/{{ $data[0]->id_mutasi }}','myActionWin','width=1300,height=800,toolbar=0');"><i class="fa fa-print"> </i> Cetak Pengajuan</button>
    @if ($data[0]->ket == 1)
        <label class="custom-file-upload pl-3 btn-dark m-0" id="upload-container">
            <input type="file" id="browseFilex" class="form-control" />
            <i class="fa fa-upload "> </i> Upload Bukti
        </label>
    @elseif($data[0]->ket == 2)
        <label class="custom-file-upload pl-3 btn-dark btn-sm m-0" id="upload-container">
            <input type="file" id="browseFilex" class="form-control" />
            <i class="fa fa-upload "> </i> Upload Ulang
        </label>
    @endif

    <div class="progressx mt-3" style="height: 25px" id="prosesuploaddokumen">
        <div class="progress-bar progress-bar-striped progress-bar-animated" id="prsesline"
            style="display: none;background: #eeece9;" role="progressbar" aria-valuenow="0" aria-valuemin="0"
            aria-valuemax="100" style="width: 0%; height: 100%">0%</div>
    </div>
    <input id="link" type="text" name="link" class="form-control" value="" hidden>
    <button class="btn-success" style="float: right;" id="tambahsubdatamutasibarangx"
        data-url="{{ route('tambahsubdatamutasibarangx', ['id' => $data[0]->id_mutasi]) }}"><i
            class="fa fa-plus"></i></button><br>
    {{-- <button class="btn btn-success btn-sm" style="float: right;" id="tambahsubdatamutasibarangx" data-url="{{ url('tambahsubdatamutasibarangx/'.$data[0]->id_mutasi) }}"><i class="fa fa-plus"></i></button><br> --}}
</div>
<hr>
<table class="styled-table" style="padding-top: 120px;" id="kliktambahbrgmutasix">
    <thead>
        <tr>
            <td>Gambar</td>
            <td>Nama Barang</td>
            <td>No Inventaris</td>
            <td>Spesifikasi</td>
            <td>Perolehan</td>
            <td>Lokasi</td>
            <td>Action</td>

        </tr>
    </thead>
    <tbody>
        @foreach ($databrg as $databrg)
            <tr>
                <td>
                    @if ($databrg->gambar == '')
                        <img src="{{ url('1.png', []) }}" alt="" width="50">
                    @else
                        <img src="{{ url('/' . $databrg->gambar, []) }}" alt="" width="50">
                    @endif

                </td>
                <td>{{ $databrg->nama_barang }}</td>
                <td>{{ $databrg->kd_inventaris }}</td>
                <td>
                    Merek : {{ $databrg->merk }}<br>
                    Type : {{ $databrg->type }}<br>
                    Nomor Seri : {{ $databrg->no_seri }}<br>
                    Tahun : {{ $databrg->th_pembuatan }}
                </td>
                <td>
                    Harga : @currency($databrg->harga_perolehan) <br>
                    Tahun : {{ $databrg->th_perolehan }}

                </td>
                <td>
                    <div class="card bg-info p-2">
                        <?php $lok1 = DB::select('select * from tbl_lokasi where kd_lokasi = "' . $databrg->kd_lokasi_awal . '"', [0]); ?>
                        Asal Lokasi <br>
                        Cabang : {{ $databrg->kd_cabang_awal }} <br>
                        Ruang : {{ $lok1[0]->nama_lokasi }} <br>

                    </div>

                    <div class="card bg-warning p-2">
                        <?php $lok2 = DB::select('select * from tbl_lokasi where kd_lokasi = "' . $databrg->kd_lokasi_tujuan . '"', [0]); ?>
                        Target Lokasi : <br>
                        Cabang : {{ $databrg->kd_cabang_tujuan }} <br>
                        Ruang : {{ $lok2[0]->nama_lokasi }}
                    </div>
                </td>
                <td><button class="btn btn-danger btn-sm" id="hapussubtablemutasi"
                        data-url="{{ route('hapussubtablemutasi', ['id' => $databrg->id, 'no' => $databrg->id_mutasi]) }}"><i
                            class="fa fa-trash"></i></button></td>
            </tr>
        @endforeach
    </tbody>
</table>
<script type="text/javascript">
    function submitcetakdokument() {
        document.form2.target = "myActionWin";
        window.open("", "myActionWin", "width=1000,height=700,toolbar=0");
        document.form2.submit();
    }
</script>
<script type="text/javascript">
    // delete window.browseFile;
    // delete window.resumable;

    var browseFilex = $('#browseFilex');
    var resumablex = new Resumable({
        target: '{{ route('files.upload.dokumenmutasi', ['id' => $data[0]->id_mutasi]) }}',
        query: {
            _token: '{{ csrf_token() }}'
        }, // CSRF token
        fileType: ['pdf', 'mp4'],
        headers: {
            'Accept': 'application/json'
        },
        testChunks: false,
        throttleProgressCallbacks: 1,
    });

    resumablex.assignBrowse(browseFilex[0]);

    resumablex.on('fileAdded', function(file) { // trigger when file picked
        showProgress();
        resumablex.upload() // to actually start uploading.
    });

    resumablex.on('fileProgress', function(file) { // trigger when file progress update
        updateProgress(Math.floor(file.progress() * 100));
    });

    resumablex.on('fileSuccess', function(file, response) { // trigger when file upload complete
        response = JSON.parse(response)
        $('#videoPreview').attr('src', response.path);
        $('#link').attr('value', response.filename);
        // $('.card-footer').show();
        $('#upload-container').hide();
        $('#prosesuploaddokumen').hide();
    });

    resumablex.on('fileError', function(file, response) { // trigger when there is any error
        alert('file uploading error.')
    });


    var progressx = $('.progressx');

    function showProgress() {
        $('#prsesline').show();
        progressx.find('.progress-bar').css('width', '0%');
        progressx.find('.progress-bar').html('0%');
        progressx.find('.progress-bar').addClass('bg-warning');
        progressx.show();
    }

    function updateProgress(value) {
        progressx.find('.progress-bar').css('width', ` ${value}%`)
        progressx.find('.progress-bar').html(`${value}%`)
    }

    function hideProgress() {
        $('.progressx').hide();
    }
</script>
