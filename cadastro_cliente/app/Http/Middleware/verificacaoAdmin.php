<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class verificacaoAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::user()->admin()){
            session ([
                'mensagem' => "Acesso negado, permissão somente para Administradores!"
            ]);
            return back();
        }
        return $next($request);
    }
}
