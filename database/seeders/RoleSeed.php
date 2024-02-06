<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //
        Role::create(['name' => 'writer',]);
        Role::create(['name' => 'admin',]);
        Role::create(['name' => 'user',]);

    }
}
