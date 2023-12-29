<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    {{-- <meta name="description" content="" />
    <meta name="author" content="" /> --}}
    <title> Inventaris APP - Halaman Login</title>
    <!--favicon-->
    <link rel="icon" href="{{ asset('vendor/logo.png', []) }}" type="image/x-icon">
    <link href="{{ asset('assets/css/bootstrap.min.css', []) }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/animate.css', []) }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.css', []) }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app-style.css', []) }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/notifications/css/lobibox.min.css', []) }}" rel="stylesheet" type="text/css" />
    <style>
        body {
            background-image: url('vendor/bg.jpg');
            height: 100%;
            /* width: 100%; */
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* For width 400px and larger: */
        @media only screen and (max-width: 550px) {
            body {
                background-image: url('vendor/bg.png');

            }
        }
    </style>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            /* background: url(1.gif) 0px 0px; */
            /* background: linear-gradient(30deg,#4c5153,transparent,#229ccb); */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body style="">

    <!-- start loader -->

    <!-- end loader -->
    <div class="clearfix"></div>
    <!-- Start wrapper-->
    <div id="wrapper" style="font-family: 'Russo One', sans-serif;" class="p-3">


        {{-- <div class="pb-5"></div>
        <div class="pb-5"></div> --}}
        <div class="card card-authentication1 mx-auto pt-2">
            <div class="card-body">
                <div class="card-content p-0">
                    <div class="text-center m-0 p-0">
                        <img src="{{ asset('vendor/new-anim.gif', []) }}" width="350"
                            style="width: 100%; height: auto;">
                    </div>
                    <div class="card-title text-uppercase text-center py-2" style="font-size: 10px;">Login Aplikasi
                    </div>
                    <form method="POST" action="{{ route('masuk') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername" class="sr-only">Username</label>
                            <div class="position-relative has-icon-right">
                                <!-- <input type="text" id="exampleInputUsername" class="form-control input-shadow" placeholder="Enter Username"> -->
                                <input id="email" type="text"
                                    class="form-control @error('email') is-invalid @enderror input-shadow"
                                    name="email"placeholder="Enter Username" value="{{ old('email') }}" required
                                    autocomplete="email" autofocus>
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword" class="sr-only">Password</label>
                            <div class="position-relative has-icon-right">
                                {{-- <input type="password" id="exampleInputPassword" class="form-control input-shadow" placeholder="Enter Password"> --}}
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror input-shadow"
                                    name="password" placeholder="Enter Password" required
                                    autocomplete="current-password">
                                <div class="form-control-position">
                                    <i class="icon-lock"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <div class="icheck-material-info">
                                    <input type="checkbox" id="user-checkbox" checked="" />
                                    <label for="user-checkbox">Remember me</label>
                                </div>
                            </div>
                            <div class="form-group col-6 text-right">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info btn-block">masuk</button>


                    </form>
                </div>
            </div>
            <div class="card-footer text-center py-3">
                <p class="text-dark mb-0">Copyright © 2022</p>
                <div class="row mt-3">
                    <div class="col-4 col-lg-6 col-xl-4">
                        <img src="{{ asset('vendor/pramita.png') }}" alt="" srcset="" width="80">
                    </div>
                    <div class="col-4 col-lg-6 col-xl-4">
                        <img src="{{ asset('vendor/sima.jpeg') }}" alt="" srcset="" width="80">
                    </div>
                    <div class="col-4 col-lg-6 col-xl-4">
                        <img src="{{ asset('vendor/prospek.png') }}" alt="" srcset="" width="80">
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!--wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/js/jquery.min.js', []) }}"></script>
    {{-- <script src="{{ asset('assets/js/popper.min.js', []) }}"></script> --}}
    <script src="{{ asset('assets/js/bootstrap.min.js', []) }}"></script>
    <script src="{{ asset('assets/js/horizontal-menu.js', []) }}"></script>
    <script src="{{ asset('assets/js/app-script.js', []) }}"></script>
    <script src="{{ asset('assets/plugins/notifications/js/lobibox.min.js', []) }}"></script>
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
                    width: 600,
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
                    width: 400,
                    msg: '{{ $message }}'
                });
            });
        </script>
    @endif
</body>

</html>
