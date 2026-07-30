<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckOfficerRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            // Jika rolenya adalah 'user' (atau bukan petugas), arahkan kembali ke landing page
            $role = auth()->user()->role;
            if ($role === 'user' || $role === 'User Biasa') {
                return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman petugas.');
            }
        }

        return $next($request);
    }
}
