@extends('template')

@section ('conteudo')

<div class="alert alert-{{ $classe }}" >
  {{ $mensagem }}
</div>

	<div>
		<a class="btn btn-primary" href="{{ route('vendas_cadastrar') }}">Incuir Nova Venda</a>
	</div>

	<div>
		<a class="btn btn-primary mt-3" href="{{ route('clientes_cadastrar') }}">Cadastrar Novo Cliente</a>
	</div>
	
@endsection
