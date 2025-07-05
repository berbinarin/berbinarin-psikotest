<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $layanan_psikotes = [
            [
                'image' => 'assets/images/landing/asset-psikotes/illustrasi/individu.png',
                'name' => 'Individu'
            ],
            [
                'image' => 'assets/images/landing/asset-psikotes/illustrasi/perusahaan.png',
                'name' => 'Perusahaan'
            ],
            [
                'image' => 'assets/images/landing/asset-psikotes/illustrasi/komunitas.png',
                'name' => 'Komunitas'
            ],
            [
                'image' => 'assets/images/landing/asset-psikotes/illustrasi/pendidikan.png',
                'name' => 'Pendidikan'
            ],
        ];

        return view('landing.home.index', compact('layanan_psikotes'));
    }
}
