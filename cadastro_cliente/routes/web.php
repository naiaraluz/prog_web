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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clientes/listar', 'ClientesController@nomesClientes')->name('clientes_listar');

Route::get('/vendas/listar', 'VendasController@nomesVendas')->name('vendas_listar');




Route::get('/clientes/cadastro', 'ClientesController@cadastro')->name('clientes_cadastrar');

Route::get('/cadastro/vendas', 'VendasController@cadastro')->name('vendas_cadastrar');




Route::post('/clientes/novo', 'ClientesController@novo')->name('cliente_novo');

Route::post('/vendas/novo', 'VendasController@novo')->name('venda_nova');




Route::get('/clientes/alterar/{id}', 'ClientesController@telaAlteracao')->name('clientes_tela_alterar');

Route::post('/clientes/alterar/{id}', 'ClientesController@alterar')->name('clientes_alterar');

Route::get('/clientes/excluir/{id}', 'ClientesController@excluir')->name('clientes_excluir');
