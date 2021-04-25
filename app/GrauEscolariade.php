<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrauEscolariade extends Model
{
  protected $table = 'tblGrausEscolariade';

  protected $fillable = ['nomeCurto','nomeCompleto', 'idTipoPeriodoAvaliativo'];

  protected $guarded = ['id'];

  public $timestamps = false;

  /**
  * RELACIONAMENTOS
  */
  public function turmas()
  {
    return $this->hasMany('App\Turma', 'foreign_key', 'idGrauEscolaridade');
  }

  public function componentesCurriculares()
  {
    return $this->belongsToMany('App\ComponenteCurricular', 'tblGradesCurriculares', 'idGrauEscolaridade', 'idComponenteCurricular');
  }

  public function tipoPeriodoAvaliativo()
  {
    return $this->belongsTo('App\TipoPeriodoAvaliativo', 'idTipoPeriodoAvaliativo', 'id');
  }
}
