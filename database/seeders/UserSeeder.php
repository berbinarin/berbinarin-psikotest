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
            'username' => 'ptpm',
            'email' => 'ptpm@gmail.com',
            'password' => bcrypt('berbinar123')
        ])->assignRole('ptpm');

        $user = User::create([
            'name' => 'Barita',
            'username' => 'barita',
            'email' => 'barita@gmail.com',
            'password' => bcrypt('berbinar123')
        ])->assignRole('user_psikotes-paid');

        RegistrantProfile::create([
            'user_id' => $user->id,
            'test_type_id' => 1,
            'gender' => 'female',
            'age' => 20,
            'domicile' => 'Bogor',
            'phone_number' => '0123456789',
            'psikotes_service' => 'offline',
            'reason' => 'hanya uji coba',
            'schedule' => '2025-10-25 14:20:00'
        ]);
    }
}
