@extends('layouts.auth')

{{-- TÍTULO --}}
@section('title', 'Vizualizar Boletim' )

{{-- ÁREA DE CONTEÚDO --}}
@section('content')
  <div class="card card-login mx-auto mt-5">
    <div class="card-header text-white bg-dark">
      <strong>{{ config('app.name') }} - Seja bem vindo</strong>
    </div>

    <div class="card-body py-3">
      @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif
      
      <form class="form-horizontal" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        @if($errors->any())
          <div class="alert alert-danger py-1 mb-1" role="alert">
            {!! $errors->first() !!}
          </div>
        @endif

        {{-- INEP --}}
        <div class="form-group">
          <div class="form-label-group">
            <input type="text" id="iua" name="iua" class="form-control {{ $errors->has('iua') ? 'is-invalid' : '' }}" value="{{ old('iua') }}" placeholder="INEP" required="required" autofocus="autofocus">
            <label for="iua">INEP</label>
          </div>

          @if ($errors->has('iua'))
            <span class="help-block invalid-feedback">
              <small><strong>{{ $errors->first('iua') }}</small></strong>
            </span>
          @endif
        </div>

        {{-- MATRICULA --}}
        <div class="form-group">
          <div class="form-label-group">
            <input type="text" id="matricula" name="matricula" class="form-control {{ $errors->has('matricula') ? 'is-invalid' : '' }}" value="{{ old('matricula') }}" required="required" placeholder="Matricula">
            <label for="matricula">Matricula</label>
          </div>

          @if ($errors->has('matricula'))
            <span class="help-block invalid-feedback">
              <small><strong>{{ $errors->first('matricula') }}</small></strong>
            </span>
          @endif
        </div>

        {{-- D-NASCIMENTO --}}
        <div class="form-group">
          <div class="form-label-group">
            <input type="text" id="dtNascimento" name="dtNascimento" class="form-control mask-date {{ $errors->has('dtNascimento') ? 'is-invalid' : '' }}" value="{{ old('dtNascimento') }}" required="required"  placeholder="D. de Nascimento">
            <label for="dtNascimento">D. de Nascimento</label>
          </div>

          @if ($errors->has('dtNascimento'))
            <span class="help-block invalid-feedback">
              <small><strong>{{ $errors->first('dtNascimento') }}</strong></small>
            </span>
          @endif
        </div>

        {{-- CPF --}}
        <div class="form-group">
          <div class="form-label-group">
            <input type="text" id="cpf" name="cpf" class="form-control mask-cpf {{ $errors->has('cpf') ? 'is-invalid' : '' }}" value="{{ old('cpf') }}" required="required" placeholder="CPF">
            <label for="cpf">CPF</label>
          </div>

          @if ($errors->has('cpf'))
            <span class="help-block invalid-feedback">
              <small><strong>{{ $errors->first('cpf') }}</small></strong>
            </span>
          @endif
        </div>

        {{-- SUBMIT --}}
        <button type="submit" class="btn btn-primary btn-block">Visualizar Boletim</button>
      </form>
    </div>

  </div>

  <a href="{{ URL::route('login') }}" class="btnLoginInvisivel"></a>
@endsection
