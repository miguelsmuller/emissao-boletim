<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
      /*
      * ESCOLA
      */
      $escola1 = DB::table('tblEscolas')->insertGetId([
        'idINEP'       => '33032726',
        'nomeCompleto' => 'Escola Municipal Rubens Machado',
        'nomeReduzido' => 'EMRM',
        'desabilitado' => false
      ]);

      $escola2 = DB::table('tblEscolas')->insertGetId([
        'idINEP'       => '33032866',
        'nomeCompleto' => 'Colegio Getulio Vargas',
        'nomeReduzido' => 'CGV',
        'desabilitado' => false
      ]);


      /*
      * ANO LETIVO
      */
      $ano1 = DB::table('tblAnosLetivos')->insertGetId([
        'ano'          => '2017',
        'desabilitado' => false
      ]);

      $ano2 = DB::table('tblAnosLetivos')->insertGetId([
        'ano'          => '2018',
        'desabilitado' => false
      ]);


      /*
      * TIPO PERIODO AVALIATIVO
      */
      $tiposPeriodosAvaliativoBimestral = DB::table('tblTiposPeriodosAvaliativos')->insertGetId([
        'nome' => 'Bimestral'
      ]);

      $tiposPeriodosAvaliativoSemestral = DB::table('tblTiposPeriodosAvaliativos')->insertGetId([
        'nome' => 'Semestral'
      ]);


      /*
      * PERIODO AVALIATIVO
      */
      $PeriodosAvaliativo1B = DB::table('tblPeriodosAvaliativos')->insertGetId([
        'nome'                    => '1º Bimestre',
        'idTipoPeriodoAvaliativo' => $tiposPeriodosAvaliativoBimestral
      ]);

      $PeriodosAvaliativo2B = DB::table('tblPeriodosAvaliativos')->insertGetId([
        'nome'                    => '2º Bimestre',
        'idTipoPeriodoAvaliativo' => $tiposPeriodosAvaliativoBimestral
      ]);

      $PeriodosAvaliativo3B = DB::table('tblPeriodosAvaliativos')->insertGetId([
        'nome'                    => '3º Bimestre',
        'idTipoPeriodoAvaliativo' => $tiposPeriodosAvaliativoBimestral
      ]);

      $PeriodosAvaliativo4B = DB::table('tblPeriodosAvaliativos')->insertGetId([
        'nome'                    => '4º Bimestre',
        'idTipoPeriodoAvaliativo' => $tiposPeriodosAvaliativoBimestral
      ]);

      $PeriodosAvaliativo1S = DB::table('tblPeriodosAvaliativos')->insertGetId([
        'nome'                    => '1º Semestre',
        'idTipoPeriodoAvaliativo' => $tiposPeriodosAvaliativoSemestral
      ]);

      $PeriodosAvaliativo2S = DB::table('tblPeriodosAvaliativos')->insertGetId([
        'nome'                    => '2º Semestre',
        'idTipoPeriodoAvaliativo' => $tiposPeriodosAvaliativoSemestral
      ]);


      /*
      * COMPONENTES CURRICULARES
      */
      $componenteMatematica = DB::table('tblComponentesCurriculares')->insertGetId([
        'nomeCurto'    => 'MAT',
        'nomeCompleto' => 'Matemática',
      ]);

      $componentePortugues = DB::table('tblComponentesCurriculares')->insertGetId([
        'nomeCurto'    => 'PORT',
        'nomeCompleto' => 'Língua Portuguesa',
      ]);

      $componenteHistoria = DB::table('tblComponentesCurriculares')->insertGetId([
        'nomeCurto'    => 'HIST',
        'nomeCompleto' => 'História',
      ]);

      $componenteGeografia = DB::table('tblComponentesCurriculares')->insertGetId([
        'nomeCurto'    => 'GEO',
        'nomeCompleto' => 'Geografia',
      ]);

      $componenteCiencias = DB::table('tblComponentesCurriculares')->insertGetId([
        'nomeCurto'    => 'CIEN',
        'nomeCompleto' => 'Ciências Naturais',
      ]);

      $componenteArte = DB::table('tblComponentesCurriculares')->insertGetId([
        'nomeCurto'    => 'ARTE',
        'nomeCompleto' => 'Artes',
      ]);

      $componenteEdFisica = DB::table('tblComponentesCurriculares')->insertGetId([
        'nomeCurto'    => 'ED.FIS',
        'nomeCompleto' => 'Educação Física',
      ]);

      $componenteLEM = DB::table('tblComponentesCurriculares')->insertGetId([
        'nomeCurto'    => 'LEM',
        'nomeCompleto' => 'Lingua Estrangeira Moderna',
      ]);

      $componenteDesenho = DB::table('tblComponentesCurriculares')->insertGetId([
        'nomeCurto'    => 'DSE',
        'nomeCompleto' => 'Desenho',
      ]);

      $componentePrTextual = DB::table('tblComponentesCurriculares')->insertGetId([
        'nomeCurto'    => 'PR.TXT',
        'nomeCompleto' => 'Produção Textual',
      ]);

      $componenteEdAmbiental = DB::table('tblComponentesCurriculares')->insertGetId([
        'nomeCurto'    => 'ED.AMB',
        'nomeCompleto' => 'Educação Ambiental',
      ]);

      $componenteRPM = DB::table('tblComponentesCurriculares')->insertGetId([
        'nomeCurto'    => 'RPM',
        'nomeCompleto' => 'Resolução Problemas Matemáticos',
      ]);

      $componenteEtica = DB::table('tblComponentesCurriculares')->insertGetId([
        'nomeCurto'    => 'ÉTC',
        'nomeCompleto' => 'Ética',
      ]);


      /*
      * GRAUS DE ESCOLARIDADE
      */
      $grausEscolariade5 = DB::table('tblGrausEscolariade')->insertGetId([
        'nomeCurto'               => '5',
        'nomeCompleto'            => '5º Ano',
        'idTipoPeriodoAvaliativo' => $tiposPeriodosAvaliativoBimestral
      ]);

      $grausEscolariade7 = DB::table('tblGrausEscolariade')->insertGetId([
        'nomeCurto'               => '7',
        'nomeCompleto'            => '7º Ano',
        'idTipoPeriodoAvaliativo' => $tiposPeriodosAvaliativoBimestral
      ]);

      $grausEscolariade9 = DB::table('tblGrausEscolariade')->insertGetId([
        'nomeCurto'               => '9',
        'nomeCompleto'            => '9º Ano',
        'idTipoPeriodoAvaliativo' => $tiposPeriodosAvaliativoBimestral
      ]);


      /*
      * GRADE CURRICULAR
      */
      $gradeCurricular = DB::table('tblGradesCurriculares')->insertGetId([
        'idGrauEscolaridade'     => $grausEscolariade5,
        'idComponenteCurricular' => $componenteMatematica
      ]);
      $gradeCurricular = DB::table('tblGradesCurriculares')->insertGetId([
        'idGrauEscolaridade'     => $grausEscolariade5,
        'idComponenteCurricular' => $componentePortugues
      ]);
      $gradeCurricular = DB::table('tblGradesCurriculares')->insertGetId([
        'idGrauEscolaridade'     => $grausEscolariade5,
        'idComponenteCurricular' => $componenteHistoria
      ]);

      $gradeCurricular = DB::table('tblGradesCurriculares')->insertGetId([
        'idGrauEscolaridade'     => $grausEscolariade7,
        'idComponenteCurricular' => $componenteMatematica
      ]);
      $gradeCurricular = DB::table('tblGradesCurriculares')->insertGetId([
        'idGrauEscolaridade'     => $grausEscolariade7,
        'idComponenteCurricular' => $componentePortugues
      ]);
      $gradeCurricular = DB::table('tblGradesCurriculares')->insertGetId([
        'idGrauEscolaridade'     => $grausEscolariade7,
        'idComponenteCurricular' => $componenteHistoria
      ]);

      $gradeCurricular = DB::table('tblGradesCurriculares')->insertGetId([
        'idGrauEscolaridade'     => $grausEscolariade9,
        'idComponenteCurricular' => $componenteMatematica
      ]);
      $gradeCurricular = DB::table('tblGradesCurriculares')->insertGetId([
        'idGrauEscolaridade'     => $grausEscolariade9,
        'idComponenteCurricular' => $componentePortugues
      ]);
      $gradeCurricular = DB::table('tblGradesCurriculares')->insertGetId([
        'idGrauEscolaridade'     => $grausEscolariade9,
        'idComponenteCurricular' => $componenteHistoria
      ]);


      /*
      * TURNOS
      */
      $tipoTurnoMatutino = DB::table('tblTurnos')->insertGetId([
        'nomeCurto'    => 'MAT',
        'nomeCompleto' => 'Matutino',
      ]);

      $tipoTurnoVespertino = DB::table('tblTurnos')->insertGetId([
        'nomeCurto'    => 'VESP',
        'nomeCompleto' => 'Vespertino',
      ]);

      $tipoTurnoNoturno = DB::table('tblTurnos')->insertGetId([
        'nomeCurto'    => 'NOT',
        'nomeCompleto' => 'Noturno',
      ]);


      /*
      * TURMAS
      */
      $turma500 = DB::table('tblTurmas')->insertGetId([
        'idEscola'           => $escola1,
        'idAnoLetivo'        => $ano2,
        'idGrauEscolaridade' => $grausEscolariade5,
        'idTurno'            => $tipoTurnoMatutino,
        'nomeCompleto'       => '500',
      ]);
      $turma700 = DB::table('tblTurmas')->insertGetId([
        'idEscola'           => $escola1,
        'idAnoLetivo'        => $ano2,
        'idGrauEscolaridade' => $grausEscolariade7,
        'idTurno'            => $tipoTurnoMatutino,
        'nomeCompleto'       => '700',
      ]);
      $turma900 = DB::table('tblTurmas')->insertGetId([
        'idEscola'           => $escola2,
        'idAnoLetivo'        => $ano2,
        'idGrauEscolaridade' => $grausEscolariade9,
        'idTurno'            => $tipoTurnoVespertino,
        'nomeCompleto'       => '900',
      ]);
      $turma900 = DB::table('tblTurmas')->insertGetId([
        'idEscola'           => $escola1,
        'idAnoLetivo'        => $ano2,
        'idGrauEscolaridade' => $grausEscolariade9,
        'idTurno'            => $tipoTurnoVespertino,
        'nomeCompleto'       => '900',
      ]);


      /*
      * PESSOAS
      */
      factory(App\Pessoa::class, 50)->create();


      /*
      * REGRAS
      */
      $roleAdministrador = DB::table('roles')->insertGetId([
        'name'        => 'administrador',
        'description' => 'Administrador'
      ]);

      $roleDiretor = DB::table('roles')->insertGetId([
        'name'        => 'diretor',
        'description' => 'Diretor'
      ]);

      $roleAdministrativo = DB::table('roles')->insertGetId([
        'name'        => 'administrativo',
        'description' => 'Administrativo'
      ]);

      /*
      * USUÁRIO
      */
      $usuario = DB::table('users')->insertGetId([
        'name'      => 'Miguel Muller',
        'matricula' => '123456',
        'email'     => 'miguel.sneto@email.com.br',
        'password'  => '$2y$10$bemashdplo4XtWrMeD0D0OLmdjx.ODW/FSr/XUKzuBmJ0oceI.O.6',
        'active'    => true
      ]);


      /*
      * USUARIO/REGRA
      */
      DB::table('role_user')->insertGetId([
        'role_id'   => $roleAdministrador,
        'user_id'   => $usuario,
        'escola_id' => $escola1,
      ]);

      DB::table('role_user')->insertGetId([
        'role_id'   => $roleDiretor,
        'user_id'   => $usuario,
        'escola_id' => $escola2,
      ]);
    }
}
