<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Banana',
                'description' => 'This is a banana contains potassium',
                'price' => 4.00
            ],
            [
                'name' => 'Apple',
                'description' => 'An apple',
                'price' => 2.00
            ]
        ];

        foreach($products as $product => $value) {
            Product::create($value);
        }
    }
}
