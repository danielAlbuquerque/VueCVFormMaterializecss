<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curriculo extends Model
{
    protected $table = "curriculos";

    protected $fillable = ['rg', 'cpf', 'nome_completo', 'dt_nascimento', 'email', 'cel1', 'cel2', 'endereco', 'bairro', 'nivel_escolaridade', 'cv'];

    public function areas()
    {
    	return $this->belongsToMany(Area::class, 'curriculo_areas');
    }
}
