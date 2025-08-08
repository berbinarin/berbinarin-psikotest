<?php

namespace App\Http\Controllers\Landing\PsikotesFree;

use App\Http\Controllers\Controller;
use App\Models\PsikotesFreeProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PsikotesFreeProfileController extends Controller
{
    public function index()
    {
        return view('landing.psikotes-free.profile');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string',
            'date_of_birth' => 'required',
            'email' => 'required|email',
        ]);

        $dateOfBirth = Carbon::createFromFormat('d/m/Y', $request->date_of_birth)->format('Y-m-d');
        $dateOfTest = Carbon::now();

        $userPsikotes = PsikotesFreeProfile::create([
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'date_of_birth' => $dateOfBirth,
            'date_of_test' => $dateOfTest,
            'email' => $request->input('email'),
        ]);

        $user_id = $userPsikotes->id;

        session()->put('user_id', $user_id);

        return redirect()->route('psikotes-free.introduce');
    }
}
