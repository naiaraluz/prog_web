@extends ('template')
@section ('conteudo')
    <h1>Login</h1>
    <form method="post" action="{{ route('logar') }}">
        @csrf
        <input class="form-control mt-2" type="text" name="login" placeholder="Login">
        <input class="form-control mt-2" type="password" name="senha" placeholder="Senha">
        <input class="btn btn-primary mt-2" type="submit" value="Acessar">
    </form>
@endsection