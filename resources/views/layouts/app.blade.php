<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Inventaris APP - {{ auth()->user()->name }}</title>
    <link rel="icon" href="{{ asset('vendor/logo.png', []) }}" type="image/x-icon">
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css', []) }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/inputtags/css/bootstrap-tagsinput.css', []) }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/jquery-multi-select/multi-select.css', []) }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('assets/plugins/fancybox/css/jquery.fancybox.min.css', []) }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css', []) }}" rel="stylesheet" />
    <link href="{{ asset('online/bootstrap.min.css', []) }}" rel="stylesheet" />
    <link href="{{ asset('online/all.min.css', []) }}" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <link href="{{ asset('assets/plugins/notifications/css/lobibox.min.css', []) }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/animate.css', []) }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.css', []) }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/horizontal-menu.css', []) }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/app-style.css', []) }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css', []) }}"
        rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css', []) }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('assets/plugins/jquery.steps/css/jquery.steps.css', []) }}" />
    {{-- <script src="{{ asset('assets/js/jqueryapp.min.js') }}"></script> --}}
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.min.js') }}"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4154628728879232"
        crossorigin="anonymous"></script>
    @if ($message = Session::get('success'))
        <script>
            $(document).ready(function() {
                Lobibox.notify('success', {
                    pauseDelayOnHover: true,
                    icon: 'fa fa-info-circle',
                    continueDelayOnInactiveTab: false,
                    position: 'center top',
                    showClass: 'bounceIn',
                    hideClass: 'bounceOut',
                    sound: false,
                    width: 400,
                    msg: '{{ $message }}'
                });
            });
        </script>
    @elseif($message = Session::get('error'))
        <script>
            $(document).ready(function() {
                Lobibox.notify('error', {
                    pauseDelayOnHover: true,
                    icon: 'fa fa-info-circle',
                    continueDelayOnInactiveTab: false,
                    position: 'center top',
                    showClass: 'bounceIn',
                    hideClass: 'bounceOut',
                    sound: false,
                    width: 400,
                    msg: 'Hubungi Administrator Jika terjadi Eror'
                });
            });
        </script>
    @endif
</head>

