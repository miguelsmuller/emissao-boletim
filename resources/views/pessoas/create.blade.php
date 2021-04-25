@extends('layouts.app')

{{-- TÍTULO --}}
@section('title', isset($registro->id) ? 'Editar Pessoa - ' . $registro->nomeCompleto : 'Adicionar Pessoa' )

{{-- ÁREA DE CONTEÚDO --}}
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header card-header-inverse">
        <div class="card-header-title">
          <h4>{{ isset($registro->id) ? 'Editar - ' . Str::words($registro->nomeCompleto, 2) : 'Adicionar Pessoa' }}</h4>
        </div>
        <div class="card-header-buttons">
          <a class="btn btn-small btn-primary" href="{{ URL::route('listarPessoa')}}">Listar Pessoas</a>
          <div id="containerMenuFuncional"></div>
        </div>
      </div>
      <div class="card-body">

@if(isset($registro->id))
  {{ Form::model($registro, array('route' => array('salvarPessoa', $registro->id), 'method' => 'POST')) }}
@else
  {!! Form::open(['route' => 'salvarPessoa', 'method' => 'POST']) !!}
@endif

<div class="row middle-xs">
  {{-- COLUNA IMAGEM --}}
  <div class="col-sm-2">
    <div class="avatar">
      <img class="img-fluid rounded-circle w-100" src="http://i.pravatar.cc/300" alt="Generic placeholder image" width="140" height="140">
      <label class="btn btn-primary btn-small">Enviar imagem <input type="file" hidden></label>
    </div>
  </div>

  {{-- COLUNA CAMPOS --}}
  <div class="col-sm-10">

    {{-- ID --}}
    @if(isset($registro->id))
      <div class="form-group row">
        <label for="id" class="col-sm-3 col-form-label">ID</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="id" value="{{$registro->id}}" readonly>
        </div>
      </div>
    @endif

    {{-- NOME --}}
    <div class="form-group row">
      <label for="nomeCompleto" class="col-sm-3 col-form-label">Nome Completo</label>
      <div class="col-sm-9">
        <input type="text" class="form-control {{ $errors->has('nomeCompleto') ? 'is-invalid' : '' }}" name="nomeCompleto" value="{{ old( 'nomeCompleto', $registro->nomeCompleto) }}">

        {{ ($errors->has('nomeCompleto')) ? $errors->first('nomeCompleto') : '' }}
      </div>
    </div>

    {{-- IUA --}}
    <div class="form-group row">
      <label for="iua" class="col-sm-3 col-form-label">IUA</label>
      <div class="col-sm-9">
        <input type="text" class="form-control {{ $errors->has('iua') ? 'is-invalid' : '' }}" name="iua" value="{{ old( 'iua', $registro->iua) }}">

        {{ ($errors->has('iua')) ? $errors->first('iua') : '' }}
      </div>
    </div>

    {{-- CPF --}}
    <div class="form-group row">
      <label for="cpf" class="col-sm-3 col-form-label">CPF</label>
      <div class="col-sm-9">
        <input type="text" class="form-control mask-cpf {{ $errors->has('cpf') ? 'is-invalid' : '' }}" name="cpf" value="{{ old( 'cpf', $registro->cpf) }}">

        {{ ($errors->has('cpf')) ? $errors->first('cpf') : '' }}
      </div>
    </div>

    {{-- DT. NASCIMENTO --}}
    <div class="form-group row">
      <label for="dtNascimento" class="col-sm-3 col-form-label">D. Nascimento</label>
      <div class="col-sm-9">
        <input type="text" class="form-control mask-date {{ $errors->has('dtNascimento') ? 'is-invalid' : '' }}" name="dtNascimento" value="{{ old( 'dtNascimento', $registro->dtNascimento) }}">

        {{ ($errors->has('dtNascimento')) ? $errors->first('dtNascimento') : '' }}
      </div>
    </div>
  </div>
</div>

<div class="card">
  <ul class="card-tabs">
    <li><a class="active" id="pessoal-tab" href="#pessoal">Pessoal</a></li>
    <li><a id="medico-tab" href="#medico">Médico</a></li>
    <li><a id="contato-tab" href="#contato">Contato</a></li>
    <li><a id="transporte-tab" href="#transporte">Transporte</a></li>
    <li><a id="historico-tab" href="#historico">Histório</a></li>
  </ul>

  <div class="card-body">
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="pessoal" role="tabpanel" aria-labelledby="pessoal-tab">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
      <div class="tab-pane fade" id="medico" role="tabpanel" aria-labelledby="medico-tab">...</div>
      <div class="tab-pane fade" id="contato" role="tabpanel" aria-labelledby="contato-tab">...</div>
      <div class="tab-pane fade" id="transporte" role="tabpanel" aria-labelledby="transporte-tab">...</div>
      <div class="tab-pane fade" id="historico" role="tabpanel" aria-labelledby="historico-tab">...</div>
    </div>
  </div>
</div>

<input type="hidden" name="_token" value="{{ csrf_token() }}">
<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>

{!! Form::close() !!}


      </div>
    </div>
  </div>
</div>
@endsection

{{-- ÁREA DE JAVASCRIPT --}}
@section('js')
  <script>
    /*
    CONFIGURAÇÃO DO SELECT BOX
    */
    $(document).ready(function() {
      var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
      }

      $(".file-upload").on('change', function(){
        readURL(this);
      });

      $(".upload-button").on('click', function() {
        $(".file-upload").click();
      });
    });
  </script>
@endsection