<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProduto extends Model
{
    //

    function vendas(){
    	return $this->hasMany('App\Produto', 'id_tipo_produto', 'id');
    }
}
