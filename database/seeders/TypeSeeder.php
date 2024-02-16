<?php

namespace Database\Seeders;

use App\Models\TypeModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // buat 10
        for ($i = 0; $i < 10; $i++) {
            TypeModel::create([
                'name' => fake()->name(),
            ]);
        }
    }
}
