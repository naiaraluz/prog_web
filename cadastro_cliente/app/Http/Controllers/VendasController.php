<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Vendas;

class VendasController extends Controller
{
    function nomesVendas(){
        $vendas = Vendas::all();

        return view('lista_vendas', ['vendas' => $vendas]);
    }

    function cadastro(){
        $clientes = Cliente::all();
    	return view("cadastro_vendas", ["clientes"=>$clientes]);

    }


    function novo(Request $req){
    	$id_cliente = $req->input('id_cliente');
    	$valor_total_venda = $req->input('valor_total_venda');
    	$descricao = $req->input('descricao');

    	$vendas = new Vendas();
    	$vendas->id_cliente = $id_cliente;
    	$vendas->valor_total_venda = $valor_total_venda;
    	$vendas->descricao = $descricao;

    	if ($vendas->save()){
    		$mensagem = "Venda inserida com Sucesso!";
            $classe = "success";
    	} else {
    		$mensagem = "A venda não foi inserida!";
            $classe = "danger";
    	}

    	return view("resultado", ["mensagem" => $mensagem, "classe" => $classe]);


    }

    function vendaPorCliente($id){
        $cliente = Cliente::find($id);

        if($cliente){
          return view("venda_por_cliente",["cliente"=>$cliente]);  
      } else {
        return redirect()->route('clientes_listar');
      }
        
    }
}
