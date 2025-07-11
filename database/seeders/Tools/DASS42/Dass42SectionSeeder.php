<?php

namespace Database\Seeders\Tools\DASS42;

use App\Models\Section;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Dass42SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dass42 = Tool::firstWhere('name', 'DASS-42');

        $sections = [
            [
                'tool_id' => $dass42->id,
                'title' => 'Main',
                'order' => 1,
                'duration' => 20
            ]
        ];

        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}
