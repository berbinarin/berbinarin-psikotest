<?php

namespace Database\Seeders\Tools\VAK;

use App\Models\PsikotesSection;
use App\Models\PsikotesTool;
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
        $vak = PsikotesTool::where('name', 'VAK')->first();

        $sections = [
            [
                'psikotes_tool_id' => $vak->id,
                'title' => 'visual',
                'order' => 1,
                'duration' => 10
            ],
            [
                'psikotes_tool_id' => $vak->id,
                'title' => 'auditori',
                'order' => 2,
                'duration' => 10
            ],
            [
                'psikotes_tool_id' => $vak->id,
                'title' => 'kinestetik',
                'order' => 3,
                'duration' => 10
            ],
        ];

        foreach ($sections as $section) {
            PsikotesSection::create($section);
        }
    }
}
