<div class="row">
    <div class="col-12">
        <nav class="navbar navbar-expand-xl navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('vendor/icon/2.png') }}" alt="" width="50">
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
                    <button class="btn btn-success form-control" id="button-form-peminjaman-sdm"
                        data-user="{{ $staff->nip }}" data-cabang="{{ $staff->kd_cabang }}"><i class="fa fa-book"></i>
                        Form Peminjaman</button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-12">
                    <h2 class="tm-block-title d-inline-block">DAFTAR LOG</h2>
                </div>
            </div>
            <div class="form-group">
                <select name="" class="form-control" id="comboA">
                    <option value="" data-id="0" data-user="0">Pilih Log</option>
                    @foreach ($datalog as $datalogx)
                        <option value="{{ $staff->nama_staff }}" id="button-log-form-sdm"
                            data-id="{{ $datalogx->kd_log_sdm }}" data-user="{{ $staff->nama_staff }}">
                            {{ $datalogx->nama_log_sdm }}</option>
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
                <div class="col-12 pb-3">
                    <button class="btn btn-info form-control" data-toggle="modal"
                        data-target=".bd-list-peminjaman-modal-lg" id="button-list-peminjaman" data-user="{{ $staff->nip }}">List Pinjam</button>
                </div>
                <hr>
                <div class="col-12">
                    <button class="btn btn-info form-control" data-toggle="modal" data-target=".bd-example-modal-lg"><i
                            class="fa fa-file"></i> Report</button>
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
<div class="modal fade bd-list-peminjaman-modal-lg" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" >
        <div class="modal-content" style="height:100%; width: 100%;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Peminjaman</h5>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div id="display-list-peminjaman"></div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<script>
    // function getComboA(selectObject) {
    //     var value = selectObject.value;
    //     var id = $(this).find(':selected').attr('data-id');
    //     var user = $(this).data("user");
    //     console.log(value);
    //     console.log(id);
    //     console.log(user);
    // }
    // $('#comboA').change(function() {
    //     alert($(this).children('option:selected').data('id'));
    // });
    $('#comboA').change(function() {
        // e.preventDefault()
        var id = $(this).children('option:selected').data('id');
        var user = $(this).children('option:selected').data('user');
        if (id == 0) {
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
                    msg: 'Pilih Dulu Bro'
                });
            });
        } else {
            $("#menu-form-log-sdm").html(
                '<div class="card"><div style="text-align: center; padding:2%;"><div class="spinner-border" role="status" > <span class="sr-only"></span> </div></div></div>'
            );
            $.ajax({
                    url: "{{ route('form_log') }}",
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
        }
    });

    $(document).on("click", "#button-form-peminjaman-sdm", function(e) {
        e.preventDefault();
        var user = $(this).data("user");
        var cabang = $(this).data("cabang");
        $("#menu-form-log-sdm").html(
            '<div class="card"><div style="text-align: center; padding:2%;"><div class="spinner-border" role="status" > <span class="sr-only"></span> </div></div></div>'
        );
        $.ajax({
                url: "{{ route('form_peminjaman_barang') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "user": user,
                    "cabang": cabang,
                },
                dataType: 'html',
            })
            .done(function(data) {
                $("#menu-form-log-sdm").html(data);
            })
            .fail(function() {
                Lobibox.notify("error", {
                    pauseDelayOnHover: true,
                    continueDelayOnInactiveTab: false,
                    position: "top right",
                    icon: "fa fa-info",
                    msg: "Gagal",
                });
            });
    });
    $(document).on("click", "#button-list-peminjaman", function(e) {
        e.preventDefault();
        var user = $(this).data("user");
        $("#display-list-peminjaman").html(
            '<div class="card"><div style="text-align: center; padding:2%;"><div class="spinner-border" role="status" > <span class="sr-only"></span> </div></div></div>'
        );
        $.ajax({
                url: "{{ route('daftar_peminjaman_user') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "user": user,
                },
                dataType: 'html',
            })
            .done(function(data) {
                $("#display-list-peminjaman").html(data);
            })
            .fail(function() {
                Lobibox.notify("error", {
                    pauseDelayOnHover: true,
                    continueDelayOnInactiveTab: false,
                    position: "top right",
                    icon: "fa fa-info",
                    msg: "Gagal",
                });
            });
    });
</script>
