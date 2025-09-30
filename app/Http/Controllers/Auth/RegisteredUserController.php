<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegistrationRequest;
use App\Models\RegistrantProfile;
use App\Models\TestCategory;
use App\Models\TestType;
use App\Models\User;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Models\VoucherCode;

class RegisteredUserController extends Controller
{
    // Show the registration form
    public function psikotesPaidRegister(): View
    {
        $testCategories = TestCategory::all();
        $testTypes = TestType::all();
        $vouchers = VoucherCode::all();
        return view('auth.register.psikotes-paid-register', compact('testCategories', 'testTypes', 'vouchers'));
    }

    // public function checkEmail(Request $request)
    // {
    //     $email = $request->query('email');

    //     $exists = User::where('email', $email)->exists();

    //     return response()->json(['exists' => $exists]);
    // }

    // Handle an incoming registration request
    public function psikotesPaidRegisterStore(StoreRegistrationRequest $request): RedirectResponse
    {
        $validateData = $request->validated();

        try {
            // 2. Bungkus semua operasi database dalam transaction
            DB::transaction(function () use ($validateData, $request) {
                // Buat user baru
                $user = User::create([
                    'name' => $validateData['name'],
                    'email' => $validateData['email'],
                    'username' => Str::lower(Str::random(8)),
                    'password' => bcrypt('berbinar'),
                ])->assignRole('user_psikotes-paid');

                $buktiKartuPath = null;
                if ($request->hasFile('student_card')) {
                    $buktiKartuPath = $request->file('student_card')->store('student_card', 'public');
                }

                RegistrantProfile::create([
                    'user_id' => $user->id,
                    'test_type_id' => $validateData['test_type_id'],
                    'gender' => $validateData['gender'],
                    'age' => $validateData['age'],
                    'domicile' => $validateData['domicile'],
                    'phone_number' => $validateData['phone_number'],
                    'psikotes_service' => $validateData['service'],
                    'reason' => $validateData['reason'],
                    'schedule' => Carbon::createFromFormat('Y-m-d H:i', $validateData['psikotes_date'] . ' ' . $validateData['psikotes_time']),
                    'voucher_category' => $request->input('voucher_category'),
                    'voucher_code' => $request->input('voucher_code'),
                    'discount_percentage' => $request->input('discount_percentage'),
                    'student_card' => $buktiKartuPath,
                ]);

            });
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Terjadi kesalahan saat pendaftaran. Silakan coba lagi.');
        }

        return redirect()->route('auth.psikotes-paid.register.summary');
    }
    public function summary(): View
    {
        return view('auth.register.summary');
    }
}
