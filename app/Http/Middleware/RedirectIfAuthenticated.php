<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Dapatkan user yang sedang login
                $user = Auth::guard($guard)->user();

                // Periksa peran user menggunakan Spatie Permission
                if ($user->hasRole('ptpm')) {
                    // Jika user adalah admin, arahkan ke /dashboard
                    return redirect()->route('dashboard.index');
                } elseif ($user->hasRole('user_psikotes-paid')) {
                    // Jika user adalah user biasa, arahkan ke ke route psikotes-paid.tool.index
                    return redirect()->route('psikotes-paid.tools.index');
                }

                // Fallback jika tidak ada peran yang cocok atau peran lain
                // Anda bisa mengubah ini sesuai kebutuhan, misalnya ke halaman default
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
