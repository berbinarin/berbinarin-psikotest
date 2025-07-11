<?php

namespace Database\Seeders\Tools\VAK;

use App\Models\Section;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VakSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $vak = Tool::where('name', 'VAK')->first();

        $sections = [
            [
                'tool_id' => $vak->id,
                'title' => 'visual',
                'order' => 1,
                'duration' => 10
            ],
            [
                'tool_id' => $vak->id,
                'title' => 'auditori',
                'order' => 2,
                'duration' => 10
            ],
            [
                'tool_id' => $vak->id,
                'title' => 'kinestetik',
                'order' => 3,
                'duration' => 10
            ],
        ];

        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}
