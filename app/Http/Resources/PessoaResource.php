<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class PessoaResource extends Resource
{
  public function toArray($request)
  {
    return [
      'id'   => (string) $this->id,
      'text' => $this->nomeCompleto,
      'attr' => [
        'iua'          => $this->iua,
        'nomeCompleto' => $this->nomeCompleto,
        'cpf'          => $this->cpf,
        'dtNascimento' => $this->dtNascimento,
      ],
    ];
  }
}
