<?php

namespace App\Http\Middleware;

use App\Models\Attempt;
use App\Services\Landing\PsikotesPaid\AttemptService; // Import service
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureSessionIsVerified
{
    public function __construct(private AttemptService $attemptService) {}

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currentRouteName = $request->route()->getName();

        $allowedRoutesDuringTest = [
            'psikotes-paid.attempt.introduce',
            'psikotes-paid.attempt.question',
            'psikotes-paid.attempt.submit',
        ];

        // Gunakan service untuk memeriksa sesi aktif.
        if ($this->attemptService->getSession()) {
            // Dapatkan ID dari service untuk validasi.
            $attemptId = $this->attemptService->getSession('attempt_id');

            // Pastikan sesi tersebut valid di database.
            if (!Attempt::find($attemptId)) {
                // Jika tidak valid, hancurkan sesi menggunakan service.
                $this->attemptService->destroySession();
                return $next($request);
            }

            // Jika sesi aktif dan pengguna mencoba mengakses halaman di luar alur tes,
            // arahkan kembali ke halaman soal.
            if (!in_array($currentRouteName, $allowedRoutesDuringTest)) {
                return redirect()->route('psikotes-paid.attempt.question');
            }
        } else {
            // Jika pengguna tanpa sesi mencoba mengakses halaman alur tes secara langsung,
            // arahkan mereka ke halaman pemilihan alat tes.
            if (in_array($currentRouteName, $allowedRoutesDuringTest)) {
                return redirect()->route('psikotes-paid.tools.index');
            }
        }

        // Jika tidak ada sesi aktif, atau pengguna berada di halaman yang diizinkan, lanjutkan.
        return $next($request);
    }
}
