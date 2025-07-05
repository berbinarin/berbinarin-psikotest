<?php

namespace Database\Seeders\Tools\DAP;

use App\Models\PsikotesSection;
use App\Models\PsikotesTool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DapSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dap = PsikotesTool::firstWhere('name', 'DAP');

        PsikotesSection::create([
            'psikotes_tool_id' => $dap->id,
            'title' => 'Main',
            'order' => 1,
            'duration' => 7
        ]);
    }
}
