 @extends('layouts.app')
 @section('content')


        @if (Auth::user()->akses == "admin")
        @include('admin.index')
        @elseif(Auth::user()->akses == "sdm")
        @include('divisi.view')
        @endif


@endsection
