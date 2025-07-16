<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Jika permintaan bukan JSON (bukan API), jalankan logika di bawah.
        // Jika permintaan adalah API, Laravel akan otomatis mengembalikan respons JSON 401.
        if (! $request->expectsJson()) {
            
            // Jika pengguna mencoba mengakses route yang diawali dengan 'admin/'
            if ($request->is('dashboard*')) {
                return route('auth.login');
            }

            // Jika pengguna mencoba mengakses rute yang diawali dengan 'psikotes-paid/'
            if ($request->is('psikotes-paid/*')) {
                return route('auth.psikotes-paid.login');
            }
            
            // Fallback jika bukan route route diatas
            return route('auth.psikotes-paid.login');
        }
        return null;
    }
}