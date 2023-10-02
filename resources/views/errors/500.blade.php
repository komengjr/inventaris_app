@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center error-pages">
                    <h1 class="error-title text-secondary">500</h1>
                    <h2 class="error-sub-title text-dark">Internal server error</h2>

                    <p class="error-message text-dark text-uppercase">
                        Please try after some time
                    </p>

                    <div class="mt-4">
                        <a href="{{ url('home', []) }}" class="btn btn-dark btn-round m-1">Go To Home
                        </a>
                        <a href="javascript:void();" onclick="history.back()" class="btn btn-primary btn-round m-1">Previous Page
                        </a>
                    </div>


                    <hr class="w-50 border-light-2" />

                </div>
            </div>
        </div>
    </div>
@endsection
