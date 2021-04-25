@extends('layouts.app')

{{-- TÍTULO --}}
@section('title', isset($registro->id) ? 'Usuário - ' . $registro->name : 'Adicionar Usuário' )

{{-- ÁREA DE CONTEÚDO --}}
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="card">


<div class="card-header card-header-inverse">
    <div class="card-header-title">
      <h4>{{ isset($registro->id) ? 'Editar usuário - ' . $registro->name : 'Adicionar Usuário' }}</h4>
    </div>
    <div class="card-header-buttons">
        <a class="btn btn-small btn-primary" href="{{ URL::route('listarUsuario')}}">Listar Usuários</a>
        <div id="containerMenuFuncional"></div>
    </div>
</div>

<div class="card-body">

@if(isset($registro->id))
  {{ Form::model($registro, array('route' => array('salvarUsuario', $registro->id), 'method' => 'POST')) }}
  <div class="row middle-xs">
    <div class="col-sm-3">
      <div class="form-group">
        <label for="id">ID</label>
        <div>
          <input type="text" name="id" value="{{$registro->id}}" readonly>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="form-group">
        <label class="label-check">Desabilitado
          <input type="checkbox" id="switch-sm" name="active" {{$registro->active?'':'checked'}}>
          <span class="switche"></span>
        </label>
      </div>
    </div>
  </div>
@else
  {!! Form::open(['route' => 'salvarUsuario', 'method' => 'POST']) !!}
  <div class="row">
    <div class="col-sm-4">
      <div class="form-group">
        <label class="label-check">Desabilitado
          <input type="checkbox" id="switch-sm" name="active" {{$registro->active?'':'checked'}}>
          <span class="switche"></span>
        </label>
      </div>
    </div>
  </div>
@endif




<div class="row">
  {{-- MATRICULA --}}
  <div class="col-sm-2">
    <div class="form-group">
      <label for="matricula">Grau de Escolaridade</label>
      <div>
        <input type="text" id="matricula" class="form-control {{ $errors->has('matricula') ? 'is-invalid' : '' }}" name="matricula" value="{{ old( 'matricula', $registro->matricula) }}">

        {{ ($errors->has('matricula')) ? $errors->first('matricula') : '' }}
      </div>
    </div>
  </div>

  {{-- NOME COMPLETO --}}
  <div class="col-sm-6">
    <div class="form-group">
      <label for="nomeCompleto">Nome Completo</label>
      <div>
        <input type="text" id="nomeCompleto" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old( 'name', $registro->name) }}">

        {{ ($errors->has('name')) ? $errors->first('name') : '' }}
      </div>
    </div>
  </div>

  {{-- EMAIL --}}
  <div class="col-sm-4">
    <div class="form-group">
      <label for="email">E-Mail</label>
      <div>
        <input type="email" id="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old( 'email', $registro->email) }}">

        {{ ($errors->has('email')) ? $errors->first('email') : '' }}
      </div>
    </div>
  </div>
</div>

<div class="row">
  {{-- SENHA --}}
  <div class="col-sm-3">
    <div class="form-group">
      <label for="senha">Senha</label>
      <div>
        <input type="password" id="senha" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" value="{{ old( 'password') }}">

        {{ ($errors->has('password')) ? $errors->first('password') : '' }}
      </div>
    </div>
  </div>

  {{-- CONFIRMAÇÃO DE SENHA --}}
  <div class="col-sm-3">
    <div class="form-group">
      <label for="confirmacaoSenha">Confirmação de senha</label>
      <div>
        <input type="password" id="confirmacaoSenha" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" name="password_confirmation">

        {{ ($errors->has('password_confirmation')) ? $errors->first('password_confirmation') : '' }}
      </div>
    </div>
  </div>
</div>


  {{-- ESCOLAS --}}
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header card-header-inverse">
          <div class="card-header-title">
            <h4>Autorizações</h4>
          </div>
        </div>
        <div class="card-body">

          <div class="row">
             @foreach($escolas as $escola)

              <div class="col-sm-4">
                <div class="form-group">
                  <label for="escola_{{$escola->nomeReduzido}}">{{$escola->nomeCompleto}}</label>

                  {!! Form::select('escolax', $roles, '', ['class' => 'form-control', 'placeholder' => 'Não autorizado'] ) !!}

                </div>
              </div>

            @endforeach

          </div>

        </div>
      </div>
    </div>
  </div>

  @php
    echo $registro->roles;
  @endphp

  {{dd($registro)}}

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