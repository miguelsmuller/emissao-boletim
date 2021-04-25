<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPeriodoAvaliativo extends Model
{
  protected $table = 'tblTiposPeriodosAvaliativos';

  protected $fillable = ['id','nome'];

  protected $guarded = ['id'];

  public $timestamps = false;

  /**
  * RELACIONAMENTOS
  */
  public function periodosAvaliativos()
  {
    return $this->hasMany('App\PeriodoAvaliativo', 'idTipoPeriodoAvaliativo', 'id');
  }

  public function grusEscolaridade()
  {
    return $this->hasMany('App\GrauEscolariade', 'idTipoPeriodoAvaliativo', 'id');
  }
}
