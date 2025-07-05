<?php

namespace Database\Seeders\Tools\BAUM;

use App\Models\PsikotesSection;
use App\Models\PsikotesTool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BaumSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $baum = PsikotesTool::firstWhere('name', 'BAUM');

        PsikotesSection::create([
            'psikotes_tool_id' => $baum->id,
            'title' => 'Main',
            'order' => 1,
            'duration' => 7
        ]);
    }
}
