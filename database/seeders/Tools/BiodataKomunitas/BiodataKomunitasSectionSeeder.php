<?php

namespace Database\Seeders\Tools\BiodataKomunitas;

use App\Models\Section;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BiodataKomunitasSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $biodataKomuintas = Tool::firstWhere('name', 'Biodata Komunitas');

        Section::create([
            'tool_id' => $biodataKomuintas->id,
            'title' => 'Main',
            'order' => 1,
            'duration' => 60
        ]);
    }
}
