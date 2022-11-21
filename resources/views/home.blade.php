 @extends('layouts.app')  
 @section('content')
     

        @if (Auth::user()->akses == "admin")
        @include('admin.view')
        @else
        @include('admin.view')
        @endif
  

@endsection