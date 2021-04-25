<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

use App\TipoPeriodoAvaliativo;

class TiposPeriodoAvaliativoController extends Controller
{
  /**
   * @var string
   */
  protected $folderView   = 'tipos-periodos-avaliativos';


  /**
   * @var string
   */
  protected $routeForm    = 'formularioTipoPeriodoAvaliativo';


  /**
   * @var string
   */
  protected $routeList    = 'listarTipoPeriodoAvaliativo';


  /**
   * @var string
   */
  protected $singularName = 'Tipo de Período Avaliativo';


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

    $listagem = TipoPeriodoAvaliativo::orderBy('nome')->get();
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
      $registro = new TipoPeriodoAvaliativo;
    }else{
      $registro = TipoPeriodoAvaliativo::findOrFail($idRota);
    }

    return view( $this->folderView.'.create', ['registro' => $registro] );
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
      'nome' => 'required|min:5'
    ]);

    if ($validator->fails()) {
      return Redirect::route($this->routeForm, $idRota)->withErrors($validator)->withInput();
    } else {

      if ($idRota == null) {
        $registro = new TipoPeriodoAvaliativo;
        $mensagem = $this->singularName . ' inclúido com sucesso.';
      }else{
        $registro = TipoPeriodoAvaliativo::findOrFail($idRota);
        $mensagem = $this->singularName . ' atualizado com sucesso.';
      }

      $registro->nome    = Input::get('nome');
      $registro->desabilitado = ($request->has('desabilitado')) ? true : false;
      $registro->save();

      return Redirect::route($this->routeList)->with('message', $mensagem);
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
      $registro = TipoPeriodoAvaliativo::findOrFail($idRota);
      $registro->delete();
    } catch (\Exception $e) {
      return Redirect::route($this->routeList)->with('message', 'Não foi possível excluir ' . $this->singularName);
    }

    return Redirect::route($this->routeList)->with('message', $this->singularName . ' excluído com sucesso.');
  }
}
