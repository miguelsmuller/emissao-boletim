@extends('layouts.app')

{{-- TÍTULO --}}
@section('title', 'Turmas')

{{-- ÁREA DE CONTEÚDO --}}
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header card-header-inverse">
        <div class="card-header-title">
          <h4>Turmas</h4>
        </div>
        <div class="card-header-buttons">
          <a class="btn btn-small btn-primary" href="{{ URL::route('formularioTurma')}}">Adicionar</a>
          <div id="containerMenuFuncional"></div>
        </div>
      </div>
      <div class="card-body">

<div class="table-responsive">
  <table id="tblListagem" class="table table-striped table-bordered table-hover responsive nowrap w-100">
    <thead class="thead-dark">
      <tr>
        <th scope="col" data-priority="1">Escola</th>
        <th scope="col" data-priority="1">Turma</th>
        <th scope="col">Grau Escolaridade</th>
        <th scope="col">Turno</th>
        <th scope="col">Qunt. Alunos</th>
        <th scope="col">Situação</th>
        <th scope="col" data-priority="2">Opções</th>
      </tr>
    </thead>

    <tbody>
    @foreach($listagem as $registro)
      <tr>
        <td>{{ $registro->escola->nomeReduzido }}</td>

        <td>{{ $registro->nomeCompleto }}</td>

        <td>{{ $registro->grauEscolariade->nomeCompleto }}</td>

        <td>{{ $registro->turno->nomeCompleto }}</td>

        <td>000</td>

        <td>
          @if ($registro->desabilitado == false)
            <span class="badge badge-sucess">Habilitada</span>
          @else
            <span class="badge badge-danger">Desabilitada</span>
          @endif
        </td>

        <td style="text-align: center;">
          <div class="dropdown" data-dropdown="true">
            <button class="btn btn-primary btn-small" type="button" id="dropdown-{{ $registro->id }}">Opções</button>
            <div class="dropdown-content">
              <ul>
                <li><a href="{{ URL::route('formularioTurma', $registro->id) }}">Editar</a></li>
                <li><a href="{{ URL::route('excluirTurma', $registro->id) }}">Excluir</a></li>
                <li><a href="{{ URL::route('listarMatricula', $registro->id) }}">Enturmação</a></li>
                <li><a href="{{ URL::route('selecionarNota', $registro->id) }}">Lançamento de notas</a></li>
                <li><a href="{{ URL::route('emtirBoletim', $registro->id) }}" target="_blank">Emitir Boletim</a></li>
              </ul>
            </div>
          </div>
        </td>
      </tr>
    @endforeach
    <tbody>
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
          { width: 85, className: "text-center", targets: 5 },
          { width: 70, className: "text-center", targets: 6 }
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
              columns: [0,1,2,3,4]
            }
          }
        ]
      });

      tblListagem.buttons().containers().appendTo( '#containerMenuFuncional' );
    });
  </script>
@endsection