@extends('layouts.auth')

{{-- TÍTULO --}}
@section('title', 'Solicitação de Acesso' )

{{-- ÁREA DE CONTEÚDO --}}
@section('content')
  <form method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}
    <h1>Solicitação de Acesso</h1>

    @if (session('status'))
      <div class="alert alert-message alert-success">
        {{ session('status') }}
      </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger">
        <div class="alert-message">
        {!! $errors->first() !!}
        </div>
        <button class="alert-close"><i class="eva eva-close"></i></button>
      </div>
    @endif

    <div class="form-group">
      <div class="floating-label">
        <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" placeholder="Nome" required="required" autofocus="autofocus">
        <label for="name">Nome</label>
      </div>

      @if ($errors->has('name'))
        <span class="help-block invalid-feedback">
          <small><strong>{{ $errors->first('name') }}</strong></small>
        </span>
      @endif
    </div>


    <div class="form-group">
      <div class="floating-label">
        <input type="text" id="matricula" name="matricula" class="form-control {{ $errors->has('matricula') ? 'is-invalid' : '' }}" placeholder="Matrícula" required="required">
        <label for="matricula">Matrícula</label>
      </div>

      @if ($errors->has('matricula'))
        <span class="help-block invalid-feedback">
          <small><strong>{{ $errors->first('matricula') }}</small></strong>
        </span>
      @endif
    </div>

    <div class="form-group">
      <div class="floating-label">
        <input type="text" id="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="E-Mail" required="required">
        <label for="email">E-Mail</label>
      </div>

      @if ($errors->has('email'))
        <span class="help-block invalid-feedback">
          <small><strong>{{ $errors->first('email') }}</small></strong>
        </span>
      @endif
    </div>


    <div class="form-group">
      <div class="floating-label">
        <input type="password" id="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Senha" required="required">
        <label for="password">Senha</label>
      </div>

      @if ($errors->has('password'))
        <span class="help-block invalid-feedback">
          <small><strong>{{ $errors->first('password') }}</small></strong>
        </span>
      @endif
    </div>


    <div class="form-group">
      <div class="floating-label">
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" placeholder="Confirmação de Senha" required="required">
        <label for="password_confirmation">Confirmação de Senha</label>
      </div>

      @if ($errors->has('password_confirmation'))
        <span class="help-block invalid-feedback">
          <small><strong>{{ $errors->first('password_confirmation') }}</small></strong>
        </span>
      @endif
    </div>




    <div class="login-form-actions">
      <div>
        <button type="submit" class="btn btn-primary">Solicitar acesso</button>
      </div>
    </div>

  </form>
@endsection
