<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    {{-- <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ url('assets/css/animate.css', []) }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/icons.css', []) }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/horizontal-menu.css', []) }}" rel="stylesheet" />
    <link href="{{ url('assets/css/app-style.css', []) }}" rel="stylesheet" />
    <link href="{{ url('assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css', []) }}" rel="stylesheet"
        type="text/css">
    <link href="{{ url('assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css', []) }}" rel="stylesheet"
        type="text/css">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css"> --}}
    <style>

    </style>
    <style>

    </style>
    {{-- @yield('style') --}}
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/scan') }}">Reader Qr </a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                </ul>
            </div>

        </div><!-- /.container-fluid -->
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <hr />

    <footer class="footerx">
        <div class="container">
            <div class="text-center">
                Copyright © 2022
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>


    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @yield('scripts')
</body>

</html>
