<?php
Route::get('/', function () {
  //return view('welcome');
  return redirect(route('login'));
})->name('welcome');

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/components', function () {
  return view('components');
})->middleware('auth')->name('components');

//AJAX
Route::get('/ajax/search/','PessoasController@search');
Route::get('/ajax/pessoas/','PessoasController@ajaxPessoas');
Route::get('/ajax/pessoa/{pessoa}','PessoasController@ajaxPessoa');

// AUTHENTICATOR
Route::get('/logout', function () { Auth::logout(); return redirect('/'); })->name('logout');
Auth::routes();

Route::middleware(['auth'])->group(function () {
  // ESCOLA
  Route::prefix('escola')->group(function () {
    $controller = 'EscolaController';
    Route::get('/', array('uses' => $controller.'@listar'))->name('listarEscola');
    Route::get('/formulario/{id?}', array('uses' => $controller.'@formulario'))->name('formularioEscola');
    Route::post('/salvar/{id?}', array('uses' => $controller.'@salvar'))->name('salvarEscola');
    Route::get('/excluir/{id}', array('uses' => $controller.'@excluir'))->name('excluirEscola');
  });


  // COMPONENTE CURRICULAR
  Route::prefix('componentes-curriculares')->group(function () {
    $controller = 'ComponentesCurricularesController';
    Route::get('/', array('uses' => $controller.'@listar'))->name('listarComponenteCurricular');
    Route::get('/formulario/{id?}', array('uses' => $controller.'@formulario'))->name('formularioComponenteCurricular');
    Route::post('/salvar/{id?}', array('uses' => $controller.'@salvar'))->name('salvarComponenteCurricular');
    Route::get('/excluir/{id}', array('uses' => $controller.'@excluir'))->name('excluirComponenteCurricular');
  });


  // TIPOS DE PERIODOS AVALIATIVOS E PERIODOS AVALIATIVOS
  Route::prefix('tipos-periodos-avaliativos')->group(function () {
    $controller = 'TiposPeriodoAvaliativoController';
    Route::get('/', array('uses' => $controller.'@listar'))->name('listarTipoPeriodoAvaliativo');
    Route::get('/formulario/{id?}', array('uses' => $controller.'@formulario'))->name('formularioTipoPeriodoAvaliativo');
    Route::post('/salvar/{id?}', array('uses' => $controller.'@salvar'))->name('salvarTipoPeriodoAvaliativo');
    Route::get('/excluir/{id}', array('uses' => $controller.'@excluir'))->name('excluirTipoPeriodoAvaliativo');

    $controller = 'PeriodosAvaliativosController';
    $url = 'periodos-avaliativos';
    Route::get('/{idTipo}/'. $url .'/', array('uses' => $controller.'@listar'))->name('listarPeriodoAvaliativo');
    Route::get('/{idTipo}/'. $url .'/formulario/{id?}', array('uses' => $controller.'@formulario'))->name('formularioPeriodoAvaliativo');
    Route::post('/{idTipo}/'. $url .'/salvar/{id?}', array('uses' => $controller.'@salvar'))->name('salvarPeriodoAvaliativo');
    Route::get('/{idTipo}/'. $url .'/excluir/{id?}', array('uses' => $controller.'@excluir'))->name('excluirPeriodoAvaliativo');
  });


  // COMPONENTE CURRICULAR
  Route::prefix('componentes-curriculares')->group(function () {
    $controller = 'ComponentesCurricularesController';
    Route::get('/', array('uses' => $controller.'@listar'))->name('listarComponenteCurricular');
    Route::get('/formulario/{id?}', array('uses' => $controller.'@formulario'))->name('formularioComponenteCurricular');
    Route::post('/salvar/{id?}', array('uses' => $controller.'@salvar'))->name('salvarComponenteCurricular');
    Route::get('/excluir/{id}', array('uses' => $controller.'@excluir'))->name('excluirComponenteCurricular');
  });


  // GRAUS DE ESCOLARIDADE / GRADE CURRICULAR
  Route::prefix('graus-escolaridade')->group(function () {
    $controller = 'GrausEscolaridadeController';
    Route::get('/', array('uses' => $controller.'@listar'))->name('listarGrauEscolaridade');
    Route::get('/formulario/{id?}', array('uses' => $controller.'@formulario'))->name('formularioGrauEscolaridade');
    Route::post('/salvar/{id?}', array('uses' => $controller.'@salvar'))->name('salvarGrauEscolaridade');
    Route::get('/excluir/{id}', array('uses' => $controller.'@excluir'))->name('excluirGrauEscolaridade');

    $controller = 'GradesCurricularesController';
    $url = 'grade-curricular';
    Route::get('{id}/'. $url, array('uses' => $controller.'@listar'))->name('listarGradeCurricular');
    Route::post('{id}/'. $url .'/salvar', array('uses' => $controller.'@salvar'))->name('salvarGradeCurricular');
  });


  // TURNOS
  Route::prefix('turnos')->group(function () {
    $controller = 'TurnosController';
    Route::get('/', array('uses' => $controller.'@listar'))->name('listarTurno');
    Route::get('/formulario/{id?}', array('uses' => $controller.'@formulario'))->name('formularioTurno');
    Route::post('/salvar/{id?}', array('uses' => $controller.'@salvar'))->name('salvarTurno');
    Route::get('/excluir/{id}', array('uses' => $controller.'@excluir'))->name('excluirTurno');
  });


  // PESSOAS
  Route::prefix('pessoas')->group(function () {
    $controller = 'PessoasController';
    Route::get('/', array('uses' => $controller.'@listar'))->name('listarPessoa');
    Route::get('/formulario/{id?}', array('uses' => $controller.'@formulario'))->name('formularioPessoa');
    Route::post('/salvar/{id?}', array('uses' => $controller.'@salvar'))->name('salvarPessoa');
    Route::get('/excluir/{id}', array('uses' => $controller.'@excluir'))->name('excluirPessoa');
  });


  // TURMAS / MATRICULAS / NOTAS
  Route::prefix('turmas')->group(function () {
    $controller = 'TurmasController';
    Route::get('/', array('uses' => $controller.'@listar'))->name('listarTurma');
    Route::get('/formulario/{id?}', array('uses' => $controller.'@formulario'))->name('formularioTurma');
    Route::post('/salvar/{id?}', array('uses' => $controller.'@salvar'))->name('salvarTurma');
    Route::get('/excluir/{id}', array('uses' => $controller.'@excluir'))->name('excluirTurma');

    $controller = 'MatriculasController';
    Route::get('/{id}/enturmacao/', array('uses' => $controller.'@listar'))->name('listarMatricula');
    Route::post('/{id}/enturmacao/salvar', array('uses' => $controller.'@salvar'))->name('salvarMatricula');

    $controller = 'NotasController';
    Route::get('/{id}/lancar-notas/', array('uses' => $controller.'@selecionar'))->name('selecionarNota');
    Route::get('/{id}/lancar-notas/materia/{materia}', array('uses' => $controller.'@listar'))->name('listarNota');
    Route::post('/{id}/lancar-notas/salvar/{materia}', array('uses' => $controller.'@salvar'))->name('salvarNota');

    //Route::get('/{id}/emitir-boletim', array('uses' => $controller.'@boletim'))->name('emtirBoletim');
  });


  // USUARIOS
  Route::prefix('usuarios')->group(function () {
    $controller = 'Administrator\UsuariosController';
    Route::get('/', array('uses' => $controller.'@listar'))->name('listarUsuario');
    Route::get('/formulario/{id?}', array('uses' => $controller.'@formulario'))->name('formularioUsuario');
    Route::post('/salvar/{id?}', array('uses' => $controller.'@salvar'))->name('salvarUsuario');
    Route::get('/excluir/{id}', array('uses' => $controller.'@excluir'))->name('excluirUsuario');
  });
});


Route::get('turmas/{id}/emitir-boletim', array('uses' => 'NotasController@boletim'))->name('emtirBoletim');
