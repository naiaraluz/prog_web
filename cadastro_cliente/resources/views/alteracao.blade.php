@extends ('template')
	@section('conteudo')
	<h1>Alteração de Clientes</h1>
	<form method="post" action="{{ route('clientes_alterar', ['id' => $c->id]) }}">
		@csrf
		<input class="form-control mt-2" type="text" name="nome" placeholder="Nome" value="{{ $c->nome }}">
		<input class="form-control mt-2" type="text" name="endereco" placeholder="Endereço" value="{{ $c->endereco }}">
		<input class="form-control mt-2" type="text" name="cep" placeholder="CEP" value="{{ $c->cep }}">
		<input class="form-control mt-2" type="text" name="estado" placeholder="Estado" value="{{ $c->estado }}">
		<input class="form-control mt-2" type="text" name="cidade" placeholder="Cidade" value="{{ $c->cidade }}">
		<input class="btn btn-primary mt-2" type="submit" value="Enviar">
	</form>

	@endsection

