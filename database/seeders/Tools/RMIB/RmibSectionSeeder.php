<?php

namespace Database\Seeders\Tools\RMIB;

use App\Models\Section;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RmibSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rmib = Tool::firstWhere('name', 'RMIB');

        $sections = [
            [
                'tool_id' => $rmib->id,
                'title' => 'A',
                'order' => 1,
                'duration' => 4
            ],
            [
                'tool_id' => $rmib->id,
                'title' => 'B',
                'order' => 2,
                'duration' => 4
            ],
            [
                'tool_id' => $rmib->id,
                'title' => 'C',
                'order' => 3,
                'duration' => 4
            ],
            [
                'tool_id' => $rmib->id,
                'title' => 'D',
                'order' => 4,
                'duration' => 4
            ],
            [
                'tool_id' => $rmib->id,
                'title' => 'E',
                'order' => 5,
                'duration' => 4
            ],
            [
                'tool_id' => $rmib->id,
                'title' => 'F',
                'order' => 6,
                'duration' => 4
            ],
            [
                'tool_id' => $rmib->id,
                'title' => 'G',
                'order' => 7,
                'duration' => 4
            ],
            [
                'tool_id' => $rmib->id,
                'title' => 'H',
                'order' => 8,
                'duration' => 4
            ],
        ];

        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}
