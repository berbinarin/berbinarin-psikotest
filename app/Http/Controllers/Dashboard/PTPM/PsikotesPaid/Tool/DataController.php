<?php

namespace App\Http\Controllers\Dashboard\PTPM\PsikotesPaid\Tool;

use App\Http\Controllers\Controller;
use App\Models\Attempt;
use App\Models\Section;
use App\Models\Tool;
use App\Services\Dashboard\PsikotesTool\ResultService;

class DataController extends Controller
{
    public function index(Tool $tool)
    {
        $tool->load('attempts.user.profile.testType.testCategory');

        $allCategories = $tool->attempts
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

        foreach ($tool->attempts->sortByDesc('created_at') as $attempt) {
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

        $averageDurationMinutes = round(
            $tool->attempts->avg(function ($attempt) {
                return $attempt->updated_at->diffInSeconds($attempt->created_at);
            }) / 60,
            2
        );

        return view('dashboard.ptpm_psikotes-paid.tools.data.index', compact('tool', 'chartData', 'allCategories', 'averageDurationMinutes'));
    }
}
