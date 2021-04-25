<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  protected $table = 'roles';

  protected $fillable = ['id', 'name', 'description'];

  protected $guarded = ['id'];

  public function users()
  {
    return $this->belongsToMany(User::class)->withPivot('escola_id');
  }
}
