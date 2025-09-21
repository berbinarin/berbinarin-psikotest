<?php

namespace Database\Seeders\Tools\TesEsai;

use App\Models\Section;
use App\Models\Tool;
use Illuminate\Database\Seeder;

class TesEsaiSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tesEsai = Tool::firstWhere('name', 'Tes Esai');

        Section::create([
            'tool_id' => $tesEsai->id,
            'title' => 'Main',
            'order' => 1,
            'duration' => 30
        ]);
    }
}
