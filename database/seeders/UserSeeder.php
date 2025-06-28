<?php

namespace Database\Seeders;

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
            'email' => 'ptpm@gmail.com',
            'password' => bcrypt('berbinar123')
        ])->assignRole('ptpm');

        User::create([
            'name' => 'Angelina Christy',
            'email' => 'angelinachristy@gmail.com',
            'password' => bcrypt('berbinar123')
        ])->assignRole('user_psikotes-paid');
    }
}
