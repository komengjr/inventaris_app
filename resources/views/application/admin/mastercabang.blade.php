@extends('layouts.template')
@section('content')
    <div class="row mb-3">
        <div class="col">
            <div class="card bg-100 shadow-none border">
                <div class="row gx-0 flex-between-center">
                    <div class="col-sm-auto d-flex align-items-center"><img class="ms-n2"
                            src="{{ asset('asset/img/illustrations/crm-bar-chart.png') }}" alt="" width="90" />
                        <div>
                            <h6 class="text-primary fs--1 mb-0">Welcome to </h6>
                            <h4 class="text-primary fw-bold mb-0">Inventaris <span class="text-info fw-medium">Management System</span></h4>
                        </div><img class="ms-n4 d-md-none d-lg-block" src="{{ asset('asset/img/illustrations/crm-line-chart.png') }}"
                            alt="" width="150" />
                    </div>
                    <div class="col-xl-auto p-3">
                       <h6 class="text-primary fs--1 mb-0">Menu : </h6>
                            <h4 class="text-primary fw-bold mb-0">Master <span class="text-info fw-medium">User</span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
