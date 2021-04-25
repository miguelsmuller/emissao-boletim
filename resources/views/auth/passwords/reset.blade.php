@extends('layouts.auth')

{{-- TÍTULO --}}
@section('title', 'Recuperação de Senha' )

{{-- ÁREA DE CONTEÚDO --}}
@section('content')
  <div class="col-md-8 offset-md-2">

    <a href="{{ URL::route('login') }}" class="text-dark">
      <h1 class="display-1 text-center mb-2"><i class="fas fa-graduation-cap"></i></h1>
    </a>

    <div class="card card-block w-100 mx-auto">
      <div class="card-header text-white bg-dark">
        <strong>{{ config('app.name') }} - Reset Password</strong>
      </div>
      <div class="panel-body">


  <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
    {{ csrf_field() }}

    <input type="hidden" name="token" value="{{ $token }}">

    {{-- EMAIL --}}
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
      <label for="email" class="col-md-4 control-label">E-Mail Address</label>

      <div class="col-md-6">
        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

        @if ($errors->has('email'))
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
        @endif
      </div>
    </div>

    {{-- PASSWORD --}}
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
      <label for="password" class="col-md-4 control-label">Password</label>

      <div class="col-md-6">
        <input id="password" type="password" class="form-control" name="password" required>

        @if ($errors->has('password'))
          <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
        @endif
      </div>
    </div>

    {{-- CONFIRMA PASSWORD --}}
    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
      <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

      <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

        @if ($errors->has('password_confirmation'))
          <span class="help-block">
            <strong>{{ $errors->first('password_confirmation') }}</strong>
          </span>
        @endif
      </div>
    </div>

    {{-- SUBMIT --}}
    <div class="form-group">
      <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">Reset Password</button>
      </div>
    </div>
  </form>


      </div>
    </div>
  </div>
@endsection
