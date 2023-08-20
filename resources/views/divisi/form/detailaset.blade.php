<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        {{-- <h4 class="page-title">Form SDM & Umum</h4> --}}
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">Master Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Menu Depresiasi</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h3>
                        Detail Aset : NAMA BARANG
                        <small>#007612</small>
                    </h3>
                </section>

                <!-- Main content -->
                <section class="invoice">
                    <!-- title row -->
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <h4><i class="fa fa-globe"></i> Company Name</h4>
                        </div>
                        <div class="col-lg-6">
                            <h5 class="float-sm-right">Date: 2/10/2014</h5>
                        </div>
                    </div>

                    <hr />
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            From
                            <address>
                                <strong>Kudiland Inc</strong><br />
                                543 suthpark drive<br />
                                Boston, MA 94107<br />
                                Phone: (555) 539-1444<br />
                                Email: info@example.com
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <strong>Sandra Mekoya</strong><br />
                                543 suthpark drive<br />
                                Boston, MA 94107<br />
                                Phone: (555) 539-1444<br />
                                Email: support@example.com
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>

                            </b><br />
                            <br />
                            <b>Order ID:</b> 4F3S8J<br />
                            <b>Payment Due:</b> 2/22/2014<br />
                            <b>Account:</b> 968-34567
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            @php
                                $cekdatadepresiasi = DB::table('tbl_depresiasi_aset')
                                    ->where('id_inventaris', $datainventaris->id_inventaris)
                                    ->first();
                            @endphp
                            @if ($cekdatadepresiasi)
                                @php
                                    $cekdepresiasi = DB::table('tbl_depresiasi_aset')
                                        ->join('tbl_depresiasi', 'tbl_depresiasi.kd_depresiasi', '=', 'tbl_depresiasi_aset.kd_depresiasi')
                                        ->where('id_inventaris', $datainventaris->id_inventaris)
                                        ->first();
                                    $cekmaintenance = DB::table('tbl_maintenance_aset')->where('id_inventaris',$datainventaris->id_inventaris)->get();
                                    $jumlahmaintenance = DB::table('tbl_maintenance_aset')->where('id_inventaris',$datainventaris->id_inventaris)->count();
                                    for ($j=0; $j < $jumlahmaintenance; $j++) {
                                        $date1[$j] = date_create($datainventaris->tgl_beli);
                                        $date2[$j] = date_create($cekmaintenance[$j]->tgl_maintenance);
                                        $interval[$j] = date_diff($date1[$j], $date2[$j]);
                                        $bulanmaintenance[$j] = ($interval[$j]->y*12)+($interval[$j]->m);
                                        $penyusutanmaintenance[$j] = $cekmaintenance[$j]->harga_maintenance / (($cekdepresiasi->masa * 12) - $bulanmaintenance[$j]);
                                        $fixhargamaintenance[$j] = $cekmaintenance[$j]->harga_maintenance;
                                    }
                                    // dd($bulanmaintenance[0] - $bulanmaintenance[1]);
                                    $harga = $datainventaris->harga_perolehan;
                                    $fixharga = $harga;
                                    // dd($cekdepresiasi);
                                    $datadepresiasi = DB::table('tbl_depresiasi')
                                        ->where('kd_depresiasi', $cekdepresiasi->kd_depresiasi)
                                        ->first();
                                    $pengurangan = $harga / ($cekdepresiasi->masa * 12);

                                    for ($i = 0; $i < $cekdepresiasi->masa * 12; $i++) {
                                        $data[$i] = date('d - M - Y', strtotime('+' . ($i+1) . ' month', strtotime($datainventaris->tgl_beli)));
                                    }

                                    if ($jumlahmaintenance == 0) {
                                                for ($i = 0; $i < $cekdepresiasi->masa * 12; $i++) {

                                                        $hargaperolehan[$i] = $fixharga;
                                                        $fixharga = $fixharga - $pengurangan;
                                                }
                                    } else {
                                            for ($k=0; $k < $jumlahmaintenance; $k++) {
                                                for ($i = 0; $i < $cekdepresiasi->masa * 12; $i++) {
                                                    if ($i < $bulanmaintenance[$k]) {
                                                        $depresiasi[$k][$i] = 0;
                                                        $hargamaintenance[$k][$i] = 0;
                                                        $hargaperolehan[$i] = $fixharga;
                                                        $fixharga = $fixharga - $pengurangan;
                                                    } else {
                                                        $depresiasi[$k][$i] = $penyusutanmaintenance[$k];
                                                        $hargaperolehan[$i] = $fixharga;
                                                        $fixharga = $fixharga - $pengurangan ;
                                                        $hargamaintenance[$k][$i] = $fixhargamaintenance[$k];
                                                        $fixhargamaintenance[$k] = $fixhargamaintenance[$k]  - $penyusutanmaintenance[$k];
                                                    }


                                                }
                                                $fixharga = $harga;
                                            }
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
                                        <table id="table-depresiasi" class="styled-table " border="1">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Bulan</th>
                                                    <th>Depresiasi</th>
                                                    @for ($l = 0; $l < $jumlahmaintenance; $l++)
                                                    <th>Maintenance {{$l+1}}</th>
                                                    @endfor

                                                    <th>Nilai Buku</th>
                                                    @for ($l = 0; $l < $jumlahmaintenance; $l++)
                                                    <th>NB Maintenance {{$l+1}}</th>
                                                    @endfor
                                                    <th>Jumlah Nilai Buku</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;

                                                @endphp
                                                @for ($i = 0; $i < $datadepresiasi->masa * 12; $i++)
                                                @php
                                                    $nilaibukumaintenance[$i] = 0;
                                                @endphp
                                                    <tr>
                                                        <td>{{ $no++ }}</td>

                                                        <td>{{ date('t - M - Y', strtotime($data[$i] ))}}</td>


                                                        <td>@currency($pengurangan)</td>

                                                        @for ($l = 0; $l < $jumlahmaintenance; $l++)
                                                        <td>@currency($depresiasi[$l][$i])</td>
                                                        @endfor

                                                        <td>@currency($hargaperolehan[$i])</td>

                                                        @for ($l = 0; $l < $jumlahmaintenance; $l++)
                                                        <td>@currency($hargamaintenance[$l][$i])</td>
                                                        @php
                                                            $nilaibukumaintenance[$i] = $hargamaintenance[$l][$i] + $nilaibukumaintenance[$i];
                                                        @endphp
                                                        @endfor

                                                        <td>@currency($hargaperolehan[$i]+$nilaibukumaintenance[$i])</td>
                                                    </tr>
                                                    @php
                                                        $nilaibukumaintenance[$i] = 0;
                                                    @endphp
                                                @endfor
                                                {{-- <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>@php
                                                        echo date('t - M - Y', strtotime('+1 month', strtotime($data[$datadepresiasi->masa * 12 - 1])));
                                                    @endphp</td>
                                                    <td>{{ substr($persen, 0, 4) }} %</td>
                                                    <td>@currency($pengurangan - 1)</td>
                                                    <td>@currency(1)</td>

                                                </tr> --}}

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            @else
                                Masa Depresiasi Belum dipilih
                            @endif

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-lg-6 payment-icons">
                            <p class="lead">Payment Methods:</p>
                            <img src="assets/images/payment-icons/visa-dark.png" alt="Visa" />
                            <img src="assets/images/payment-icons/mastro-dark.png" alt="Mastercard" />
                            <img src="assets/images/payment-icons/american-dark.png" alt="American Express" />
                            <img src="assets/images/payment-icons/paypal-dark.png" alt="Paypal" />
                            <p class="bg-light p-2 mt-3 rounded">
                                Etsy doostang zoodles disqus groupon greplin oooj voxy
                                zoodles, weebly ning heekya handango imeem plugg dopplr
                                jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                            </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-lg-6">
                            <p class="lead">Amount Due 2/22/2014</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th style="width: 50%">Subtotal:</th>
                                            <td>$250.30</td>
                                        </tr>
                                        <tr>
                                            <th>Tax (9.3%)</th>
                                            <td>$10.34</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping:</th>
                                            <td>$5.80</td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td>$265.24</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <hr />
                    <div class="row no-print">
                        <div class="col-lg-3">
                            <a href="javascript:window.print();" target="_blank" class="btn btn-dark m-1"><i
                                    class="fa fa-print"></i>

                                </a>
                        </div>
                        <div class="col-lg-9">
                            <div class="float-sm-right">
                                <button class="btn btn-success m-1">
                                    <i class="fa fa-credit-card"></i> Submit Payment
                                </button>
                                <button class="btn btn-primary m-1">
                                    <i class="fa fa-download"></i> Generate PDF
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.content -->
            </div>
        </div>
    </div>
</div>
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



{{-- @if ($cekdatadepresiasi)
    <script src="{{ url('assets/plugins/apexcharts/apexcharts.js', []) }}"></script>
    <script>
        $(function() {
            "use strict";

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
                    text: '{{ $datainventaris->nama_barang }}'
                }
            }

            var chart = new ApexCharts(
                document.querySelector("#list-subscribers"),
                options
            );

            chart.render();

        });
    </script>
@endif --}}
