<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
  public function up()
  {
    Schema::create('tblEscolas', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('idINEP');
      $table->string('nomeCompleto', '50');
      $table->string('nomeReduzido', '8');
      $table->boolean('desabilitado')->default(false);
    });

    Schema::create('tblAnosLetivos', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('ano');
      $table->boolean('desabilitado')->default(false);
    });

    Schema::create('tblTiposPeriodosAvaliativos', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nome', '15');
      $table->boolean('desabilitado')->default(false);
    });

    Schema::create('tblPeriodosAvaliativos', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nome', '15');
      $table->boolean('desabilitado')->default(false);
      $table->unsignedInteger('idTipoPeriodoAvaliativo');

      $table->foreign('idTipoPeriodoAvaliativo')->references('id')->on('tblTiposPeriodosAvaliativos');
    });

    Schema::create('tblComponentesCurriculares', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nomeCurto', '7');
      $table->string('nomeCompleto', '35');
      $table->boolean('desabilitado')->default(false);
    });

    Schema::create('tblGrausEscolariade', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nomeCurto', '5');
      $table->string('nomeCompleto', '15');
      $table->boolean('desabilitado')->default(false);
      $table->unsignedInteger('idTipoPeriodoAvaliativo');

      $table->foreign('idTipoPeriodoAvaliativo')->references('id')->on('tblTiposPeriodosAvaliativos');
    });

    Schema::create('tblGradesCurriculares', function (Blueprint $table) {
      $table->unsignedInteger('idGrauEscolaridade');
      $table->unsignedInteger('idComponenteCurricular');

      $table->foreign('idGrauEscolaridade')->references('id')->on('tblGrausEscolariade');
      $table->foreign('idComponenteCurricular')->references('id')->on('tblComponentesCurriculares');
    });

    Schema::create('tblTurnos', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nomeCurto', '4');
      $table->string('nomeCompleto', '10');
      $table->boolean('desabilitado')->default(false);
    });

    Schema::create('tblTurmas', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('idEscola')->unsigned();
      $table->integer('idAnoLetivo')->unsigned();
      $table->unsignedInteger('idGrauEscolaridade');
      $table->unsignedInteger('idTurno');
      $table->string('nomeCompleto', '5');
      $table->boolean('desabilitado')->default(false);

      $table->foreign('idEscola')->references('id')->on('tblEscolas');
      $table->foreign('idAnoLetivo')->references('id')->on('tblAnosLetivos');
      $table->foreign('idGrauEscolaridade')->references('id')->on('tblGrausEscolariade');
      $table->foreign('idTurno')->references('id')->on('tblTurnos');
    });

    Schema::create('tblPessoas', function (Blueprint $table) {
      $table->increments('id');
      $table->string('iua', '12')->nullable();
      $table->string('nomeCompleto', '60');
      $table->string('cpf', '14')->nullable();
      $table->date('dtNascimento');
    });

    Schema::create('tblMatriculas', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('idTurma');
      $table->unsignedInteger('idPessoa');
      $table->date('dtMatricula')->useCurrent();
      $table->date('dtDesligamento')->nullable();
      $table->enum('situacao', [
        'ativa',
        'transferida',
        'transferida_internamente',
        'desistente',
        'anotacao_indevida',
        'cancelada'
      ])->default('ativa');

      $table->foreign('idTurma')->references('id')->on('tblTurmas');
      $table->foreign('idPessoa')->references('id')->on('tblPessoas');
    });

    Schema::create('tblNotas', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('idMatricula')->unsigned();
      $table->integer('idPeriodoAvaliativo')->unsigned();
      $table->integer('idComponenteCurricular')->unsigned();
      $table->integer('idTurma')->unsigned();
      $table->decimal('nota', 4, 1)->default('0');
      $table->unsignedInteger('falta')->default('0');

      $table->foreign('idMatricula')->references('id')->on('tblMatriculas');
      $table->foreign('idPeriodoAvaliativo')->references('id')->on('tblPeriodosAvaliativos');
      $table->foreign('idComponenteCurricular')->references('id')->on('tblComponentesCurriculares');
      $table->foreign('idTurma')->references('id')->on('tblTurmas');
    });


    /**
     * OPTIONS TABLES
     */
    Schema::create('tblOpcoesSistema', function (Blueprint $table) {
      $table->increments('id');
      $table->string('descricao', '15');
      $table->string('opcao', '15');
      $table->string('valor', '15');
    });


    /**
     * AUTHENTICATE TABLES
     */
    Schema::create('users', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->string('matricula')->unique();
      $table->string('email')->unique();
      $table->string('password');
      $table->boolean('active')->default(false);
      $table->rememberToken();
      $table->timestamps();
    });

    Schema::create('roles', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->string('description');
      $table->timestamps();
    });

    Schema::create('role_user', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('role_id')->unsigned();
      $table->integer('user_id')->unsigned();
      $table->integer('escola_id')->unsigned();
    });

    Schema::create('password_resets', function (Blueprint $table) {
      $table->string('email')->index();
      $table->string('token');
      $table->timestamp('created_at')->nullable();
    });
  }

  public function down()
  {
    Schema::dropIfExists('password_resets');
    Schema::dropIfExists('role_user');
    Schema::dropIfExists('roles');
    Schema::dropIfExists('users');

    Schema::dropIfExists('tblOpcoesSistema');

    Schema::dropIfExists('tblNotas');
    Schema::dropIfExists('tblMatriculas');
    Schema::dropIfExists('tblPessoas');
    Schema::dropIfExists('tblTurmas');
    Schema::dropIfExists('tblTurnos');
    Schema::dropIfExists('tblGradesCurriculares');
    Schema::dropIfExists('tblGrausEscolariade');
    Schema::dropIfExists('tblComponentesCurriculares');
    Schema::dropIfExists('tblPeriodosAvaliativos');
    Schema::dropIfExists('tblTiposPeriodosAvaliativos');
    Schema::dropIfExists('tblAnosLetivos');
    Schema::dropIfExists('tblEscolas');
  }
}
