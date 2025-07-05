<?php

namespace Database\Seeders\Tools\EPI;

use App\Models\PsikotesSection;
use App\Models\PsikotesTool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EpiSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $epi = PsikotesTool::where('name', 'EPI')->first();

        PsikotesSection::create([
            'psikotes_tool_id' => $epi->id,
            'title' => 'Tes EPI',
            'order' => 1,
            'duration' => 20, 
        ]);
    }
}
