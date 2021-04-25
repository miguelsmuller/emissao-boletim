<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style type="text/css">
      @font-face { font-family: 'Arial'; src: url('{{ URL::asset('fonts/arial.ttf')}}') format('truetype') }
    </style>

    <!-- Bootstrap CSS -->
    <link rel ="stylesheet" href= "{{ URL::asset('css/print.css')}}">
    {{-- <link rel="stylesheet" href="{{ public_path('components/bootstrap/css/bootstrap.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="public/components/bootstrap/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="http://127.0.0.1/public/components/bootstrap/css/bootstrap.min.css" type="text/css" /> --}}

    <title>{{ config('app.name') }} - @yield('title')</title>
  </head>
  <body>
    <div id="header">
      <table style="width: 100%;">
        <tr>
          <td style="width: 23mm">
            <img src="{{ URL::to('/')}}/images/cidade.png">
          </td>
          <td>
            <div>
              <span class="header-h1">ESTADO DO RIO DE JANEIRO</span>
              <span class="header-h1">PREFEITURA MUNICIPAL DE CIDADE</span>
              <span class="header-h2">Secretaria Municipal de Educação</span>
            </div>
          </td>
        </tr>
      </table>
    </div>

    <div id="footer">
      Rua da Vendinha, n.º 230 – Centro – Rio Claro – RJ – CEP: 27460-000<br/>
      E-mail: email@email.com.br – Tel: (24) 3332-0000 Ramal: 0000/0000<br>
    </div>

    <main>
      @yield('content')
    </main>

  </body>
</html>
