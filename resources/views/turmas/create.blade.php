@extends('layouts.app')

{{-- TÍTULO --}}
@section('title', isset($registro->id) ? 'Editar Turma - ' . $registro->nomeCompleto : 'Adicionar Turma' )

{{-- ÁREA DE CONTEÚDO --}}
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header card-header-inverse">
        <div class="card-header-title">
          <h4>{{ isset($registro->id) ? 'Editar - ' . $registro->nomeCompleto : 'Adicionar Turma' }}</h4>
        </div>
        <div class="card-header-buttons">
          <a class="btn btn-small btn-primary" href="{{ URL::route('listarTurma')}}">Listar Turmas</a>
          <div id="containerMenuFuncional"></div>
        </div>
      </div>
      <div class="card-body">


@if(isset($registro->id))
  {{ Form::model($registro, array('route' => array('salvarTurma', $registro->id), 'method' => 'POST')) }}
  <div class="row">
    <div class="col-sm-12">
      <div class="form-group">
        <label for="id">ID</label>
        <div>
          <input type="text" name="id" value="{{$registro->id}}" readonly>
        </div>
      </div>
    </div>
  </div>
@else
  {!! Form::open(['route' => 'salvarTurma', 'method' => 'POST']) !!}
@endif


<div class="row">

  {{-- NOME --}}
  <div class="col-sm-4">
    <div class="form-group">
      <label for="nomeCompleto">Nome</label>
      <div>
        <input type="text" class=" {{ $errors->has('nomeCompleto') ? 'is-invalid' : '' }}" name="nomeCompleto" value="{{ old( 'nomeCompleto', $registro->nomeCompleto) }}">

        {{ ($errors->has('nomeCompleto')) ? $errors->first('nomeCompleto') : '' }}
      </div>
    </div>
  </div>

  {{-- GRAU DE ESCOLARIDADE --}}
  <div class="col-sm-4">
    <div class="form-group">
      <label for="grauEscolaridade">Grau de Escolaridade</label>
      <div>
        @php
        if (is_null($registro->grauEscolariade)) {
          $grausEscolaridadeSelected = false;
        }else{
          $grausEscolaridadeSelected = $registro->grauEscolariade->id;
        }
        @endphp
        {!! Form::select('grauEscolaridade', $grausEscolaridade, $grausEscolaridadeSelected, ['class' => 'form-control', 'placeholder' => 'Escolha uma grau de escolaridade...'] ) !!}

        {{ ($errors->has('grauEscolaridade')) ? $errors->first('grauEscolaridade') : '' }}
      </div>
    </div>
  </div>

  {{-- TURNO --}}
  <div class="col-sm-4">
    <div class="form-group">
      <label for="turno">Turno</label>
      <div>
        @php
        if (is_null($registro->turno)) {
          $turnoSelected = false;
        }else{
          $turnoSelected = $registro->turno->id;
        }
        @endphp
        {!! Form::select('turno', $turnos, $turnoSelected, ['class' => 'form-control', 'placeholder' => 'Escolha uma turno...'] ) !!}
        {{ ($errors->has('turno')) ? $errors->first('turno') : '' }}
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-4">
    <div class="form-group">
      <label class="label-check">Desabilitado
        <input type="checkbox" id="switch-sm" name="desabilitado" {{$registro->desabilitado?' checked':''}}>
        <span class="switche"></span>
      </label>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-4">
    <div class="form-group">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
  </div>
</div>

{!! Form::close() !!}


      </div>
    </div>
  </div>
</div>
@endsection

{{-- ÁREA DE JAVASCRIPT --}}
@section('js')

@endsection