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
        // Test
        $this->call([
            // Test Category
            TestCategorySeeder::class,

            // Test Type
            TestTypeSeeder::class,
        ]);

        // User and Role Seeder
        $this->call([
            // Role Seeder
            RoleSeeder::class,

            // User Seeder
            UserSeeder::class,
        ]);

        // Tool Seeder
        $this->call([
            Tools\ToolSeeder::class,

            // Papi Kostick
            Tools\PapiKostick\PapiKostickSectionSeeder::class,
            Tools\PapiKostick\PapiKostickQuestionSeeder::class,

            // BAUM
            Tools\BAUM\BaumSectionSeeder::class,
            Tools\BAUM\BaumQuestionSeeder::class,

            // DAP
            Tools\DAP\DapSectionSeeder::class,
            Tools\DAP\DapQuestionSeeder::class,

            // HTP
            Tools\HTP\HtpSectionSeeder::class,
            Tools\HTP\HtpQuestionSeeder::class,

            // SSCT
            Tools\SSCT\SsctSectionSeeder::class,
            Tools\SSCT\SsctQuestionSeeder::class,

            // OCEAN
            Tools\OCEAN\OceanSectionSeeder::class,
            Tools\OCEAN\OceanQuestionSeeder::class,

            // DASS-42
            Tools\DASS42\Dass42SectionSeeder::class,
            Tools\DASS42\Dass42QuestionSeeder::class,

            // VAK
            Tools\VAK\VakSectionSeeder::class,
            Tools\VAK\VakQuestionSeeder::class,

            // Tes Esai
            Tools\TesEsai\TesEsaiSectionSeeder::class,
            Tools\TesEsai\TesEsaiQuestionSeeder::class,

            // RMIB
            Tools\RMIB\RmibSectionSeeder::class,
            Tools\RMIB\RmibQuestionSeeder::class,

            // EPI
            Tools\EPI\EpiSectionSeeder::class,
            Tools\EPI\EpiQuestionSeeder::class,
            
            // Biodata Perusahaan
            Tools\BiodataPerusahaan\BiodataPerusahaanSectionSeeder::class,
            Tools\BiodataPerusahaan\BiodataPerusahaanQuestionSeeder::class,
            
            // Biodata Pendidikan
            Tools\BiodataPendidikan\BiodataPendidikanSectionSeeder::class,
            Tools\BiodataPendidikan\BiodataPendidikanQuestionSeeder::class,
            
            // Biodata Komunitas
            Tools\BiodataKomunitas\BiodataKomunitasSectionSeeder::class,
            Tools\BiodataKomunitas\BiodataKomunitasQuestionSeeder::class,
            
            // Biodata Individual
            Tools\BiodataIndividual\BiodataIndividualSectionSeeder::class,
            Tools\BiodataIndividual\BiodataIndividualQuestionSeeder::class,
            
            // Biodata Klinis
            Tools\BiodataKlinis\BiodataKlinisSectionSeeder::class,
            Tools\BiodataKlinis\BiodataKlinisQuestionSeeder::class,
        ]);
    }
}
