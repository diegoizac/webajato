<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $fillable = ['pessoa_id', 'telefone', 'celular', 'email'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'enderecos';
}
