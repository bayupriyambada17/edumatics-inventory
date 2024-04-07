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

        \App\Models\User::factory()->create([
            'name' => 'Admin Inventory',
            'email' => 'edumatics@inventory.com',
            'password' => bcrypt('edumatics'),
            'role' => 'administrator',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Warehouse Inventory',
            'email' => 'warehouse@inventory.com',
            'password' => bcrypt('edumatics'),
            'role' => 'warehouse',
        ]);
    }
}
