<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user= User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole('writer', 'admin');
    }
}
