<div class="modal-body p-0">
    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
        <h4 class="mb-1" id="staticBackdropLabel">Add Request Data Pmeinjaman</h4>
        <p class="fs--2 mb-0">Support by <a class="link-600 fw-semi-bold" href="#!">Transforma</a></p>
    </div>
    <div class="row g-3 p-3">
        <div class="col-md-4">
            <div class="card border border-primary mb-3">
                <div class="card-header pb-0">
                    <div class="row flex-between-center">
                        <div class="col-sm-auto mb-sm-0 mb-2">
                            <h5 class="mb-0" data-anchor="data-anchor">
                                <span class="badge bg-primary">Form Request Peminjaman</span>

                            </h5>
                        </div>
                        <div class="col-auto">
                            {{-- <div class="search-box" data-list='{"valueNames":["title"]}'>
                                <div class="position-relative" data-bs-toggle="search" data-bs-display="static">
                                    <input class="form-control search-input fuzzy-search" type="search"
                                        placeholder="Cari Nama Barang" id="nama_inventaris"
                                        onkeydown="caridata(this)" />
                                    <span class="fas fa-search search-box-icon"></span>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="card-body pt-0">
                    <div class="tab-content" id="hasil-pencarian-barang">
                        <form class="row g-3" action="{{ route('peminjaman_request_save_cabang_peminjaman') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label class="form-label" for="inputAddress">Tujuan Peminjaman</label>
                                <select name="tujuan" class="form-control choices-single-peminjaman" id="">
                                    <option value="">Pilih Tujuan</option>
                                    <option value="MCU">MCU</option>
                                    <option value="EVENT">EVENT</option>
                                    <option value="OPRASIONAL PELAYANAN">OPRASIONAL PELAYANAN</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="inputAddress">Tanggal Peminjaman</label>
                                <input class="form-control" type="date" name="tgl" />
                                <input class="form-control" type="text" name="code_req" value="{{$code}}" hidden/>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="inputAddress">Target Cabang</label>
                                <select name="cabang" class="form-select choices-single-cabang" id="">
                                    <option value="">Pilih Cabang</option>
                                    @foreach ($cabang as $cabangs)
                                        <option value="{{ $cabangs->kd_cabang }}">{{ $cabangs->nama_cabang }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label" for="inputAddress">Deskripsi Peminjaman</label>
                                <textarea name="deskripsi" class="form-control" id=""></textarea>
                            </div>
                            <h5 class="mb-0 pt-3" data-anchor="data-anchor">
                                <span class="badge bg-primary">Data Request Peminjaman</span>
                            </h5>
                            <br>
                            <div id="table-fix-req-peminjaman">

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card border border-primary">
                {{-- <div class="card-header pb-0">
                    <div class="row flex-between-center">
                        <div class="col-sm-auto mb-sm-0 mb-2">
                            <h5 class="mb-0" data-anchor="data-anchor">
                                Cari Barang Yang Dipinjam
                            </h5>
                        </div>
                        <div class="col-auto">

                        </div>
                    </div>
                    <hr>
                </div> --}}
                <div class="card-body" id="menu-data-v3">
                    <div class="tab-content" id="menu-table-pilih-peminjaman">
                        <div class="card border">
                            <div class="card-body">
                                <div class="row flex-between-center">
                                    <div class="col-sm-auto mb-sm-0">
                                        <h5 class="mb-0"><span class="badge bg-primary">Cari Barang Yang
                                                Dipinjam</span></h5>
                                    </div>
                                    <div class="col-sm-auto">
                                        <div class="row gx-2 align-items-center">
                                            <div class="col-auto">
                                                <form class="row gx-2" id="form-pencarian-data-peminjaman"
                                                    action="#">
                                                    @csrf
                                                    <div class="col-auto mb-1">
                                                        <input type="text" class="form-control" name="name"
                                                            id="nama_barang" required>
                                                    </div>
                                                    <div class="col-auto mb-1">
                                                        <select class="form-select" aria-label="Bulk actions"
                                                            name="option">
                                                            <option value="name">By Nama Barang</option>
                                                            <option value="no_inventaris">By No Inventaris</option>
                                                        </select>
                                                    </div>
                                                    <input type="text" name="" id="" required hidden>
                                                    <input class="form-control" type="text" name="code"
                                                        id="code" value="{{ $code }}" hidden />
                                                </form>
                                            </div>
                                            <div class="col-auto pe-0 mb-1">
                                                <button class="btn btn-falcon-primary"
                                                    id="button-find-data-barang"><span
                                                        class="fas fa-search"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pt-2" id="hasil-pencarian-barang-cabang">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    new window.Choices(document.querySelector(".choices-single-peminjaman"));
    new window.Choices(document.querySelector(".choices-single-cabang"));
</script>

<script>
    $(document).on("click", "#button-find-data-barang", function(e) {
        e.preventDefault();
        var nama = document.getElementById("nama_barang").value;
        var data = $("#form-pencarian-data-peminjaman").serialize();
        if (nama.length >= 3) {
            $('#hasil-pencarian-barang-cabang').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('peminjaman_request_find_data_cabang_peminjaman') }}",
                type: "POST",
                cache: false,
                data: data,
                dataType: 'html',
            }).done(function(data) {
                $('#hasil-pencarian-barang-cabang').html(data);
            }).fail(function() {
                $('#hasil-pencarian-barang-cabang').html('eror');
            });
        } else {
            alert('Minimal 3 Charcter Untuk Mencari Barang');
        }
    });
</script>
