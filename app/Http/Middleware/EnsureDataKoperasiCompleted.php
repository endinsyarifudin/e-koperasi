<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureDataKoperasiCompleted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->koperasi == null) {
            flash('Silahkan lenglapi dulu data koperasi anda')
                ->error();
            return redirect()->route('koperasi.create');
        }
        return $next($request);
    }
}
