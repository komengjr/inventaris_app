<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>App | Dashboard &amp; Web App</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/header.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/header.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/header.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/header.png') }}">
    <link rel="manifest" href="../../../asset/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="{{ asset('img/header.png') }}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{ asset('asset/js/config.js') }}"></script>
    <!-- <script src="../../../vendors/overlayscrollbars/OverlayScrollbars.min.js"></script> -->


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link href="{{ asset('vendors/overlayscrollbars/OverlayScrollbars.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/theme-rtl.min.css') }}" rel="stylesheet" id="style-rtl">
    <link href="{{ asset('asset/css/theme.min.css') }}" rel="stylesheet" id="style-default">
    <link href="{{ asset('asset/css/user-rtl.min.css') }}" rel="stylesheet" id="user-style-rtl">
    <link href="{{ asset('asset/css/user.min.css') }}" rel="stylesheet" id="user-style-default">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
</head>


<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container" data-layout="container" id="menu-login-v2">
            <script>
                var isFluid = JSON.parse(localStorage.getItem('isFluid'));
                if (isFluid) {
                    var container = document.querySelector('[data-layout]');
                    container.classList.remove('container');
                    container.classList.add('container-fluid');
                }
            </script>
            <div class="row flex-center min-vh-100 py-6">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4"><a class="d-flex flex-center mb-4"
                        href="../../../index.html"><img class="me-2"
                            src="{{ asset('asset/img/icons/spot-illustrations/falcon.png') }}" alt="" width="58"><span
                            class="font-sans-serif fw-bolder fs-5 d-inline-block">Inventaris App</span></a>
                    <div class="card">
                        <div class="card-body p-4 p-sm-5">
                            <div class="avatar avatar-4xl">
                                <img class="rounded-circle" src="{{ asset('asset/img/team/2.jpg') }}" alt="">

                            </div>
                            <h5 class="mt-3 mb-0">Halo</h5><small>Enter your password to access the
                                admin.</small>
                            <form id="form-login" >

                                <div class="mb-3">
                                    <input class="form-control form-control-lg" type="text" id="email" name="email"
                                        value="{{ $user }}" />
                                </div>
                                <div class="mb-3">
                                    <input class="form-control form-control-lg" type="password" id="password"
                                        name="password" placeholder="Password"  value="{{ $pass }}"/>
                                </div>
                                <div class="row flex-between-center">
                                    <div class="col-auto">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="checkbox" id="basic-checkbox"
                                                checked="checked" />
                                            <label class="form-check-label mb-0" for="basic-checkbox">Remember
                                                me</label>
                                        </div>
                                    </div>
                                    <!-- <div class="col-auto"><a class="fs--1" href="../../../pages/authentication/simple/forgot-password.html">Forgot Password?</a></div> -->
                                </div>
                            </form>
                            <div class="mb-3">
                                <button class="btn btn-primary d-block w-100 mt-3" type="button" name="submit"
                                    id="button-login-system"><span class="fab fa-500px"></span> Masuk</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('vendors/popper/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/anchorjs/anchor.min.js') }}"></script>
    <script src="{{ asset('vendors/is/is.min.js') }}"></script>
    <script src="{{ asset('vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('vendors/lodash/lodash.min.js') }}"></script>
    {{--
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script> --}}
    <script src="{{ asset('vendors/list.js/list.min.js') }}"></script>
    <script src="{{ asset('asset/js/theme.js') }}"></script>
    <!-- <script src="{{ asset('asset/notifications/js/notifications.min.js') }}"></script> -->
    <script>

        $(document).on("click", "#button-login-system", function (e) {
            e.preventDefault();
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            window.close();
            $('#button-login-system').html(
                '<div class="spinner-border my-0" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );

            $.ajax({
                url: "{{ route('masuk_v2') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "email": email,
                    "password": password
                },
                dataType: 'html',
            }).done(function (data) {
                if (data == 1) {
                    window.location.href = "{{ url('/') }}";
                } else {
                    location.reload();
                }
            }).fail(function () {
                console.log('error');

            });
        });
        // setTimeout(() => {
        //     $(document).ready(function () {
        //         $('#button-login-system').click();
        //     });
        // }, 2000);
    </script>
</body>

</html>
