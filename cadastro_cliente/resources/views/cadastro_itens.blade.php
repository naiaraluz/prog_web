@extends ('template')

@section ('conteudo')
<h1>Cadastro de Itens de Venda # {{ $venda->id }}</h1>
	<form method="post" action="{{ route('vendas_itens_add', ['id' => $venda->id]) }}">
		@csrf
		<select class="custom-select" name="id_produto">
                        @foreach($produtos as $p)
                        <option value="{{ $p->id }}"> {{ $p->id }} {{ $p->nome }} </option>
                        @endforeach
        </select>
		<input class="form-control mt-2" type="number" name="quantidade" placeholder="Quantidade" min="0" step="0.01">
		<input class="btn btn-primary mt-2" type="submit" value="Incluir">
	</form>
	<h2 class="mt-3">Itens Adicionados Até o Momento</h2>
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
				<td><a href="#" class="btn btn-danger" onclick="exclui({{ $p->id }})">Remover</a></td>
				
			</tr>
			@endforeach

			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td><b>Total:</b></td>
				<td><b>{{ $venda->valor_total_venda }}</b></td>
				<td></td>
				<td></td>
				
			</tr>
		</tbody>
	</table>

	<script>
		function exclui(id){
			if(confirm('Deseja excluir o item de id:' + id + '?')){
				location.href='/venda/{$venda->id}/itens/remover/' + id;
			}
		}	
	</script>
@endsection