@extends('layouts.app')

{{-- TÍTULO --}}
@section('title', isset($registro->id) ? 'Editar Turno - ' . $registro->nomeCompleto : 'Adicionar Turno' )

{{-- ÁREA DE CONTEÚDO --}}
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="card">


<div class="card-header card-header-inverse">
  <div class="card-header-title">
    <h4>{{ isset($registro->id) ? 'Editar - ' . $registro->nomeCompleto : 'Adicionar Turno' }}</h4>
  </div>
  <div class="card-header-buttons">
    <a class="btn btn-small btn-primary" href="{{ URL::route('listarTurno')}}">Listar Turnos</a>
    <div id="containerMenuFuncional"></div>
  </div>
</div>

<div class="card-body">
  @if(isset($registro->id))
    {{ Form::model($registro, array('route' => array('salvarTurno', $registro->id), 'method' => 'POST')) }}
    <div class="form-group row">
      <label for="id" class="col-sm-2 col-form-label">ID</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="id" value="{{$registro->id}}" readonly>
      </div>
    </div>
  @else
    {!! Form::open(['route' => 'salvarTurno', 'method' => 'POST']) !!}
  @endif

  {{-- NOME --}}
  <div class="form-group row">
    <label for="nomeCompleto" class="col-sm-2 col-form-label">Nome Completo</label>
    <div class="col-sm-10">
      <input type="text" class="form-control {{ $errors->has('nomeCompleto') ? 'is-invalid' : '' }}" name="nomeCompleto" value="{{ old( 'nomeCompleto', $registro->nomeCompleto) }}">

      {{ ($errors->has('nomeCompleto')) ? $errors->first('nomeCompleto') : '' }}
    </div>
  </div>

  {{-- ABREVIATURA --}}
  <div class="form-group row">
    <label for="nomeCurto" class="col-sm-2 col-form-label">Nome Curto</label>
    <div class="col-sm-10">
      <input type="text" class="form-control {{ $errors->has('nomeCurto') ? 'is-invalid' : '' }}" name="nomeCurto" value="{{ old( 'nomeCurto', $registro->nomeCurto) }}">

      {{ ($errors->has('nomeCurto')) ? $errors->first('nomeCurto') : '' }}
    </div>
  </div>

  {{-- SITUAÇÃO --}}
  <div class="form-group row">
    <label for="desabilitado" class="col-sm-2 col-form-label">Desabilitado</label>
    <div class="col-sm-10">
      <span class="switch switch-sm">
        <input type="checkbox" class="switch" id="switch-sm" name="desabilitado" {{$registro->desabilitado?' checked':''}}>
        <label for="switch-sm">&nbsp;</label>
      </span>
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