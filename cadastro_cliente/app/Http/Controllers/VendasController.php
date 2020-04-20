<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Vendas;

class VendasController extends Controller
{
    function nomesVendas(){
        if (session()->has("login")){
            $vendas = Vendas::all();

            return view('lista_vendas', ['vendas' => $vendas]);
        }
        return view("acesso_nao_permitido");
    }

    function cadastro(){
        if (session()->has("login")){
            $clientes = Cliente::all();
        	return view("cadastro_vendas", ["clientes"=>$clientes]);
        }
        return view("acesso_nao_permitido");
    }


    function novo(Request $req){
        if (session()->has("login")){
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
        return view("acesso_nao_permitido");

    }

    function vendaPorCliente($id){
        if (session()->has("login")){
            $cliente = Cliente::find($id);

            if($cliente){
                return view("venda_por_cliente",["cliente"=>$cliente]);  
            } else {
                return redirect()->route('clientes_listar');
            }
        }
        return view("acesso_nao_permitido");
    }

    function itensVenda($id){
        $venda = Vendas::find($id);

        return view('lista_produtos_venda',['venda'=> $venda]);
    }
}
