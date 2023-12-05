<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->dosen->is_admin){
            return $next($request);
        } else {
            return redirect('/login');
        }
    }
}