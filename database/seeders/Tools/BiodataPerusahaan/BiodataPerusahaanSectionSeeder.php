<?php

namespace Database\Seeders\Tools\BiodataPerusahaan;

use App\Models\Section;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BiodataPerusahaanSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $biodataPerusahaan = Tool::firstWhere('name', 'Biodata Perusahaan');

        Section::create([
            'tool_id' => $biodataPerusahaan->id,
            'title' => 'Main',
            'order' => 1,
            'duration' => 60,
        ]);
    }
}
