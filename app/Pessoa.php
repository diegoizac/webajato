<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
  protected $fillable = ['nome', 'sobrenome', 'cpf', 'rg'];
  protected $guarded = ['id', 'created_at', 'update_at'];
  protected $table = 'pessoas';
}
