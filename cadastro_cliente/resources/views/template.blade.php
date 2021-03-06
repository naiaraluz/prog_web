<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta charset="utf-8">
	<title>Sistema - Programação Web</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row">

			<div class="row w-100">
				<nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100">
				  <a class="navbar-brand" href="#">Navbar</a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>
				  <div class="collapse navbar-collapse" id="navbarNavDropdown">
				    <ul class="navbar-nav">
				      <li class="nav-item active">
				        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				      </li>
				      <li class="nav-item dropdown">
				        <a class="nav-link" href="{{ route('tela_login') }}">Entrar</a>
				      </li>
				      <li class="nav-item dropdown">
				        <a class="nav-link" href="{{ route('logout') }}">Sair</a>
				      </li>
				      <li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          Cadastros
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				        	<a class="dropdown-item" href="{{ route('usuarios_cadastrar') }}">Cadastro de Usuários</a>
				         	<a class="dropdown-item" href="{{ route('clientes_cadastrar') }}">Cadastro de Clientes</a>
				        	<a class="dropdown-item" href=" {{ route('vendas_cadastrar') }}">Cadastro de Vendas</a>
				        </div>
				      </li>
				      <li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          Listas
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				          <a class="dropdown-item" href="{{ route('clientes_listar') }}">Lista de Clientes</a>
				          <a class="dropdown-item" href=" {{ route('vendas_listar') }}">Lista de Vendas</a>
				          <a class="dropdown-item" href=" {{ route('produtos_listar') }}">Lista de Produtos</a>
				        </div>
				      </li>
				    </ul>
				  </div>
				</nav>
			</div>

			<div class="col-md-2">
			</div>

			<div class="col-md-8 mt-5">
				<h3> Olá, {{ Auth:: user()->name }}</h3>
				@if (session()->has('mensagem'))
					<div class="alert alert-danger">{{ session('mensagem') }}</div>
					{{ session()->forget(['mensagem']) }}
				@endif
				@yield('conteudo')
				
			</div>

			<div class="col-md-2">
			</div>
		</div>
	</div>







<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>