@extends('layouts.app')

{{-- TÍTULO --}}
@section('title', 'Turnos')

{{-- ÁREA DE CONTEÚDO --}}
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="card">

<div class="card-header card-header-inverse">
  <div class="card-header-title">
      <h4>Turnos</h4>
  </div>
  <div class="card-header-buttons">
    <a class="btn btn-small btn-primary" href="{{ URL::route('formularioTurno') }}">Adicionar</a>
    <div id="containerMenuFuncional"></div>
  </div>
</div>

<div class="card-body">
  <div class="table-responsive">
    <table id="tblListagem" class="table table-striped table-bordered table-hover responsive nowrap mb-10 w-100">
      <thead class="thead-dark">
        <tr>
          <th scope="col" data-priority="1">Nome Completo</th>
          <th scope="col">Nome Curto</th>
          <th scope="col">Situação</th>
          <th scope="col" data-priority="2">Opções</th>
        </tr>
      </thead>

      <tbody>
      @foreach($listagem as $registro)
        <tr>
          <td>{{ $registro->nomeCompleto }}</td>

          <td>{{ $registro->nomeCurto }}</td>

          <td>
            @if ($registro->desabilitado == false)
              <span class="badge badge-success">Habilitado</span>
            @else
              <span class="badge badge-danger">Desabilitado</span>
            @endif
          </td>

          <td style="text-align: right;">
            <div class="dropdown" data-dropdown="true">
              <button class="btn btn-primary btn-small" type="button" id="dropdown-{{ $registro->id }}">Opções</button>
              <div class="dropdown-content">
                  <ul>
                  <!-- <a href="{{ URL::route('formularioPessoa', $registro->id) }}">Editar</a> -->
                  <li><a href="{{ URL::route('formularioTurno', $registro->id) }}">Editar</a></li>
                  <li><a href="{{ URL::route('excluirTurno', $registro->id) }}">Excluir</a></li>
                  </ul>
              </div>
              </div>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>


    </div>
  </div>
</div>
@endsection

{{-- ÁREA DE JAVASCRIPT --}}
@section('js')
  <script>
    $(document).ready(function() {
      var tblListagem = $('#tblListagem').DataTable({
        "columnDefs": [
          { width: 85, className: "text-center", targets: 2 },
          { width: 70, className: "text-center", targets: 3 }
        ]
      });

      new $.fn.dataTable.Buttons( tblListagem, {
        buttons: [
          { extend: 'excel', className: 'btn btn-small btn-primary' },
          { extend: 'pdf', className: 'btn btn-small btn-primary' },
          {
          extend: 'print',
          text: 'Imprimir',
          className: 'btn btn-small btn-primary',
          exportOptions: {
              columns: [0,1,2]
          }
          }
        ]
      });

      tblListagem.buttons().containers().appendTo( '#containerMenuFuncional' );
    });
  </script>
@endsection