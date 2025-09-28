<?php

namespace App\Http\Controllers\Dashboard\PTPM\PsikotesPaid\Registrant;

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
        $registrants = RegistrantProfile::with('user', 'testType.testCategory')->get();
        return view('dashboard.ptpm_psikotes-paid.registrants.index', compact('registrants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $testCategories = TestCategory::with('testTypes')->get();
        return view('dashboard.ptpm_psikotes-paid.registrants.create', compact('testCategories'));
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
                    'username' => Str::lower(Str::random(8)),
                    'password' => bcrypt('berbinar'),
                ])->assignRole('user_psikotes-paid');

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
            return back()->withInput()->with([
            'alert'   => true,
            'type'    => 'error',
            'title'   => 'Gagal',
            'message' => 'Terjdi kesalahan saat mendaftarkan... Sorry 😺',
            'icon'    => asset('assets/dashboard/images/error.png'),
        ]);
        }

        return redirect()->route('dashboard.registrants.index')->with([
            'alert'   => true,
            'type'    => 'success',
            'title'   => 'Berhasil!',
            'message' => 'Data berhasil ditambahkan.',
            'icon'    => asset('assets/dashboard/images/success.png'),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $registrant = RegistrantProfile::with(['user', 'testType.testCategory'])->findOrFail($id);

        // Buat Ambil semua attempts user beserta toolnya dan responses
        $attempts = $registrant->user->attempts()->with('tool', 'responses')->get();

        $testResults = [];
        foreach ($attempts as $attempt) {
            $data = $attempt->responses()->with('question')->get();
            $testResults[] = [
                'tool' => $attempt->tool,
                'attempt' => $attempt,
                'data' => $data,
            ];
        }

        return view('dashboard.ptpm_psikotes-paid.registrants.show', compact('registrant', 'testResults'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $registrant = RegistrantProfile::with(['user', 'testType.testCategory'])->findOrFail($id);
        $testCategories = TestCategory::with('testTypes')->get();
        $testTypes = $registrant->testType->testCategory->testTypes;

        return view('dashboard.ptpm_psikotes-paid.registrants.edit', compact('registrant', 'testCategories', 'testTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $registrant = RegistrantProfile::with('user')->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $registrant->user->id,
            'gender' => 'required|in:male,female',
            'age' => 'required|numeric|min:1|max:100',
            'domicile' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'psikotes_service' => 'required|string', // yang gw ubah ya, sebelumnya service doang
            'reason' => 'required|string',
            'test_type_id' => 'required|exists:test_types,id',
            'psikotes_date' => 'required|date',
            'psikotes_time' => 'required|date_format:H:i',
        ]);

        try {
            DB::transaction(function () use ($request, $registrant) {
                // Update user
                $registrant->user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);

                // Update registrant profile
                $registrant->update([
                    'test_type_id' => $request->test_type_id,
                    'gender' => $request->gender,
                    'age' => $request->age,
                    'domicile' => $request->domicile,
                    'phone_number' => $request->phone_number,
                    'psikotes_service' => $request->psikotes_service,
                    'reason' => $request->reason,
                    'schedule' => \Carbon\Carbon::createFromFormat('Y-m-d H:i', $request->psikotes_date . ' ' . $request->psikotes_time),
                ]);
            });

            return redirect()->route('dashboard.registrants.index')->with([
            'alert'   => true,
            'type'    => 'success',
            'title'   => 'Berhasil!',
            'message' => 'Data berhasil diupdate',
            'icon'    => asset('assets/dashboard/images/success.png'),
        ]);
        } catch (\Exception $e) {
            dd($e);
            return back()->withInput()->with([
            'alert'   => true,
            'type'    => 'error',
            'title'   => 'Gagal',
            'message' => 'Terjdi kesalahan saat mengupdate data... Sorry 😺',
            'icon'    => asset('assets/dashboard/images/error.png'),
        ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $registrant = RegistrantProfile::findOrFail($id);

        try {
            DB::transaction(function () use ($registrant) {
                // Hapus user juga (opsional)
                $user = $registrant->user;
                $registrant->delete();

                if ($user) {
                    // Hapus data response dulu
                    foreach ($user->attempts as $attempt) {
                        try {
                            // Coba hapus checkpoint responses
                            $attempt->checkpointResponses()->delete();
                        } catch (\Exception $e) {
                            // Lanjutkan jika tidak ada tabel atau relasi checkpoint
                            \Log::info('No checkpoint responses found for attempt: ' . $attempt->id);
                        }

                        // Hapus responses biasa
                        $attempt->responses()->delete();
                    }

                    // Hapus semua attempts
                    $user->attempts()->delete();

                    // Hapus testimoni
                    $user->testimonials()->delete();

                    // Hapus user
                    $user->delete();
                }
            });

            return redirect()->route('dashboard.registrants.index')->with([
            'alert'   => true,
            'type'    => 'success',
            'title'   => 'Berhasil!',
            'message' => 'Data berhasil dihapus',
            'icon'    => asset('assets/dashboard/images/success.png'),
        ]);
        } catch (\Exception $e) {
            dd($e);
            return back()->with([
            'alert'   => true,
            'type'    => 'error',
            'title'   => 'Gagal',
            'message' => 'Terjadi kesalahan saat menghapus data',
            'icon'    => asset('assets/dashboard/images/error.png'),
        ]);
        }
    }
}
