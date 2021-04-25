<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

use App\Nota;
use App\Turma;
use App\GrauEscolariade;
use App\ComponenteCurricular;
use App\PeriodoAvaliativo;

use Barryvdh\DomPDF\PDF;

class NotasController extends Controller
{
  /**
   * @var string
   */
  protected $folderView = 'notas';


  /**
   * @param integer $idTurma
   *
   * @return Object(View) | Object(RedirectResponse)
   */
  public function selecionar($idTurma){
    if (Auth::user()->authorizeRoles(['administrador', 'diretor', 'administrativo']) == false) {
      return Redirect::route('dashboard')->with('message', 'Usuário não autorizado a acessar esse recurso. <small><strong>('. url()->current() .')</strong></small>');
    }

    $turma = Turma::findOrFail($idTurma);
    $grauEscolaridade = GrauEscolariade::with('componentesCurriculares')->find($turma->idGrauEscolaridade);

    return view($this->folderView.'.select', ['turma' => $turma, 'grauEscolaridade' => $grauEscolaridade]);
  }


  /**
   * @param Request $request
   * @param integer $idGrauEscolaridade
   *
   * @return Object(View) | Object(RedirectResponse)
   */
  public function listar($idTurma, $idComponenteCurricular){
    if (Auth::user()->authorizeRoles(['administrador', 'diretor', 'administrativo']) == false) {
      return Redirect::route('dashboard')->with('message', 'Usuário não autorizado a acessar esse recurso. <small><strong>('. url()->current() .')</strong></small>');
    }

    $notas = Nota::where('idTurma', '=', $idTurma)
      ->where('idComponenteCurricular', '=', $idComponenteCurricular)
      ->get();

    $data = array();
    foreach ($notas as $nota) {
      $data['notas'][$nota->matricula->id][$nota->idPeriodoAvaliativo]['nota'] = $nota->nota;
      $data['notas'][$nota->matricula->id][$nota->idPeriodoAvaliativo]['falta'] = $nota->falta;
    }

    $data['turma'] = Turma::with('pessoas', 'grauEscolariade')->findOrFail($idTurma);
    $data['componente'] = ComponenteCurricular::findOrFail($idComponenteCurricular);
    $data['periodo'] = PeriodoAvaliativo::where('idTipoPeriodoAvaliativo', $data['turma']->grauEscolariade->idTipoPeriodoAvaliativo)->get();

    return view($this->folderView.'.list', ['data' => $data]);
  }


  /**
   * @param integer $idTurma
   *
   * @return Object(View) | Object(RedirectResponse)
   */
  public function boletim($idTurma){
    if (Auth::user()->authorizeRoles(['administrador', 'diretor', 'administrativo']) == false) {
      return Redirect::route('dashboard')->with('message', 'Usuário não autorizado a acessar esse recurso. <small><strong>('. url()->current() .')</strong></small>');
    }

    $table = Nota::with('matricula.pessoa',  'componenteCurricular', 'periodoAvaliativo', 'turma.grauEscolariade', 'turma.turno')
          ->where('idTurma', '=', $idTurma)
          ->orderBy('idMatricula', 'asc')
          ->orderBy('idComponenteCurricular', 'asc')
          ->orderBy('idPeriodoAvaliativo', 'asc')
          ->get();

    $turma = $table[0]->turma->toArray();

    $notas = array();
    foreach ($table as $row) {
      $keyMatricula = '' . $row->idMatricula;
      $notas[$keyMatricula]['matricula'] = $row->matricula->toArray();
      //$notas[$keyMatricula]['matricula']['nome_matricula'] = $row->matricula->nome_matricula;

      $keyComponente = 'componente-' . $row->idComponenteCurricular;
      $notas[$keyMatricula]['componentes'][$keyComponente]['componenteData'] = $row->componenteCurricular->toArray();

      $KeyPeriodo = $row->idPeriodoAvaliativo;
      $notas[$keyMatricula]['componentes'][$keyComponente]['periodos'][$KeyPeriodo]['periodoData'] = $row->periodoAvaliativo->toArray();
      $notas[$keyMatricula]['componentes'][$keyComponente]['periodos'][$KeyPeriodo]['nota'] = $row->nota;
      $notas[$keyMatricula]['componentes'][$keyComponente]['periodos'][$KeyPeriodo]['falta'] = $row->falta;
    }

    //return view('notas.boletim', ['notas' => $notas, 'turma' => $turma]);

    $pdf = \PDF::loadView('notas.boletim', ['notas' => $notas, 'turma' => $turma]);
    $pdf->setOptions(['dpi' => 150, 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'defaultFont' => 'Arial']);
    $pdf->setPaper('A4','portrait');

    return $pdf->stream('boletim.pdf');
  }


  /**
   * @param Request $request
   * @param integer $idTurma
   * @param integer $idComponente
   *
   * @return Object(View) | Object(RedirectResponse)
   */
  public function salvar(Request $request, $idTurma, $idComponente){
    if (Auth::user()->authorizeRoles(['administrador', 'diretor', 'administrativo']) == false) {
      return Redirect::route('dashboard')->with('message', 'Usuário não autorizado a acessar esse recurso. <small><strong>('. url()->current() .')</strong></small>');
    }

    $componente = ComponenteCurricular::findOrFail($idComponente);

    $valorPeriodo = $request->periodo;
    foreach ($valorPeriodo as $periodo => $valorPeriodo) { //PERCORRE OS PERIODOS
      foreach ($valorPeriodo as $matricula => $valorAluno) { //PERCORRE OS ALUNOS
        $registro = Nota::updateOrCreate(
          ['idMatricula' => $matricula, 'idPeriodoAvaliativo' => $periodo, 'idComponenteCurricular' => $componente->id, 'idTurma' => $idTurma],
          ['nota' => $valorAluno['nota'], 'falta' => $valorAluno['falta']]
        );
      }
    }

    return Redirect::route('listarNota', [$idTurma, $idComponente]);
  }
}
