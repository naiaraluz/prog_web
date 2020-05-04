<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoProduto extends Model
{
	use SoftDeletes;

    protected $primaryKey = 'id';
	protected $table = 'tipo_produto';

    function produtos(){
    	return $this->hasMany('App\Produto', 'id_tipo_produto', 'id');
    }
}
