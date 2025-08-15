<?php

namespace Database\Seeders;

use App\Models\RegistrantProfile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'PTPM',
            'username' => 'ptpm_psikotes-paid',
            'email' => 'ptpm@gmail.com',
            'password' => bcrypt('berbinar123')
        ])->assignRole('ptpm_psikotes-paid');

        User::create([
            'name' => 'PTPM',
            'username' => 'ptpm_psikotes-free',
            'email' => 'ptpm@gmail.com',
            'password' => bcrypt('berbinar123')
        ])->assignRole('ptpm_psikotes-free');
    }
}
