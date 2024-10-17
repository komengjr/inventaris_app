<div class="row">
    <div class="col-12">
        <nav class="navbar navbar-expand-xl navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <i class="fas fa-3x fa-tachometer-alt tm-site-icon"></i>
                <h3 class="tm-site-title mb-0">{{ $cabang->nama_cabang }}</h3>
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
                            <span>{{ $staff->nama_staff }} ({{ $staff->nip }})</span>
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
            <div class="form-group">
                <select name="" class="form-control" id="">
                    <option value="">Pilih Log</option>
                    @foreach ($datalog as $datalogx)
                        <option value="" id="button-log-form-sdm" data-id="{{ $datalogx->kd_log_sdm }}" data-user="{{ $staff->nama_staff }}">{{$datalogx->nama_log_sdm}}</option>
                    @endforeach
                </select>
            </div>
            {{-- <ol class="tm-list-group tm-list-group-alternate-color tm-list-group-pad-big">
                @if ($staff->class == 0)
                    @foreach ($datalog as $datalog1)
                        <li class="tm-list-group-item" id="button-log-form-sdm" data-id="{{ $datalog1->kd_log_sdm }}"
                            data-user="{{ $staff->nama_staff }}">
                            {{ $datalog1->nama_log_sdm }}
                        </li>
                    @endforeach
                @else
                @foreach ($datalogx as $datalogx)
                    <li class="tm-list-group-item" id="button-log-form-sdm" data-id="{{ $datalogx->kd_log_sdm }}"
                        data-user="{{ $staff->nama_staff }}">
                        {{ $datalogx->nama_log_sdm }}
                    </li>
                @endforeach
                @endif


            </ol> --}}
        </div>
    </div>
    <div class="tm-col tm-col-big" id="menu-form-log-sdm">

    </div>
    <div class="tm-col tm-col-small">
        <div class="bg-white tm-block">
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-info form-control" data-toggle="modal"
                        data-target=".bd-example-modal-lg">Report</button>
                </div>
                {{-- <div class="col-12">
                    <button class="btn btn-info form-control">info</button>
                </div> --}}
            </div>
        </div>
    </div>
</div>

{{-- MODAL BOOTTSTRAP --}}
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Laporan Maintenance {{ $staff->nama_staff }}</h5>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Pilih Laporan</label>
                        <select class="form-control" name="kode" id="kode">
                            <option value="">Pilih Laporan</option>
                            @foreach ($datalog as $item)
                                <option value="{{ $item->kd_log_sdm }}">{{ $item->nama_log_sdm }}</option>
                            @endforeach
                        </select>
                        <input type="text" name="user" id="username" value="{{ $staff->nama_staff }}" hidden>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="message-text" class="col-form-label">Start :</label>
                            <input class="form-control" type="date" name="start" id="start">
                        </div>
                        <div class="col-md-6">
                            <label for="message-text" class="col-form-label">End :</label>
                            <input class="form-control" type="date" name="end" id="end">
                        </div>
                    </div>

                </form>
                <div id="display-laporan-maintenance"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-small" id="button-laporan-maintenance-sdm"><i
                        class="fa fa-eye"></i> Show Data</button>
                <button type="button" class="btn btn-primary btn-small" id="button-laporan-maintenance-sdm"><i
                        class="fa fa-print"></i> Show PDF</button>
            </div>
        </div>
    </div>
</div>
