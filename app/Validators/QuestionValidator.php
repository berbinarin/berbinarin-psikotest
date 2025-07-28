<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;
// 1. Tambahkan use statement ini
use Illuminate\Validation\Rule;
use InvalidArgumentException;

class QuestionValidator
{
    /**
     * Memvalidasi data pertanyaan berdasarkan tipenya.
     *
     * @param array $question Data pertanyaan dalam bentuk array.
     * @throws InvalidArgumentException Jika validasi gagal.
     */
    public function validate(array $question): void
    {
        if (!isset($question['type'])) {
            throw new InvalidArgumentException("Tipe pertanyaan (type) wajib ada.");
        }
        
        if (!isset($question['section_id'])) {
            throw new InvalidArgumentException("Field 'section_id' wajib ada untuk validasi urutan.");
        }

        // Dapatkan aturan validasi berdasarkan tipe pertanyaan
        $rules = $this->getRulesForType($question['type']);

        // 2. Tambahkan aturan unik untuk 'order' yang berlaku untuk semua tipe
        $rules['order'] = [
            'required',
            'integer',
            // Aturan ini memastikan 'order' unik dalam tabel 'questions'
            // untuk 'section_id' yang sama.
            Rule::unique('questions')->where('section_id', $question['section_id'])
        ];

        $validator = Validator::make($question, $rules);

        if ($validator->fails()) {
            $questionIdentifier = "dengan urutan #" . ($question['order'] ?? 'Tidak diketahui');
            if (!empty($question['text'])) {
                $questionIdentifier = "'{$question['text']}' (Urutan: #{$question['order']})";
            }
            throw new InvalidArgumentException(
                "Data pertanyaan {$questionIdentifier} tidak valid: \n" . $validator->errors()
            );
        }
    }

    /**
     * Mengembalikan aturan validasi yang sesuai untuk setiap tipe pertanyaan.
     */
    private function getRulesForType(string $type): array
    {
        // Gunakan match expression (PHP 8.0+) untuk kode yang lebih bersih
        return match ($type) {

            'essay' => [
                'type' => ['required', 'in:essay'],
                'text' => ['required', 'string'],
                'options' => ['prohibited'], // Tidak boleh memiliki key 'option'
                'scroing' => ['probhibited'] // Tidak boleh memiliki key 'scoring'
            ],

            'multiple_choice' => [
                'type' => ['required', 'in:multiple_choice'],
                'text' => ['required', 'string', 'min:5'],
                'options' => ['required', 'array', 'min:2'], // Harus ada minimal 2 pilihan
                'options.*.value' => ['required'],
                'options.*.text' => ['required', 'string'],
                'answer' => ['required'], // Harus ada kunci jawaban
            ],

            'form' => [
                'type' => ['required', 'in:form'], // type question harus 'form'
                'options' => ['required', 'array'], // options question harus bertipe 'array'
                'options.*.title' => ['nullable', 'string'], // Setiap item di dalam option harus memiliki key 'title' dengan tipe string atau null
                'options.*.repeatable' => ['required', 'boolean'], // Setiap item di dalam option haurs memiliki key 'repeatble' dengan tipe boolean
                'options.*.group' => ['required_if:options.*.repeatable,true'], // Setiap item di dalam options harus memiliki key 'group' jika repeatable bernilai true
                'options.*.inputs' => ['required', 'array'], // Setiap item di dalam option harus memiliki key 'inputs' dengan tipe array
                'options.*.inputs.*' => ['array'], // Setiap item di dalam inputs wajib memiliki tipe array
                'options.*.inputs.*.label' => ['required', 'string'], // Setiap item di dalam option harus memiliki key 'label' dengan tipe string
                'options.*.inputs.*.name' => ['required', 'string'], // Setiap item di dalam inputs harus memiliki key 'name' dengan tipe string
                'options.*.inputs.*.type' => ['required', 'string'], // Setiap item di dalam inputs harus memiliki key 'type' dengan tipe string
                'options.*.inputs.*.placeholder' => ['string', 'nullable'], // Setiap item di dalam inputs harus memiliki key 'placehodler' dnegan tipe string atau null
                'options.*.inputs.*.required' => ['required', 'boolean'], // Setiap item di dalam inputs harus memiliki key 'required' dengan tipe boolean
                'options.*.inputs.*.span' => ['required', 'integer'], // Setiap item di dalam inputs harus memiliki key 'span' dengan tipe integer
                'options.*.inputs.*.items' => ['required_if:options.*.inputs.*.type,select,checkbox,radio', 'array'], // Setiap item di dalam inputs harus memilik key 'items' jika key 'type' di dalam field memiliki value ini [select,radio,checkbox]
            ],

            default => throw new InvalidArgumentException("Tipe pertanyaan '{$type}' tidak didukung."),
        };
    }
}
