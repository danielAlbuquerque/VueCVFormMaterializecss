<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curriculo extends Model
{
    protected $table = "curriculos";

    protected $fillable = [
    	'rg', 
    	'cpf', 
    	'nome_completo', 
    	'dt_nascimento', 
    	'email1', 
    	'email2', 
    	'cel1', 
    	'cel2', 
    	'endereco', 
    	'bairro', 
    	'nivel_escolaridade', 
    	'arquivo',
    	'cep',
    	'cidade',
    	'uf'
    ];

    protected $dates = ['dt_nascimento'];

    public function areas()
    {
    	return $this->belongsToMany(Area::class, 'curriculos_area');
    }
}
