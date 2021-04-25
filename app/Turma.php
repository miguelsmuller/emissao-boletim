<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
  protected $table = 'tblTurmas';

  protected $fillable = ['idEscola', 'idAnoLetivo', 'idTurno', 'idGrauEscolaridade', 'nomeCompleto', 'desabilitado'];

  protected $guarded = ['id'];

  public $timestamps = false;

  /**
  * RELACIONAMENTOS
  */
  public function escola()
  {
    return $this->belongsTo('App\Escola', 'idEscola', 'id');
  }

  public function anoLetivo()
  {
    return $this->belongsTo('App\AnoLetivo', 'idAnoLetivo', 'id');
  }

  public function turno()
  {
    return $this->belongsTo('App\Turno', 'idTurno', 'id');
  }

  public function grauEscolariade()
  {
    return $this->belongsTo('App\GrauEscolariade', 'idGrauEscolaridade', 'id');
  }

  public function notas()
  {
    return $this->hasMany('App\Nota', 'idTurma', 'id');
  }

  public function pessoas()
  {
    return $this->belongsToMany('App\Pessoa', 'tblMatriculas', 'idTurma', 'idPessoa')
            ->withPivot('id', 'dtMatricula', 'dtDesligamento', 'situacao')
            ->using('App\Matricula')
            ->as('matriculas');
  }
}
