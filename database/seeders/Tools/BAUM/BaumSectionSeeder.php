<?php

namespace Database\Seeders\Tools\BAUM;

use App\Models\Section;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BaumSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $baum = Tool::firstWhere('name', 'BAUM');

        Section::create([
            'tool_id' => $baum->id,
            'title' => 'Main',
            'order' => 1,
            'duration' => 7
        ]);
    }
}
