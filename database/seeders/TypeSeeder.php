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
        $types = [
            'Elektronik',
            'Pakaian',
            'Alat-alat Rumah Tangga',
            'Buku dan Media',
            'Makanan dan Minuman',
            'Alat-alat Bangunan',
            'Perlengkapan Kesehatan',
            'Kosmetik',
            'Otomotif',
            'Mainan dan Hobi'
        ];
        foreach ($types as $value) {
            TypeModel::create(['name_type' => $value
            ]);
        }
    }
}
