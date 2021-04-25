<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel = "stylesheet" href= "{{ URL::asset('css/app.css')}}">

    <title>{{ config('app.name') }} - 404</title>
  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="mx-auto mt-5">
        <div class="jumbotron">
          <div class="container">
            <h1><i class="fas fa-exclamation-triangle"></i> Erro 404</h1>

            {{ $exception->getMessage() }}
            <p>O sistema não encontrou a página que você solicitou.</p>

            @if (\Auth()->user() == NULL)
              <p><a class="btn btn-primary btn-lg" href="{{URL::route('welcome')}}" role="button">Mais informações &raquo;</a></p>         
            @else
              <p><a class="btn btn-primary btn-lg" href="{{URL::route('dashboard')}}" role="button">Mais informações &raquo;</a></p>
            @endif 
            
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
