<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use Notifiable;

  protected $fillable = [
    'name', 'email', 'password', 'matricula',
  ];

  protected $hidden = [
    'password', 'remember_token',
  ];

  protected $rules = [
    'name'      => 'required|string|min:5|max:255',
    'matricula' => 'required|string|max:12|unique:users',
    'email'     => 'required|string|email|max:255|unique:users',
    'password'  => 'required|string|min:6|confirmed',
  ];


  /**
   * @param Request $request
   * @param integer $idRota
   *
   * @return Object(View) | Object(RedirectResponse)
   */
  public function delete()
  {
    if ( ($this->id == '1') ) {
      throw new \Illuminate\Validation\ValidationException('Não é possível realizar a exclusão.', '0001');
    }

    return parent::delete();
  }


  /**
   * @param Request $request
   * @param integer $idRota
   *
   * @return Object(View) | Object(RedirectResponse)
   */
  public function save(array $options = [])
  {
    /**
     * Só permitir alteração do usuário 1
     * pelo usuário 1
     */
    if ( ($this->id == '1') && (Auth::user()->id != '1') ) {
      return Redirect::route($this->routeList)->with('message', 'Não foi possível excluir ' . $this->singularName);
    }

    /**
     * Nunca desabilitar o usuário 1
     */
    if ( $this->id == '1') {
      $this->active = true;
    }

    return parent::save();
  }


  /**
  * GET AND SET
  */
  public function getRulesAttribute() {
    return $this->rules;
  }

  /**
  * FUNÇÕES
  */
  public function authorizeRoles($roles)
  {
    if (is_array($roles)) {
      return $this->hasAnyRole($roles);
    }
    return $this->hasRole($roles);
  }

  public function hasAnyRole($roles)
  {
    return null !== $this->roles()->whereIn('name', $roles)->first();
  }

  public function hasRole($role)
  {
    return null !== $this->roles()->where('name', $role)->first();
  }

  /**
  * RELACIONAMENTOS
  */
  public function roles()
  {
    return $this->belongsToMany(Role::class)->withPivot('escola_id');
  }
}
