<?php

namespace Database\Seeders\Tools\DASS42;

use App\Models\PsikotesSection;
use App\Models\PsikotesTool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Dass42SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dass42 = PsikotesTool::firstWhere('name', 'DASS-42');

        $sections = [
            [
                'psikotes_tool_id' => $dass42->id,
                'title' => 'Main',
                'order' => 1,
                'duration' => 20
            ]
        ];

        foreach ($sections as $section) {
            PsikotesSection::create($section);
        }
    }
}
