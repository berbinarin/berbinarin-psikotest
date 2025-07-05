<?php

namespace Database\Seeders\Tools\TesEsai;

use App\Models\PsikotesSection;
use App\Models\PsikotesTool;
use Illuminate\Database\Seeder;

class TesEsaiSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tesEsai = PsikotesTool::firstWhere('name', 'Tes Esai');

        PsikotesSection::create([
            'psikotes_tool_id' => $tesEsai->id,
            'title' => 'Main',
            'order' => 1,
            'duration' => 20
        ]);
    }
}
