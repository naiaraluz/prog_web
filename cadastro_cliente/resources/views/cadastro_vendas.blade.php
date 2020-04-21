@extends ('template')
	@section('conteudo')
	<h1>Cadastro de Vendas</h1>
	<form  class="form-group" method="post" action="{{ route('venda_nova') }}">
		@csrf
		<select class="custom-select" name="id_cliente">
                        @foreach($clientes as $c)
                        <option value="{{ $c->id }}">  {{ $c->id }} {{ $c->nome }} </option>
                        @endforeach
        </select>
		<input class="form-control mt-2" type="text" name="descricao" placeholder="Descrição">
		<input class="btn btn-primary mt-2" type="submit" value="Incluir">
		<div>
			<a class="btn btn-primary mt-2" href="{{ route('vendas_listar') }}">Listar Vendas</a>
		</div>
	</form>
	@endsection