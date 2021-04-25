<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

use App\TipoPeriodoAvaliativo;
use App\PeriodoAvaliativo;

class PeriodosAvaliativosController extends Controller
{
  /**
   * @var string
   */
  protected $folderView   = 'periodos-avaliativos';


  /**
   * @var string
   */
  protected $routeForm    = 'formularioPeriodoAvaliativo';


  /**
   * @var string
   */
  protected $routeList    = 'listarPeriodoAvaliativo';


  /**
   * @var string
   */
  protected $singularName = 'Período Avaliativo';


  /**
   * @param integer $idTipoPeriodo
   *
   * @return Object(View) | Object(RedirectResponse)
   */
  public function listar($idTipoPeriodo)
  {
    if (Auth::user()->authorizeRoles(['administrador', 'diretor']) == false) {
      return Redirect::route('dashboard')->with('message', 'Usuário não autorizado a acessar esse recurso. <small><strong>('. url()->current() .')</strong></small>');
    }

    $tipo = TipoPeriodoAvaliativo::findOrFail($idTipoPeriodo);
    $listagem = $tipo->periodosAvaliativos;

    return view( $this->folderView.'.index', ['tipo' => $tipo, 'listagem' => $listagem] );
  }


  /**
   * @param integer $idTipoPeriodo
   * @param integer $idRota
   *
   * @return Object(View) | Object(RedirectResponse)
   */
  public function formulario($idTipoPeriodo, $idRota = null)
  {
    if (Auth::user()->authorizeRoles(['administrador', 'diretor']) == false) {
      return Redirect::route('dashboard')->with('message', 'Usuário não autorizado a acessar esse recurso. <small><strong>('. url()->current() .')</strong></small>');
    }

    $tipo = TipoPeriodoAvaliativo::findOrFail($idTipoPeriodo);

    if ($idRota == null){
      $registro = new PeriodoAvaliativo;
    }else{
      $registro = PeriodoAvaliativo::findOrFail($idRota);
    }

    return view( $this->folderView.'.create', ['tipo' => $tipo, 'registro' => $registro] );
  }


  /**
   * @param Request $request
   * @param integer $idTipoPeriodo
   * @param integer $idRota
   *
   * @return Object(View) | Object(RedirectResponse)
   */
  public function salvar(Request $request, $idTipoPeriodo, $idRota = null)
  {
    if (Auth::user()->authorizeRoles(['administrador', 'diretor']) == false) {
      return Redirect::route('dashboard')->with('message', 'Usuário não autorizado a acessar esse recurso. <small><strong>('. url()->current() .')</strong></small>');
    }

    $validator = Validator::make($request->all(), [
      'nome' => 'required|min:5'
    ]);

    if ($validator->fails()) {
      return Redirect::route($this->routeForm, $idTipoPeriodo, $idRota)->withErrors($validator)->withInput();
    } else {

      if ($idRota == null) {
        $registro = new PeriodoAvaliativo;
        $mensagem = $this->singularName . ' inclúido com sucesso.';
      }else{
        $registro = PeriodoAvaliativo::findOrFail($idRota);
        $mensagem = $this->singularName . ' atualizado com sucesso.';
      }

      $registro->nome = Input::get('nome');
      $registro->desabilitado = ($request->has('desabilitado')) ? true : false;
      $registro->idTipoPeriodoAvaliativo = $idTipoPeriodo;
      $registro->save();

      return Redirect::route($this->routeList, $idTipoPeriodo)->with('message', $mensagem);
    }
  }


  /**
   * @param integer $idTipoPeriodo
   * @param integer $idRota
   *
   * @return Object(RedirectResponse)
   */
  public function excluir($idTipoPeriodo, $idRota)
  {
    if (Auth::user()->authorizeRoles(['administrador', 'diretor']) == false) {
      return Redirect::route('dashboard')->with('message', 'Usuário não autorizado a acessar esse recurso. <small><strong>('. url()->current() .')</strong></small>');
    }

    try {
      $registro = PeriodoAvaliativo::findOrFail($idRota);
      $registro->delete();
    } catch (\Exception $e) {
      return Redirect::route($this->routeList, $idTipoPeriodo)->with('message', 'Não foi possível excluir ' . $this->singularName);
    }

    return Redirect::route($this->routeList, $idTipoPeriodo)->with('message', $this->singularName . ' excluído com sucesso.');
  }
}
