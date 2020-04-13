<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuarioController extends Controller
{
    function telaCadastro(){
    	return view("cadastro_usuarios");
    }

   
    function adicionar(Request $req){
    	$nome = $req->input('nome');
    	$login = $req->input('login');
    	$senha = $req->input('senha');

    	$usuario = new Usuario();
    	$usuario->nome = $nome;
    	$usuario->login = $login;
    	$usuario->senha = $senha;

    	if ($usuario->save()){
    		$mensagem = "Usuário $nome adicionado com sucesso.";
            $classe = "success";
    	} else {
    		$mensagem = "Usuário não foi cadastrado.";
            $classe = "danger";
    	}

        return view("resultado", ["mensagem" => $mensagem, "classe" => $classe]);
    }

}
