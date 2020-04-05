@extends('template')

@section ('conteudo')

<div class="alert alert-{{ $classe }}" >
  {{ $mensagem }}
</div>
@endsection
