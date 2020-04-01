<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Cadastro de Clientes</h1>
	<form method="post" action="{{ route('cliente_novo') }}">
		@csrf
		<input type="text" name="nome" placeholder="Nome">
		<input type="text" name="endereco" placeholder="Endereço">
		<input type="text" name="cep" placeholder="CEP">
		<input type="text" name="estado" placeholder="Estado">
		<input type="text" name="cidade" placeholder="Cidade">
		<input type="submit" value="Enviar">
	</form>
</body>
</html>