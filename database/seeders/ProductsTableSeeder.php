<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Product 1',
            'description' => 'Description of Product 1',
            'price' => 29.99,
            'image' => 'product1.jpg',
            'quantity' => 10,
        ]);

        Product::create([
            'name' => 'Product 2',
            'description' => 'Description of Product 2',
            'price' => 49.99,
            'image' => 'product2.jpg',
            'quantity' => 5,
        ]);
        

    }
}
