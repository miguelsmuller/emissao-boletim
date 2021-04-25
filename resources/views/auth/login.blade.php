@extends('layouts.auth')

{{-- TÍTULO --}}
@section('title', 'Iniciar Sessão' )

{{-- ÁREA DE CONTEÚDO --}}
@section('content')
  <form method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <h1>Iniciar Sessão</h1>

    @if (session('status'))
      <div class="alert alert-message alert-success">
      <i class="eva eva-person-outline"></i>
        {{ session('status') }}
      </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger">
        <div class="alert-icon">
        <i class="eva eva-shield-outline"></i>
        </div>
        <div class="alert-message">
        {!! $errors->first() !!}
        </div>
        <button class="alert-close"><i class="eva eva-close"></i></button>
      </div>
    @endif

    <div class="form-group">
      <div class="floating-label">
        <input type="text" id="email" name="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}" placeholder="Matrícula" required="required" autofocus="autofocus">
        <label for="email">Matrícula ou CPF</label>
      </div>
    </div>

    <div class="form-group">
      <div class="floating-label">
      <input type="password" id="password" name="password" class="{{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Senha" required="required">
        <label for="password">Senha</label>
      </div>
    </div>

    <div class="login-form-actions">
      <div>
          <label class="label-check">Lembrar Informações
              <input type="checkbox" checked="checked">
              <span class="checkmark"></span>
            </label>
      </div>

      <div>
        <button type="submit" class="btn btn-primary">Entrar</button>
      </div>
    </div>

    <div>
      <a href="{{ URL::route('register')}}">Solicitar acesso</a> | <a href="{{ URL::to('password/reset/') }}">Lembrar senha</a>
    </div>

  </form>
@endsection
