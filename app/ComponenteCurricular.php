<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComponenteCurricular extends Model
{
  protected $table = 'tblComponentesCurriculares';

  protected $fillable = ['nomeCurto','nomeCompleto'];

  protected $guarded = ['id'];

  public $timestamps = false;

  /**
  * RELACIONAMENTOS
  */
  public function grausEscolaridade()
  {
    return $this->belongsToMany('App\GrauEscolariade', 'tblGradesCurriculares', 'idComponenteCurricular', 'idGrauEscolaridade');
  }

  public function notas()
  {
    return $this->hasMany('App\Nota', 'foreign_key', 'idComponenteCurricular');
  }
}
