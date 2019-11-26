<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = ['pessoa_id', 'cep', 'logradouro', 'numero','complemento','bairro','cidade_id','tipo'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'enderecos';
}
