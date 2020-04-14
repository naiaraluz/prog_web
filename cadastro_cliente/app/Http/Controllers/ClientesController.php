<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClientesController extends Controller
{
    function nomesClientes(){
        if (session()->has("login")){
        	$clientes = Cliente::all();

        	return view('lista', ['clientes' => $clientes]);
        }
        return view("acesso_nao_permitido");
    }

    function cadastro(){
        if (session()->has("login")){
    	   return view("cadastro");
        }
        return view("acesso_nao_permitido");
    }

    function telaAlteracao($id){
        if (session()->has("login")){
            $cliente = Cliente::find($id);

            return view("alteracao", ['c' => $cliente]);
        }
        return view("acesso_nao_permitido");
    }

    function excluir($id){
        if (session()->has("login")){
            $cliente = Cliente::find($id);

            if($cliente->delete()){
                $mensagem = "Usuário excluído com sucesso!";
                $classe = "success";
            }else{
                $mensagem = "Usuário $nome não foi excluído!";
                $classe = "danger";
            }

            
            return view("resultado", ["mensagem" => $mensagem, "classe"=>$classe]);
        }
        return view("acesso_nao_permitido");
    }

    function alterar(Request $req, $id){
        if (session()->has("login")){
            $nome = $req->input('nome');
            $endereco = $req->input('endereco');
            $cep = $req->input('cep');
            $cidade = $req->input('cidade');
            $estado = $req->input('estado');

            $cliente = Cliente::find($id);
            $cliente->nome = $nome;
            $cliente->endereco = $endereco;
            $cliente->cep = $cep;
            $cliente->cidade = $cidade;
            $cliente->estado = $estado;

            if($cliente->save()){
                $mensagem = "Usuário $nome alterado com sucesso!";
                $classe = "success";
            }else {
                $mensagem = "Não foi possível fazer a alteração!";
                $classe = "danger";
            }

            return view("resultado", ["mensagem" => $mensagem, "classe"=>$classe]);
        }
        return view("acesso_nao_permitido");

    }

    function novo(Request $req){
        if (session()->has("login")){
        	$nome = $req->input('nome');
        	$endereco = $req->input('endereco');
        	$cep = $req->input('cep');
        	$cidade = $req->input('cidade');
        	$estado = $req->input('estado');

        	$cliente = new Cliente();
        	$cliente->nome = $nome;
        	$cliente->endereco = $endereco;
        	$cliente->cep = $cep;
        	$cliente->cidade = $cidade;
        	$cliente->estado = $estado;
        	$cliente->save();

        	if ($cliente->save()){
        		$mensagem = "Usuário $nome inserido com Sucesso!";
                $classe = "success";
        	} else {
        		$mensagem = "Usuário não foi inserido!";
                $classe = "danger";
        	}

        	return view("resultado", ["mensagem" => $mensagem, "classe" => $classe]);
        }
        return view("acesso_nao_permitido");


    }
}
