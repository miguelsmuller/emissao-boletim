<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
  protected $table = 'tblEscolas';

  protected $fillable = ['id','idINEP', 'nomeCompleto', 'nomeReduzido', 'desabilitado'];

  protected $guarded = ['id'];

  public $timestamps = false;

  /**
  * RELACIONAMENTOS
  */
  public function turmas()
  {
    return $this->hasMany('App\Turma', 'idEscola', 'id');
  }
}
