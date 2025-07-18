<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    /**
     * Titik masuk utama untuk dashboard.
     * Method ini secara dinamis akan memanggil method dashboard yang sesuai
     * dengan role user.
     */
    public function index()
    {
        $role = Auth::user()->getRoleNames()->first();
        $methodName = Str::camel($role);

        if (method_exists($this, $methodName)) {
            return $this->{$methodName}();
        }
    }

    // --- Method-method spesifik untuk setiap role ---
    // Pastikan nama method mengikuti format: [namaRoleDalamCamelCase] contoh => webDev, classPM, counselingPM, ptpm

    private function ptpm()
    {
        return view('dashboard.ptpm.index');
    }
}
