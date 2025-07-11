<?php

namespace Database\Seeders\Tools\HTP;

use App\Models\Section;
use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HtpSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $htp = Tool::firstWhere('name', 'HTP');

        Section::create([
            'tool_id' => $htp->id,
            'title' => 'Main',
            'order' => 1,
            'duration' => 7
        ]);
    }
}
