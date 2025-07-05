<?php

namespace Database\Seeders\Tools\PapiKostick;

use App\Models\PsikotesSection;
use App\Models\PsikotesTool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PapiKostickSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $papiKostick = PsikotesTool::firstWhere('name', 'Papi Kostick');

        $sections = [
            [
                'psikotes_tool_id' => $papiKostick->id,
                'title' => 'Main',
                'order' => 1,
                'duration' => 45
            ]
        ];

        foreach ($sections as $section) {
            PsikotesSection::create($section);
        }
    }
}
