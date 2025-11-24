<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Jenssegers\Agent\Agent;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function login(): View
    {
        $agent = new Agent();

        if ($agent->isMobile() && !$agent->isTablet()) {
            // Kalau user pakai HP, arahkan ke halaman error
            return view('landing.psikotes-paid.tools.block-mobile');
        }
        return view('auth.login.login');
    }

    public function psikotesPaidLogin(): View
    {
        $agent = new Agent();

        if ($agent->isMobile() && !$agent->isTablet()) {
            // Kalau user pakai HP, arahkan ke halaman error
            return view('landing.psikotes-paid.tools.block-mobile');
        }
        return view('auth.login.psikotes-paid-login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function authenticate(LoginRequest $request): RedirectResponse
    {
        try {
            $request->authenticate();
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'alert'   => true,
                'type'    => 'error',
                'title'   => 'Login Gagal!',
                'message' => 'Username atau Password salah',
                'icon'    => asset('assets/dashboard/images/error.webp'),
            ]);
        }

        $loginType = $request->input('login_type');

        if ($loginType === 'admin') {
            if (! Auth::user()->hasRole(['ptpm_psikotes-paid', 'ptpm_psikotes-free'])) {
                Auth::guard('web')->logout();
                return redirect()->back()->with([
                    'alert'   => true,
                    'type'    => 'error',
                    'title'   => 'Login Gagal!',
                    'message' => 'Akun tidak memiliki akses admin',
                    'icon'    => asset('assets/dashboard/images/error.webp'),
                ]);
            }
            $redirectPath = RouteServiceProvider::HOME;
        } elseif ($loginType === 'user') {
            if (! Auth::user()->hasRole('user_psikotes-paid')) {
                Auth::guard('web')->logout();
                return redirect()->back()->with([
                    'alert'   => true,
                    'type'    => 'error',
                    'title'   => 'Login Gagal!',
                    'message' => 'Akun tidak memiliki akses user',
                    'icon'    => asset('assets/dashboard/images/error.webp'),
                ]);
            }
            $redirectPath = '/psikotes-paid/tools';
        } else {
            Auth::guard('web')->logout();
            return redirect()->back()->with([
                'alert'   => true,
                'type'    => 'error',
                'title'   => 'Login Gagal!',
                'message' => 'Tipe login tidak dikenali',
                'icon'    => asset('assets/dashboard/images/error.webp'),
            ]);
        }

        // kalau sukses login
        $request->session()->regenerate();

        // Alert berbeda untuk admin dan user
        if ($loginType === 'admin') {
            $alert = [
                'alert'   => true,
                'type'    => 'success',
                'title'   => 'Berhasil!',
                'message' => 'Selamat bekerja Sobat!',
                'icon'    => asset('assets/dashboard/images/success.webp'),
            ];
        } else {
            $alert = [
                'alert'   => true,
                'type'    => 'success',
                'title'   => 'Berhasil!',
                'message' => 'Anda berhasil masuk.',
                'icon'    => asset('assets/dashboard/images/success.webp'),
            ];
        }

        return redirect()->intended($redirectPath)->with($alert);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = $request->user();

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Bikin flash message untuk logout
        $message = [
            'alert'   => true,
            'type'    => 'success',
            'title'   => 'Logout Berhasil!',
            'message' => 'Sampai jumpa lagi, Sobat!',
            'icon'    => asset('assets/dashboard/images/success.webp'),
        ];

        if ($user && $user->hasRole(['ptpm_psikotes-paid', 'ptpm_psikotes-free'])) {
            return redirect()->route('auth.login')->with($message);
        }

        return redirect()->route('home.index')->with($message);
    }
}
