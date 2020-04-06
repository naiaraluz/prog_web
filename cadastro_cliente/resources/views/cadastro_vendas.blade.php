@extends ('template')
	@section('conteudo')
	<h1>Cadastro de Vendas</h1>
	<form  class="form-group" method="post" action="{{ route('venda_nova') }}">
		@csrf
		<select class="custom-select" name="nome">
                        @foreach(App\Cliente::all() as $c)
                        <option value="{{ $c->id }}">{{ $c->nome }} {{ $c->id }} </option>
                        @endforeach
        </select>
		<input class="form-control mt-2" type="text" name="id_cliente" placeholder="ID do Cliente">
		<input class="form-control mt-2" type="text" name="valor_total_venda" placeholder="Valor Total da Venda">
		<input class="form-control mt-2" type="text" name="descricao" placeholder="Descrição">
		<input class="btn btn-primary mt-2" type="submit" value="Incluir">
	</form>

	@endsection