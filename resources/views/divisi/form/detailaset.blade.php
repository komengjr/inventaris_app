<div class="row pl-2 pt-2 pb-2">
    <div class="col-sm-9">
        {{-- <h4 class="page-title">Form SDM & Umum</h4> --}}
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Home</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">Master Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Menu Depresiasi</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header border-0">
                Data Aset
                <div class="card-action">
                    <div class="dropdown">
                        <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret"
                            data-toggle="dropdown">
                            <i class="icon-options"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javascript:void();">Action</a>
                            <a class="dropdown-item" href="javascript:void();">Another action</a>
                            <a class="dropdown-item" href="javascript:void();">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void();">Separated link</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive pb-5">
                <table class="table styled-table align-items-center table-flush pb-2" id="default-table1" >
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang Aset</th>
                           @for ($i = 0; $i < 24; $i++)
                            <th>bulan {{$i}}</th>
                           @endfor
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
