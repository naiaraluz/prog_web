<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Vendas;
use App\Produto;
use Auth;

class VendasController extends Controller
{
    function nomesVendas(){
        
            $vendas = Vendas::all();

            return view('lista_vendas', ['vendas' => $vendas]);
        
    }

    function nomesProdutos(){
        
            $produtos = Produto::all();

            return view('lista_produtos', ['produtos' => $produtos]);
       
    }

    function cadastro(){
       
            $clientes = Cliente::all();
        	return view("cadastro_vendas", ["clientes"=>$clientes]);
   
    }


    function novo(Request $req){
      
        	$id_cliente = $req->input('id_cliente');
        	$descricao = $req->input('descricao');

        	$vendas = new Vendas();
        	$vendas->id_cliente = $id_cliente;
        	$vendas->valor_total_venda = 0; 
        	$vendas->descricao = $descricao;

        	if ($vendas->save()){
        		$mensagem = "Venda inserida com Sucesso!";
                $classe = "success";
        	} else {
        		$mensagem = "A venda não foi inserida!";
                $classe = "danger";
        	}
            return redirect()->route('venda_itens_novo', ['id' => $vendas->id]);

        	//return view("resultado", ["mensagem" => $mensagem, "classe" => $classe]);
       

    }

    function telaAdicionarItem($id){
        $venda = Vendas::find($id);
        $produtos = Produto::all();

        return view ('cadastro_itens', ['venda' => $venda, 'produtos' => $produtos]);
    }

    function vendaPorCliente($id){
      
            $cliente = Cliente::find($id);

            if($cliente){
                return view("venda_por_cliente",["cliente"=>$cliente]);  
            } else {
                return redirect()->route('clientes_listar');
            }
        
    }

    function itensVenda($id){
        $venda = Vendas::find($id);

        return view('lista_produtos_venda',['venda'=> $venda]);
    }

    function adicionarItem(Request $req, $id){
        $id_produto = $req->input('id_produto');
        $quantidade = $req->input('quantidade');

        $venda = Vendas::find($id);
        $produto = Produto::find ($id_produto);
        $subtotal = $produto->valor_unitario*$quantidade;
        $colunas_pivot = [
            'quantidade' => $quantidade,
            'subtotal' => $subtotal
        ];

        
        $venda->produtos()->attach($produto, $colunas_pivot);
        $venda->valor_total_venda += $subtotal;
        $venda->save();
        return redirect()->route('venda_itens_novo', ['id' => $venda->id]);

    }

    function excluirItem($id, $id_pivot){
        $venda = Vendas::find($id);
        $subtotal = 0;

        foreach ($venda->produtos as $vp) {
            if($vp->pivot->id == $id_pivot){
                $subtotal = $vp->pivot->subtotal;
                    break;

            }
        }

       
        $venda->valor_total_venda = $venda->valor_total_venda - $subtotal;
        $venda->produtos()->wherePivot('id', '=', $id_pivot)->detach();
        $venda->save();
        
        return redirect()->route('venda_itens_novo', ['id' => $venda->id]);

    }
}
