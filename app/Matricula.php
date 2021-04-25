<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Carbon\Carbon;
use App\Turma;

class Matricula extends Pivot
{
  protected $table = 'tblMatriculas';

  protected $fillable = ['idTurma','idPessoa', 'dtMatricula', 'dtDesligamento', 'situacao'];

  protected $guarded = ['id'];

  protected $dates = ['dtMatricula', 'dtDesligamento'];

  public $timestamps = false;


  /**
  * RELACIONAMENTOS
  */
  public function notas()
  {
    return $this->hasMany('App\Nota', 'foreign_key', 'idMatricula');
  }

  public function pessoa()
  {
    return $this->belongsTo('App\Pessoa', 'idPessoa', 'id');
  }

  public function turma()
  {
    return $this->belongsTo('App\Turma', 'idPessoa', 'id');
  }


  /**
  * ACESSORES E MUTATORS
  */
  public function getDtMatriculaAttribute($value)
  {
    return Carbon::parse($value)->format('d/m/Y');
  }

  public function setDtMatriculaAttribute($value)
  {
    $this->attributes['dtMatricula'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
  }

  public function getDtDesligamentoAttribute($value)
  {
    return Carbon::parse($value)->format('d/m/Y');
  }

  public function setDtDesligamentoAttribute($value)
  {
    $this->attributes['dtDesligamento'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
  }

  public function getNomeMatriculaAttribute()
  {
    try {
      $turma = Turma::with('grauEscolariade')->findOrFail($this->idTurma);
      $ano = Carbon::parse($this->dtMatricula)->format('y');

      return $ano . $turma->grauEscolariade->nomeCurto . $this->idPessoa;

    } catch (Exception $e) {
      return '--';
    }
  }
}
