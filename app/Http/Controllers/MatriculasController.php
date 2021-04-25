<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

use App\Turma;
use App\Pessoa;
use App\Matricula;

class MatriculasController extends Controller
{
  /**
   * @var string
   */
  protected $folderView   = 'matriculas';


  /**
   * @var string
   */
  protected $routeList    = 'listarMatricula';


  /**
   * @var string
   */
  protected $singularName = 'Matricula';


  /**
   * @param integer $idTurma
   *
   * @return Object(View) | Object(RedirectResponse)
   */
  public function listar($idTurma){
    if (Auth::user()->authorizeRoles(['administrador', 'diretor', 'administrativo']) == false) {
      return Redirect::route('dashboard')->with('message', 'Usuário não autorizado a acessar esse recurso. <small><strong>('. url()->current() .')</strong></small>');
    }

    $registro = Turma::with('pessoas', 'grauEscolariade')->find($idTurma);

    return view($this->folderView.'.create', ['registro' => $registro]);
  }


  /**
   * @param Request $request
   * @param integer $idTurma
   *
   * @return Object(RedirectResponse)
   */
  public function salvar(Request $request, $idTurma){
    if (Auth::user()->authorizeRoles(['administrador', 'diretor', 'administrativo']) == false) {
      return Redirect::route('dashboard')->with('message', 'Usuário não autorizado a acessar esse recurso. <small><strong>('. url()->current() .')</strong></small>');
    }

    $registro = Turma::findOrFail($idTurma);

    $registro->pessoas()
            ->sync($request->input('novosAlunos'));

    return Redirect::route($this->routeList, $idTurma)->with('message', 'Alunos enturmados com sucesso');
  }
}
