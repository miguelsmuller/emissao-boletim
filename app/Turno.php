<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
  protected $table = 'tblTurnos';

  protected $fillable = ['nomeCurto','nomeCompleto','desabilitado'];

  protected $guarded = ['id'];

  public $timestamps = false;

  /**
  * RELACIONAMENTOS
  */
  public function turmas()
  {
    return $this->hasMany(Turma::class, 'foreign_key', 'idTurno');
  }
}
