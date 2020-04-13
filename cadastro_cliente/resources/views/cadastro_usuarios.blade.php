@extends('template')

@section('conteudo')
<h1>Cadastro de usuário</h1>
<form method="post" action="{{ route('usuario_add') }}">
	@csrf
	<input type="text" class="form-control mt-2" name="nome" placeholder="Nome">
	<input type="text" class="form-control mt-2" name="login" placeholder="Login">
	<input type="password" class="form-control mt-2" name="senha" placeholder="Senha">
	<input type="submit" class="btn btn-primary mt-2" value="Cadastrar">
</form>
@endsection