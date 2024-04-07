<?php

namespace Database\Seeders;

use App\Models\LocationModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $warehouseLocations = [
            'Gudang Utara',
            'Gudang Selatan',
            'Gudang Timur',
            'Gudang Barat',
            'Gudang Tengah',
            'Gudang A',
            'Gudang B',
            'Gudang C',
            'Gudang Depan',
            'Gudang Belakang'
        ];

        foreach ($warehouseLocations as $value) {
            LocationModel::create([
                'location' => $value
            ]);
        }
    }
}
