<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\TestCategory;
use App\Models\PsikotesFreeProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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

    private function ptpmPsikotesPaid()
    {
        $testCategories = TestCategory::withCount('registrantProfiles')->get();

        

        return view('dashboard.ptpm_psikotes-paid.index', compact('testCategories'));
    }

    private function ptpmPsikotesFree()
    {
        $freeProfiles = PsikotesFreeProfile::all();
        $profilesCount = PsikotesFreeProfile::count();

        $weeklyRegistrants = collect();
        $startOfWeek = Carbon::now()->copy()->subWeeks(3)->startOfWeek(); // 4 minggu terakhir

        for ($i = 0; $i < 4; $i++) {
            $weekStart = $startOfWeek->copy()->addWeeks($i);
            $weekEnd = $weekStart->copy()->endOfWeek();

            $count = PsikotesFreeProfile::whereBetween('created_at', [$weekStart, $weekEnd])->count();

            $weeklyRegistrants->push([
                'label' => $weekStart->format('d M') . ' - ' . $weekEnd->format('d M'),
                'value' => $count,
            ]);
        }

        return view('dashboard.ptpm_psikotes-free.index', compact('freeProfiles', 'profilesCount', 'weeklyRegistrants'));
    }
}
