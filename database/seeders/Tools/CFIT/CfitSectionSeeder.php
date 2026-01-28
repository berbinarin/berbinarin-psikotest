<?php

namespace Database\Seeders\Tools\CFIT;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tool;
use App\Models\Section;

class CfitSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cfit = Tool::firstWhere('name', 'CFIT');

        $sections = [
            [
                'tool_id' => $cfit->id,
                'title' => 'Contoh Subtes 1',
                'order' => 1,
                'duration' => 15
            ],
            [
                'tool_id' => $cfit->id,
                'title' => 'Subtes 1',
                'order' => 2,
                'duration' => 3
            ],
            [
                'tool_id' => $cfit->id,
                'title' => 'Contoh Subtes 2',
                'order' => 3,
                'duration' => 15
            ],
            [
                'tool_id' => $cfit->id,
                'title' => 'Subtes 2',
                'order' => 4,
                'duration' => 4
            ],
            [
                'tool_id' => $cfit->id,
                'title' => 'Contoh Subtes 3',
                'order' => 5,
                'duration' => 15
            ],
            [
                'tool_id' => $cfit->id,
                'title' => 'Subtes 3',
                'order' => 6,
                'duration' => 3
            ],
            [
                'tool_id' => $cfit->id,
                'title' => 'Contoh Subtes 4',
                'order' => 7,
                'duration' => 15
            ],
            [
                'tool_id' => $cfit->id,
                'title' => 'Subtes 4',
                'order' => 8,
                'duration' => 3
            ],
        ];

        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}
