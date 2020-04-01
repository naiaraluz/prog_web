<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClientesController extends Controller
{
    function nomesClientes(){
    	$clientes = Cliente::all();

    	return view('lista', ['clientes' => $clientes]);
    }

    function cadastro(){
    	return view("cadastro");

    }

    function novo(Request $req){
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
    	} else {
    		$mensagem = "Usuário não foi inserido!";
    	}

    	return view("resultado", ["mensagem" => $mensagem]);


    }
}
