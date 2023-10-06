<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pramita - {{ auth()->user()->name }}</title>

    <link rel="icon" href="{{ asset('icon.png', []) }}" type="image/x-icon">
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css', []) }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/inputtags/css/bootstrap-tagsinput.css', []) }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/jquery-multi-select/multi-select.css', []) }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('assets/plugins/fancybox/css/jquery.fancybox.min.css', []) }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css', []) }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/plugins/notifications/css/lobibox.min.css', []) }}" />
    <link href="{{ asset('assets/css/animate.css', []) }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.css', []) }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/horizontal-menu.css', []) }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/app-style.css', []) }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css', []) }}"
        rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css', []) }}" rel="stylesheet"
        type="text/css">
    <link
        rel="{{ asset('stylesheet" type="text/css" href="assets/plugins/jquery.steps/css/jquery.steps.css', []) }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/script.js/2.1.1/script.min.js"
        integrity="sha512-oM6Bv767uUJZcy+SqCTP2rkHtKlivWNQ5+PPhhDwkY8FtNj4bq1xvNCB9NB3WkBa1KiY7P5a7/yfSONl5TYSPQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .footerx {
            padding: 5px;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: rgb(255, 255, 255);
            color: rgb(0, 0, 0);
            text-align: center;
            border: 2px solid #2c717f;
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
                padding-left: 50%;
                background-color: #bcc6c1;
                text-align: left;
            }

            td:before {
                content: attr(data-label);
                display: inline-block;
                font-family: 'Orbitron', sans-serif;
                padding-left: 10px;
                line-height: 2.5;
                margin-left: -100%;
                width: 100%;
                white-space: nowrap;
            }
        }

        .styled-table {
            /* position: static; */
            border-collapse: collapse;
            margin: 0px 0;
            font-size: 0.9em;

            width: 100%;
            /* min-width: 400px; */
            box-shadow: 0 0 20px rgba(217, 211, 211, 0.15);

        }

        .styled-table thead tr {
            background-color: #924405;
            color: #ffffff;
            text-align: left;
        }

        @media only screen and (min-width: 760px) {

            .styled-table th,
            .styled-table td {
                padding: 12px 15px;
            }
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #030303;
        }

        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #020202;
        }
    </style>
</head>

