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

	<div>
		<a class="btn btn-primary mt-3" href="{{ route('produtos_listar') }}">Listar Produtos</a>
	</div>
@endsection