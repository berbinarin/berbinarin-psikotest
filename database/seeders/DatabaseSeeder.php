<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User and Role Seeder
        $this->call([
            // Role Seeder
            RoleSeeder::class,
            
            // User Seeder
            UserSeeder::class,
        ]);

        // Psikotes Seeder
        $this->call([
            Tools\PsikotesToolSeeder::class,

            // Papi Kostick
            Tools\PapiKostick\PapiKostickSectionSeeder::class,
            Tools\PapiKostick\PapiKostickQuestionSeeder::class,
            
            // RMIB
            Tools\RMIB\RmibSectionSeeder::class,
            Tools\RMIB\RmibQuestionSeeder::class,
        ]);
    }
}
