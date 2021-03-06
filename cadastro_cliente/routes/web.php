<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/sobre', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function(){
	Route::middleware(['admin'])->group(function(){

		/* Clientes */

		Route::post('/clientes/alterar/{id}', 'ClientesController@alterar')->name('clientes_alterar');

		Route::get('/clientes/excluir/{id}', 'ClientesController@excluir')->name('clientes_excluir');

		Route::get('/clientes/cadastro', 'ClientesController@cadastro')->name('clientes_cadastrar');

		Route::get('/clientes/alterar/{id}', 'ClientesController@telaAlteracao')->name('clientes_tela_alterar');

		Route::post('/clientes/novo', 'ClientesController@novo')->name('cliente_novo');

		/*Usuario*/

		Route::get('/usuario/cadastro', 'UsuarioController@telaCadastro')->name('usuarios_cadastrar');

		Route::post('/usuario/adicionar', 'UsuarioController@adicionar')->name('usuario_add');


		/*Vendas*/

		Route::get('/cadastro/vendas', 'VendasController@cadastro')->name('vendas_cadastrar');

		Route::post('/vendas/novo', 'VendasController@novo')->name('venda_nova');

		Route::get('/venda/{id}/itens/cadastro', 'VendasController@telaAdicionarItem')->name('venda_itens_novo');

		Route::post('/venda/{id}/itens/adicionar', 'VendasController@adicionarItem')->name('vendas_itens_add');

		Route::get('/venda/{id}/itens/remover/{id_produto}', 'VendasController@excluirItem')->name('vendas_item_excluir');

	});

	/* Clientes */

	Route::get('/clientes/listar', 'ClientesController@nomesClientes')->name('clientes_listar');


	/*Vendas*/

	Route::get('/vendas/listar', 'VendasController@nomesVendas')->name('vendas_listar');

	Route::get('vendas/cliente/{id}', 'VendasController@vendaPorCliente')->name('vendas_por_cliente');

	Route::get('/venda/{id}/itens', 'VendasController@itensVenda')->name('venda_itens');

	Route::get('/produtos/listar', 'VendasController@nomesProdutos')->name('produtos_listar');

});

Route::get('/tela_login', 'AppController@tela_login')->name('tela_login');

Route::get('/logout', 'AppController@logout')->name('logout');

#Route::post('/login', 'AppController@login')->name('logar');

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
