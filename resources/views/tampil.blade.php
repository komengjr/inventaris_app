<div class="content-wrapper">


    <div class="card-body">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="row">
                <div class="col-5"><img src="{{ url('logo.png', []) }}" alt="" width="300"></div>

            </div>
        </section>

        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->

            <div class="row">

                <div class="col-sm-2 ">


                    @if ($data[0]->gambar == '')
                        <a href="https://via.placeholder.com/1920x1080" data-fancybox="images" data-caption="Kosong">
                            <img src="https://via.placeholder.com/800x500" alt="lightbox"
                                class="lightbox-thumb img-thumbnail" id="videoPreview" width="50" height="50">
                        </a>
                    @else
                        <a href="{{ url($data[0]->gambar, []) }}" data-fancybox="images"
                            data-caption="{{ $data[0]->nama_barang }} : {{ $data[0]->no_urut_barang }}/{{ $data[0]->kd_lokasi }}/P.{{ $data[0]->kd_cabang }}/{{ $data[0]->th_pembuatan }}">
                            <img src="{{ url($data[0]->gambar, []) }}" alt="lightbox"
                                class="lightbox-thumb img-thumbnail" id="videoPreview" width="50" height="50">
                        </a>
                    @endif


                </div><!-- /.col -->
                <div class="col-sm-5">
                    <label for="">Kode Induk - Nama Kategori</label>
                    <input type="text" class="form-control" value="" disabled>
                    <label for="">Kode Klasifikasi</label>
                    <input type="text" class="form-control" value="{{ $data[0]->kd_inventaris }}" disabled>
                    <label for="">Kode Lokasi</label>
                    <input type="text" class="form-control" value="{{ $data[0]->kd_lokasi }}" disabled>

                </div><!-- /.col -->
                <div class="col-sm-5">
                    <label for="">Nama Barang</label>
                    <input type="text" class="form-control" value="{{ $data[0]->nama_barang }}" disabled>
                    <label for="">Lokasi Barang</label>
                    <input type="text" class="form-control" value="{{ $data[0]->nama_lokasi }}" disabled>
                    <label for="">Kode Cabang</label>
                    <input type="text" class="form-control" value="{{ $data[0]->kd_cabang }}" disabled>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <!-- Table row -->
            <div class="row">


                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Tahun Perolehan</label>
                    <input type="text" name="th_perolehan" class="form-control" value="{{ $data[0]->th_perolehan }}"
                        disabled>
                </div>
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Merek</label>
                    <input type="text" name="merk" class="form-control" value="{{ $data[0]->merk }}" disabled>
                </div>
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Type Barang</label>
                    <input type="text" name="type" class="form-control" value="{{ $data[0]->type }}" disabled>
                </div>
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Nomor Serial</label>
                    <input type="text" name="no_seri" class="form-control" value="{{ $data[0]->no_seri }}" disabled>
                </div>
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Supplier</label>
                    <input type="text" name="suplier" class="form-control" value="{{ $data[0]->suplier }}" disabled>
                </div>
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Harga Perolehan</label>
                    <input type="text" name="harga_perolehan" class="form-control"
                        value="{{ $data[0]->harga_perolehan }}" disabled>
                </div>
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Tanggal Mutasi</label>
                    <input type="date" name="tgl_mutasi" class="form-control" value="{{ $data[0]->tgl_mutasi }}"
                        disabled>
                </div>
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Tujuan Mutasi</label>
                    <input type="text" name="tujuan_mutasi" class="form-control"
                        value="{{ $data[0]->tujuan_mutasi }}" disabled>
                </div>
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Nilai Buku</label>
                    <input type="text" name="nilai_buku" class="form-control" value="{{ $data[0]->nilai_buku }}"
                        disabled>
                </div>
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Tanggal Musnah</label>
                    <input type="date" name="tgl_musnah" class="form-control" value="{{ $data[0]->tgl_musnah }}"
                        disabled>
                </div>

                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Kondisi Barang</label>
                    <input type="text" name="kondisi_barang" class="form-control"
                        value="{{ $data[0]->kondisi_barang }}" disabled>
                </div>
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Jam Input</label>
                    <input type="time" name="jam_input" class="form-control" value=""
                        value="{{ $data[0]->jam_input }}" disabled>
                </div>
                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Keterangan Musnah</label>
                    <textarea name="ket_musnah" class="form-control" id="" cols="10" rows="2" disabled>{{ $data[0]->ket_musnah }}</textarea>
                </div>



            </div><!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->

            </div><!-- /.row -->

            <!-- this row will not appear when printing -->
            <hr>
            <div class="row no-print">
                <div class="col-lg-3">
                    {{-- <a href="javascript:window.print();" target="_blank" class="btn btn-dark m-1"><i
                                    class="fa fa-print"></i> Print Barcode</a> --}}
                </div>
                <div class="col-lg-9">
                    <div class="float-sm-right">
                        {{-- <button class="btn btn-success m-1"><i class="fa fa-credit-card"></i> Submit
                                    Payment</button> --}}
                        <a href="javascript:window.print();" target="_blank" class="btn btn-dark m-1"><i
                                class="fa fa-print"></i> Print Barcode</a>
                    </div>
                </div>
            </div>
        </section>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-header border-0">
                        Recent Peminjaman
                        <div class="card-action">
                            <div class="dropdown">
                                <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret"
                                    data-toggle="dropdown">
                                    <i class="icon-options"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="javascript:void();">Action</a>
                                    <a class="dropdown-item" href="javascript:void();">Another action</a>
                                    <a class="dropdown-item" href="javascript:void();">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void();">Separated link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Product</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Completion</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img alt="Image placeholder" src="https://via.placeholder.com/110x110"
                                            class="product-img" />
                                    </td>
                                    <td>Headphone GL</td>
                                    <td>$1,840 USD</td>
                                    <td>
                                        <span class="badge-dot">
                                            <i class="bg-danger"></i> pending
                                        </span>
                                    </td>
                                    <td>
                                        <div class="progress shadow" style="height: 4px">
                                            <div class="progress-bar gradient-ibiza" role="progressbar"
                                                style="width: 60%"></div>
                                        </div>
                                    </td>
                                    <td>10 July 2018</td>
                                </tr>
                                <tr>
                                    <td>
                                        <img alt="Image placeholder" src="https://via.placeholder.com/110x110"
                                            class="product-img" />
                                    </td>
                                    <td>Clasic Shoes</td>
                                    <td>$1,520 USD</td>
                                    <td>
                                        <span class="badge-dot">
                                            <i class="bg-success"></i> completed
                                        </span>
                                    </td>
                                    <td>
                                        <div class="progress shadow" style="height: 4px">
                                            <div class="progress-bar gradient-ohhappiness" role="progressbar"
                                                style="width: 100%"></div>
                                        </div>
                                    </td>
                                    <td>12 July 2018</td>
                                </tr>
                                <tr>
                                    <td>
                                        <img alt="Image placeholder" src="https://via.placeholder.com/110x110"
                                            class="product-img" />
                                    </td>
                                    <td>Hand Watch</td>
                                    <td>$1,620 USD</td>
                                    <td>
                                        <span class="badge-dot">
                                            <i class="bg-warning"></i> delayed
                                        </span>
                                    </td>
                                    <td>
                                        <div class="progress shadow" style="height: 4px">
                                            <div class="progress-bar gradient-orange" role="progressbar"
                                                style="width: 70%"></div>
                                        </div>
                                    </td>
                                    <td>14 July 2018</td>
                                </tr>
                                <tr>
                                    <td>
                                        <img alt="Image placeholder" src="https://via.placeholder.com/110x110"
                                            class="product-img" />
                                    </td>
                                    <td>Hand Camera</td>
                                    <td>$2,220 USD</td>
                                    <td>
                                        <span class="badge-dot">
                                            <i class="bg-info"></i> on schedule
                                        </span>
                                    </td>
                                    <td>
                                        <div class="progress shadow" style="height: 4px">
                                            <div class="progress-bar gradient-scooter" role="progressbar"
                                                style="width: 85%"></div>
                                        </div>
                                    </td>
                                    <td>16 July 2018</td>
                                </tr>
                                <tr>
                                    <td>
                                        <img alt="Image placeholder" src="https://via.placeholder.com/110x110"
                                            class="product-img" />
                                    </td>
                                    <td>Iphone-X Pro</td>
                                    <td>$9,890 USD</td>
                                    <td>
                                        <span class="badge-dot">
                                            <i class="bg-success"></i> completed
                                        </span>
                                    </td>
                                    <td>
                                        <div class="progress shadow" style="height: 4px">
                                            <div class="progress-bar gradient-ohhappiness" role="progressbar"
                                                style="width: 100%"></div>
                                        </div>
                                    </td>
                                    <td>17 July 2018</td>
                                </tr>
                                <tr>
                                    <td>
                                        <img alt="Image placeholder" src="https://via.placeholder.com/110x110"
                                            class="product-img" />
                                    </td>
                                    <td>Ladies Purse</td>
                                    <td>$3,420 USD</td>
                                    <td>
                                        <span class="badge-dot">
                                            <i class="bg-danger"></i> pending
                                        </span>
                                    </td>
                                    <td>
                                        <div class="progress shadow" style="height: 4px">
                                            <div class="progress-bar gradient-ibiza" role="progressbar"
                                                style="width: 80%"></div>
                                        </div>
                                    </td>
                                    <td>18 July 2018</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
