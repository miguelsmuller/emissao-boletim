@extends('layouts.app')

{{-- TÍTULO --}}
@section('title', 'Enturmação - Turma ' . $turma->nomeCompleto )

{{-- ÁREA DE CONTEÚDO --}}
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="card">

<div class="card-header card-header-inverse">
    <div class="card-header-title">
      <h4>Laçamento de notas - Seleção de Matérias - Turma {{$turma->nomeCompleto}}</h4>
    </div>
    <div class="card-header-buttons">
    <a class="btn btn-small btn-primary" href="{{ URL::route('listarTurma') }}">Listar Turmas</a>
        <div id="containerMenuFuncional"></div>
    </div>
</div>

<div class="card-body">
  <div class="row">
    @foreach($grauEscolaridade->componentesCurriculares as $componente)

    <div class="col-sm-3">
      <div class="card">
        <div class="card-header">
          <div class="card-header-title">
            <h4>{{$componente->nomeCompleto}}</h4>
          </div>
        </div>
        <div class="card-body">
          <a href="{{ URL::route('listarNota', [$turma->id, $componente->id]) }}" class="btn btn-primary btn-sm">Lançar notas</a>
        </div>
      </div>
    </div>

    @endforeach
  </div>
</div>


    </div>
  </div>
</div>
@endsection

{{-- ÁREA DE JAVASCRIPT --}}
@section('js')

@endsection