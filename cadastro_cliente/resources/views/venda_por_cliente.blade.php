@extends('template')

@section('conteudo')
<h1>Vendas para cliente {{ $cliente->nome }}</h1>
<table class="table table-striped">
	<thead>
		<tr>
			<th># Venda </th>
			<th> Valor Total da Venda </th>
			<th>Descrição</th>
		</tr>
	</thead>
	<tbody>
		@foreach($cliente->vendas as $venda)
		<tr>
			<td>{{ $venda->id }}</td>
			<td>{{ $venda->valor_total_venda }}</td>
			<td>{{ $venda->descricao }}</td>
		</tr>
		@endforeach
	</tbody>
</table>

<div>
	<a class="btn btn-primary mt-3" href="{{ route('clientes_listar') }}">Listar Clientes</a>
</div>

<div>
	<a class="btn btn-primary mt-3" href="{{ route('vendas_cadastrar') }}">Incuir Nova Venda</a>
</div>

<div>
	<a class="btn btn-primary mt-3" href="{{ route('clientes_cadastrar') }}">Cadastrar Novo Cliente</a>
</div>


@endsection