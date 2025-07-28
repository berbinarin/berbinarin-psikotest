<?php

namespace Database\Seeders\Tools\BiodataKlinis;

use App\Models\Question;
use App\Models\Tool;
use App\Validators\QuestionValidator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BiodataKlinisQuestionSeeder extends Seeder
{
    public function __construct(private QuestionValidator $questionValidator) {}

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $biodataKlinis = Tool::firstWhere('name', 'Biodata Klinis');

        $questions = [
            [
                'section_id' => $biodataKlinis->sections[0]->id,
                'order' => 1,
                'text' => 'Identitas Diri',
                'type' => 'form',
                'options' => [
                    [
                        'repeatable' => false,
                        'inputs' => [
                            [
                                'label' => 'Nama Lengkap',
                                'name' => 'name',
                                'type' => 'text',
                                'placeholder' => 'John Doe',
                                'required' => true,
                                'span' => 6
                            ],
                            [
                                'label' => 'Jenis Kelamin',
                                'name' => 'gender',
                                'type' => 'select',
                                'required' => true,
                                'span' => 6,
                                'items' => [
                                    ['text' => 'Laki-Laki', 'value' => 'male'],
                                    ['text' => 'Perempuan', 'value' => 'female'],
                                ]
                            ],
                            [
                                'label' => 'Tempat Lahir',
                                'name' => 'birth_place',
                                'type' => 'text',
                                'placeholder' => 'John Doe',
                                'required' => true,
                                'span' => 6
                            ],
                            [
                                'label' => 'Tanggal Lahir',
                                'name' => 'birth_date',
                                'type' => 'date',
                                'required' => true,
                                'span' => 6
                            ],
                            [
                                'label' => 'Suku Bangsa',
                                'name' => 'ethnicity',
                                'type' => 'text',
                                'placeholder' => 'Jawa',
                                'required' => true,
                                'span' => 6
                            ],
                            [
                                'label' => 'Status Pernikahan',
                                'name' => 'marriage_status',
                                'type' => 'select',
                                'placeholder' => null,
                                'required' => true,
                                'span' => 6,
                                'items' => [
                                    ['value' => 'single', 'text' => 'Belum Menikah'],
                                    ['value' => 'married', 'text' => 'Sudah Menikah']
                                ]
                            ],
                            [
                                'label' => 'Telepon/HP',
                                'name' => 'phone_number',
                                'type' => 'tel',
                                'placeholder' => '08123456789',
                                'required' => true,
                                'span' => 6,
                            ],
                        ]
                    ]
                ]
            ],
            [
                'section_id' => $biodataKlinis->sections[0]->id,
                'order' => 2,
                'text' => 'Identitas Diri',
                'type' => 'form',
                'options' => [
                    [
                        'repeatable' => false,
                        'inputs' => [
                            [
                                'label' => 'Alamat',
                                'name' => 'address',
                                'type' => 'text',
                                'placeholder' => 'Jl. Tata Surya No.123',
                                'required' => true,
                                'span' => 6,
                            ],
                            [
                                'label' => 'Email',
                                'name' => 'email',
                                'type' => 'email',
                                'placeholder' => 'berbinar@gmail.com',
                                'required' => true,
                                'span' => 6,
                            ],
                            [
                                'label' => 'Unit Kerja',
                                'name' => 'job_division',
                                'type' => 'text',
                                'placeholder' => 'Departemen SDM',
                                'required' => true,
                                'span' => 6,
                            ],
                            [
                                'label' => 'Pekerjaan Saat Ini',
                                'name' => 'current_job',
                                'type' => 'tel',
                                'placeholder' => 'Data Analyst',
                                'required' => true,
                                'span' => 6,
                            ],
                            [
                                'label' => 'Akun Instagram',
                                'name' => 'instagram_url',
                                'type' => 'url',
                                'placeholder' => 'https://instagram.com/berbinar.in',
                                'required' => true,
                                'span' => 6,
                            ],
                            [
                                'label' => 'Akun Facebook',
                                'name' => 'facebook_url',
                                'type' => 'url',
                                'placeholder' => 'https://www.facebook.com/berbinarin',
                                'required' => true,
                                'span' => 6,
                            ],
                            [
                                'label' => 'Akun X Twiter',
                                'name' => 'x_url',
                                'type' => 'url',
                                'placeholder' => 'https://x.com/berbinarin',
                                'required' => true,
                                'span' => 6,
                            ]
                        ]
                    ]
                ]
            ],
            [
                'section_id' => $biodataKlinis->sections[0]->id,
                'order' => 3,
                'text' => 'Riwaya Pendidikan',
                'type' => 'form',
                'options' => [
                    [
                        'title' => 'SD',
                        'group' => 'primary_school',
                        'repeatable' => false,
                        'inputs' => [
                            [
                                'label' => 'Asal Sekolah/Bidang',
                                'name' => 'school',
                                'type' => 'text',
                                'placeholder' => 'SD Harapan 1',
                                'required' => true,
                                'span' => 6
                            ],
                            [
                                'label' => 'Tahun Masuk',
                                'name' => 'year_in',
                                'type' => 'number',
                                'placeholder' => '2003',
                                'required' => true,
                                'span' => 3
                            ],
                            [
                                'label' => 'Tahun Lulus',
                                'name' => 'year_out',
                                'type' => 'number',
                                'placeholder' => '2006',
                                'required' => true,
                                'span' => 3
                            ],
                        ]
                    ],
                    [
                        'title' => 'SMP',
                        'group' => 'junior_high_school',
                        'repeatable' => false,
                        'inputs' => [
                            [
                                'label' => 'Asal Sekolah/Bidang',
                                'name' => 'school',
                                'type' => 'text',
                                'placeholder' => 'SMP Harapan 1',
                                'required' => true,
                                'span' => 6
                            ],
                            [
                                'label' => 'Tahun Masuk',
                                'name' => 'year_in',
                                'type' => 'number',
                                'placeholder' => '2003',
                                'required' => true,
                                'span' => 3
                            ],
                            [
                                'label' => 'Tahun Lulus',
                                'name' => 'year_out',
                                'type' => 'number',
                                'placeholder' => '2006',
                                'required' => true,
                                'span' => 3
                            ],
                        ]
                    ],
                    [
                        'title' => 'SMA',
                        'group' => 'senior_high_school',
                        'repeatable' => false,
                        'inputs' => [
                            [
                                'label' => 'Asal Sekolah/Bidang',
                                'name' => 'school',
                                'type' => 'text',
                                'placeholder' => 'SMA Harapan 1',
                                'required' => true,
                                'span' => 6
                            ],
                            [
                                'label' => 'Jurusan',
                                'name' => 'program',
                                'type' => 'text',
                                'placeholder' => 'MIPA',
                                'required' => true,
                                'span' => 4
                            ],
                            [
                                'label' => 'Masuk',
                                'name' => 'year_in',
                                'type' => 'number',
                                'placeholder' => '2003',
                                'required' => true,
                                'span' => 1
                            ],
                            [
                                'label' => 'Lulus',
                                'name' => 'year_out',
                                'type' => 'number',
                                'placeholder' => '2006',
                                'required' => true,
                                'span' => 1
                            ],
                        ]
                    ],
                ]
            ],
            [
                'section_id' => $biodataKlinis->sections[0]->id,
                'order' => 4,
                'text' => 'Riwayat Pendidikan',
                'type' => 'form',
                'options' => [
                    [
                        'title' => 'D1/D2/D3',
                        'repeatable' => true,
                        'group' => 'diploma',
                        'inputs' => [
                            [
                                'label' => 'Nama Perguruan Tinggi',
                                'name' => 'university',
                                'type' => 'text',
                                'placeholder' => 'Politeknik Harapan Bangsa',
                                'required' => false,
                                'span' => 6
                            ],
                            [
                                'label' => 'Jurusan',
                                'name' => 'program',
                                'type' => 'text',
                                'placeholder' => 'Manajemen',
                                'required' => false,
                                'span' => 3
                            ],
                            [
                                'label' => 'Tahun',
                                'name' => 'year',
                                'type' => 'number',
                                'placeholder' => '2003',
                                'required' => false,
                                'span' => 3
                            ]
                        ]
                    ],
                    [
                        'title' => 'D4/S1',
                        'repeatable' => true,
                        'group' => 'bachelor',
                        'inputs' => [
                            [
                                'label' => 'Nama Perguruan Tinggi',
                                'name' => 'university',
                                'type' => 'text',
                                'placeholder' => 'Universitas Harapan Bangsa',
                                'required' => false,
                                'span' => 6
                            ],
                            [
                                'label' => 'Jurusan',
                                'name' => 'program',
                                'type' => 'text',
                                'placeholder' => 'Manajemen',
                                'required' => false,
                                'span' => 3
                            ],
                            [
                                'label' => 'Tahun',
                                'name' => 'year',
                                'type' => 'text',
                                'placeholder' => '2003',
                                'required' => false,
                                'span' => 3
                            ],
                        ]
                    ]
                ]
            ],
            [
                'section_id' => $biodataKlinis->sections[0]->id,
                'order' => 5,
                'text' => 'Riwayat Pendidikan',
                'type' => 'form',
                'options' => [
                    [
                        'title' => 'S2',
                        'repeatable' => true,
                        'group' => 'master',
                        'inputs' => [
                            [
                                'label' => 'Nama Perguruan Tinggi',
                                'name' => 'university',
                                'type' => 'text',
                                'placeholder' => 'Politeknik Harapan Bangsa',
                                'required' => false,
                                'span' => 6
                            ],
                            [
                                'label' => 'Jurusan',
                                'name' => 'program',
                                'type' => 'text',
                                'placeholder' => 'Manajemen',
                                'required' => false,
                                'span' => 3
                            ],
                            [
                                'label' => 'Tahun',
                                'name' => 'year',
                                'type' => 'number',
                                'placeholder' => '2003',
                                'required' => false,
                                'span' => 3
                            ]
                        ]
                    ],
                    [
                        'title' => 'S3',
                        'repeatable' => true,
                        'group' => 'doctoral',
                        'inputs' => [
                            [
                                'label' => 'Nama Perguruan Tinggi',
                                'name' => 'university',
                                'type' => 'text',
                                'placeholder' => 'Universitas Harapan Bangsa',
                                'required' => false,
                                'span' => 6
                            ],
                            [
                                'label' => 'Jurusan',
                                'name' => 'program',
                                'type' => 'text',
                                'placeholder' => 'Manajemen',
                                'required' => false,
                                'span' => 3
                            ],
                            [
                                'label' => 'Tahun',
                                'name' => 'year',
                                'type' => 'text',
                                'placeholder' => '2003',
                                'required' => false,
                                'span' => 3
                            ],
                        ]
                    ]
                ]
            ],
            [
                'section_id' => $biodataKlinis->sections[0]->id,
                'order' => 6,
                'text' => 'Data Diri Suami/Istri',
                'type' => 'form',
                'options' => [
                    [
                        'repeatable' => false,
                        'group' => 'spouse',
                        'inputs' => [
                            [
                                'label' => 'Nama Suami/Istri',
                                'name' => 'name',
                                'type' => 'text',
                                'placeholder' => 'John Doe',
                                'required' => false,
                                'span' => 6
                            ],
                            [
                                'label' => 'Jenis Kelamin',
                                'name' => 'gender',
                                'type' => 'select',
                                'required' => false,
                                'span' => 6,
                                'items' => [
                                    ['text' => 'Laki-Laki', 'value' => 'male'],
                                    ['text' => 'Perempuan', 'value' => 'female'],
                                ]
                            ],
                            [
                                'label' => 'Usia',
                                'name' => 'age',
                                'type' => 'text',
                                'placeholder' => '25',
                                'required' => false,
                                'span' => 6
                            ],
                            [
                                'label' => 'Suku Bangsa',
                                'name' => 'ethnicity',
                                'type' => 'text',
                                'placeholder' => 'Jawa',
                                'required' => false,
                                'span' => 6
                            ],
                            [
                                'label' => 'Agama',
                                'name' => 'religion',
                                'type' => 'text',
                                'placeholder' => 'Islam',
                                'required' => false,
                                'span' => 6
                            ],
                            [
                                'label' => 'Alamat',
                                'name' => 'address',
                                'type' => 'text',
                                'placeholder' => 'Jl. Tata Surya No. 123',
                                'required' => false,
                                'span' => 6
                            ],
                            [
                                'label' => 'Nomor Telepon',
                                'name' => 'phone_number',
                                'type' => 'tel',
                                'placeholder' => '08123456789',
                                'required' => false,
                                'span' => 6
                            ],
                            [
                                'label' => 'Pendidikan Terakhir',
                                'name' => 'education',
                                'type' => 'text',
                                'placeholder' => 'S1',
                                'required' => false,
                                'span' => 6
                            ],
                            [
                                'label' => 'Pekerjaan',
                                'name' => 'job',
                                'type' => 'text',
                                'placeholder' => 'CEO',
                                'required' => false,
                                'span' => 6
                            ],
                            [
                                'label' => 'Anak Ke-',
                                'name' => 'birth_order',
                                'type' => 'number',
                                'placeholder' => '1',
                                'required' => false,
                                'span' => 6
                            ],
                        ]
                    ]
                ]
            ],
            [
                'section_id' => $biodataKlinis->sections[0]->id,
                'order' => 7,
                'text' => 'Data Ayah',
                'type' => 'form',
                'options' =>
                [
                    [
                        'repeatable' => false,
                        'group' => 'father',
                        'inputs' => [
                            [
                                'label' => 'Nama Ayah',
                                'name' => 'name',
                                'type' => 'text',
                                'placeholder' => 'John Doe',
                                'required' => false,
                                'span' => 6,
                            ],
                            [
                                'label' => 'Status Hubungan',
                                'name' => 'relation_status',
                                'type' => 'select',
                                'required' => false,
                                'span' => 6,
                                'items' => [
                                    ['text' => 'Kandung', 'value' => 'biological'],
                                    ['text' => 'Tiri', 'value' => 'step'],
                                    ['text' => 'Angkat', 'value' => 'adoptive'],
                                ]
                            ],
                            [
                                'label' => 'Jenis Kelamin',
                                'name' => 'gender',
                                'type' => 'select',
                                'required' => false,
                                'span' => 6,
                                'items' => [
                                    ['text' => 'Laki-Laki', 'value' => 'male'],
                                    ['text' => 'Perempuan', 'value' => 'female'],
                                ]
                            ],
                            [
                                'label' => 'Usia',
                                'name' => 'age',
                                'type' => 'number',
                                'placeholder' => '25',
                                'required' => false,
                                'span' => 6,
                            ],
                            [
                                'label' => 'Suku Bangsa',
                                'name' => 'ethnicity',
                                'type' => 'text',
                                'placeholder' => 'Jawa',
                                'required' => false,
                                'span' => 6,
                            ],
                            [
                                'label' => 'Agama',
                                'name' => 'religion',
                                'type' => 'text',
                                'placeholder' => 'Islam',
                                'required' => false,
                                'span' => 6,
                            ],
                            [
                                'label' => 'Alamat',
                                'name' => 'address',
                                'type' => 'text',
                                'placeholder' => 'J. Tata Surya No. 123',
                                'required' => false,
                                'span' => 6,
                            ],
                            [
                                'label' => 'Nomor Telepon',
                                'name' => 'phone_number',
                                'type' => 'tel',
                                'placeholder' => '08123456789',
                                'required' => false,
                                'span' => 6,
                            ],
                            [
                                'label' => 'Pendidikan Terakhir',
                                'name' => 'education',
                                'type' => 'text',
                                'placeholder' => 'S1',
                                'required' => false,
                                'span' => 6,
                            ],
                            [
                                'label' => 'Pekerjaan',
                                'name' => 'job',
                                'type' => 'text',
                                'placeholder' => 'CEO',
                                'required' => false,
                                'span' => 6,
                            ],
                            [
                                'label' => 'Perkawinan Ke-',
                                'name' => 'marriage_order',
                                'type' => 'number',
                                'placeholder' => '1',
                                'required' => false,
                                'span' => 6,
                            ],
                        ]
                    ]
                ]
            ],
            [
                'section_id' => $biodataKlinis->sections[0]->id,
                'order' => 8,
                'text' => 'Data Ibu',
                'type' => 'form',
                'options' =>
                [
                    [
                        'repeatable' => false,
                        'group' => 'mother',
                        'inputs' => [
                            [
                                'label' => 'Nama Ibu',
                                'name' => 'name',
                                'type' => 'text',
                                'placeholder' => 'Jane Doe',
                                'required' => false,
                                'span' => 6,
                            ],
                            [
                                'label' => 'Status Hubungan',
                                'name' => 'relation_status',
                                'type' => 'select',
                                'required' => false,
                                'span' => 6,
                                'items' => [
                                    ['text' => 'Kandung', 'value' => 'biological'],
                                    ['text' => 'Tiri', 'value' => 'step'],
                                    ['text' => 'Angkat', 'value' => 'adoptive'],
                                ]
                            ],
                            [
                                'label' => 'Jenis Kelamin',
                                'name' => 'gender',
                                'type' => 'select',
                                'required' => false,
                                'span' => 6,
                                'items' => [
                                    ['text' => 'Laki-Laki', 'value' => 'male'],
                                    ['text' => 'Perempuan', 'value' => 'female'],
                                ]
                            ],
                            [
                                'label' => 'Usia',
                                'name' => 'age',
                                'type' => 'number',
                                'placeholder' => '25',
                                'required' => false,
                                'span' => 6,
                            ],
                            [
                                'label' => 'Suku Bangsa',
                                'name' => 'ethnicity',
                                'type' => 'text',
                                'placeholder' => 'Jawa',
                                'required' => false,
                                'span' => 6,
                            ],
                            [
                                'label' => 'Agama',
                                'name' => 'religion',
                                'type' => 'text',
                                'placeholder' => 'Islam',
                                'required' => false,
                                'span' => 6,
                            ],
                            [
                                'label' => 'Alamat',
                                'name' => 'address',
                                'type' => 'text',
                                'placeholder' => 'J. Tata Surya No. 123',
                                'required' => false,
                                'span' => 6,
                            ],
                            [
                                'label' => 'Nomor Telepon',
                                'name' => 'phone_number',
                                'type' => 'tel',
                                'placeholder' => '08123456789',
                                'required' => false,
                                'span' => 6,
                            ],
                            [
                                'label' => 'Pendidikan Terakhir',
                                'name' => 'education',
                                'type' => 'text',
                                'placeholder' => 'S1',
                                'required' => false,
                                'span' => 6,
                            ],
                            [
                                'label' => 'Pekerjaan',
                                'name' => 'job',
                                'type' => 'text',
                                'placeholder' => 'CEO',
                                'required' => false,
                                'span' => 6,
                            ],
                            [
                                'label' => 'Perkawinan Ke-',
                                'name' => 'marriage_order',
                                'type' => 'number',
                                'placeholder' => '1',
                                'required' => false,
                                'span' => 6,
                            ],
                        ]
                    ]
                ]
            ],
            [
                'section_id' => $biodataKlinis->sections[0]->id,
                'order' => 9,
                'type' => 'essay',
                'text' => 'Apakah saudara pernah melakukan pemeriksaan psikologi sebelumnya?',
            ],
            [
                'section_id' => $biodataKlinis->sections[0]->id,
                'order' => 10,
                'type' => 'essay',
                'text' => 'Jika pernah melakukan pemeriksaan psikologis, kapan pemeriksaan itu dilakukan?',
            ],
            [
                'section_id' => $biodataKlinis->sections[0]->id,
                'order' => 11,
                'type' => 'essay',
                'text' => 'Jika pernah melakukan pemeriksaan psikologis, dimana pemeriksaan itu dilakukan?',
            ],
            [
                'section_id' => $biodataKlinis->sections[0]->id,
                'order' => 12,
                'type' => 'essay',
                'text' => 'Jika pernah melakukan pemeriksaan psikologis, silakan saudara jelaskan mengenai hasil pemeriksaan psikologis yang pernah dilakukan. Apabila belum pernah, silakan berikamn tanda (-)',
            ],
        ];

        // Validasi Semua data
        foreach ($questions as $question) {
            $this->questionValidator->validate($question);
        }

        // Seed semua data (jika validasi berhasil)
        DB::transaction(function () use ($questions) {
            foreach ($questions as $question) {
                Question::create($question);
            }
        });
    }
}
