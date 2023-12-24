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
                    <label for="">Nomor Inventaris</label>
                    <input type="text" class="form-control" value="{{ $data[0]->id_inventaris }}/{{ $data[0]->kd_inventaris }}/{{ $data[0]->kd_lokasi }}/{{ $data[0]->kd_cabang }}/{{ $data[0]->th_perolehan }}" disabled>
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

        </section>

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-header border-0">
                        Recent Peminjaman

                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead>
                                <tr>
                                    <th>Photo</th>

                                    <th>No Tiket</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Penanggung Jawab</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img alt="Image placeholder" src="https://via.placeholder.com/110x110"
                                            class="product-img" />
                                    </td>

                                    <td>P-1231939128</td>
                                    <td>
                                        Seminar A
                                    </td>
                                    <td>
                                        Nadzar
                                    </td>
                                    <td>28-04-2023 09:02:11</td>
                                </tr>
                                <tr>
                                    <td>
                                        <img alt="Image placeholder" src="https://via.placeholder.com/110x110"
                                            class="product-img" />
                                    </td>

                                    <td>P-1231923134</td>
                                    <td>
                                        Seminar A
                                    </td>
                                    <td>
                                        Dani
                                    </td>
                                    <td>28-05-2023 09:02:11</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-header border-0">
                        Recent Maintenance

                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>No Tiket</th>
                                    <th>Pelapor</th>
                                    <th>Keterangan</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img alt="Image placeholder" src="https://via.placeholder.com/110x110"
                                            class="product-img" />
                                    </td>

                                    <td>m-1231939128S</td>
                                    <td>
                                        Nadzar
                                    </td>
                                    <td>
                                        Perlu Berbaikan Pada batrai
                                    </td>
                                    <td>28-04-2023 09:02:11</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
