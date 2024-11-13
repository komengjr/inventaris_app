<style>
    input[type="file"] {
        display: none;
    }
</style>
<style>
    @media only screen and (max-width: 800px) {

        td,
        tr {
            display: block;
        }

        /* Hide table headers (but not display: none;, for accessibility) */
        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        tr {
            border: 1px solid #000000;
        }

        tr+tr {
            margin-top: 1.5em;
        }

        td {
            /* make like a "row" */
            border: 5px;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 10%;
            padding-right: 10%;
            padding-top: 10px;
            padding-bottom: 10px;
            background-color: #dcede4;
            text-align: left;
        }

        td:before {
            content: attr(data-label);
            display: inline-block;
            font-family: 'Orbitron', sans-serif;
            padding-left: 4px;
            line-height: 2.5;
            margin-left: -100%;
            width: 100%;
            white-space: nowrap;
        }
    }

    .styled-table {
        border-collapse: collapse;
        margin: 0px 0;
        font-size: 0.9em;

        color: black;
        min-width: 100%;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .styled-table thead tr {
        background-color: #00d5ff;
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
<div class="modal-content" id="showdatabarang">

    {{-- <form  method="POST" action="" enctype="multipart/form-data" id="form-update"> --}}
    <form method="POST" action="#" enctype="multipart/form-data" id="form-update-data-kso">
        @csrf
        <div class="body" id="showdatabarang">
            <div class="card-body">
                <div class="row g-2">
                    <div class="col-md-2 text-center">
                        {{-- <input type="file" accept="image/*" onchange="loadFile(event)"> --}}
                        @if (Auth::user()->akses == 'sdm')
                            <label class="custom-file-upload form-control" id="upload-container"
                                id="browseFile{{ $id }}">
                                <input type="file" id="browseFile{{ $id }}" class="form-control" />
                                <i class="fa fa-upload "> Upload Gambar</i>
                            </label>
                        @else
                        @endif



                        @if ($data->gambar == '')
                            <a href="https://via.placeholder.com/1920x1080" data-fancybox="images"
                                data-caption="{{ $data->nama_barang }}">
                                <img src="https://via.placeholder.com/800x500" alt="lightbox"
                                    class="lightbox-thumb img-thumbnail" id="videoPreview" width="50"
                                    height="50">
                            </a>
                        @else
                            <a href="{{ url($data->gambar, []) }}" data-fancybox="images"
                                data-caption="{{ $data->nama_barang }}">
                                <img src="{{ url($data->gambar, []) }}" alt="lightbox"
                                    class="lightbox-thumb img-thumbnail" id="videoPreview" width="50"
                                    height="50">
                            </a>
                        @endif


                        <div class="progress{{ $id }} mt-3" style="height: 25px">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%; height: 100%">
                                0%</div>
                        </div>

                    </div>
                    <div class="col-md-5">
                        <label for="inputPassword4" class="form-label">Nama Barang</label>
                        <input type="text" name="kode_kode" class="form-control" value="{{ $data->id_inventaris }}"
                            hidden>
                        <input type="text" name="nama_barang" class="form-control" id="inputPassword4"
                            value="{{ $data->nama_barang }}">
                        <input type="text" name="kd_cabang" class="form-control" id="inputPassword4"
                            value="{{ $data->kd_cabang }}" hidden>
                        <label for="inputPassword4" class="form-label">No MOU Dokumen</label>
                        <input type="text" name="no_mou" class="form-control" value="{{ $data->no_mou_id }}">
                        <label for="inputPassword4" class="form-label">No KSO Alat</label>
                        <input type="text" name="no_kso" class="form-control" value="{{ $data->no_kso_alat }}">
                        <label for="inputPassword4" class="form-label">Tanggal KSO</label>
                        <input type="date" name="tgl_kso" class="form-control" value="{{ $data->tgl_kso }}">
                        <input id="link" type="text" name="link" class="form-control" value="" hidden>
                    </div>
                    <div class="col-md-5">
                        @php
                            $kode_lokasi = DB::table('tbl_inventory')
                                ->where('kd_inventaris', $data->kd_inventaris)
                                ->first();
                        @endphp
                        <label for="inputEmail4" class="form-label">Kode Barang</label>
                        {{-- <input type="text" class="form-control" value="{{ $data->kd_inventaris }}" disabled> --}}
                        <select class="form-control single-select" name="kd_inventaris">
                            @if ($kode_lokasi)
                                <option value="{{ $data->kd_inventaris }}">{{ $data->kd_inventaris }}
                                    {{ $kode_lokasi->nama_klasifikasi_barang }}</option>
                            @else
                                <option value="{{ $data->kd_inventaris }}">{{ $data->kd_inventaris }} Tidak Ditemukan
                                </option>
                            @endif
                            @foreach ($kode as $kode)
                                <option value="{{ $kode->kd_inventaris }}"> {{ $kode->kd_inventaris }} -
                                    {{ $kode->nama_klasifikasi_barang }}</option>
                            @endforeach

                        </select>
                        <label for="inputEmail4" class="form-label">Lokasi</label>
                        <?php
                        $nama_lokasi = DB::table('tbl_nomor_ruangan_cabang')
                            ->join('tbl_lokasi', 'tbl_lokasi.kd_lokasi', '=', 'tbl_nomor_ruangan_cabang.kd_lokasi')
                            ->where('tbl_nomor_ruangan_cabang.kd_lokasi', $data->kd_lokasi)
                            ->where('tbl_nomor_ruangan_cabang.kd_cabang', Auth::user()->cabang)
                            ->first();
                        $lokasi_all = DB::table('tbl_nomor_ruangan_cabang')
                            ->join('tbl_lokasi', 'tbl_lokasi.kd_lokasi', '=', 'tbl_nomor_ruangan_cabang.kd_lokasi')
                            ->where('tbl_nomor_ruangan_cabang.kd_cabang', Auth::user()->cabang)
                            ->get();
                        ?>
                        <select class="form-control single-select" name="kd_lokasi">
                            <option value="{{ $data->kd_lokasi }}">{{ $nama_lokasi->nomor_ruangan }} -
                                {{ $nama_lokasi->nama_lokasi }}</option>
                            @foreach ($lokasi_all as $lokasi_all)
                                <option value="{{ $lokasi_all->kd_lokasi }}"> {{ $lokasi_all->nomor_ruangan }} -
                                    {{ $lokasi_all->nama_lokasi }}</option>
                            @endforeach

                        </select>
                        {{-- <input type="text" class="form-control" value="{{$nama_lokasi[0]->nama_lokasi}}" disabled> --}}


                        {{-- <input type="text" name="kd_inventaris" class="form-control" value="{{$data[0]->kd_inventaris}}"> --}}

                        <label for="inputPassword4" class="form-label">Merek</label>
                        <input type="text" name="merk" class="form-control" value="{{ $data->merk }}">
                        <label for="inputPassword4" class="form-label">Nomor Serial</label>
                        <input type="text" name="no_seri" class="form-control" value="{{ $data->no_seri }}">
                    </div>


                </div>
            </div>
            {{-- <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-9">

                    </div>
                    <hr>
                    <div class="col-md-6">
                        <h3 for="inputPassword4" class="form-label"><span class="badge badge-dark">History
                                Perpindahan</span></h3>
                        <table class="table styled-table">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Awal barang</td>
                                    <td>Pindah Barang</td>
                                    <td>Tanggal Pindah</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $datapindah = DB::table('log_history_inventaris')
                                    ->select('log_history_inventaris.created_at', 'log_history_inventaris.after_history', 'tbl_lokasi.nama_lokasi')
                                    ->join('tbl_lokasi', 'tbl_lokasi.kd_lokasi', '=', 'log_history_inventaris.before_history')
                                    ->where('log_history_inventaris.id_inventaris', $data->id_inventaris)
                                    ->get();
                                ?>
                                @foreach ($datapindah as $datapindah)
                                    <tr>
                                        <td data-label="No">{{ $no++ }}</td>
                                        <td>{{ $datapindah->nama_lokasi }}</td>
                                        <td>
                                            @php
                                                $pindah = DB::table('tbl_lokasi')->where('kd_lokasi',$datapindah->after_history)->first();
                                            @endphp
                                                {{$pindah->nama_lokasi}}
                                        </td>
                                        <td>{{ $datapindah->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h3 for="inputPassword4" class="form-label"><span class="badge badge-dark">History
                                Peminjaman</span></h3>
                        <table class="styled-table">
                            <thead>
                                <tr>
                                    <td>Nomor Surat</td>
                                    <td>Tujuan Pinjaman</td>
                                    <td>Asal Cabang</td>
                                    <td>Tujuan Cabang</td>
                                    <td>Penanggung Jawab</td>
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $datapinjam = DB::table('tbl_peminjaman')
                                    ->join('tbl_sub_peminjaman', 'tbl_peminjaman.id_pinjam', '=', 'tbl_sub_peminjaman.id_pinjam')
                                    ->where('tbl_sub_peminjaman.id_inventaris', $data->id_inventaris)
                                    ->get();
                                ?>
                                @foreach ($datapinjam as $datapinjam)
                                    <tr>
                                        <td>{{ $datapinjam->tiket_peminjaman }}</td>
                                        <td>{{ $datapinjam->nama_kegiatan }}</td>
                                        @php
                                            $cabang = DB::table('tbl_cabang')
                                                ->where('kd_cabang', $datapinjam->kd_cabang)
                                                ->first();
                                        @endphp
                                        <td>-</td>
                                        @php
                                            $cabang1 = DB::table('tbl_cabang')
                                                ->where('kd_cabang', $datapinjam->tujuan_cabang)
                                                ->first();
                                        @endphp
                                        <td>-</td>
                                        @php
                                            $pj = DB::table('tbl_staff')
                                                ->where('nip', $datapinjam->pj_pinjam)
                                                ->first();
                                        @endphp
                                        <td>{{ $pj->nama_staff }}</td>

                                        <td>
                                            @if ($datapinjam->status_sub_peminjaman == 0)
                                                <button class="btn-warning" disabled>Proses</button>
                                            @else
                                                <button class="btn-succes" disabled>Done</button>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div> --}}
        </div>


        <div class="modal-footer">
            {{-- <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times"></i> Close</button> --}}
            <button type="submit" class="btn-primary" id="update-data-kso-barang"><i class="fa fa-save"></i> Update
                Data</button>
            {{-- <button type="submit" class="btn btn-primary" id="updatedatabarang" data-url="{{ route('updatedatabarang1',['id' => $data[0]->id])}}"><i class="fa fa-save" ></i> Update Data</button> --}}
        </div>
    </form>

</div>
<script src="{{ url('js/rupiah.js', []) }}"></script>
<script>
    $(document).ready(function() {
        $('.single-select<?php echo $id; ?>').select2();
        $('.single-select').select2();
        $('.single-select-kode').select2();
    });
</script>

<script type="text/javascript">
    var browseFile<?php echo $id; ?> = $('#browseFile<?php echo $id; ?>');
    var resumable<?php echo $id; ?> = new Resumable({
        target: '{{ route('file-upload.uploadgambarbarangkso') }}',
        query: {
            _token: '{{ csrf_token() }}'
        }, // CSRF token
        fileType: ['jpg', 'jpeg', 'png'],
        headers: {
            'Accept': 'application/json'
        },
        testChunks: false,
        throttleProgressCallbacks: 1,
    });

    resumable<?php echo $id; ?>.assignBrowse(browseFile<?php echo $id; ?>[0]);

    resumable<?php echo $id; ?>.on('fileAdded', function(file) { // trigger when file picked
        showProgress();
        resumable<?php echo $id; ?>.upload() // to actually start uploading.
    });

    resumable<?php echo $id; ?>.on('fileProgress', function(file) { // trigger when file progress update
        updateProgress(Math.floor(file.progress() * 100));
    });

    resumable<?php echo $id; ?>.on('fileSuccess', function(file, response) { // trigger when file upload complete
        response = JSON.parse(response)
        $('#videoPreview').attr('src', response.path);
        $('#link').attr('value', response.filename);
        $('.card-footer').show();
        $('#browseFile<?php echo $id; ?>').hide();
    });

    resumable<?php echo $id; ?>.on('fileError', function(file, response) { // trigger when there is any error
        alert('file uploading error.')
    });


    var progress<?php echo $id; ?> = $('.progress<?php echo $id; ?>');

    function showProgress() {
        progress<?php echo $id; ?>.find('.progress-bar').css('width', '0%');
        progress<?php echo $id; ?>.find('.progress-bar').html('0%');
        progress<?php echo $id; ?>.find('.progress-bar').removeClass('bg-info');
        progress<?php echo $id; ?>.show();
    }

    function updateProgress(value) {
        progress<?php echo $id; ?>.find('.progress-bar').css('width', ` ${value}%`)
        progress<?php echo $id; ?>.find('.progress-bar').html(`${value}%`)
    }

    function hideProgress() {
        // progress<?php echo $id; ?>.hide();
    }
</script>
