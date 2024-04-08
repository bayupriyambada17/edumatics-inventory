<?php

namespace Database\Seeders;

use App\Models\ProductModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productNames = [
            'Laptop ASUS',
            'Kemeja Putih',
            'Panci Aluminium',
            'Buku Programming',
            'Susu Kental Manis',
            'Cat Tembok',
            'Masker Medis',
            'Lipstik Merah',
            'Oli Mesin Mobil',
            'Mainan Puzzle'
        ];

        foreach ($productNames as $value) {
            ProductModel::create(['name_product' => $value,
                'code_product' => rand(1000, 9999)
            ]);
        }
    }
}
