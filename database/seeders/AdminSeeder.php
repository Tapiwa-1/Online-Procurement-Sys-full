<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user= User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'file'=> '/user-placeholder.png',
        ]);
        $user->assignRole('writer', 'admin');
    }
}
