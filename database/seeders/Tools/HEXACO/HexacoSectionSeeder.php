<?php

namespace Database\Seeders\Tools\HEXACO;

use App\Models\Section;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HexacoSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hexaco = Tool::where('name', 'HEXACO')->first();

        $sections = [
            [
                'tool_id' => $hexaco->id,
                'title' => 'Main',
                'order' => 1,
                'duration' => 15
            ]
        ];

        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}
