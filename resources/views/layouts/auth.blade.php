<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel = "stylesheet" href= "{{ URL::asset('css/app.css')}}">
    <link rel = "stylesheet" href= "{{ URL::asset('css/vendor.css')}}">

    @yield('css')

    <title>{{ config('app.name') }} - @yield('title')</title>
  </head>

  <body class="page-login">
    <div id="login-information">
      <a href="{{ url('/') }}"><img src="{{ URL::asset('images/logo-ddt-big.png')}}" width="125" height="125"></a>
      <H1>{{ config('app.name') }}</H1>
      Sistema Escolar Público para Nota e Frequência
      <!-- <img src="{{ URL::asset('images/call-to-action.png')}}" width="600" height="400"> -->
    </div>

    <div id="login-form">
      @yield('content')
    </div>

    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
