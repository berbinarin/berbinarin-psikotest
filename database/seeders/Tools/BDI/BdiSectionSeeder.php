<?php

namespace Database\Seeders\Tools\BDI;

use App\Models\Section;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BdiSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bdi = Tool::firstWhere('name', 'BDI');

        $sections = [
            [
                'tool_id' => $bdi->id,
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
