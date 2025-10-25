<?php

namespace Database\Seeders\Tools\D4;

use App\Models\Section;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class D4SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $d4_1 = Tool::where('name', 'D4 Bagian 1')->first();
        $d4_2 = Tool::where('name', 'D4 Bagian 2')->first();

        $sections = [
            [
                'tool_id' => $d4_1->id,
                'title' => 'Main',
                'order' => 1,
                'duration' => 10
            ],
            [
                'tool_id' => $d4_2->id,
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
