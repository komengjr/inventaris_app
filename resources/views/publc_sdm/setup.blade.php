<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOG SDM - DASHBOARD</title>
    <link rel="icon" href="{{ asset('vendor/icon/2.png', []) }}" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="{{ asset('sdm/css/fontawesome.min.css') }}">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="{{ asset('sdm/css/bootstrap.min.css') }}">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="{{ asset('sdm/css/tooplate.css') }}">
    <link href="{{ asset('assets/plugins/notifications/css/lobibox.min.css', []) }}" rel="stylesheet" type="text/css" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" /> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" /> --}}


    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap4.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap4.css" />

    {{-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}

    <style>
        .modal-dialog {
            max-width: 1050px;
            margin: 2rem auto;
        }
    </style>
</head>

<body class="bg03">
    <div class="container" id="menu-log-sdm">
        <div class="row tm-mt-big">
            <div class="col-12 mx-auto tm-login-col">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12 text-center">
                            <i class="fas fa-3x fa-tachometer-alt tm-site-icon text-center"></i>
                            <h2 class="tm-block-title mt-3">Halaman Masuk LOG</h2>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <form class="tm-login-form">
                                @csrf
                                <div class="input-group">
                                    <label for="username"
                                        class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">Cabang</label>
                                    <select name="cabang" class="form-control" id="cabang">
                                        <option value="PA">Pontianak</option>
                                    </select>
                                </div>
                                <div class="input-group mt-3">
                                    <label for="password"
                                        class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">NIP</label>
                                    <input name="nip" type="text" class="form-control validate" id="nip"
                                        required>
                                </div>
                                <div class="input-group mt-3">
                                    <button type="button" id="button-masuk-log-sdm"
                                        class="btn btn-primary d-inline-block mx-auto">Masuk</button>
                                </div>
                                <div class="input-group mt-3">
                                    <p><em>Gunakan Nip Untuk Masuk Halaman</em></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="row tm-mt-big">
            <div class="col-12 font-weight-light text-center">
                <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                    Copyright &copy; 2024. Created by
                    <a href="http://www.tooplate.com" class="text-white tm-footer-link">X</a> | SDM LOG MANAGEMENT</a>
                </p>
            </div>
        </footer>
    </div>

    <script src="{{ asset('sdm/js/jquery-3.3.1.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/notifications/js/lobibox.min.js', []) }}"></script>
    {{-- <script src="{{ asset('assets/plugins/notifications/js/notifications.min.js', []) }}"></script> --}}
    <script src="{{ asset('assets/plugins/notifications/js/notification-custom-script.js', []) }}"></script>
    {{-- <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.js"></script> --}}


    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap4.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap4.js"></script>
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
    <!-- https://jquery.com/download/ -->
    {{-- <script src="{{ asset('sdm/js/bootstrap.min.js') }}"></script> --}}


    <script src="{{ asset('sdm/js/bootstrap.min.js') }}"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        $(document).on("click", "#button-masuk-log-sdm", function(e) {
            e.preventDefault();
            var cabang = document.getElementById("cabang").value;
            var nip = document.getElementById("nip").value;
            $("#menu-log-sdm").html(
                '<div class="card"><div style="text-align: center; padding:2%;"><div class="spinner-border" role="status" > <span class="sr-only"></span> </div></div></div>'
            );
            $.ajax({
                    url: "{{ route('daftar_log') }}",
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "cabang": cabang,
                        "nip": nip,
                    },
                    dataType: 'html',
                })
                .done(function(data) {
                    $("#menu-log-sdm").html(data);
                })
                .fail(function() {
                    console.log('eror');

                });
        });

        $(document).on("click", "#button-laporan-maintenance-sdm", function(e) {
            e.preventDefault();
            var start = document.getElementById("start").value;
            var end = document.getElementById("end").value;
            var kode = document.getElementById("kode").value;
            var username = document.getElementById("username").value;
            $("#display-laporan-maintenance").html(
                '<div class="card"><div style="text-align: center; padding:2%;"><div class="spinner-border" role="status" > <span class="sr-only"></span> </div></div></div>'
            );
            $.ajax({
                    url: "{{ route('show_laporan_user') }}",
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "start": start,
                        "end": end,
                        "kode": kode,
                        "username": username,
                    },
                    dataType: 'html',
                })
                .done(function(data) {
                    $("#display-laporan-maintenance").html(
                        '<iframe src="data:application/pdf;base64, ' +
                        data +
                        '" style="width:100%;; height:500px;" frameborder="0"></iframe>'
                    );
                })
                .fail(function() {
                    console.log('eror');

                });
        });
    </script>

</body>

</html>
