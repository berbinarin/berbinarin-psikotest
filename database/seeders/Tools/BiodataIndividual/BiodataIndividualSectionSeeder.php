<?php

namespace Database\Seeders\Tools\BiodataIndividual;

use App\Models\Section;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BiodataIndividualSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $biodataIndividiual = Tool::firstWhere('name', 'Biodata Individual');

        Section::create([
            'tool_id' => $biodataIndividiual->id,
            'title' => 'main',
            'order' => 1,
            'duration' => 60
        ]);
    }
}
