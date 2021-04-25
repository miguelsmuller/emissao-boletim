<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

use App\GradeCurricular;
use App\GrauEscolariade;
use App\ComponenteCurricular;

class GradesCurricularesController extends Controller
{
  /**
   * @var string
   */
  protected $folderView   = 'grades-curriculares';


  /**
   * @var string
   */
  protected $routeForm    = 'formularioGradeCurricular';


  /**
   * @var string
   */
  protected $routeList    = 'listarGradeCurricular';


  /**
   * @var string
   */
  protected $singularName = 'Turno';


  /**
   * @param integer $idGrauEscolaridade
   *
   * @return Object(View) | Object(RedirectResponse)
   */
  public function listar($idGrauEscolaridade)
  {
    if (Auth::user()->authorizeRoles(['administrador', 'diretor']) == false) {
      return Redirect::route('dashboard')->with('message', 'Usuário não autorizado a acessar esse recurso. <small><strong>('. url()->current() .')</strong></small>');
    }

    $tipo = GrauEscolariade::findOrFail($idGrauEscolaridade);
    $listagem = ComponenteCurricular::all();
    return view($this->folderView.'.create', ['tipo' => $tipo, 'listagem' => $listagem]);
  }


  /**
   * @param Request $request
   * @param integer $idGrauEscolaridade
   *
   * @return Object(RedirectResponse)
   */
  public function salvar(Request $request, $idGrauEscolaridade)
  {
    if (Auth::user()->authorizeRoles(['administrador', 'diretor']) == false) {
      return Redirect::route('dashboard')->with('message', 'Usuário não autorizado a acessar esse recurso. <small><strong>('. url()->current() .')</strong></small>');
    }

    $registro = GrauEscolariade::findOrFail($idGrauEscolaridade);

    $registro->componentesCurriculares()->sync($request->input('componentesCurriculares'));

    return Redirect::route($this->routeList, $idGrauEscolaridade)->with('message', 'Grade curricular atualizada com sucesso');
  }
}
