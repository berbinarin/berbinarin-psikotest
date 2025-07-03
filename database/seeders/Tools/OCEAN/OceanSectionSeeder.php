<?php

namespace Database\Seeders\Tools\Ocean;

use App\Models\PsikotesSection;
use App\Models\PsikotesTool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OceanSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ocean = PsikotesTool::where('name', 'OCEAN')->first();

        $sections = [
            [
                'psikotes_tool_id' => $ocean->id,
                'title' => 'Main',
                'order' => 1,
                'duration' => 10
            ]
        ];

        foreach ($sections as $section) {
            PsikotesSection::create($section);
        }
    }
}
