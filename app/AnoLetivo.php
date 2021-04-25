<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnoLetivo extends Model
{
  protected $table = 'tblEscolas';

  protected $fillable = ['id','ano', 'desabilitado'];

  protected $guarded = ['id'];

  public $timestamps = false;

  /**
  * RELACIONAMENTOS
  */
  public function turmas()
  {
    return $this->hasMany('App\Turma', 'idAnoLetivo', 'id');
  }
}
