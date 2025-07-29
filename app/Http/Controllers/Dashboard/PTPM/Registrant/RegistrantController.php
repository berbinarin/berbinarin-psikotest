<?php

namespace App\Http\Controllers\Dashboard\PTPM\Registrant;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegistrationRequest;
use App\Models\RegistrantProfile;
use App\Models\TestCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RegistrantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registrants = RegistrantProfile::with('user')->get();
        return view('dashboard.ptpm.registrants.index', compact('registrants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $testCategories = TestCategory::with('testTypes')->get();
        return view('dashboard.ptpm.registrants.create', compact('testCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRegistrationRequest $request)
    {

        $validateData = $request->validated();

        try {
            // 2. Bungkus semua operasi database dalam transaction
            DB::transaction(function () use ($validateData) {

                // Buat user baru
                $user = User::create([
                    'name' => $validateData['name'],
                    'email' => $validateData['email'],
                    'username' => Str::random(10),
                    'password' => bcrypt(\Illuminate\Support\Str::random(10)),
                ]);

                RegistrantProfile::create([
                    'user_id' => $user->id,
                    'test_type_id' => $validateData['test_type_id'],
                    'gender' => $validateData['gender'],
                    'age' => $validateData['age'],
                    'domicile' => $validateData['domicile'],
                    'phone_number' => $validateData['phone_number'],
                    'psikotes_service' => $validateData['service'],
                    'reason' => $validateData['reason'],
                    'schedule' => \Carbon\Carbon::createFromFormat('Y-m-d H:i', $validateData['psikotes_date'] . ' ' . $validateData['psikotes_time'])
                ]);
            });
        } catch (\Exception $e) {
            dd($e);
            return back()->withInput()->with('error', 'Terjadi kesalahan saat pendaftaran. Silakan coba lagi.');
        }

        return redirect()->route('dashboard.registrants.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(RegistrantProfile $registrant)
    {
        return view('dashboard.ptpm.registrants.show', compact('registrant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
