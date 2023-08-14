<script src="{{ url('assets/plugins/select2/js/select2.min.js', []) }}"></script>
<style>
    input[type="file"] {
        display: none;
    }
</style>


<form method="POST" action="#" enctype="multipart/form-data" id="form-tambah-barang-aset">
    @csrf
    <div class="body" id="showdatabarang">
        <div class="card-body">
            <div class="row g-2">
                <div class="col-md-4 text-center">
                    {{-- <input type="file" accept="image/*" onchange="loadFile(event)"> --}}


                    <input id="link" type="text" name="link" class="form-control" hidden>
                    <a href="https://via.placeholder.com/1920x1080" data-fancybox="images" data-caption="">
                        <img src="https://via.placeholder.com/800x500" alt="lightbox"
                            class="lightbox-thumb img-thumbnail" id="videoPreview" width="50" height="50">
                    </a>



                </div>
                <div class="col-md-4 ">
                    <label for="inputPassword4" class="form-label">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" id="inputPassword4"
                        value="{{ $datainventaris->nama_barang }}" disabled>
                    <label for="inputPassword4" class="form-label">Harga Perolehan</label>
                    <input type="text" name="harga_perolehan" class="form-control" value="@currency($datainventaris->harga_perolehan)"
                        disabled>
                    <label for="inputPassword4" class="form-label">Nomor Serial</label>
                    <input type="text" name="no_seri" class="form-control" value="">
                    <label for="inputPassword4" class="form-label">Tanggal Beli</label>
                    <input type="text" name="tgl_beli" class="form-control" id="tgl_beli"
                        value="{{ $datainventaris->tgl_beli }}" disabled>
                    <input type="text" name="kondisi_barang" class="form-control" value="BAIK" hidden>
                    <label for="inputPassword4" class="form-label">Supplier</label>
                    <input type="text" name="suplier" class="form-control" value="">
                </div>
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Kode Cabang</label>
                    <input type="text" name="kd_cabang" class="form-control" id="inputPassword4"
                        value="{{ auth::user()->cabang }}" hidden>
                    <input type="text" name="kd_cabang" class="form-control" id="inputPassword4"
                        value="{{ auth::user()->cabang }}" disabled>
                    <label for="inputPassword4" class="form-label">Tahun Perolehan</label>
                    <input type="text" name="th_perolehan" class="form-control"
                        value="{{ $datainventaris->th_perolehan }}">

                    <input type="text" name="harga_perolehan" class="form-control" id="harga_perolehan"
                        value="{{ $datainventaris->harga_perolehan }}" hidden>
                    <label for="inputPassword4" class="form-label">Merek</label>
                    <input type="text" name="merk" class="form-control" value="">
                    <label for="inputPassword4" class="form-label">Type Barang</label>
                    <input type="text" name="type" class="form-control" value="">
                    <label for="inputPassword4" class="form-label">Nomor Serial</label>
                    <input type="text" name="no_seri" class="form-control" value="">
                </div>
                {{-- <div class="col-md-12 pt-2">
                    <label for="inputEmail4" class="form-label">Masa Depresiasi</label>
                    <select class="form-control single-select" name="kd_inventaris"
                        onchange="getDataOptiondepresiasi();" id="dataaset" required>
                        <option value="">Pilih Masa Depresiasi</option>
                        @foreach ($datadepresiasi as $datadepresiasi)
                            <option value="{{ $datadepresiasi->kd_depresiasi }}">
                                {{ $datadepresiasi->klasifikasi_aset }} ( {{ $datadepresiasi->harga_perolhean }} ) (
                                {{ $datadepresiasi->masa_depresiasi }} )
                            </option>
                        @endforeach
                    </select>
                </div> --}}

            </div>
        </div>
        <div class="card-body">
            @php
                $cekdatadepresiasi = DB::table('tbl_depresiasi_aset')
                    ->where('id_inventaris', $datainventaris->id_inventaris)
                    ->first();
            @endphp
            @if ($cekdatadepresiasi)
                @php
                    $cekdepresiasi = DB::table('tbl_depresiasi_aset')
                    ->join('tbl_depresiasi','tbl_depresiasi.kd_depresiasi','=','tbl_depresiasi_aset.kd_depresiasi')
                    ->where('id_inventaris', $datainventaris->id_inventaris)->first();
                    $harga = $datainventaris->harga_perolehan;
                    $fixharga = $harga;

                    $datadepresiasi = DB::table('tbl_depresiasi')
                        ->where('kd_depresiasi', $cekdepresiasi->kd_depresiasi)
                        ->first();
                    $pengurangan = $harga / ($cekdepresiasi->masa * 12);
                    for ($i = 0; $i < $cekdepresiasi->masa * 12; $i++) {
                        $data[$i] = date('d - M - Y', strtotime('+' . $i . ' month', strtotime($datainventaris->tgl_beli)));
                    }
                    for ($i = 0; $i < $cekdepresiasi->masa * 12; $i++) {
                        $hargaperolehan[$i] = $fixharga;
                        $fixharga = $fixharga - $pengurangan;
                    }
                    $persen = ($pengurangan / $harga) * 100;
                @endphp
                <div class="card">
                    <div class="card-header text-uppercase">Grafik</div>
                    <div class="card-body">

                        <p class="sr-only">List Subscribers</p>
                        <div id="list-subscribers"></div>

                    </div>
                    <div class="table-responsive pb-3" style="letter-spacing: .0px;">
                        <table id="table-depresiasi" class="styled-table ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bulan</th>
                                    <th>Persentase Penyusutan</th>
                                    <th>Depresiasi</th>
                                    <th>Nilai Buku</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @for ($i = 0; $i < $datadepresiasi->masa * 12; $i++)
                                    <tr>
                                        <td>{{ $no++ }}</td>

                                        <td>{{ $data[$i] }}</td>
                                        <td>{{ substr($persen, 0, 4) }} %</td>
                                        <td>@currency($pengurangan)</td>
                                        <td>@currency($hargaperolehan[$i])</td>

                                    </tr>
                                @endfor
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>@php
                                        echo date('d - M - Y', strtotime('+1 month', strtotime($data[$datadepresiasi->masa * 12 - 1])));
                                    @endphp</td>
                                    <td>{{ substr($persen, 0, 4) }} %</td>
                                    <td>@currency($pengurangan - 1)</td>
                                    <td>@currency(1)</td>

                                </tr>
                                {{-- @foreach ($data as $itemx)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $itemx }}</td>
                                    <td>1</td>
                                    <td class="text-center"><button class="btn-dark"><i class="fa fa-eye"></i></button></td>
                                </tr>
                            @endforeach --}}
                            </tbody>

                        </table>
                    </div>
                </div>
            @else
                Masa Depresiasi Belum dipilih
            @endif

        </div>
    </div>



