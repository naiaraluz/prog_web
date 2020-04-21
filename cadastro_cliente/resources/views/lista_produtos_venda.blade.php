@extends('template')

@section ('conteudo')
	<h1>Venda # {{ $venda->id }}</h1>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID Item</th>
				<th>Nome</th>
				<th>Quantidade</th>
				<th>Valor Unitário</th>
				<th>Subtotal</th>
				<th>Data</th>
				<th>Operações</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($venda->produtos as $p)
			<tr>
				<td>{{ $p->pivot->id }}</td>
				<td>{{ $p->nome }}</td>
				<td>{{ $p->pivot->quantidade }}</td>
				<td>{{ $p->valor_unitario }}</td>
				<td>{{ $p->pivot->subtotal }}</td>
				<td>{{ $p->pivot->created_at }}</td>
				<td></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	


	<div>
		<a class="btn btn-primary" href="{{ route('vendas_cadastrar') }}">Incuir Nova Venda</a>
	</div>

	<div>
		<a class="btn btn-primary mt-3" href="{{ route('clientes_cadastrar') }}">Cadastrar Novo Cliente</a>
	</div>

	<div>
		<a class="btn btn-primary mt-3" href="{{ route('clientes_listar') }}">Listar Clientes</a>
	</div>
@endsection