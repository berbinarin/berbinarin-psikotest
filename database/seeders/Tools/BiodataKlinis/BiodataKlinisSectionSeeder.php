<?php

namespace Database\Seeders\Tools\BiodataKlinis;

use App\Models\Section;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BiodataKlinisSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $biodataKlinis = Tool::firstWhere('name', 'Biodata Klinis');

        Section::create([
            'tool_id' => $biodataKlinis->id,
            'title' => 'Main',
            'order' => 1,
            'duration' => 60
        ]);
    }
}
