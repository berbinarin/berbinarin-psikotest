<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Attempt;
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

        $attempts = Attempt::all();

        $allCategories = $attempts
            ->map(function ($attempt) {
                return optional($attempt->user->profile->testType->testCategory)->name;
            })
            ->filter()
            ->unique()
            ->values()
            ->all();

        $chartData = [];
        $indonesianMonths = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        foreach ($attempts->sortByDesc('created_at') as $attempt) {
            $categoryName = optional($attempt->user->profile->testType->testCategory)->name;

            if ($categoryName) {
                $year = $attempt->created_at->year;
                $monthName = $indonesianMonths[$attempt->created_at->month];

                if (!isset($chartData[$year])) {
                    $chartData[$year] = [];
                }
                if (!isset($chartData[$year][$monthName])) {
                    $chartData[$year][$monthName] = [];
                }
                if (!isset($chartData[$year][$monthName][$categoryName])) {
                    $chartData[$year][$monthName][$categoryName] = 0;
                }

                $chartData[$year][$monthName][$categoryName]++;
            }
        }


        return view('dashboard.ptpm_psikotes-paid.index', compact('testCategories', 'chartData', 'allCategories'));
    }

    private function ptpmPsikotesFree()
    {
        $profiles = PsikotesFreeProfile::orderBy('date_of_test', 'DESC')->get();

        $chartData = [];
        $indonesianMonths = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        foreach ($profiles as $profile) {
            $year = $profile->created_at->year;
            $monthName = $indonesianMonths[$profile->created_at->month];

            if (!isset($chartData[$year])) {
                $chartData[$year] = [];
            }
            if (!isset($chartData[$year][$monthName])) {
                $chartData[$year][$monthName] = 0;
            }

            $chartData[$year][$monthName]++;
        }

        return view('dashboard.ptpm_psikotes-free.index', compact('profiles', 'chartData'));
    }
}
