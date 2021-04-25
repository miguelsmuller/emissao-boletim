<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel = "stylesheet" href= "{{ URL::asset('css/app.css')}}">
    <link rel = "stylesheet" href= "{{ URL::asset('css/vendor.css')}}">

    @yield('css')

    <title>{{ config('app.name') }} - @yield('title')</title>
  </head>

  <body>

    <div class="page-app">
      @include('layouts.include.sidebar')

      <div class="page-app-wrap">

        <div class="page-app-header">
          @include('layouts.include.header')
        </div>

        <div class="page-app-content">

          @php
            //var_dump (Auth::user()->roles)
          @endphp


          @include('layouts.include.content')
        </div>

        <div class="page-app-footer">
          @include('layouts.include.footer')
        </div>

      </div>
    </div>

    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/datatable.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('js')
  </body>
</html>
