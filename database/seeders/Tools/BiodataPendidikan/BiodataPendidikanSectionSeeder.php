<?php

namespace Database\Seeders\Tools\BiodataPendidikan;

use App\Models\Section;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BiodataPendidikanSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $biodataPendidikan = Tool::firstWhere('name', 'Biodata Pendidikan');

        Section::create([
            'tool_id' => $biodataPendidikan->id,
            'title' => 'Main',
            'order' => 1,
            'duration' => 60,
        ]);
    }
}
