@extends ('template')	
	@section('conteudo')
	<h1>Lista de Vendas Cadastradas</h1>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nome Cliente</th>
				<th>Valor Total da Venda</th>
				<th>Descrição</th>
				<th>Data</th>
				<th>Operações<th>
			</tr>
		</thead>
		<tbody>
			@foreach ($vendas as $v)
			<tr>
				<td>{{ App\Cliente::find($v->id_cliente)->nome }}</td>
				<td>{{ $v->valor_total_venda }}</td>
				<td>{{ $v->descricao }}</td>
				<td>{{ $v->created_at }}</td>
				<td><a class="btn btn-info" href="{{ route('venda_itens', ['id'=> $v->id]) }}">Itens</a></td>
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