<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegistrationRequest;
use App\Models\RegistrantProfile;
use App\Models\TestCategory;
use App\Models\TestType;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $testCategories = TestCategory::all();
        $testTypes = TestType::all();
        return view('auth.register', compact('testCategories', 'testTypes'));
    }

    /**
     * Display the registration view.
     */
    public function registerUser(): View
    {
        return view('auth.register-user');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(StoreRegistrationRequest $request): RedirectResponse
    {

        $validateData = $request->validated();

        try {
            // 2. Bungkus semua operasi database dalam transaction
            DB::transaction(function () use ($validateData) {

                // Buat user baru
                $user = User::create([
                    'name' => $validateData['name'],
                    'email' => $validateData['email'],
                    'password' => bcrypt(Str::random(10)),
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
                    'schedule' => Carbon::createFromFormat('Y-m-d H:i', $validateData['psikotes_date'] . ' ' . $validateData['psikotes_time'])
                ]);
            });
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Terjadi kesalahan saat pendaftaran. Silakan coba lagi.');
        }


        return redirect(RouteServiceProvider::HOME);
    }
}