<body>

    <div id="wrapper" style="font-family: 'Russo One', sans-serif;">

        <!--Start header-->
        <header class="topbar-nav">
            <nav class="navbar navbar-expand">
                <ul class="navbar-nav mr-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void();">
                            <div class="media align-items-center">
                                <img src="{{ asset('anim.gif', []) }}" class="logo" alt="logo icon" width="200">
                                <div class="media-body">
                                    {{-- <h5 class="logo-text">APP-Serve</h5> --}}
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <form class="search-bar">
                            {{-- <input type="text" class="form-control" placeholder="Enter keywords"> --}}
                            {{-- <a href="javascript:void();"><i class="icon-magnifier"></i></a> --}}
                        </form>
                    </li>
                </ul>

                <ul class="navbar-nav align-items-center right-nav-link">

                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown"
                            href="#">
                            <span class="user-profile"><img src="{{ asset('icon.png', []) }}" class="img-circle"
                                    alt="user avatar"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item user-details">
                                <a href="javaScript:void();">
                                    <div class="media">
                                        <div class="avatar"><img class="align-self-start mr-3"
                                                src="{{ asset('icon.png', []) }}" alt="user avatar"></div>
                                        <div class="media-body">
                                            <h6 class="mt-2 user-title">{{ auth()->user()->name }}</h6>
                                            <p class="user-subtitle">{{ auth()->user()->name }}</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            {{-- <li class="dropdown-item"><i class="icon-envelope mr-2"></i> Inbox</li> --}}
                            <li class="dropdown-divider"></li>
                            {{-- <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li> --}}
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item" style="cursor: pointer;" data-toggle="modal"
                                data-target="#settingmodal"><i class="icon-settings mr-2"></i>
                                Setting</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item"><i class="icon-power mr-2"></i><a href="http://"
                                    onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>
        <!--End header-->

        <!-- Awal Menu -->
        <nav>
            <!-- Menu Toggle btn-->
            <div class="menu-toggle">
                <h3>Pramita Inventaris</h3>
                <button type="button" id="menu-btn">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <ul id="respMenu" class="horizontal-menu" style="font-family: 'Russo One', sans-serif;">

                <li>
                    <a href="javascript:;">
                        <i class="zmdi zmdi-view-dashboard" aria-hidden="true"></i>
                        <span class="title">Dashboard</span>
                        <span class="arrow"></span>
                    </a>
                    <!-- Level Two-->
                    <ul>
                        <li><a href="{{ asset('/', []) }}"><i class="zmdi zmdi-dot-circle-alt"></i> Home</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                        <span class="title">Menu</span>
                        <span class="arrow"></span>
                    </a>
                    <!-- Level Two-->
                    <ul>
                        @if (auth()->user()->akses == 'sdm')
                            <li><a href="{{ asset('menu/formpinjam', []) }}"><i class="zmdi zmdi-dot-circle-alt"></i>
                                    Menu Peminjaman</a></li>
                            <li><a href="{{ asset('menu/formmaintenance', []) }}"><i
                                        class="zmdi zmdi-dot-circle-alt"></i> Menu Maintenance</a></li>
                            <li><a href="{{ asset('menu/formmutasi', []) }}"><i class="zmdi zmdi-dot-circle-alt"></i>
                                    Menu Mutasi</a></li>
                            <li><a href="{{ asset('menu/formpemusnahan', []) }}"><i
                                        class="zmdi zmdi-dot-circle-alt"></i> Menu Pemusnahan</a></li>
                            <li><a href="{{ asset('menu/verifdatainventaris', []) }}"><i
                                        class="zmdi zmdi-dot-circle-alt"></i> Menu Stock Opname</a></li>
                            <li><a href="{{ asset('menu/formdepresiasi', []) }}"><i
                                        class="zmdi zmdi-dot-circle-alt"></i> Menu Aset</a></li>
                        @elseif(auth()->user()->akses == 'admin')

                        @endif
                    </ul>
                </li>

                <li>
                    <a href="javascript:;">
                        <i class="zmdi zmdi-layers"></i>
                        <span class="title">Master Data</span>
                        <span class="arrow"></span>

                    </a>
                    <!-- Level Two-->
                    <ul>
                        @if (auth()->user()->akses == 'sdm')
                            <li><a href="{{ asset('menu/masterlokasi', []) }}"><i
                                        class="zmdi zmdi-dot-circle-alt"></i>
                                    Master Lokasi</a></li>
                            <li><a href="{{ asset('menu/masterbarang', []) }}"><i
                                        class="zmdi zmdi-dot-circle-alt"></i>
                                    Master Barang</a></li>
                            <li><a href="{{ asset('menu/masterstaff', []) }}"><i
                                        class="zmdi zmdi-dot-circle-alt"></i>
                                    Master Staff</a></li>
                        @elseif(auth()->user()->akses == 'keu')
                            <li><a href="{{ asset('formsdm', []) }}"><i class="zmdi zmdi-dot-circle-alt"></i> Form
                                    Keuangan</a></li>
                        @elseif(auth()->user()->akses == 'admin')
                            <li><a href="{{ asset('masteradmin', []) }}"><i class="zmdi zmdi-dot-circle-alt"></i> Master Admin</a></li>
                            {{-- <li><a href="{{ asset('datamutasi', []) }}"><i class="zmdi zmdi-dot-circle-alt"></i> Form
                                    Mutasi</a></li>
                            <li><a href="{{ asset('datapemusnahan', []) }}"><i class="zmdi zmdi-dot-circle-alt"></i>
                                    Form
                                    Pemusnahan</a></li> --}}
                        @endif


                    </ul>
                </li>

                <li>
                    <a class="" href="javascript:;">
                        <i class="zmdi zmdi-receipt"></i>
                        <span class="title">Faq</span>
                        <span class="arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ asset('faq', []) }}"><i class="zmdi zmdi-dot-circle-alt"></i> FAQ</a>
                        </li>
                        {{-- <li><a href="{{ asset('formulir', []) }}"><i class="zmdi zmdi-dot-circle-alt"></i> Form</a>
                        </li>
                        <li><a href="{{ asset('formulir1', []) }}"><i class="zmdi zmdi-dot-circle-alt"></i> Form 1</a>
                        </li>
                        <li><a href="{{ asset('formulir2', []) }}"><i class="zmdi zmdi-dot-circle-alt"></i> Form 2</a>
                        </li> --}}

                    </ul>
                </li>

            </ul>
        </nav>
        <!-- End Menu -->
        <div class="clearfix"></div>

        <div class="content-wrapper">
            @if ($message = Session::get('sukses'))
                <button class="btn btn-warning" onclick="sukses_notifikasi()" id="buttonnotif" hidden>SHOW
                    ME</button>
                <script>
                    function sukses_notifikasi() {
                        Lobibox.notify('success', {
                            pauseDelayOnHover: true,
                            continueDelayOnInactiveTab: false,
                            position: 'center top',
                            showClass: 'zoomIn',
                            hideClass: 'zoomOut',
                            icon: 'fa fa-check-circle',
                            width: 400,
                            msg: '{{ $message }}'
                        });
                    }
                    $(document).ready(function() {
                        $('#buttonnotif').click();
                    });
                </script>
            @elseif ($message = Session::get('gagal'))
                <button class="btn btn-warning" onclick="gagal_notifikasi()" id="buttongagal" hidden>SHOW ME</button>
                <script>
                    function gagal_notifikasi() {
                        Lobibox.notify('warning', {
                            pauseDelayOnHover: true,
                            continueDelayOnInactiveTab: false,
                            position: 'center top',
                            showClass: 'zoomIn',
                            hideClass: 'zoomOut',
                            icon: 'fa fa-exclamation-triangle',
                            width: 400,
                            msg: '{{ $message }}'
                        });
                    }
                    $(document).ready(function() {
                        $('#buttongagal').click();
                    });
                </script>
            @endif
            @yield('content')


        </div>
        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->

        <!--awal footer-->
        <footer class="footerx">
            <div class="container">
                <div class="text-center">
                    Copyright © 2022
                </div>
            </div>
        </footer>
        <!--end footer-->

        <!--start color switcher-->
        <div class="right-sidebar">

            <div class="right-sidebar-content">


                <p class="mb-0">Header Colors</p>
                <hr>

                <div class="mb-3">
                    <button type="button" id="default-header" class="btn btn-outline-primary">Default
                        Header</button>
                </div>

                <ul class="switcher">
                    <li id="header1"></li>
                    <li id="header2"></li>
                    <li id="header3"></li>
                    <li id="header4"></li>
                    <li id="header5"></li>
                    <li id="header6"></li>
                </ul>

                <p class="mb-0">Sidebar Colors</p>
                <hr>

                <div class="mb-3">
                    <button type="button" id="default-sidebar" class="btn btn-outline-primary">Default
                        Header</button>
                </div>

                <ul class="switcher">
                    <li id="theme1"></li>
                    <li id="theme2"></li>
                    <li id="theme3"></li>
                    <li id="theme4"></li>
                    <li id="theme5"></li>
                    <li id="theme6"></li>
                </ul>

            </div>
        </div>
        <!--end color switcher-->

    </div>
    <!--End wrapper-->

    @if (auth()->user()->akses == 'sdm')
        @php
            $settingno = DB::table('tbl_setting_cabang')
                ->join('tbl_cabang', 'tbl_cabang.kd_cabang', '=', 'tbl_setting_cabang.kd_cabang')
                ->where('tbl_cabang.kd_cabang', auth()->user()->cabang)
                ->get();
            $settingttd = DB::table('tbl_ttd')
                ->where('kd_cabang', auth()->user()->cabang)
                ->get();
        @endphp
        <div class="modal fade" id="settingmodal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Setup System</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ asset('divisi/setting/system', []) }}"
                            enctype="multipart/form-data">
                            @csrf

                            @if ($settingno->isEmpty())
                                <div class="form-group">
                                    <label for="input-3">Nomor Cabang</label>
                                    <input type="text" class="form-control" name="no_cabang" required>
                                </div>
                                <div class="form-group">
                                    <label for="input-3">Nama 1</label>
                                    <input type="text" class="form-control" name="nama_1" required>
                                </div>
                                <div class="form-group">
                                    <label for="input-3">Nama 2</label>
                                    <input type="text" class="form-control" name="nama_2" required>
                                </div>
                                <div class="form-group">
                                    <label for="input-3">Nama 3</label>
                                    <input type="text" class="form-control" name="nama_3" required>
                                </div>
                            @else
                                <div class="form-group">
                                    <label for="input-2">Kode Cabang</label>
                                    <input type="text" class="form-control" id="input-2"
                                        value="{{ $settingno[0]->kd_cabang }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="input-3">Nomor Cabang</label>
                                    <input type="text" class="form-control" name="no_cabang"
                                        value="{{ $settingno[0]->no_cabang }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="input-3">Nama 1</label>
                                    <input type="text" class="form-control" name="nama_1"
                                        value="{{ $settingttd[0]->ttd_1 }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="input-3">Nama 2</label>
                                    <input type="text" class="form-control" name="nama_2"
                                        value="{{ $settingttd[0]->ttd_2 }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="input-3">Nama 3</label>
                                    <input type="text" class="form-control" name="nama_3"
                                        value="{{ $settingttd[0]->ttd_3 }}" required>
                                </div>
                            @endif

                            <div class="form-group">
                                <div class="icheck-material-danger">
                                    <input type="checkbox" id="user-checkbox1">
                                    <label for="user-checkbox1">Remember me</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary px-5"><i class="icon-lock"></i>
                                    Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- Bootstrap core JavaScript-->




    <script src="{{ asset('assets/js/popper.min.js', []) }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js', []) }}"></script>
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.js', []) }}"></script>
    <script src="{{ asset('assets/js/horizontal-menu.js', []) }}"></script>
    <script src="{{ asset('assets/js/app-script.js', []) }}"></script>
    <script src="{{ asset('assets/plugins/Chart.js/Chart.min.js', []) }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js', []) }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js', []) }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js', []) }}"></script>
    <script src="{{ asset('assets/plugins/jquery.steps/js/jquery.steps.min.js', []) }}"></script>
    <script src="{{ asset('assets/plugins/jquery-validation/js/jquery.validate.min.js', []) }}"></script>
    <script src="{{ asset('assets/plugins/jquery.steps/js/jquery.wizard-init.js', []) }}"></script>
    <script src="{{ asset('assets/plugins/fancybox/js/jquery.fancybox.min.js', []) }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js', []) }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-touchspin/js/bootstrap-touchspin-script.js', []) }}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js', []) }}"></script>
    <script src="{{ asset('assets/plugins/inputtags/js/bootstrap-tagsinput.js', []) }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js', []) }}"></script>
    <script>
        $('#default-datepicker').datepicker({
            todayHighlight: true
        });
        $('#autoclose-datepicker').datepicker({
            autoclose: true,
            todayHighlight: true
        });

        $('#inline-datepicker').datepicker({
            todayHighlight: true
        });

        $('#dateragne-picker .input-daterange').datepicker({});
    </script>
    <script src="{{ asset('assets/plugins/jquery-multi-select/jquery.multi-select.js', []) }}"></script>
    <script src="{{ asset('assets/plugins/jquery-multi-select/jquery.quicksearch.js', []) }}"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js', []) }}"></script>
    <script src="{{ asset('assets/plugins/notifications/js/lobibox.min.js', []) }}"></script>
    <script src="{{ asset('assets/plugins/notifications/js/notifications.min.js', []) }}"></script>
    <script src="{{ asset('assets/plugins/notifications/js/notification-custom-script.js', []) }}"></script>

    <script src="{{ asset('js/scriptx.js', []) }}"></script>
    <script src="{{ asset('js/admin.js', []) }}"></script>
    <script src="{{ asset('js/master.js', []) }}"></script>
    <script>
        $(document).ready(function() {
            $('.single-select').select2();
            $('.single-selectkode').select2();
            $('.single-selectlokasi').select2();
            $('.single-selectlokasi1').select2();
            $('.multiple-select').select2();

            //multiselect start

            $('#my_multi_select1').multiSelect();
            $('#my_multi_select2').multiSelect({
                selectableOptgroup: true
            });

            $('#my_multi_select3').multiSelect({
                selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                afterInit: function(ms) {
                    var that = this,
                        $selectableSearch = that.$selectableUl.prev(),
                        $selectionSearch = that.$selectionUl.prev(),
                        selectableSearchString = '#' + that.$container.attr('id') +
                        ' .ms-elem-selectable:not(.ms-selected)',
                        selectionSearchString = '#' + that.$container.attr('id') +
                        ' .ms-elem-selection.ms-selected';

                    that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                        .on('keydown', function(e) {
                            if (e.which === 40) {
                                that.$selectableUl.focus();
                                return false;
                            }
                        });

                    that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                        .on('keydown', function(e) {
                            if (e.which == 40) {
                                that.$selectionUl.focus();
                                return false;
                            }
                        });
                },
                afterSelect: function() {
                    this.qs1.cache();
                    this.qs2.cache();
                },
                afterDeselect: function() {
                    this.qs1.cache();
                    this.qs2.cache();
                }
            });

            $('.custom-header').multiSelect({
                selectableHeader: "<div class='custom-header'>Selectable items</div>",
                selectionHeader: "<div class='custom-header'>Selection items</div>",
                selectableFooter: "<div class='custom-header'>Selectable footer</div>",
                selectionFooter: "<div class='custom-header'>Selection footer</div>"
            });


        });
    </script>
    <script>
        $(document).ready(function() {
            //Default data table
            $('#default-datatable').DataTable();
            $('#default-asd').DataTable();
            $('#default-table1').DataTable();
            $('#default-datatablesubbarang').DataTable();


            var table = $('#example').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
            });

            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');

        });
    </script>



</body>

</html>
