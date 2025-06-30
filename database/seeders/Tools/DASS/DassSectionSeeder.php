<?php

namespace Database\Seeders\Tools\DASS;

use App\Models\PsikotesSection;
use App\Models\PsikotesTool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DassSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dass42 = PsikotesTool::where('name', 'DASS-42')->first();

        $sections = [
            [
                'psikotes_tool_id' => $dass42->id,
                'title' => 'Main',
                'order' => 1,
                'duration' => 20
            ]
        ];

        foreach ($sections as $section) {
            PsikotesSection::create($section);
        }
    }
}
