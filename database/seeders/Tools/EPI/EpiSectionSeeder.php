<?php

namespace Database\Seeders\Tools\EPI;

use App\Models\Section;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EpiSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $epi = Tool::where('name', 'EPI')->first();

        Section::create([
            'tool_id' => $epi->id,
            'title' => 'Tes EPI',
            'order' => 1,
            'duration' => 20,
        ]);
    }
}