</form>
<script src="{{ asset('assets/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/plugins/alerts-boxes/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/plugins/alerts-boxes/js/sweet-alert-script.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.single-select').select2();
    });
</script>

<script>
    $(document).ready(function() {
        $('.single-select').select2();

    });
</script>



@if ($cekdatadepresiasi)
    <script src="{{ url('assets/plugins/apexcharts/apexcharts.js', []) }}"></script>
    <script>
        $(function() {
            "use strict";

            // chart 5

            var options = {
                chart: {
                    height: 200,
                    type: 'area',
                    zoom: {
                        enabled: false
                    },
                    foreColor: '#4e4e4e',
                    toolbar: {
                        show: true
                    },
                    sparkline: {
                        enabled: false,
                    },
                    dropShadow: {
                        enabled: false,
                        opacity: 0.15,
                        blur: 3,
                        left: -2,
                        top: 15,
                        //color: 'rgba(0, 158, 253, 0.65)',
                    }
                },
                plotOptions: {
                    bar: {
                        columnWidth: '50%',
                        endingShape: 'rounded',
                        dataLabels: {
                            position: 'top', // top, center, bottom
                        },
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: 0,
                    curve: 'smooth'
                },
                series: [{
                    name: 'Harga Penyusutan',
                    data: [
                        @foreach ($hargaperolehan as $hargaperolehan)
                            "{{ $hargaperolehan }}",
                        @endforeach
                    ]
                }],

                xaxis: {
                    type: 'month',
                    categories: [
                        @foreach ($data as $item)
                            "{{ substr($item, 5, 10) }}",
                        @endforeach


                    ],
                },
                yaxis: {
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false,
                    },
                    labels: {
                        show: false,
                        formatter: function(val) {
                            var harga = parseInt(val);
                            var reverse = harga.toString().split('').reverse().join(''),
                                ribuan = reverse.match(/\d{1,3}/g);
                            ribuan = ribuan.join('.').split('').reverse().join('');
                            return "Rp. " + ribuan + " ,-";
                        }
                    }

                },

                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'light',
                        gradientToColors: ['#ee0979'],
                        shadeIntensity: 1,
                        type: 'horizontal',
                        opacityFrom: 4,
                        opacityTo: 1,
                        stops: [0, 100, 100, 100]
                    },
                },
                colors: ['#ff6a00'],
                grid: {
                    show: true,
                    borderColor: 'rgba(66, 59, 116, 0.15)',
                },
                tooltip: {
                    theme: 'dark',
                    x: {
                        show: true
                    },

                },
                title: {
                    text: '{{$datainventaris->nama_barang}}'
                }
            }

            var chart = new ApexCharts(
                document.querySelector("#list-subscribers"),
                options
            );

            chart.render();

        });
    </script>
@endif
