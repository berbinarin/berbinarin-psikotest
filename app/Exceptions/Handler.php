<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Session\TokenMismatchException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        if ($e instanceof TokenMismatchException) {
            // Jika akses route dashboard → arahkan ke login admin
            if ($request->is('dashboard*')) {
                return redirect()->route('auth.login')
                    ->withErrors(['message' => 'Sesi Anda sudah habis, silakan login kembali.']);
            }

            // Jika akses route psikotes-paid → arahkan ke login khusus psikotes
            if ($request->is('psikotes-paid/*')) {
                return redirect()->route('auth.psikotes-paid.login')
                    ->withErrors(['message' => 'Sesi psikotes Anda sudah habis, silakan login kembali.']);
            }
            if ($request->is('psikotes-free/*')) {
                return redirect()->route('psikotes-free.profile') // Arahkan ke halaman biodata
                    ->withErrors(['message' => 'Sesi Anda sudah habis, silakan isi kembali data Anda untuk memulai.']);
            }
            // Fallback → default login
            return redirect()->route('auth.psikotes-paid.login')
                ->withErrors(['message' => 'Sesi Anda sudah habis, silakan login kembali.']);
        }

        return parent::render($request, $e);
    }
}