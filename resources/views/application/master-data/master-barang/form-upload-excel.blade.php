<div class="modal-body p-0">
    <div class="bg-300 rounded-top-lg py-3 ps-4 pe-4">
        <h4 class="mb-1" id="staticBackdropLabel">Form Upload Barang</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="card-body">
        <!-- <p>This is an early demo of Figma files. All the design is not yet recreated with Figma. But hopefully, we will port all the layouts in the next couple of weeks.</p> -->
        <h5 data-anchor="data-anchor" id="to-play-with-the-design">Tata Cara Upload Data Excel:<a class="anchorjs-link " aria-label="Anchor" data-anchorjs-icon="#" href="#to-play-with-the-design" style="padding-left: 0.375em;"></a></h5>
        <ul>
            <li> <a href="{{asset('download/Import_inventaris_baru.xlsx')}}" target="_blank">Download Template Excel</a></li>
            <li>Pastiken Semua Data Yang di upload Sudah Sesuai dengan kode ruangan dan kode klasifikasi <small class="text-danger">Untuk Melihat Kode Ruangan Silahkan Untuk Setup nomor ruangan di Master Lokasi</small></li>
            <li>Silahkan Untuk Memilih File Excel lalu menekan tombol Proses Import</li>
            <li>Jika Semua Data Sudah Benar tidak terjadi tidak ditemukan kode ruangan dan klasifikasi Silahkan Untuk Klik <b class="text-primary text-600"> Simpan</b></li>
        </ul>
    </div>
    <div class="p-4 pt-0">
        <form class="row g-3" id="uploadForm" enctype="multipart/form-data">
            @csrf
            @if ($data->isEmpty())
            <div class="col-md-6 position-relative">
                <input type="file" class="form-control" id="excelFile" name="file" required>
            </div>
            <div class="col-md-6 text-end">
                <button class="btn btn-primary" type="submit">Proses Import</button>
            </div>
            @endif
        </form>
        <div class="mt-3" id="response">
            <table id="upload_excel_1" class="table table-striped" style="width:100%">
                <thead class="bg-200 text-700 fs--2">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>No Inventaris</th>
                        <th>Kode Klasifikasi</th>
                        <th>Kode Lokasi</th>
                        <th>Nomor Ruangan</th>
                        <th>Merek / Type</th>
                        <th>Tanggal Pembelian</th>
                        <th>Harga Perolehan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($data as $datas)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $datas->inventaris_data_name }}</td>
                        <td>{{ $datas->inventaris_data_number }}</td>
                        <td>{{ $datas->inventaris_klasifikasi_code }}</td>
                        <td>{{ $datas->inventaris_data_location }}</td>
                        <td>
                            @php
                            $lokasi = DB::table('tbl_nomor_ruangan_cabang')
                            ->join('master_lokasi','master_lokasi.master_lokasi_code','=','tbl_nomor_ruangan_cabang.kd_lokasi')
                            ->where('tbl_nomor_ruangan_cabang.id_nomor_ruangan_cbaang',$datas->id_nomor_ruangan_cbaang)->first();
                            @endphp
                            @if ($lokasi)
                            {{ $lokasi->master_lokasi_name }}
                            @else
                            <small class="text-danger">Tidak ditemukan</small>
                            @endif
                        </td>
                        <td>{{ $datas->inventaris_data_merk }} / {{ $datas->inventaris_data_type }}</td>
                        <td>{{ $datas->inventaris_data_tgl_beli }}</td>
                        <td>@currency($datas->inventaris_data_harga)</td>
                        <td class="text-center">
                            <a href="#" class="me-2" id="button-edit-data-log" data-code="{{ $datas->inventaris_data_code }}"><span class="far fa-edit text-warning"></span></a>
                            <a href="#" id="button-hapus-data-log" data-code="{{ $datas->inventaris_data_code }}"><span class="far fa-trash-alt text-danger"></span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div id="menu-fix-save-data-log">
        <button class="btn btn-primary btn-sm" id="button-fix-save-data-log">Simpan Data</button>
    </div>
</div>
<script>
    new DataTable('#upload_excel_1', {
        responsive: true
    });
    $('#uploadForm').on('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        $('#response').html('<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>');
        $.ajax({
            url: "{{route('master_barang_upload_excel_master_barang_save')}}",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(res) {
                $('#response').html(res);
                document.getElementById('uploadForm').style.display = 'none';
            },
            error: function(err) {
                $('#response').html(`<p style="color:red">${err.responseJSON.message}</p>`);
            }
        });
    });
</script>
