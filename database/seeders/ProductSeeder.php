<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    Product::create([
        'name' => 'Persia umur 1,5 bulan',
        'price' => 2000000,
    ]);
    Product::create([
        'name' => 'Persia umur 3 bulan',
        'price' => 3000000,
    ]);
    Product::create([
        'name' => 'Persia umur 6 bulan',
        'price' => 4000000,
    ]);
    Product::create([
        'name' => 'Peaknose umur 1,5 bulan',
        'price' => 2700000,
    ]);
    Product::create([
        'name' => 'Peaknose umur 3 bulan',
        'price' => 3700000,
    ]);
    Product::create([
        'name' => 'Peaknose umur 3 bulan',
        'price' => 4700000,
    ]);
}
}
