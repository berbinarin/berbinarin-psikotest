<?php

namespace Database\Seeders\Tools\PapiKostick;

use App\Models\Section;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PapiKostickSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $papiKostick = Tool::firstWhere('name', 'Papi Kostick');

        $sections = [
            [
                'tool_id' => $papiKostick->id,
                'title' => 'Main',
                'order' => 1,
                'duration' => 45
            ]
        ];

        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}
