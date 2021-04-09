<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isAdmin
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth()->user()->isAdmin)
            return $next($request);

        session()->flash('success', 'você não tem permissão para acessar essa pagina!');
        return redirect()->back();
    }
}
