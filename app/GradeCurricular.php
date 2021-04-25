<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradeCurricular extends Model
{
  protected $table = 'tblGradesCurriculares';

  protected $fillable = ['idGrauEscolaridade','idComponenteCurricular'];

  public $timestamps = false;

  /**
  * RELACIONAMENTOS
  */
  public function pessoa()
  {
    return $this->belongsTo('App\ComponenteCurricular', 'idGrauEscolaridade', 'id');
  }

  public function turma()
  {
    return $this->belongsTo('App\GrauEscolariade', 'idComponenteCurricular', 'id');
  }
}
