<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOG MAINTENANCE :: DASHBOARD</title>
    <!--

    Template 2108 Dashboard

 http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="{{ asset('sdm/css/fontawesome.min.css') }}">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="{{ asset('sdm/css/bootstrap.min.css') }}">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="{{ asset('sdm/css/tooplate.css') }}">
</head>

<body class="bg03">
    <div class="container" id="menu-log-sdm">
        <div class="row tm-mt-big" >
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
                            <form action="index.html" method="post" class="tm-login-form">
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
                                    <button type="button" id="button-masuk-log-sdm" class="btn btn-primary d-inline-block mx-auto">Masuk</button>
                                </div>
                                <div class="input-group mt-3">
                                    <p><em>Just put a character to login.</em></p>
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
                    <a href="http://www.tooplate.com" class="text-white tm-footer-link">J</a> | Pramita Pontianak</a>
                </p>
            </div>
        </footer>
    </div>
    <script src="{{ asset('sdm/js/jquery-3.3.1.min.js') }}"></script>
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
                    url: "{{route('daftar_log')}}",
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
        $(document).on("click", "#button-log-form-sdm", function(e) {
            e.preventDefault();
            var id =  $(this).data("id");
            var user =  $(this).data("user");
            $("#menu-form-log-sdm").html(
                '<div class="card"><div style="text-align: center; padding:2%;"><div class="spinner-border" role="status" > <span class="sr-only"></span> </div></div></div>'
            );
            $.ajax({
                    url: "{{route('form_log')}}",
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id,
                        "user": user,
                    },
                    dataType: 'html',
                })
                .done(function(data) {
                    $("#menu-form-log-sdm").html(data);
                })
                .fail(function() {
                    console.log('eror');

                });
        });
    </script>

</body>

</html>
