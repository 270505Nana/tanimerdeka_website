<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle incoming request.
     * handle incoming roles, we have ['anggota','admin','user']
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        //login crosscheck
        if (! $request->user()) {
            if ($request->wantsJson()) {
                return response()->json(['message' => 'Unauthenticated'], 401);
            }
            return redirect('/login');
        }

        if (! in_array($request->user()->role, $roles)) {
            if ($request->wantsJson()) {
                return response()->json(['message' => 'Anda tidak memiliki akses (Forbidden)'], 403);
            }
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
        return $next($request);
    }
}
