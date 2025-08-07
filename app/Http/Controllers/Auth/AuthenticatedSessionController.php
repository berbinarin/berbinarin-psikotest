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
        return view('auth.login.psikotes-paid-login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function authenticate(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $loginType = $request->input('login_type');

        if ($loginType === 'admin') {
            if (! Auth::user()->hasRole(['ptpm_psikotes-paid', 'ptpm_psikotes-free'])) {
                Auth::guard('web')->logout();
                throw ValidationException::withMessages([
                    'username' => __('auth.failed'),
                ]);
            }
            $redirectPath = RouteServiceProvider::HOME;
        } elseif ($loginType === 'user') {
            if (! Auth::user()->hasRole('user_psikotes-paid')) {
                Auth::guard('web')->logout();
                throw ValidationException::withMessages([
                    'username' => __('auth.failed'),
                ]);
            }
            $redirectPath = '/psikotes-paid/tools';
        } else {
            Auth::guard('web')->logout();
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        $request->session()->regenerate();
        return redirect()->intended($redirectPath);
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


        if ($user && $user->hasRole(['ptpm_psikotes-paid', 'ptpm_psikotes-free'])) {
            return redirect()->route('auth.login');
        }
        return redirect()->route('home.index');
    }
}
