@extends('template')

@section ('conteudo')

<h1>Acesso não Permitido</h1>

	<div>
		<a class="btn btn-primary mt-3" href="{{ route('tela_login') }}">Fazer Login</a>
	</div>
	
@endsection