<body>

    <div id="wrapper">

        <!--Start header-->
        <header class="topbar-nav">
            <nav class="navbar navbar-expand">
                <ul class="navbar-nav mr-auto align-items-left">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void();">
                            <div class="media align-items-center">
                                <img src="{{ asset('vendor/new-anim.gif', []) }}" class="logo" alt="logo icon"
                                    width="200">
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
                @php
                    $orderdata = DB::table('tbl_pemnijaman_req')
                        ->where('cabang_req', Auth::user()->cabang)
                        ->where('status_req', 0)
                        ->count();
                @endphp
                <ul class="navbar-nav align-items-center right-nav-link">

                    <li class="nav-item dropdown-lg">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown"
                            href="javascript:void();">
                            <i class="fa fa-bell-o"></i><span
                                class="badge badge-info badge-up">{{ $orderdata }}</span></a>
                        <div class="">
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    You have 0 Notifications
                                    <span class="badge badge-info">0</span>
                                </li>
                                <li class="list-group-item">
                                    <a href="javaScript:void();" data-toggle="modal" data-target="#modal-nav"
                                        id="button-nav-login-user" data-url="{{ url('nav/user-login', []) }}">
                                        <div class="media">
                                            <i class="zmdi zmdi-accounts fa-2x mr-3 text-info"></i>
                                            <div class="media-body">
                                                <h6 class="mt-0 msg-title">History Login User</h6>
                                                <p class="msg-info">{{ Auth::user()->name }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="javaScript:void();" data-toggle="modal" data-target="#modal-nav"
                                        id="button-nav-login-user" data-url="{{ url('nav/user-order', []) }}">
                                        <div class="media">
                                            <i class="zmdi zmdi-coffee fa-2x mr-3 text-warning"></i>
                                            <div class="media-body">
                                                <h6 class="mt-0 msg-title">Order Terbaru</h6>
                                                <p class="msg-info"><span
                                                        class="badge badge-info">{{ $orderdata }} Order</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="javaScript:void();" data-toggle="modal" data-target="#modal-nav">
                                        <div class="media">
                                            <i class="zmdi zmdi-notifications-active fa-2x mr-3 text-danger"></i>
                                            <div class="media-body">
                                                <h6 class="mt-0 msg-title">Update Sistem</h6>
                                                <p class="msg-info">V.2.3</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-group-item text-center">
                                    <a href="javaScript:void();">See All Notifications</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect"
                            data-toggle="dropdown" href="javascript:void();">
                            <span class="user-profile"><img src="{{ asset('profile.png', []) }}" class="img-circle"
                                    alt="user avatar"></span>
                        </a>
                        <div class="">
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="dropdown-item user-details">
                                    <a href="javaScript:void();">
                                        <div class="media">
                                            <div class="avatar"><img class="align-self-start mr-3"
                                                    src="{{ asset('profile.png', []) }}" alt="user avatar"></div>
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
                                <li class="dropdown-item" style="cursor: pointer;"><i class="fa fa-telegram mr-2"></i> <a href="{{ route('notificationtelegram') }}">Test Notification</a></li>
                                <li class="dropdown-divider"></li>
                                <li class="dropdown-item"><i class="icon-power mr-2"></i><a href="http://"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
        </header>
        <!--End header-->

        <!-- Awal Menu -->
        <nav>
            <!-- Menu Toggle btn-->
            <div class="menu-toggle">
                <div class="row mt-1">
                    <div class="col-3 col-lg-3 col-xl-3 mt-3" style="text-align: center;">
                        <img src="{{ asset('vendor/pramita.png') }}" alt="" srcset="" width="50">
                    </div>
                    <div class="col-3 col-lg-3 col-xl-3 mt-3" style="text-align: center;">
                        <img src="{{ asset('vendor/sima.jpeg') }}" alt="" srcset="" width="50">
                    </div>
                    <div class="col-3 col-lg-3 col-xl-3 mt-3" style="text-align: center;">
                        <img src="{{ asset('vendor/prospek.png') }}" alt="" srcset="" width="50">
                    </div>
                    <div class="col-3 col-lg-3 col-xl-3 ">
                        <button type="button" id="menu-btn">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                </div>

            </div>

            <ul id="respMenu" class="horizontal-menu">

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
                            <li><a href="{{ asset('menu/formpinjam', []) }}"><i class="zmdi zmdi-assignment"></i>
                                    Menu Peminjaman</a></li>
                            <li><a href="{{ asset('menu/formmaintenance', []) }}"><i
                                        class="zmdi zmdi-assignment"></i> Menu Maintenance</a></li>
                            <li><a href="{{ asset('menu/formmutasi', []) }}"><i class="zmdi zmdi-assignment"></i>
                                    Menu Mutasi</a></li>
                            <li><a href="{{ asset('menu/formpemusnahan', []) }}"><i class="zmdi zmdi-assignment"></i>
                                    Menu Pemusnahan</a></li>
                            <li><a href="{{ asset('menu/verifdatainventaris', []) }}"><i
                                        class="zmdi zmdi-assignment"></i> Menu Stock Opname</a></li>
                            {{-- <li><a href="{{ asset('menu/formdepresiasi', []) }}"><i
                                        class="zmdi zmdi-dot-circle-alt"></i> Menu Aset</a></li> --}}
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
                            <li><a href="{{ asset('menu/masterlokasi', []) }}"><i class="zmdi zmdi-wrench"></i>
                                    Master Lokasi</a></li>
                            <li><a href="{{ asset('menu/masterbarang', []) }}"><i class="zmdi zmdi-wrench"></i>
                                    Master Barang</a></li>
                            <li><a href="{{ asset('menu/masterstaff', []) }}"><i class="zmdi zmdi-wrench"></i>
                                    Master Staff</a></li>
                            <li><a href="{{ asset('menu/masterlaporan', []) }}"><i
                                        class="zmdi zmdi-view-carousel"></i>
                                    Master Laporan</a></li>
                        @elseif(auth()->user()->akses == 'keu')
                            <li><a href="{{ asset('formsdm', []) }}"><i class="zmdi zmdi-wrench"></i> Form
                                    Keuangan</a></li>
                        @elseif(auth()->user()->akses == 'admin')
                            <li><a href="{{ asset('masteradmin', []) }}"><i class="zmdi zmdi-dot-circle-alt"></i>
                                    Master Admin</a></li>
                            <li><a href="{{ asset('masteradmindetail', []) }}"><i
                                        class="zmdi zmdi-dot-circle-alt"></i> Master Cabang</a></li>
                            <li><a href="{{ asset('masterlogactifity', []) }}"><i class="zmdi zmdi-airplay"></i> Log
                                    Aktifitas</a></li>
                        @endif


                    </ul>
                </li>

                <li>
                    <a class="" href="javascript:;">
                        <i class="zmdi zmdi-help"></i>
                        <span class="title">Bantuan</span>
                        <span class="arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ asset('faq', []) }}"><i class="zmdi zmdi-dot-circle-alt"></i> Bantuan</a>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>
        <!-- End Menu -->
        <div class="clearfix"></div>

        <div class="content-wrapper ">
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
        {{-- <div class="right-sidebar">

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
        </div> --}}
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
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content animated flipInX">
                    <div class="modal-header">
                        <h5 class="modal-title">Setup System</h5>
                        <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">
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
                                <div class="form-group pt-2" style="text-align: right;">
                                    <button type="submit" class="btn-success px-5"><i class="icon-lock"></i>
                                        Simpan</button>
                                </div>
                            @else
                                {{-- <div class="form-group">
                                    <label for="input-2">Nomor Cabang</label>
                                    <input type="text" class="form-control" id="input-2"
                                        value="{{ $settingno[0]->kd_cabang }}" required>
                                </div> --}}
                                <div class="form-group">
                                    <label for="input-3">Nomor Cabang</label>
                                    <input type="text" class="form-control" name="no_cabang"
                                        value="{{ $settingno[0]->no_cabang }}" required disabled>
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


                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="modal fade" id="modal-nav" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content" id="menu-modal-nav">

            </div>
        </div>
    </div>
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
    <script src="{{ asset('js/scriptx.js', []) }}"></script>
    <script src="{{ asset('js/admin.js', []) }}"></script>
    <script src="{{ asset('js/navbar.js', []) }}"></script>
    @if (Auth::user()->akses == 'admin')
        <script src="{{ asset('js/master.js', []) }}"></script>
    @endif
    <script src="{{ asset('assets/plugins/jquery-multi-select/jquery.multi-select.js', []) }}"></script>
    <script src="{{ asset('assets/plugins/jquery-multi-select/jquery.quicksearch.js', []) }}"></script>
    <script src="{{ asset('assets/plugins/notifications/js/lobibox.min.js', []) }}"></script>
    {{-- <script src="{{ asset('assets/plugins/notifications/js/notifications.min.js', []) }}"></script> --}}
    <script src="{{ asset('assets/plugins/notifications/js/notification-custom-script.js', []) }}"></script>

    <script>
        $(document).ready(function() {
            $('.single-select').select2();
            $('.single-selectkode').select2();
            $('.single-selectlokasi').select2();
            $('.single-selectlokasi1').select2();
        });
    </script>
    <script src="{{ asset('online/resumable.min.js', []) }}"></script>
    {{-- <script src="{{ asset('https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js', []) }}"></script> --}}
</body>

</html>
