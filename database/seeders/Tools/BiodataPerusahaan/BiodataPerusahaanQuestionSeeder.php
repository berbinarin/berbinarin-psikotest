<?php

namespace Database\Seeders\Tools\BiodataPerusahaan;

use App\Models\Question;
use App\Models\Tool;
use App\Validators\QuestionValidator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BiodataPerusahaanQuestionSeeder extends Seeder
{
    public function __construct(private QuestionValidator $questionValidator) {}

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $biodataPerusahaan = Tool::with('sections')->firstWhere('name', 'Biodata Perusahaan');

        $questions = [
            [
                'section_id' => $biodataPerusahaan->sections[0]->id,
                'order' => 1,
                'text' => 'Data Diri',
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
                                'label' => 'No. KTP',
                                'name' => 'identity_number',
                                'type' => 'text',
                                'placeholder' => '0123456789',
                                'required' => true,
                                'span' => 6
                            ],
                            [
                                'label' => 'Tempat Lahir',
                                'name' => 'birth_place',
                                'type' => 'text',
                                'placeholder' => 'Kota Surabaya',
                                'required' => true,
                                'span' => 6
                            ],
                            [
                                'label' => 'Tanggal Lahir',
                                'name' => 'birth_date',
                                'type' => 'date',
                                'placeholder' => null,
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
                                    ['value' => 'male', 'text' => 'Laki-Laki'],
                                    ['value' => 'female', 'text' => 'Perempuan']

                                ]
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
                            [
                                'label' => 'Alamat',
                                'name' => 'address',
                                'type' => 'text',
                                'placeholder' => 'Jl. Tata Surya No.123',
                                'required' => true,
                                'span' => 6,
                            ]
                        ]
                    ],
                ],
            ],
            [
                'section_id' => $biodataPerusahaan->sections[0]->id,
                'order' => 2,
                'text' => 'Data Diri',
                'type' => 'form',
                'options' => [
                    [
                        'repeatable' => false,
                        'inputs' => [
                            [
                                'label' => 'Alamat Email',
                                'name' => 'email',
                                'type' => 'email',
                                'placeholder' => 'berbinar@gmail.com',
                                'required' => true,
                                'span' => 6
                            ],
                            [
                                'label' => 'Unit Kerja',
                                'name' => 'departement',
                                'type' => 'text',
                                'placeholder' => 'Departemen SDM',
                                'required' => true,
                                'span' => 6
                            ],
                            [
                                'label' => 'Jabatan Saat Ini',
                                'name' => 'current_position',
                                'type' => 'text',
                                'placeholder' => 'CEO',
                                'required' => true,
                                'span' => 6
                            ],
                            [
                                'label' => 'Jabatan yang Diinginkan',
                                'name' => 'preferred_position',
                                'type' => 'text',
                                'placeholder' => 'CEO',
                                'required' => true,
                                'span' => 6
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
                    ],

                ],
            ],
            [
                'section_id' => $biodataPerusahaan->sections[0]->id,
                'order' => 3,
                'text' => 'Riwayat Pendidikan',
                'type' => 'form',
                'options' => [
                    [
                        'title' => 'TK',
                        'repeatable' => false,
                        'group' => 'kindergarten',
                        'inputs' => [
                            [
                                'name' => 'school',
                                'label' => 'Nama Sekolah',
                                'type' => 'text',
                                'placeholder' => 'TK Harapan 1',
                                'required' => true,
                                'span' => 6
                            ],
                            [
                                'name' => 'year',
                                'label' => 'Tahun',
                                'type' => 'number',
                                'placeholder' => '2002',
                                'required' => true,
                                'span' => 6
                            ]
                        ]
                    ],
                    [
                        'title' => 'SD',
                        'repeatable' => false,
                        'group' => 'primary_school',
                        'inputs' => [
                            [
                                'label' => 'Nama Sekolah',
                                'name' => 'school',
                                'type' => 'text',
                                'placeholder' => 'SD Harapan 1',
                                'required' => true,
                                'span' => 6
                            ],
                            [
                                'label' => 'Tahun',
                                'name' => 'year',
                                'type' => 'number',
                                'placeholder' => '2003',
                                'required' => true,
                                'span' => 6
                            ]
                        ],
                    ]
                ]
            ],
            [
                'section_id' => $biodataPerusahaan->sections[0]->id,
                'order' => 4,
                'text' => 'Riwayat Pendidikan',
                'type' => 'form',
                'options' => [
                    [
                        'title' => 'SMP',
                        'repeatable' => false,
                        'group' => 'junior_high_school',
                        'inputs' => [
                            [
                                'label' => 'Nama Sekolah',
                                'name' => 'school',
                                'type' => 'text',
                                'placeholder' => 'SMP Harapan 1',
                                'required' => true,
                                'span' => 6
                            ],
                            [
                                'label' => 'Tahun',
                                'name' => 'year',
                                'type' => 'text',
                                'placeholder' => '2003',
                                'required' => true,
                                'span' => 6
                            ]
                        ]
                    ],
                    [
                        'title' => 'SMA',
                        'repeatable' => false,
                        'group' => 'senior_high_school',
                        'inputs' => [
                            [
                                'label' => 'Nama Sekolah',
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
                                'span' => 3
                            ],
                            [
                                'label' => 'Tahun',
                                'name' => 'year',
                                'type' => 'number',
                                'placeholder' => '2003',
                                'required' => true,
                                'span' => 3
                            ],
                        ]
                    ]
                ]
            ],
            [
                'section_id' => $biodataPerusahaan->sections[0]->id,
                'order' => 5,
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
                'section_id' => $biodataPerusahaan->sections[0]->id,
                'order' => 6,
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
                        'group' => 'doctroral',
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
                'section_id' => $biodataPerusahaan->sections[0]->id,
                'order' => 7,
                'type' => 'essay',
                'text' => 'Sebutkan kelebihan/kekuatan dari pribadi Anda yang mendukung tugas Anda saat ini (minimal 3)',
            ],
            [
                'section_id' => $biodataPerusahaan->sections[0]->id,
                'order' => 8,
                'type' => 'essay',
                'text' => 'Sebutkan faktor yang sering menghambat keberhasilan/kelancaran pelaksanaan tugas Anda saat ini',
            ],
            [
                'section_id' => $biodataPerusahaan->sections[0]->id,
                'order' => 9,
                'type' => 'essay',
                'text' => 'Target capaian Anda untuk 5 tahun ke depan ',
            ],
            [
                'section_id' => $biodataPerusahaan->sections[0]->id,
                'order' => 10,
                'type' => 'essay',
                'text' => 'Tuliskan satu pengalaman keberhasilan Anda dalam menjalankan tugas, yang menurut Anda merupakan tugas yang sangat sulit. Jelaskan tugas tersebut dan faktor-faktor yang membantu Anda menemukan penyelesaian atas tugas yang sulit tersebut',
            ],
            [
                'section_id' => $biodataPerusahaan->sections[0]->id,
                'order' => 11,
                'type' => 'essay',
                'text' => 'Apakah Anda sudah pernah melakukan tes psiåkologis sebelumnya? Jika Ya, untuk keperluan apa?',
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
