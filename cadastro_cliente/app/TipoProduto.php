<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProduto extends Model
{
    protected $primaryKey = 'id';
	protected $table = 'tipo_produto';

    function produtos(){
    	return $this->hasMany('App\Produto', 'id_tipo_produto', 'id');
    }
}
