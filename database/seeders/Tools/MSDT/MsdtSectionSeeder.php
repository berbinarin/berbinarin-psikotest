<?php

namespace Database\Seeders\Tools\MSDT;

use App\Models\Section;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MsdtSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $msdt = Tool::where('name', 'MSDT')->first();

        $sections = [
            [
                'tool_id' => $msdt->id,
                'title' => 'Main',
                'order' => 1,
                'duration' => 30
            ]
        ];

        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}
