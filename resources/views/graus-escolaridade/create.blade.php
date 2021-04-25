@extends('layouts.app')

{{-- TÍTULO --}}
@section('title', isset($registro->id) ? 'Editar Grau de Escolaridade - ' . $registro->nomeCompleto : 'Adicionar Grau de Escolaridade' )

{{-- ÁREA DE CONTEÚDO --}}
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="card">

<div class="card-header card-header-inverse">
    <div class="card-header-title">
      <h4>{{ isset($registro->id) ? 'Editar - ' . $registro->nomeCompleto : 'Adicionar Grau de Escolaridade' }}</h4>
    </div>
    <div class="card-header-buttons">
        <a class="btn btn-small btn-primary" href="{{ URL::route('listarGrauEscolaridade')}}">Listar Graus de Escolaridade</a>
        <div id="containerMenuFuncional"></div>
    </div>
</div>

<div class="card-body">
  @if(isset($registro->id))
    {{ Form::model($registro, array('route' => array('salvarGrauEscolaridade', $registro->id), 'method' => 'POST')) }}
    <div class="form-group row">
      <label for="id" class="col-sm-3 col-form-label">ID</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="id" value="{{$registro->id}}" readonly>
      </div>
    </div>
  @else
    {!! Form::open(['route' => 'salvarGrauEscolaridade', 'method' => 'POST']) !!}
  @endif

  {{-- NOME --}}
  <div class="form-group row">
    <label for="nomeCompleto" class="col-sm-3 col-form-label">Nome Completo</label>
    <div class="col-sm-9">
      <input type="text" class="form-control {{ $errors->has('nomeCompleto') ? 'is-invalid' : '' }}" name="nomeCompleto" value="{{ old( 'nomeCompleto', $registro->nomeCompleto) }}">
      {{ ($errors->has('nomeCompleto')) ? $errors->first('nomeCompleto') : '' }}
    </div>
  </div>

  {{-- ABREVIATURA --}}
  <div class="form-group row">
    <label for="nomeCurto" class="col-sm-3 col-form-label">Nome Curto</label>
    <div class="col-sm-9">
      <input type="text" class="form-control {{ $errors->has('nomeCurto') ? 'is-invalid' : '' }}" name="nomeCurto" value="{{ old( 'nomeCurto', $registro->nomeCurto) }}">
      {{ ($errors->has('nomeCurto')) ? $errors->first('nomeCurto') : '' }}
    </div>
  </div>

  {{-- TURNO --}}
  <div class="form-group row">
    <label for="tipoPeriodoAvaliativo" class="col-sm-3 col-form-label">Tipo Período Avaliativo</label>
    <div class="col-sm-9">
      @php
      if (is_null($registro->tipoPeriodoAvaliativo)) {
        $tipoPeriodoAvaliativoSelecionado = false;
      }else{
        $tipoPeriodoAvaliativoSelecionado = $registro->tipoPeriodoAvaliativo->id;
      }
      @endphp
      {!! Form::select('tipoPeriodoAvaliativo', $tiposPeriodosAvaliativos, $tipoPeriodoAvaliativoSelecionado, ['class' => 'form-control', 'placeholder' => 'Escolha uma período...'] ) !!}
      {{ ($errors->has('tipoPeriodoAvaliativo')) ? $errors->first('tipoPeriodoAvaliativo') : '' }}
    </div>
  </div>

  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <button type="submit" class="btn btn-primary">Salvar</button>

  {!! Form::close() !!}
</div>


    </div>
  </div>
</div>
@endsection

{{-- ÁREA DE JAVASCRIPT --}}
@section('js')

@endsection