<?php

namespace Database\Seeders;

use App\Models\TestCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Komunitas'
            ],
            [
                'name' => 'Individu'
            ],
            [
                'name' => 'Instansi Pendidikan'
            ],
            [
                'name' => 'Perusahaan'
            ]
        ];

        foreach ($categories as $category) {
            TestCategory::create($category);
        }
    }
}
