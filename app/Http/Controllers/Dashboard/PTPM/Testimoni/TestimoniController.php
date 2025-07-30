<?php

namespace App\Http\Controllers\Dashboard\PTPM\Testimoni;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TestimoniController extends Controller
{
    public function index()
    {
        // Data dummy testimoni
        $testimonies = [
            (object) [
                'id' => 1,
                'user' => (object) ['name' => 'Budi Santoso'],
                'date' => Carbon::now(),
                'experience' => 'Saya ingin lebih memahami diri saya, termasuk kekuatan dan kelemahan saya, agar dapat meningkatkan kualitas diri dan mencapai potensi maksimal dalam karir dan kehidupan pribadi.',
                'opinion' => 'Kegiatan psikotes sangat membantu saya mengenal diri lebih dalam.',
                'suggestion' => 'Semoga ke depannya bisa lebih banyak variasi tes.',
            ],
            (object) [
                'id' => 2,
                'user' => (object) ['name' => 'Siti Aminah'],
                'date' => Carbon::now()->subDay(),
                'experience' => 'Pengalaman mengikuti psikotes di Berbinar sangat menyenangkan dan bermanfaat.',
                'opinion' => 'Fasilitas dan pelayanan sangat baik.',
                'suggestion' => 'Akan lebih baik jika jadwal tes lebih fleksibel.',
            ],
        ];

        return view('dashboard.ptpm.testimoni.index', compact('testimonies'));
    }

    public function show($id)
    {
        // Data dummy testimoni (sama seperti index)
        $testimonies = [
            (object) [
                'id' => 1,
                'user' => (object) ['name' => 'Budi Santoso'],
                'date' => Carbon::now(),
                'experience' => 'Saya ingin lebih memahami diri saya, termasuk kekuatan dan kelemahan saya, agar dapat meningkatkan kualitas diri dan mencapai potensi maksimal dalam karir dan kehidupan pribadi.',
                'opinion' => 'Kegiatan psikotes sangat membantu saya mengenal diri lebih dalam.',
                'suggestion' => 'Semoga ke depannya bisa lebih banyak variasi tes.',
            ],
            (object) [
                'id' => 2,
                'user' => (object) ['name' => 'Siti Aminah'],
                'date' => Carbon::now()->subDay(),
                'experience' => 'Pengalaman mengikuti psikotes di Berbinar sangat menyenangkan dan bermanfaat.',
                'opinion' => 'Fasilitas dan pelayanan sangat baik.',
                'suggestion' => 'Akan lebih baik jika jadwal tes lebih fleksibel.',
            ],
        ];

        // Cari testimoni berdasarkan id
        $testimony = collect($testimonies)->firstWhere('id', $id);

        if (!$testimony) {
            abort(404);
        }

        return view('dashboard.ptpm.testimoni.show', compact('testimony'));
    }
}
