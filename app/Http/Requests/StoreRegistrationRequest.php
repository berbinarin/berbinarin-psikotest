<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator; // <-- PASTIKAN INI DIIMPORT!
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:H:i'],
            'service' => ['required', 'string', Rule::in(['online', 'offline'])],
            'test_category_id' => ['required', 'integer', Rule::exists('test_categories', 'id')],
            'test_type_id' => [
                'required',
                'integer',
                Rule::exists('test_types', 'id')->where(function ($query) {
                    $query->where('test_category_id', $this->input('test_category_id'));
                })
            ],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'age' => ['required', 'integer', 'min:1'],
            'domicile' => ['required', 'string'],
            'gender' => ['required', 'string', Rule::in(['male', 'female'])],
            'phone_number' => ['required', 'string', 'min:8', 'max:15'],
            'reason' => ['required', 'string']
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        // --- BREAKPOINT DI SINI ---
        // Letakkan breakpoint di baris di bawah ini atau dd()
        // Anda bisa dd() errors-nya langsung di sini
        dd($validator->errors()->all());
        // Atau dd($validator->errors()->toArray());

        // Jika Anda menggunakan Xdebug, execution akan berhenti di sini.
        // Anda bisa memeriksa $validator->errors() di panel debugger.

        // Jangan lupa untuk melemparkan kembali exception agar redirect tetap terjadi setelah debugging
        throw new HttpResponseException(
            response()->json($validator->errors(), 422) // Ini akan mengembalikan JSON error
            // Atau jika ingin tetap redirect:
            // redirect()->back()->withErrors($validator)->withInput()
        );
    }
}
