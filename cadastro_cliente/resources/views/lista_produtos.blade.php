@extends ('template')	
	@section('conteudo')
	<h1>Lista de Produtos Cadastrados</h1>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nome Produto</th>
				<th>Valor Unitário</th>
				<th>Tipo</th>
				<th>Data</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($produtos as $p)
			<tr>
				<td>{{ $p->nome }}</td>
				<td>{{ $p->valor_unitario }}</td>
				<td>{{ $p->tipo_produto->nome }}</td>
				<td>{{ $p->created_at }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<div>
		<a class="btn btn-primary mt-3" href="{{ route('clientes_cadastrar') }}">Cadastrar Novo Produto</a>
	</div>


	</div>
@endsection