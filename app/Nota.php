<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
  protected $table = 'tblNotas';

  protected $fillable = ['idMatricula', 'idPeriodoAvaliativo', 'idComponenteCurricular', 'idTurma', 'nota', 'falta'];

  protected $guarded = ['id'];

  public $timestamps = false;

  /**
  * RELACIONAMENTOS
  */
  public function matricula()
  {
    return $this->belongsTo('App\Matricula', 'idMatricula', 'id');
  }

  public function componenteCurricular()
  {
    return $this->belongsTo('App\ComponenteCurricular', 'idComponenteCurricular', 'id');
  }

  public function periodoAvaliativo()
  {
    return $this->belongsTo('App\PeriodoAvaliativo', 'idPeriodoAvaliativo', 'id');
  }

  public function turma()
  {
    return $this->belongsTo('App\Turma', 'idTurma', 'id');
  }
}
