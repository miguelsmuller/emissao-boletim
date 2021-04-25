<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeriodoAvaliativo extends Model
{
  protected $table = 'tblPeriodosAvaliativos';

  protected $fillable = ['id','nome', 'idTipoPeriodoAvaliativo'];

  protected $guarded = ['id'];

  public $timestamps = false;

  /**
  * RELACIONAMENTOS
  */
  public function tipoPeriodoAvaliativo()
  {
    return $this->belongsTo('App\TipoPeriodoAvaliativo', 'idTipoPeriodoAvaliativo', 'id');
  }

  public function notas()
  {
    return $this->hasMany('App\Nota', 'idPeriodoAvalativo', 'id');
  }
}
