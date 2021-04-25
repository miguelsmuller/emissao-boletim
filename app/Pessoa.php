<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pessoa extends Model
{
  protected $table = 'tblPessoas';

  protected $fillable = ['iua','nomeCompleto', 'cpf', 'dtNascimento'];

  protected $guarded = ['id'];

  protected $dates = ['dtNascimento'];

  public $timestamps = false;


  /**
  * ACESSORES E MUTATORS
  */
  public function getDtNascimentoAttribute($value) {
    return Carbon::parse($value)->format('d/m/Y');
  }

  public function setDtNascimentoAttribute($value) {
    $this->attributes['dtNascimento'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
  }

  /**
  * RELACIONAMENTOS
  */
  public function turmas()
  {
    return $this->belongsToMany('App\Turma', 'tblMatriculas', 'idPessoa', 'idTurma')
            ->withPivot('dtMatricula', 'dtDesligamento', 'situacao')
            ->using('App\Matricula')
            ->as('matriculas');
  }
}
