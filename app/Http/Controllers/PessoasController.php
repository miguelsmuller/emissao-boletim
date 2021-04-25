<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

use App\Pessoa;
use App\Http\Resources\PessoaResource;
use App\Http\Resources\PessoasResource;

class PessoasController extends Controller
{
  /**
   * @var string
   */
  protected $folderView   = 'pessoas';


  /**
   * @var string
   */
  protected $routeForm    = 'formularioPessoa';


  /**
   * @var string
   */
  protected $routeList    = 'listarPessoa';


  /**
   * @var string
   */
  protected $singularName = 'Pessoa';


  /**
   * @return Object(View) | Object(RedirectResponse)
   */
  public function listar()
  {
    if (Auth::user()->authorizeRoles(['administrador', 'diretor', 'administrativo']) == false) {
      return Redirect::route('dashboard')->with('message', 'Usuário não autorizado a acessar esse recurso. <small><strong>('. url()->current() .')</strong></small>');
    }

    $listagem = Pessoa::orderBy('nomeCompleto')->get();
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
      $registro = new Pessoa;
    }else{
      $registro = Pessoa::findOrFail($idRota);
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
    if (Auth::user()->authorizeRoles(['administrador', 'diretor', 'administrativo']) == false) {
      return Redirect::route('dashboard')->with('message', 'Usuário não autorizado a acessar esse recurso. <small><strong>('. url()->current() .')</strong></small>');
    }

    $validator = Validator::make($request->all(), [
      'nomeCompleto' => 'required|max:60'
    ]);

    if ($validator->fails()) {
      return Redirect::route($this->routeForm, $idRota)->withErrors($validator)->withInput();
    } else {

      if ($idRota == null) {
        $registro = new Pessoa;
      }else{
        $registro = Pessoa::findOrFail($idRota);
      }

      $registro->iua          = Input::get('iua');
      $registro->nomeCompleto = Input::get('nomeCompleto');
      $registro->cpf          = Input::get('cpf');
      $registro->dtNascimento = Input::get('dtNascimento');
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
      $registro = Pessoa::findOrFail($idRota);
      $registro->delete();
    } catch (\Exception $e) {
      return Redirect::route($this->routeList)->with('message', 'Não foi possível excluir ' . $this->singularName);
    }

    return Redirect::route($this->routeList)->with('message', $this->singularName . ' excluído com sucesso.');
  }


  /**
   * @param Request $request
   *
   * @return Array/Object
   */
  public function search(Request $request){

    if($request->ajax()){
      $query = $request->search;

      $pessoas = DB::table('tblPessoas')
        ->where('iua', 'like', $query.'%')
        ->orWhere('nomeCompleto', 'like', '%'.$query.'%')
        ->get();

      return response()->json($pessoas);
    }
  }


  /**
   * @param Request $request
   *
   * @return Array/Object
   */
  public function ajaxPessoas(Request $request){
    PessoasResource::withoutWrapping();

    $query = $request->search;

    return new PessoasResource(
      Pessoa::orWhere('nomeCompleto', 'like', '%'.$query.'%')
              ->orWhere('iua', 'like', $query.'%')
              ->orWhere('cpf', 'like', $query.'%')
              ->get()
    );
  }


  /**
   * @param Pessoa $pessoa
   *
   * @return Array/Object
   */
  public function ajaxPessoa(Pessoa $pessoa){
    PessoaResource::withoutWrapping();

    return new PessoaResource($pessoa);
  }
}
