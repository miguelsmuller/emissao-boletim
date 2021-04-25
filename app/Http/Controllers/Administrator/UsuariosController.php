<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

use App\Escola;
use App\User;
use App\Role;

class UsuariosController extends Controller
{
  /**
   * @var string
   */
  protected $folderView   = 'usuarios';


  /**
   * @var string
   */
  protected $routeForm    = 'formularioUsuario';


  /**
   * @var string
   */
  protected $routeList    = 'listarUsuario';


  /**
   * @var string
   */
  protected $singularName = 'Usuário';


  /**
   * @param Request $request
   *
   * @return Object(View) | Object(RedirectResponse)
   */
  public function listar(Request $request)
  {
    if (Auth::user()->authorizeRoles(['administrador']) == false) {
      return Redirect::route('dashboard')->with('message', 'Usuário não autorizado a acessar esse recurso. <small><strong>('. url()->current() .')</strong></small>');
    }

    $listagem = User::orderBy('name')->get();
    return view( $this->folderView.'.index', ['listagem' => $listagem] );
  }


  /**
   * @param integer $idRota
   *
   * @return Object(View) | Object(RedirectResponse)
   */
  public function formulario($idRota = null)
  {
    if (Auth::user()->authorizeRoles(['administrador']) == false) {
      return Redirect::route('dashboard')->with('message', 'Usuário não autorizado a acessar esse recurso. <small><strong>('. url()->current() .')</strong></small>');
    }

    if ($idRota == null){
      $registro = new User;
    }else{
      $registro = User::findOrFail($idRota);
    }

    $escolas = Escola::all();
    $roles = Role::all()->pluck('description', 'id');

    return view( $this->folderView.'.create', ['registro' => $registro, 'escolas' => $escolas, 'roles' => $roles]);
  }


  /**
   * @param Request $request
   * @param integer $idRota
   *
   * @return Object(View) | Object(RedirectResponse)
   */
  public function salvar(Request $request, $idRota = null)
  {
    if (Auth::user()->authorizeRoles(['administrador']) == false) {
      return Redirect::route('dashboard')->with('message', 'Usuário não autorizado a acessar esse recurso. <small><strong>('. url()->current() .')</strong></small>');
    }


    /**
    * Cria uma instancia do usuarios.
    * Recolhe as regras de validação para criação do usuário.
    */
    $registro = new User;
    $rules = $registro->getRulesAttribute();

    /**
    * Se for edição do usuário preciso então
    * editar a regra de validação de email e matricula.
    *
    * Se o campo de confirmação de senha de senha estiver
    * vazio é pq não tem necessidade de alterar a senha.
    * Então retiro a validação de senha.
    */
    if ($idRota != null) {
      $rules['email']     = $rules['email'] . ',id,' . $idRota;
      $rules['matricula'] = $rules['matricula'] . ',id,' . $idRota;

      if (Input::get('password_confirmation') == "") {
        unset($rules['password']);
      }
    }

    /**
    * Faço a validação do usuario
    */
    $validator = Validator::make($request->all(), $rules);

    /**
    * Caso a validação falhe.
    * Case a validação seja bem sucedida.
    */
    if ($validator->fails()) {
      return Redirect::route($this->routeForm, $idRota)->withErrors($validator)->withInput();
    } else {

      /**
      * Verifico se é edição do usuário
      * Caso positivo localizo o usuário
      */
      if ($idRota != null) {
        $registro = User::findOrFail($idRota);
      }

      $registro->name      = Input::get('name');
      $registro->matricula = Input::get('matricula');
      $registro->email     = Input::get('email');
      $registro->active    = ($request->has('active')) ? false : true;

      if (Input::get('password') != "") {
        $registro->password  = bcrypt(Input::get('password'));
      }

      $registro->save();

      foreach (Input::get('escolas') as $escola) {
        $registro->roles()->attach(Role::where('name', 'administrativo')->first(), ['escola_id' => $escola]);
      }



      return Redirect::route($this->routeList)->with('message', 'Processo realizado com sucesso');
    }
  }


  /**
   * @param integer $idRota
   *
   * @return Object(RedirectResponse)
   */
  public function excluir($idRota)
  {
    if (Auth::user()->authorizeRoles(['administrador']) == false) {
      return Redirect::route('dashboard')->with('message', 'Usuário não autorizado a acessar esse recurso. <small><strong>('. url()->current() .')</strong></small>');
    }

    try {
      $registro = User::findOrFail($idRota);

      $registro->delete();
    } catch (\Exception $e) {
      return Redirect::route($this->routeList)->with('message', 'Não foi possível excluir ' . $this->singularName);
    }

    return Redirect::route($this->routeList)->with('message', $this->singularName . ' excluído com sucesso.');
  }
}
