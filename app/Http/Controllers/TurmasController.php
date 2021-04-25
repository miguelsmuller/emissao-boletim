<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

use App\Turma;
use App\Turno;
use App\GrauEscolariade;

class TurmasController extends Controller
{
  /**
   * @var string
   */
  protected $folderView   = 'turmas';


  /**
   * @var string
   */
  protected $routeForm    = 'formularioTurma';


  /**
   * @var string
   */
  protected $routeList    = 'listarTurma';


  /**
   * @var string
   */
  protected $singularName = 'Turma';


  /**
   * @return Object(View) | Object(RedirectResponse)
   */
  public function listar()
  {
    if (Auth::user()->authorizeRoles(['administrador', 'diretor', 'administrativo']) == false) {
      return Redirect::route('dashboard')->with('message', 'Usuário não autorizado a acessar esse recurso. <small><strong>('. url()->current() .')</strong></small>');
    }

    $listagem = Turma::orderBy('nomeCompleto')->get();
    return view( $this->folderView.'.index', ['listagem' => $listagem] );
  }


  /**
   * @param integer $idRota
   *
   * @return Object(View) | Object(RedirectResponse)
   */
  public function formulario($idRota = null)
  {
    if (Auth::user()->authorizeRoles(['administrador', 'diretor', 'administrativo']) == false) {
      return Redirect::route('dashboard')->with('message', 'Usuário não autorizado a acessar esse recurso. <small><strong>('. url()->current() .')</strong></small>');
    }

    if ($idRota == null){
      $registro = new Turma;
    }else{
      $registro = Turma::findOrFail($idRota);
    }

    $turnos = Turno::where('desabilitado', 0)->pluck('nomeCompleto', 'id');
    $grausEscolaridade = GrauEscolariade::where('desabilitado', 0)->pluck('nomeCompleto', 'id');

    return view( $this->folderView.'.create', ['registro' => $registro, 'turnos' => $turnos, 'grausEscolaridade' => $grausEscolaridade]);
  }


  /**
   * @param Request $request
   * @param integer $idRota
   *
   * @return Object(View) | Object(RedirectResponse)
   */
  public function salvar(Request $request, $idRota = null)
  {
    if (Auth::user()->authorizeRoles(['administrador', 'diretor', 'administrativo']) == false) {
      return Redirect::route('dashboard')->with('message', 'Usuário não autorizado a acessar esse recurso. <small><strong>('. url()->current() .')</strong></small>');
    }

    $validator = Validator::make($request->all(), [
      'nomeCompleto'     => 'required|max:4',
      'turno'            => 'required',
      'grauEscolaridade' => 'required'
    ]);

    if ($validator->fails()) {
      return Redirect::route($this->routeForm, $idRota)->withErrors($validator)->withInput();
    } else {

      if ($idRota == null) {
        $registro = new Turma;
      }else{
        $registro = Turma::findOrFail($idRota);
      }

      $grauEscolariade = GrauEscolariade::findOrFail($request->input('grauEscolaridade'));
      $turno = Turno::findOrFail($request->input('turno'));

      $registro->nomeCompleto = Input::get('nomeCompleto');
      $registro->desabilitado = ($request->has('desabilitado')) ? true : false;
      $registro->grauEscolariade()->associate($grauEscolariade);
      $registro->turno()->associate($turno);
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
    if (Auth::user()->authorizeRoles(['administrador', 'diretor', 'administrativo']) == false) {
      return Redirect::route('dashboard')->with('message', 'Usuário não autorizado a acessar esse recurso. <small><strong>('. url()->current() .')</strong></small>');
    }

    try {
      $registro = Turma::findOrFail($idRota);
      $registro->delete();
    } catch (\Exception $e) {
      return Redirect::route($this->routeList)->with('message', 'Não foi possível excluir ' . $this->singularName);
    }

    return Redirect::route($this->routeList)->with('message', $this->singularName . ' excluído com sucesso.');
  }
}
