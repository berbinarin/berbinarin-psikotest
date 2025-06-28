<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'ptpm'
            ],
            [
                'name' => 'user_psikotes-paid'
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
