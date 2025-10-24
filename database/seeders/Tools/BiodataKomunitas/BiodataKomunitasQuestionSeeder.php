<?php

namespace Database\Seeders\Tools\BiodataKomunitas;

use App\Models\Question;
use App\Models\Tool;
use App\Validators\QuestionValidator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BiodataKomunitasQuestionSeeder extends Seeder
{
    public function __construct(private QuestionValidator $questionValidator) {}

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $biodataKomunitas = Tool::firstWhere('name', 'Biodata Komunitas');

        $questions = [
            [
                'section_id' => $biodataKomunitas->sections[0]->id,
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
                'section_id' => $biodataKomunitas->sections[0]->id,
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
                                'label' => 'Pekerjaan Saat Ini',
                                'name' => 'current_position',
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
                'section_id' => $biodataKomunitas->sections[0]->id,
                'order' => 3,
                'text' => 'Riwayat Pendidikan',
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
                                'name' => 'senior_high_school_program_name',
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
                'section_id' => $biodataKomunitas->sections[0]->id,
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
                'section_id' => $biodataKomunitas->sections[0]->id,
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
                'section_id' => $biodataKomunitas->sections[0]->id,
                'order' => 6,
                'type' => 'form',
                'text' => 'Kegiatan yang Pernah Diikuti',
                'options' => [
                    [
                        'repeatable' => true,
                        'group' => 'workshop',
                        'inputs' => [
                            [
                                'label' => 'Nama Kursus/Seminar/Pelatihan',
                                'name' => 'name',
                                'type' => 'text',
                                'placeholder' => 'Workshop Kepemimpinan',
                                'required' => true,
                                'span' => 4
                            ],
                            [
                                'label' => 'Penyelenggara',
                                'name' => 'organizer',
                                'type' => 'text',
                                'placeholder' => 'Berbinar',
                                'required' => true,
                                'span' => 4
                            ],
                            [
                                'label' => 'Tahun',
                                'name' => 'year',
                                'type' => 'number',
                                'placeholder' => '2021',
                                'required' => true,
                                'span' => 4
                            ],
                        ]
                    ]
                ]
            ],
            [
                'section_id' => $biodataKomunitas->sections[0]->id,
                'order' => 7,
                'type' => 'form',
                'text' => 'Riwayat Pekerjaan dalam 10 Tahun Terakhir',
                'options' => [
                    [

                        'repeatable' => true,
                        'group' => 'employment_history',
                        'inputs' => [
                            [
                                'label' => 'Nama Perusahaan',
                                'name' => 'company',
                                'type' => 'text',
                                'placeholder' => 'PT Berbinar Insightful Indonesia',
                                'required' => true,
                                'span' => 6
                            ],
                            [
                                'label' => 'Posisi Terakhir',
                                'name' => 'last_position',
                                'type' => 'text',
                                'placeholder' => 'Digital Marketing',
                                'required' => true,
                                'span' => 6
                            ],
                        ]
                    ]
                ]
            ],
            [
                'section_id' => $biodataKomunitas->sections[0]->id,
                'order' => 8,
                'text' => 'Sebutkan kelebihan/kekuatan dari pribadi Anda yang mendukung tugas Anda saat ini (minimal 3)',
                'type' => 'essay',
            ],
            [
                'section_id' => $biodataKomunitas->sections[0]->id,
                'order' => 9,
                'text' => 'Sebutkan faktor yang sering menghambat keberhasilan/kelancaran pelaksanaan tugas Anda saat ini (minimal 3)',
                'type' => 'essay',
            ],
            [
                'section_id' => $biodataKomunitas->sections[0]->id,
                'order' => 10,
                'text' => 'Target capaian Anda untuk 5 tahun ke depan ',
                'type' => 'essay',
            ],
            [
                'section_id' => $biodataKomunitas->sections[0]->id,
                'order' => 11,
                'text' => 'Tuliskan satu pengalaman keberhasilan Anda dalam menjalankan tugas, yang menurut Anda merupakan tugas yang sangat sulit. Jelaskan tugas tersebut dan faktor-faktor yang membantu Anda menemukan penyelesaian atas tugas yang sulit tersebut',
                'type' => 'essay',
            ],
            [
                'section_id' => $biodataKomunitas->sections[0]->id,
                'order' => 12,
                'text' => 'Sudah pernah melakukan pemeriksaan psikologis sebelumnya? Jika iya, untuk keperluan apa?',
                'type' => 'essay',
            ],
            [
                'section_id' => $biodataKomunitas->sections[0]->id,
                'order' => 13,
                'text' => 'Mengetahui informasi ini dari mana?',
                'type' => 'essay',
            ],
            [
                'section_id' => $biodataKomunitas->sections[0]->id,
                'order' => 14,
                'text' => 'Hubungan Anda dengan Komunitas?',
                'type' => 'essay',
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
