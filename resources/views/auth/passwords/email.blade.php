@extends('layouts.auth')

{{-- TÍTULO --}}
@section('title', 'Recuperação de Senha' )

{{-- ÁREA DE CONTEÚDO --}}
@section('content')
  <form method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <h1>Recuperação de Senha</h1>

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
        <input type="text" id="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}" placeholder="E-Mail" required="required" autofocus="autofocus">
        <label for="email">E-Mail</label>
      </div>

      @if ($errors->has('email'))
        <span class="help-block">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
      @endif
    </div>

    <div class="login-form-actions">
      <div>
        <button type="submit" class="btn btn-primary">Entrar</button>
      </div>
    </div>

  </form>
@endsection
