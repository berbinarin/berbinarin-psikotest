<?php

namespace Database\Seeders;

use App\Models\PsikotesSection;
use App\Models\PsikotesTool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PsikotesSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $papikostick = PsikotesTool::where('name', 'Papi Kostick')->first();
        $rmib = PsikotesTool::where('name', 'RMIB')->first();

        $papikostickSection = [
            [
                'psikotes_tool_id' => $papikostick->id,
                'title' => 'Main',
                'order' => 1,
                'duration' => 45
            ],
        ];

        $rmibSection = [
            [
                'psikotes_tool_id' => $rmib->id,
                'title' => 'A',
                'order' => 1,
                'duration' => 4
            ],
            [
                'psikotes_tool_id' => $rmib->id,
                'title' => 'B',
                'order' => 2,
                'duration' => 4
            ],
            [
                'psikotes_tool_id' => $rmib->id,
                'title' => 'C',
                'order' => 3,
                'duration' => 4
            ],
            [
                'psikotes_tool_id' => $rmib->id,
                'title' => 'D',
                'order' => 4,
                'duration' => 4
            ],
            [
                'psikotes_tool_id' => $rmib->id,
                'title' => 'E',
                'order' => 5,
                'duration' => 4
            ],
            [
                'psikotes_tool_id' => $rmib->id,
                'title' => 'F',
                'order' => 6,
                'duration' => 4
            ],
            [
                'psikotes_tool_id' => $rmib->id,
                'title' => 'G',
                'order' => 7,
                'duration' => 4
            ],
            [
                'psikotes_tool_id' => $rmib->id,
                'title' => 'H',
                'order' => 8,
                'duration' => 4
            ],
        ];

        foreach ($papikostickSection as $item) {
            PsikotesSection::create($item);
        }
        
        foreach ($rmibSection as $item) {
            PsikotesSection::create($item);
        }

        
    }
}
