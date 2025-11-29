<?php

namespace Database\Seeders\Tools\IST;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tool;
use App\Models\Section;

class IstSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ist = Tool::firstWhere('name', 'IST');

        $sections = [
            [
                'tool_id' => $ist->id,
                'title' => 'Subtes 1 (SE)',
                'order' => 1,
                'duration' => 6
            ],
            [
                'tool_id' => $ist->id,
                'title' => 'Subtes 2 (WA)',
                'order' => 2,
                'duration' => 6
            ],
            [
                'tool_id' => $ist->id,
                'title' => 'Subtes 3 (AN)',
                'order' => 3,
                'duration' => 7
            ],
            [
                'tool_id' => $ist->id,
                'title' => 'Subtes 4 (GA)',
                'order' => 4,
                'duration' => 8
            ],
            [
                'tool_id' => $ist->id,
                'title' => 'Subtes 5 (RA)',
                'order' => 5,
                'duration' => 10
            ],
            [
                'tool_id' => $ist->id,
                'title' => 'Subtes 6 (ZR)',
                'order' => 6,
                'duration' => 10
            ],
            [
                'tool_id' => $ist->id,
                'title' => 'Subtes 7 (FA)',
                'order' => 7,
                'duration' => 7
            ],
            [
                'tool_id' => $ist->id,
                'title' => 'Subtes 8 (WU)',
                'order' => 8,
                'duration' => 9
            ],
            [
                'tool_id' => $ist->id,
                'title' => 'Subtes 9 (ME)',
                'order' => 9,
                'duration' => 9
            ],
        ];

        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}
