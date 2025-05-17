<style>
    input[type="file"] {
        display: none;
    }
</style>
<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Form Penambahan Barang Non Aset</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <form method="POST" action="#" enctype="multipart/form-data" id="form-tambah-barang">
        @csrf
        <div class="body" id="showdatabarang">
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-4 text-center">
                        {{-- <input type="file" accept="image/*" onchange="loadFile(event)"> --}}
                        <label class="custom-file-upload form-control" id="upload-container">
                            <input type="file" id="browseFile" class="form-control" />
                            <span class="fas fa-cloud-upload-alt"></span> Upload Gambar
                        </label>
                        <a href="#" data-fancybox="images" data-caption="">
                            <img src="{{ asset('no_img.jpg') }}" alt="lightbox" class="lightbox-thumb img-thumbnail"
                                id="videoPreview" width="350" height="350">
                        </a>
                        <div class="progress  mt-3" style="height: 20px">
                            <div class="progress-bar progress-bar-striped progress-bar-animated loading"
                                role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                style="width: 0%; height: 100%">0%</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Nama Barangs</label>
                        <input type="text" name="nama_barang" class="form-control form-control-lg"
                            id="inputPassword4" required>
                        <label for="inputEmail4" class="form-label">Jenis Inventaris</label>
                        <select class="form-control choices-single-jenis" name="kd_inventaris" required>
                            <option value="">Pilih Jenis Inventaris</option>
                            @foreach ($klasifikasi as $klasifikasis)
                                <option value="{{$klasifikasis->inventaris_klasifikasi_code}}">{{$klasifikasis->inventaris_klasifikasi_code}} - {{$klasifikasis->inventaris_klasifikasi_name}}</option>
                            @endforeach
                        </select>

                        <label for="inputPassword4" class="form-label">Kategori</label>
                        <select class="form-control form-control-lg kategori_barang" name="kategori" required>
                            <option value="">Pilih Kategori</option>
                            <option value="0">Inventaris</option>
                            <option value="1">Aset</option>
                        </select>
                        <label for="inputEmail4" class="form-label">Tanggal Pembelian</label>
                        <input type="date" name="tgl_beli" class="form-control form-control-lg" required>
                        <label for="inputPassword4" class="form-label">Harga Perolehan</label>
                        <input type="text" name="harga_perolehan" class="form-control form-control-lg"
                            id="dengan-rupiah" required>
                        <input id="link" type="text" name="link" class="form-control " hidden>
                    </div>
                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Supplier</label>
                        <input type="text" name="suplier" class="form-control form-control-lg" required>
                        <label for="inputEmail4" class="form-label">Lokasi</label>
                        <select class="form-control choices-single-lokasi " name="no_ruangan" required>
                            <option value="">Pilih Ruangan</option>
                            @foreach ($lokasi as $lokasis)
                                <option value="{{$lokasis->master_lokasi_code}}">{{$lokasis->master_lokasi_name}} - {{$lokasis->master_lokasi_code}}</option>
                            @endforeach
                        </select>
                        <label for="inputPassword4" class="form-label">Merek</label>
                        <input type="text" name="merk" class="form-control form-control-lg" value="">
                        <label for="inputPassword4" class="form-label">Type Barang</label>
                        <input type="text" name="type" class="form-control form-control-lg" value="">
                        <label for="inputPassword4" class="form-label">Nomor Serial</label>
                        <input type="text" name="no_seri" class="form-control form-control-lg" value="">
                    </div>

                </div>
            </div>

        </div>

        <div class="modal-footer">
            {{-- <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"><i class="fa fa-times"></i> Close</button> --}}
            <button type="submit" class="btn btn-outline-success"><i class="fa fa-save"></i> Simpan Data</button>
            {{-- <button type="submit" class="btn btn-primary" id="tambahsubdatabarang" data-url="{{ route('simpandatasubbarang1',['id' => $id])}}"><i class="fa fa-save" ></i> Simpan Data</button> --}}
        </div>
    </form>
</div>
<script src="{{ url('js/rupiah.js', []) }}"></script>
<script>
    new window.Choices(document.querySelector(".choices-single-jenis"));
    new window.Choices(document.querySelector(".choices-single-lokasi"));
</script>
