<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\User;
use App\Role;

class RegisterController extends Controller
{
  use RegistersUsers;

  protected $redirectTo = '/';

  public function __construct()
  {
    $this->middleware('guest');
  }

  protected function validator(array $data)
  {
    $user = new User;
    $rules = $user->getRulesAttribute();

    return Validator::make($data, $rules);
  }

  protected function create(array $data)
  {
    $user = User::create([
      'name'      => $data['name'],
      'matricula' => $data['matricula'],
      'email'     => $data['email'],
      'password'  => bcrypt($data['password']),
      'active'    => false
    ]);

    //$user->roles()->attach(Role::where('name', 'administrativo')->first());

    return $user;
  }

  public function register(Request $request)
  {
    $this->validator($request->all())->validate();

    event(new Registered($user = $this->create($request->all())));

    //$this->guard()->login($user);

    return $this->registered($request, $user)
                    ?: redirect($this->redirectPath());
  }
}
