<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class PessoasResource extends ResourceCollection
{
  public function toArray($request)
  {
    return [
      'results' => PessoaResource::collection($this->collection)
    ];
  }
}
