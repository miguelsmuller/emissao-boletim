@extends('layouts.app')

{{-- TÍTULO --}}
@section('title', 'Pessoas')

@section('header-custom')
<div class="form-group">
  <input id="search-input" type="text" placeholder="Buscar registro">
</div>
@endsection

{{-- ÁREA DE CONTEÚDO --}}
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header card-header-inverse">
        <div class="card-header-title">
          <h4>Pessoas</h4>
        </div>
        <div class="card-header-buttons">
          <a class="btn btn-small btn-primary" href="{{ URL::route('formularioPessoa') }}">Adicionar</a>
          <div id="containerMenuFuncional"></div>
        </div>
      </div>
      <div class="card-body">

<div class="table-responsive">
  <table id="tblListing" class="table table-striped table-bordered table-hover responsive nowrap w-100">
    <thead class="thead-dark">
      <tr>
        <th scope="col" data-priority="1">Nome Completo</th>
        <th scope="col">IUA</th>
        <th scope="col">CPF</th>
        <th scope="col">D.Nascimento</th>
        <th scope="col" data-priority="2">Opções</th>
      </tr>
    </thead>

    <tbody>
    @foreach($listagem as $registro)
      <tr>
        <td>{{ $registro->nomeCompleto }}</td>

        <td>{{ $registro->iua }}</td>

        <td>{{ $registro->cpf }}</td>

        <td>{{ $registro->dtNascimento }}</td>

        <td style="text-align: center;">
          <div class="dropdown" data-dropdown="true">
            <button class="btn btn-primary btn-small" type="button" id="dropdown-{{ $registro->id }}">Opções</button>
            <div class="dropdown-content">
              <ul>
              <!-- href="{{ URL::route('formularioPessoa') }}'. URL::route('formularioPessoa', $registro->id) .'" -->
                <li><a href="{{ URL::route('formularioPessoa', $registro->id) }}">Editar</a></li>
                <li><a href="">Emitir Carteirinha</a></li>
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
      var tblListing = $('#tblListing').DataTable({
        "paging":   true,
        "searching": true,
        "columnDefs": [
          { width: 70, className: "text-center", targets: 4 }
        ]
      });

      var btns = new $.fn.dataTable.Buttons( tblListing, {
        buttons: [
          { extend: 'excel', className: 'btn btn-small btn-primary' },
          { extend: 'pdf', className: 'btn btn-small btn-primary' },
          {
            extend: 'print',
            text: 'Imprimir',
            className: 'btn btn-small btn-primary',
            exportOptions: {
              columns: [0,1,2,3]
            }
          }
        ]
      });

      tblListing.buttons().containers().appendTo( '#containerMenuFuncional' );

      if ( $( "#search-input" ).length && $( "#tblListing" ).length ) {
        $("#search-input").keyup(function() {
          tblListing.search(this.value).draw();
        });
      }
    });    
  </script>
@endsection