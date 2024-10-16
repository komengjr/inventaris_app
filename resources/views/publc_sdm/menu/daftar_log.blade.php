<div class="row">
    <div class="col-12">
        <nav class="navbar navbar-expand-xl navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <i class="fas fa-3x fa-tachometer-alt tm-site-icon"></i>
                <h1 class="tm-site-title mb-0">{{$cabang->nama_cabang}}</h1>
            </a>
            <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        {{-- <a class="nav-link" href="index.html">Dashboard
                            <span class="sr-only">(current)</span>
                        </a> --}}
                    </li>

                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link d-flex" href="#">
                            <i class="far fa-user mr-2 tm-logout-icon"></i>
                            <span>{{$staff->nama_staff}} </span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- row -->
<div class="row tm-content-row tm-mt-big">
    <div class="tm-col tm-col-big">
        <div class="bg-white tm-block">
            <div class="row">
                <div class="col-12">
                    <h2 class="tm-block-title d-inline-block">Daftar LOG</h2>
                </div>
            </div>
            <ol class="tm-list-group tm-list-group-alternate-color tm-list-group-pad-big">
                @foreach ($datalog as $datalog)
                    <li class="tm-list-group-item" id="button-log-form-sdm" data-id="{{$datalog->kd_log_sdm}}" data-user="{{$staff->nama_staff}}">
                        {{$datalog->nama_log_sdm}}
                    </li>
                @endforeach

            </ol>
        </div>
    </div>
    <div class="tm-col tm-col-big" id="menu-form-log-sdm">

    </div>
    <div class="tm-col tm-col-sm">
        <div class="bg-white tm-block">
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-info form-control">Report</button>
                </div>
                {{-- <div class="col-12">
                    <button class="btn btn-info form-control">info</button>
                </div> --}}
            </div>
        </div>
    </div>
</div>


