<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pramita - {{ auth::user()->name }}</title>

    <link rel="icon" href="{{ url('icon.png', []) }}" type="image/x-icon">
    <link href="{{ url('assets/plugins/select2/css/select2.min.css', []) }}" rel="stylesheet" />
    <link href="{{ url('assets/plugins/inputtags/css/bootstrap-tagsinput.css', []) }}" rel="stylesheet" />
    <link href="{{ url('assets/plugins/jquery-multi-select/multi-select.css', []) }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/plugins/fancybox/css/jquery.fancybox.min.css', []) }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/plugins/simplebar/css/simplebar.css', []) }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('assets/plugins/notifications/css/lobibox.min.css', []) }}"/>
    <link href="{{ url('assets/css/animate.css', []) }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/icons.css', []) }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/horizontal-menu.css', []) }}" rel="stylesheet" />
    <link href="{{ url('assets/css/app-style.css', []) }}" rel="stylesheet" />
    <link href="{{ url('assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css', []) }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css', []) }}" rel="stylesheet" type="text/css">
    <link rel="{{ url('stylesheet" type="text/css" href="assets/plugins/jquery.steps/css/jquery.steps.css', []) }}" />
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
        @media only screen and  (max-width: 800px) {
            td, tr { display: block; }
            /* Hide table headers (but not display: none;, for accessibility) */
            thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }
            tr { border: 1px solid #000000; }
            tr + tr { margin-top: 1.5em; }
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
            background-color: #ff7300;
            color: #ffffff;
            text-align: left;
        }

        @media only screen and  (min-width: 760px) {
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
                                <img src="{{ url('logo.png', []) }}" class="logo" alt="logo icon" width="200">
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
                            <span class="user-profile"><img src="{{ url('icon.png', []) }}" class="img-circle"
                                    alt="user avatar"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item user-details">
                                <a href="javaScript:void();">
                                    <div class="media">
                                        <div class="avatar"><img class="align-self-start mr-3"
                                                src="{{ url('icon.png', []) }}" alt="user avatar"></div>
                                        <div class="media-body">
                                            <h6 class="mt-2 user-title">{{ auth::user()->name }}</h6>
                                            <p class="user-subtitle">{{ auth::user()->email }}</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            {{-- <li class="dropdown-item"><i class="icon-envelope mr-2"></i> Inbox</li> --}}
                            <li class="dropdown-divider"></li>
                            {{-- <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li> --}}
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item"><i class="icon-settings mr-2"></i> Setting</li>
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
                        <li><a href="{{ url('/', []) }}"><i class="zmdi zmdi-dot-circle-alt"></i> Home</a></li>
                        {{-- <li><a href="index.html"><i class="zmdi zmdi-dot-circle-alt"></i> eCommerce</a></li>
                    <li><a href="dashboard-human-resources.html"><i class="zmdi zmdi-dot-circle-alt"></i> Human Resources</a></li>
                    <li><a href="dashboard-digital-marketing.html"><i class="zmdi zmdi-dot-circle-alt"></i> Digital Marketing</a></li>
                    <li><a href="dashboard-property-listing.html"><i class="zmdi zmdi-dot-circle-alt"></i> Property Listings</a></li>
                    <li><a href="dashboard-service-support.html"><i class="zmdi zmdi-dot-circle-alt"></i> Services & Support</a></li>
                    <li><a href="dashboard-logistics.html"><i class="zmdi zmdi-dot-circle-alt"></i> Logistics</a></li> --}}
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
                        @if (auth::user()->akses == "sdm")
                        <li><a href="{{ url('menu/form', []) }}"><i class="zmdi zmdi-dot-circle-alt"></i> Form SDM</a></li>
                        @elseif(auth::user()->akses == "keu")
                        <li><a href="{{ url('formsdm', []) }}"><i class="zmdi zmdi-dot-circle-alt"></i> Form Keuangan</a></li>
                        @elseif(auth::user()->akses == "admin")
                        <li><a href="{{ url('formbarang', []) }}"><i class="zmdi zmdi-dot-circle-alt"></i> Data
                            Inventaris</a></li>
                        <li><a href="{{ url('datamutasi', []) }}"><i class="zmdi zmdi-dot-circle-alt"></i> Form
                                Mutasi</a></li>
                        <li><a href="{{ url('datapemusnahan', []) }}"><i class="zmdi zmdi-dot-circle-alt"></i> Form
                            Pemusnahan</a></li>
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
                        <li><a href="{{ url('faq', []) }}"><i class="zmdi zmdi-dot-circle-alt"></i> FAQ</a>
                        </li>
                        {{-- <li><a href="{{ url('formulir', []) }}"><i class="zmdi zmdi-dot-circle-alt"></i> Form</a>
                        </li>
                        <li><a href="{{ url('formulir1', []) }}"><i class="zmdi zmdi-dot-circle-alt"></i> Form 1</a>
                        </li>
                        <li><a href="{{ url('formulir2', []) }}"><i class="zmdi zmdi-dot-circle-alt"></i> Form 2</a>
                        </li> --}}

                    </ul>
                </li>

            </ul>
        </nav>
        <!-- End Menu -->
        <div class="clearfix"></div>

        <div class="content-wrapper">

            @yield('content')


        </div>
        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->

        <!--awal footer-->
        <footer class="footerx">
            <div class="container">
                <div class="text-center">
                    Copyright ?? 2022
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


    <!-- Bootstrap core JavaScript-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/script.js/2.1.1/script.min.js"integrity="sha512-oM6Bv767uUJZcy+SqCTP2rkHtKlivWNQ5+PPhhDwkY8FtNj4bq1xvNCB9NB3WkBa1KiY7P5a7/yfSONl5TYSPQ=="crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ url('assets/js/popper.min.js', []) }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js', []) }}"></script>
    <script src="{{ url('assets/plugins/simplebar/js/simplebar.js', []) }}"></script>
    <script src="{{ url('assets/js/horizontal-menu.js', []) }}"></script>
    <script src="{{ url('assets/js/app-script.js', []) }}"></script>
    <script src="{{ url('assets/plugins/Chart.js/Chart.min.js', []) }}"></script>
    <script src="{{ url('assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js', []) }}"></script>
    <script src="{{ url('assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js', []) }}"></script>
    <script src="{{ url('assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js', []) }}"></script>
    <script src="{{ url('assets/plugins/jquery.steps/js/jquery.steps.min.js', []) }}"></script>
    <script src="{{ url('assets/plugins/jquery-validation/js/jquery.validate.min.js', []) }}"></script>
    <script src="{{ url('assets/plugins/jquery.steps/js/jquery.wizard-init.js', []) }}"></script>
    <script src="{{ url('assets/plugins/fancybox/js/jquery.fancybox.min.js', []) }}"></script>
    <script src="{{ url('assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js', []) }}"></script>
    <script src="{{ url('assets/plugins/bootstrap-touchspin/js/bootstrap-touchspin-script.js', []) }}"></script>
    <script src="{{ url('assets/plugins/select2/js/select2.min.js', []) }}"></script>
    <script src="{{ url('assets/plugins/inputtags/js/bootstrap-tagsinput.js', []) }}"></script>
    <script src="{{ url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js', []) }}"></script>
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
    <script src="{{ url('assets/plugins/jquery-multi-select/jquery.multi-select.js', []) }}"></script>
    <script src="{{ url('assets/plugins/jquery-multi-select/jquery.quicksearch.js', []) }}"></script>
    <script src="{{ url('https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js', []) }}"></script>
    <script src="{{ url('assets/plugins/notifications/js/lobibox.min.js', []) }}"></script>
    <script src="{{ url('assets/plugins/notifications/js/notifications.min.js', []) }}"></script>
    <script src="{{ url('assets/plugins/notifications/js/notification-custom-script.js', []) }}"></script>

    <script src="{{ url('js/scriptx.js', []) }}"></script>
    <script src="{{ url('js/admin.js', []) }}"></script>
    <script src="{{ url('js/master.js', []) }}"></script>
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


            var table = $('#example').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
            });

            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');

        });
    </script>


    <script>
        $(document).ready(function() {
            $(document).on('click', '#editdatabarang', function(e) {
                e.preventDefault();
                var url = $(this).data('url');
                $('#showdatabarang').html("<img src='loading.gif'  style='display: block; margin: auto;'>");
                setTimeout(() => {
                    $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html'
                    })
                    .done(function(data) {
                        $('#showdatabarang').html(data);
                    })
                    .fail(function() {
                        $('#showdatabarang').html(
                            '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                            );
                    });
                }, 1500);

            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#hapusdatabarang', function(e) {
                e.preventDefault();
                var url = $(this).data('url');
                $('#showdatabarang').html("<img src='icon.png'  style='display: block; margin: auto;'>");
                $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html'
                    })
                    .done(function(data) {
                        $('#showdatabarang').html(data);
                    })
                    .fail(function() {
                        $('#showdatabarang').html(
                            '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                            );
                    });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '#updatedatabarang', function(e) {
                var data = $('#form-update').serialize();
                e.preventDefault();
                var url = $(this).data('url');
                $('#showdatabarang').html(
                    "<br><br><br><img src='icon.png'  style='display: block; margin: auto;'>");
                $.ajax({
                        url: url,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
                        },

                        type: 'POST',
                        data: data,
                        dataType: 'html'
                    })
                    .done(function(data) {
                        // console.log(data);
                        $('#showdatabarang').html(data);
                    })
                    .fail(function() {
                        $('#showdatabarang').html(
                            '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                            );
                    });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '#tambahsubdatabarang', function(e) {

                var data = $('#form-tambah').serialize();

                e.preventDefault();
                var url = $(this).data('url');
                $('#showdatabarang').html(
                    "<br><br><br><img src='icon.png'  style='display: block; margin: auto;'>");
                $.ajax({
                        url: url,
                        // headers: {'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')},
                        type: 'POST',
                        data: data,
                        dataType: 'html'
                    })
                    .done(function(data) {
                        // console.log(data);
                        $('#showdatabarang').html(data);
                    })
                    .fail(function() {
                        console.log(data);
                        $('#showdatabarang').html('<i class="fa fa-info-sign"></i> Gagal Baca');
                    });
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $(document).on('click', '#mutasidatabarang', function(e) {
                e.preventDefault();
                var url = $(this).data('url');
                $('#showdatabarang').html("<img src='icon.png'  style='display: block; margin: auto;'>");
                $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html'
                    })
                    .done(function(data) {
                        $('#showdatabarang').html(data);
                    })
                    .fail(function() {
                        $('#showdatabarang').html(
                            '<i class="fa fa-info-sign"></i> Something went wrong, Please try again...'
                            );
                    });
            });
        });
    </script>


</body>

</html>
