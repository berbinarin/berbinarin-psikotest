<?php

namespace Database\Seeders\Tools\DAP;

use App\Models\Section;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DapSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dap = Tool::firstWhere('name', 'DAP');

        Section::create([
            'tool_id' => $dap->id,
            'title' => 'Main',
            'order' => 1,
            'duration' => 7
        ]);
    }
}
