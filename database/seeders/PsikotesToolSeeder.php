<?php

namespace Database\Seeders;

use App\Models\PsikotesTool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PsikotesToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tools = [
            [
                'name' => 'Papi Kostick',
                'duration' => 45,
                'is_active' => true,
            ],
            [
                'name' => 'RMIB',
                'duration' => 32,
                'is_active' => true,
            ]
        ];

        foreach ($tools as $tool) {
            PsikotesTool::create($tool);
        }
    }
}
