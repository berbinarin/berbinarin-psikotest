<?php

namespace Database\Seeders\Tools\Ocean;

use App\Models\Section;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OceanSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ocean = Tool::where('name', 'OCEAN')->first();

        $sections = [
            [
                'tool_id' => $ocean->id,
                'title' => 'Main',
                'order' => 1,
                'duration' => 10
            ]
        ];

        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}
