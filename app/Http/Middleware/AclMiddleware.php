<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\AclService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class AclMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $aclService = new AclService();

        if ($aclService->middlewareAcl($request)) {
            return $next($request);
        }

        return redirect()->route('home.index')->with('wrongPermission', 'U heeft geen toegang tot deze functie!');
    }
}
