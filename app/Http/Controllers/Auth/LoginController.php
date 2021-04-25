<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
  use AuthenticatesUsers;

  protected $redirectTo = '/login';

  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }

  public function login(Request $request)
  {
    $this->validateLogin($request);

    if ($this->hasTooManyLoginAttempts($request)) {
        $this->fireLockoutEvent($request);
        return $this->sendLockoutResponse($request);
    }

    if ($this->guard()->validate($this->credentials($request))) {
      $user = $this->guard()->getLastAttempted();

      if ($user->active && $this->attemptLogin($request)) {
          return $this->sendLoginResponse($request);
      } else {
          $this->incrementLoginAttempts($request);
          return redirect()
              ->back()
              ->withInput($request->only($this->username(), 'remember'))
              ->withErrors(['active' => '<span class="alert-link">Usuário Bloqueado</span>. Entre em contato com o administrador.']);
      }
    }

    $this->incrementLoginAttempts($request);

    return $this->sendFailedLoginResponse($request);
  }

  public function username()
  {
    $login = request()->input('email');
    $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'matricula';
    request()->merge([$field => $login]);
    return $field;
  }
}
