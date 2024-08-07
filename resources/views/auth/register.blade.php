<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    {{-- <meta name="description" content="" />
    <meta name="author" content="" /> --}}
    <title> Pramita - Daftar Akun</title>
    <!--favicon-->
    <link rel="icon" href="{{ asset('icon.png', []) }}" type="image/x-icon">
    <link href="{{ asset('assets/css/bootstrap.min.css', []) }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/animate.css', []) }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.css', []) }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app-style.css', []) }}" rel="stylesheet" />
    {{-- <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet"> --}}
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            /* background: url(1.gif) 0px 0px; */
            background: linear-gradient(30deg,#4c5153,transparent,#229ccb);
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>

    <!-- Start wrapper-->
    <div id="wrapper" style="font-family: 'Russo One', sans-serif;" class="p-3">



        <div class="card card-authentication1 mx-auto my-5 pt-2">

            <div class="card-body">
                @if ($message = Session::get('sukses'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <div class="alert-icon">
                        <i class="fa fa-check"></i>
                        </div>
                        <div class="alert-message">
                        <span><strong>{{ $message }}</strong> Silahkan Menunggu Konfirmasi</span>
                        </div>
                    </div>
                @elseif ($message = Session::get('Gagal'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <div class="alert-icon">
                        <i class="fa fa-check"></i>
                        </div>
                        <div class="alert-message">
                        <span><strong>{{ $message }}</strong> Mohon Menggunakan Username Lain</span>
                        </div>
                    </div>
                @endif
                <div class="card-content p-0">
                    <div class="text-center m-0 p-0">
                        {{-- <img src="{{ asset('anim.gif', []) }}"  width="350"> --}}
                    </div>
                    <div class="card-title text-uppercase text-center py-3"
                        style="font-family: "Copperplate", "Courier New" , Monospace;">Pendaftaran Akun</div>
                    <form method="POST" action="{{ route('daftarakuncabang') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername" class="sr-only">Username</label>
                            <div class="position-relative has-icon-right">
                                <!-- <input type="text" id="exampleInputUsername" class="form-control input-shadow" placeholder="Enter Username"> -->
                                <input id="email" type="text"
                                    class="form-control" name="username"placeholder="Enter Username" required
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
                        <div class="form-group">
                            <label for="exampleInputPassword" class="sr-only">Nama Cabang</label>
                            <div class="position-relative has-icon-right">
                                {{-- <input type="password" id="exampleInputPassword" class="form-control input-shadow" placeholder="Enter Password"> --}}
                                <input id="cabang" type="text"
                                    class="form-control @error('password') is-invalid @enderror input-shadow"
                                    name="cabang" placeholder="Nama Cabang Yang Lengkap" required
                                    autocomplete="current-password">
                                <div class="form-control-position">
                                    <i class="icon-map"></i>
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
                                Sudah Daftar <a href="{{ url('login', []) }}">Login Disini</a>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info btn-block">Daftar</button>


                    </form>
                </div>
            </div>
            <div class="card-footer text-center py-3">
                <p class="text-dark mb-0">Copyright © 2022</p>
            </div>
        </div>

        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->



    </div>
    <!--wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/js/jquery.min.js', []) }}"></script>
    <script src="{{ asset('assets/js/popper.min.js', []) }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js', []) }}"></script>
    <script src="{{ asset('assets/js/horizontal-menu.js', []) }}"></script>
    <script src="{{ asset('assets/js/app-script.js', []) }}"></script>

</body>

</html>
