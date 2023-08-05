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
                    <th>Pengurangan</th>
                    <th>Penyusutan</th>

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
                        <td>{{substr( $persen, 0, 4) }} %</td>
                        <td>@currency($pengurangan)</td>
                        <td>@currency($hargaperolehan[$i])</td>

                    </tr>
                @endfor
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>@php
                        echo date('d - M - Y', strtotime('+1 month', strtotime($data[$datadepresiasi->masa * 12 - 1])));
                    @endphp</td>
                     <td>{{substr( $persen, 0, 4) }} %</td>
                    <td>@currency($pengurangan)</td>
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
                        return "Rp. " + ribuan +" ,-";
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
                text: 'Penyusutan Data aset'
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#list-subscribers"),
            options
        );

        chart.render();

    });
</script>
<script>
    $(document).ready(function() {
        //Default data table
        $('#table-depresiasi').DataTable();


        var table = $('#example').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
        });

        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');

    });
</script>
