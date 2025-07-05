<?php

namespace Database\Seeders\Tools\SSCT;

use App\Models\PsikotesSection;
use App\Models\PsikotesTool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SsctSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ssct = PsikotesTool::where('name', 'SSCT')->first();

        PsikotesSection::create([
            'psikotes_tool_id' => $ssct->id,
            'title' => 'Instruksi Tes SSCT',
            'order' => 1,
            'duration' => 40,
        ]);
    }
}
