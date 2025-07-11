<?php

namespace Database\Seeders\Tools\SSCT;

use App\Models\Section;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SsctSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ssct = Tool::where('name', 'SSCT')->first();

        Section::create([
            'tool_id' => $ssct->id,
            'title' => 'Instruksi Tes SSCT',
            'order' => 1,
            'duration' => 40,
        ]);
    }
}
