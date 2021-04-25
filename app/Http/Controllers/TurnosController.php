<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

use App\Turno;

class TurnosController extends Controller
{
  /**
   * @var string
   */
  protected $folderView   = 'turnos';


  /**
   * @var string
   */
  protected $routeForm    = 'formularioTurno';


  /**
   * @var string
   */
  protected $routeList    = 'listarTurno';


  /**
   * @var string
   */
  protected $singularName = 'Turno';


  /**
   * @param Request $request
   *
   * @return Object(View) | Object(RedirectResponse)
   */
  public function listar(Request $request)
  {
    if (Auth::user()->authorizeRoles(['administrador', 'diretor']) == false) {
      return Redirect::route('dashboard')->with('message', 'Usuário não autorizado a acessar esse recurso. <small><strong>('. url()->current() .')</strong></small>');
    }

    $request->user()->authorizeRoles(['administrador', 'diretor', 'administrativo']);

    $listagem = Turno::orderBy('nomeCompleto')->get();
    return view( $this->folderView.'.index', ['listagem' => $listagem] );
  }


  /**
   * @param integer $idRota
   *
   * @return Object(View) | Object(RedirectResponse)
   */
  public function formulario($idRota = null)
  {
    if (Auth::user()->authorizeRoles(['administrador', 'diretor']) == false) {
      return Redirect::route('dashboard')->with('message', 'Usuário não autorizado a acessar esse recurso. <small><strong>('. url()->current() .')</strong></small>');
    }

    if ($idRota == null){
      $registro = new Turno;
    }else{
      $registro = Turno::findOrFail($idRota);
    }

    return view( $this->folderView.'.create', ['registro' => $registro]);
  }


  /**
   * @param Request $request
   * @param integer $idRota
   *
   * @return Object(View) | Object(RedirectResponse)
   */
  public function salvar(Request $request, $idRota = null)
  {
    if (Auth::user()->authorizeRoles(['administrador', 'diretor']) == false) {
      return Redirect::route('dashboard')->with('message', 'Usuário não autorizado a acessar esse recurso. <small><strong>('. url()->current() .')</strong></small>');
    }

    $validator = Validator::make($request->all(), [
      'nomeCurto'    => 'required|max:3',
      'nomeCompleto' => 'required|max:10'
    ]);

    if ($validator->fails()) {
      return Redirect::route($this->routeForm, $idRota)->withErrors($validator)->withInput();
    } else {

      if ($idRota == null) {
        $registro = new Turno;
      }else{
        $registro = Turno::findOrFail($idRota);
      }

      $registro->nomeCurto    = Input::get('nomeCurto');
      $registro->nomeCompleto = Input::get('nomeCompleto');
      $registro->desabilitado = ($request->has('desabilitado')) ? true : false;
      $registro->save();

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
    if (Auth::user()->authorizeRoles(['administrador', 'diretor']) == false) {
      return Redirect::route('dashboard')->with('message', 'Usuário não autorizado a acessar esse recurso. <small><strong>('. url()->current() .')</strong></small>');
    }

    try {
      $registro = Turno::findOrFail($idRota);
      $registro->delete();
    } catch (\Exception $e) {
      return Redirect::route($this->routeList)->with('message', 'Não foi possível excluir ' . $this->singularName);
    }

    return Redirect::route($this->routeList)->with('message', $this->singularName . ' excluído com sucesso.');
  }
}
